<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class CabangController extends Controller
{
    public function getCabangApi()
    {
        try {
            $client = new Client();
            $url = "http://localhost:9011/cabang/";
            $response = $client->request('GET', $url);
            // // dd($response);
            // // echo $response->getBody()->getContents();
    
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            // print_r($contentArray);
            return view('cabang.index', [
                'data' => $contentArray,
                'title' => 'Cabang'
    
            ]);
        } catch (\Exception $e) {
            return view('cabang.down',[
                'title' => 'Cabang'
            ]);
        }
    }

    public function showAdd()
    {
        return view('cabang.add', [
            'title' => 'Cabang'
        ]);
    }

    public function addCabang(Request $request)  
    {
        // Validasi input pengguna

        try {
            $request->validate([
                'kode_cabang' => ['required', 'string', 'max:255'],
                'nama_cabang' => ['required', 'string', 'max:255'],
                'alamat' => ['required', 'string', 'max:255'],
                'nama_kepala_cabang' => ['required', 'string', 'max:255'],
                'kode_regional' => ['required', 'string', 'max:255'],
            ]);

            $response = Http::post("http://localhost:9011/cabang/", [
                'kode_cabang' => $request->kode_cabang,
                'nama_cabang' => $request->nama_cabang,
                'alamat' => $request->alamat,
                'nama_kepala_cabang' => $request->nama_kepala_cabang, 
                'kode_regional' => $request->kode_regional, 
            ]);
    
    
            // Memeriksa respons dari API
            if ($response->successful()) {
                // Registrasi berhasil, arahkan pengguna ke halaman login atau halaman setelah registrasi
                return redirect()->route('cabang')->with('success', 'Data berhasil ditambah');
            // print_r($response);
            } 
        } catch (\Throwable $th) {
            return redirect()->route('cabang');
        }
    }

    public function deleteCabang($id)
    {
        // Mengirimkan permintaan DELETE ke endpoint DeleteCabang pada API Go.
        $response = Http::delete('http://localhost:9011/cabang/' . $id);

        // Mendapatkan respon dari API.
        $responseData = $response->json();

        // Melakukan penanganan sesuai dengan respon dari API.
        if ($response->successful()) {
            // Tindakan yang diambil jika permintaan berhasil (status kode 2xx).
            return redirect()->back();
        } else {
            // Tindakan yang diambil jika permintaan gagal (status kode selain 2xx).
            return redirect()->back()->with('error', $responseData['error']);
        }
    }


    public function showUpdate($id)
    {

        try {
            $client = new Client();
            $url = "http://localhost:9011/cabang/". $id;
            $response = $client->request('GET', $url);
    
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            // print_r($contentArray);
            return view('cabang.edit', [
                'data' => $contentArray,
                'title' => 'Cabang'
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('cabang');
        }
    }
    public function cabangById($id)
    {
        try {
            // Create a Guzzle HTTP client
            $client = new Client();
    
            // Define the URLs
            $url1 = "http://localhost:9011/cabang/" . $id;
            $url2 = "http://127.0.0.1:8082/api/sektor";
    
            // Make the HTTP request for cabang data
            $response1 = $client->request('GET', $url1);
            $content1 = $response1->getBody()->getContents();
            $contentArray1 = json_decode($content1, true);
    
            // Check if the cabang data is retrieved successfully
            if (!isset($contentArray1['kode_cabang'])) {
                throw new \Exception('Invalid cabang data');
            }
    
            // Extract the kode_cabang from the cabang data
            $kode_cabang = $contentArray1['kode_cabang'];
    
            // Initialize sektor data and server status
            $sektor = [];
            $sektorServerDown = false;
    
            // Try to get sektor data
            try {
                $response2 = $client->request('GET', $url2);
                $content2 = $response2->getBody()->getContents();
                $contentArray2 = json_decode($content2, true);
    
                // Check if the contentArray2 has 'data'
                if (isset($contentArray2['data'])) {
                    $all_sektor = $contentArray2['data'];
    
                    // Filter the sectors based on kode_cabang
                    $sektor = array_filter($all_sektor, function ($s) use ($kode_cabang) {
                        return $s['kode_cabang'] == $kode_cabang;
                    });
                }
            } catch (\Exception $e) {
                // If there's an error with the sektor server, set the flag
                $sektorServerDown = true;
            }
    
            // Return the view with the cabang and sektor data
            return view('cabang.detail', [
                'cabang' => $contentArray1,
                'sektor' => $sektor,
                'sektorServerDown' => $sektorServerDown,
                'title' => 'Cabang'
            ]);
        } catch (\Throwable $th) {
            // Log the error for debugging purposes
    
            // Redirect to the cabang route in case of an error
            return redirect()->route('cabang');
        }
    }
    
    
    public function updateCabang(Request $request, $id)
    {

            $request->validate([
                'kode_cabang' => ['required', 'string', 'max:255'],
                'nama_cabang' => ['required', 'string', 'max:255'],
                'alamat' => ['required', 'string', 'max:255'],
                'nama_kepala_cabang' => ['required', 'string', 'max:255'],
                'kode_regional' => ['required', 'string', 'max:255'],

            ]);
        
            $response = Http::put('http://localhost:9011/cabang/' . $id, [
                'kode_cabang' => $request->input('kode_cabang'),
                'nama_cabang' => $request->input('nama_cabang'),
                'alamat' => $request->input('alamat'),
                'nama_kepala_cabang' => $request->input('nama_kepala_cabang'),
                'kode_regional' => $request->input('kode_regional'),
            ]);
        
            // Memeriksa apakah permintaan berhasil atau tidak
            if ($response->successful()) {
                return redirect()->route('cabang')->with('success', 'Data berhasil diupdate');
            } else {
                return redirect()->back()->with('error', 'Gagal memperbarui data');
            }
    }
    
}
