<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class RegionalController extends Controller
{
    public function getRegionalApi()
    {
        try {
            $client = new Client();
            $url = "http://localhost:9010/regional/";
            $response = $client->request('GET', $url);
    
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            
            return view('regional.index', [
                'data' => $contentArray,
                    'title' => 'Regional'
            ]);
        } catch (\Throwable $th) {
            return view('regional.down', [
                'title' => 'Regional'
            ]);
        }
    }

    public function showAdd()
    {
        return view('regional.add', [
            'title' => 'Regional'
        ]);
    }

    public function addRegional(Request $request)
    {
        try {
            $request->validate([
                'kode_regional' => ['required', 'string', 'max:255'],
                'nama_regional' => ['required', 'string', 'max:255'],
                'alamat' => ['required', 'string', 'max:255'],
                'nama_kepala_regional' => ['required', 'string', 'max:255'],
            ]);
    
            $response = Http::post("http://localhost:9010/regional/", [
                'kode_regional' => $request->kode_regional,
                'nama_regional' => $request->nama_regional,
                'alamat' => $request->alamat,
                'nama_kepala_regional' => $request->nama_kepala_regional,
            ]);
    
            if ($response->successful()) {
                return redirect()->route('regional')->with('success', 'Data Regional Berhasil Ditambah');
            } 
        } catch (\Throwable $th) {
            // Jika terjadi kesalahan saat melakukan request, arahkan kembali ke halaman regional dengan pesan kesalahan
            return redirect()->route('regional');
        }
    }
    

    public function deleteRegional($id)
    {

            $response = Http::delete('http://localhost:9010/regional/' . $id);

            if ($response->successful()) {
                return redirect()->back();
            } else {
                $responseData = $response->json();
                return redirect()->back()->with('error', $responseData['error']);
            }
    }

    public function regionalById($id)
    {
        try {
            // Create a Guzzle HTTP client
            $client = new Client();
    
            // Define the URLs
            $url1 = "http://localhost:9010/regional/" . $id;
            $url2 = "http://localhost:9011/cabang/";
    
            // Make the HTTP request for regional data
            $response1 = $client->request('GET', $url1);
            $content1 = $response1->getBody()->getContents();
            $contentArray1 = json_decode($content1, true);
    
            // Check if the regional data is retrieved successfully
            if (!isset($contentArray1['kode_regional'])) {
                throw new \Exception('Invalid regional data');
            }
    
            // Extract the kode_regional from the regional data
            $kode_regional = $contentArray1['kode_regional'];
    
            // Initialize cabang data and server status
            $cabang = [];
            $cabangServerDown = false;
    
            // Try to get cabang data
            try {
                $response2 = $client->request('GET', $url2);
                $content2 = $response2->getBody()->getContents();
                $contentArray2 = json_decode($content2, true);
    
                // Check if the contentArray2 has data
                if (isset($contentArray2)) {
                    $all_cabang = $contentArray2;
    
                    // Filter the cabang based on kode_regional
                    $cabang = array_filter($all_cabang, function ($s) use ($kode_regional) {
                        return $s['kode_regional'] == $kode_regional;
                    });
                }
            } catch (\Exception $e) {
                // If there's an error with the cabang server, set the flag
                $cabangServerDown = true;
            }
    
            // Return the view with the regional and cabang data
            return view('regional.detail', [
                'regional' => $contentArray1,
                'cabang' => $cabang,
                'cabangServerDown' => $cabangServerDown,
                'title' => 'Regional'
            ]);
        } catch (\Throwable $th) {
            // Log the error for debugging purposes
    
            // Redirect to the regional route in case of an error
            return redirect()->route('regional');
        }
    }
    
    

    public function showUpdate($id)
    {
        try {
            $client = new Client();
            $url = "http://localhost:9010/regional/" . $id;
            $response = $client->request('GET', $url);

            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            
            return view('regional.edit', [
                'data' => $contentArray,
                'title' => 'Regional'
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('regional');
        }
    }
    
    public function updateRegional(Request $request, $id)
    {

            $request->validate([
                'kode_regional' => ['required', 'string', 'max:255'],
                'nama_regional' => ['required', 'string', 'max:255'],
                'alamat' => ['required', 'string', 'max:255'],
                'nama_kepala_regional' => ['required', 'string', 'max:255'],
            ]);
        
            $response = Http::put('http://localhost:9010/regional/' . $id, [
                'kode_regional' => $request->input('kode_regional'),
                'nama_regional' => $request->input('nama_regional'),
                'alamat' => $request->input('alamat'),
                'nama_kepala_regional' => $request->input('nama_kepala_regional'),
            ]);
        
            if ($response->successful()) {
                return redirect()->route('regional')->with('success', 'Data berhasil diupdate');
            } else {
                return redirect()->back()->with('error', 'Gagal memperbarui data');
            }
    }
}
