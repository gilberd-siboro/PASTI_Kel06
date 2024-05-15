<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class SektorController extends Controller
{
    public function getSektorApi()
    {
        try {
            $client = new Client();
            $url = "http://localhost:8082/api/sektor";
            $response = $client->request('GET', $url);
            
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            // print_r($contentArray['data']);
            // dd($response);
            // echo $response->getBody()->getContents();
            return view('sektor.index', [
                'data' => $contentArray['data'],
                'title' => 'Sektor'
            
            ]);
        } catch (\Throwable $th) {
            return view('sektor.down',[
                'title' => 'Sektor'
            ]);
        }
    }

    public function showAdd()
    {
        return view('sektor.add', [
            'title' => 'Sektor'
        ]);
    }

    public function addSektor(Request $request)
    {
        try {

           
            $request->validate([
                'kode_sektor' => ['required', 'string', 'max:255'],
                'nama_sektor' => ['required', 'string', 'max:255'],
                'alamat_sektor' => ['required', 'string', 'max:255'],
                'nama_kepala_sektor' => ['required', 'string', 'max:255'],

            ]);
    
            // Kirim data ke API eksternal untuk registrasi
            $response = Http::post("http://127.0.0.1:8082/api/postsektor", [
                'kode_sektor' => $request->kode_sektor,
                'nama_sektor' => $request->nama_sektor,
                'alamat_sektor' => $request->alamat_sektor,
                'nama_kepala_sektor' => $request->nama_kepala_sektor,

            ]);
            
    
            // Memeriksa respons dari API
            if ($response->successful()) {
                // Registrasi berhasil, arahkan pengguna ke halaman login atau halaman setelah registrasi
                return redirect()->route('sektor')->with('success', 'Data berhasil ditambah');
            // print_r($response);
            }
        } catch (\Throwable $th) {
            return redirect()->route('sektor')->with('error', 'Terjadi kesalahan saat melakukan input data');
        }
    }

    public function deleteSektor($id)
    {
        // Mengirimkan permintaan DELETE ke endpoint Deletesektor pada API Go.
        $response = Http::delete('http://127.0.0.1:8082/api/deletesektor/' . $id);


        // Melakukan penanganan sesuai dengan respon dari API.
        if ($response->successful()) {
            // Tindakan yang diambil jika permintaan berhasil (status kode 2xx).
            return redirect()->back();
        } else {
            // Tindakan yang diambil jika permintaan gagal (status kode selain 2xx).
            return redirect()->back();
        }
    }


    public function showUpdate($id)
    {
        try {
            //code...
            $client = new Client();
            $url = "http://127.0.0.1:8082/api/sektor/". $id;
            $response = $client->request('GET', $url);
            // // dd($response);
            // // echo $response->getBody()->getContents();
    
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            // print_r($contentArray);
            return view('sektor.edit', [
                'data' => $contentArray['data'],
                'title' => 'Sektor'
    
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('sektor.down');
        }
    }
    
    public function updateSektor(Request $request, $id)
    {
        $request->validate([
            'kode_sektor' => ['sometimes','required', 'string', 'max:255'],
            'nama_sektor' => ['sometimes','required', 'string', 'max:255'],
            'alamat_sektor' => ['sometimes','required', 'string', 'max:255'],
            'nama_kepala_sektor' => ['sometimes','required', 'string', 'max:255'],
        ]);
        
        // dd($request->all());
        $response = Http::patch('http://127.0.0.1:8082/api/updatesektor/' . $id, [
            'kode_sektor' => $request->input('kode_sektor'),
            'nama_sektor' => $request->input('nama_sektor'),
            'alamat_sektor' => $request->input('alamat'),
            'nama_kepala_sektor' => $request->input('nama_kepala_sektor'),
        ]);
        // Memeriksa apakah permintaan berhasil atau tidak
        if ($response->successful()) {
            return redirect()->route('sektor')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data');
        }
    }
}

