<?php

namespace App\Http\Controllers;

use App\Models\Sektor;
use Illuminate\Http\Request;
use App\Http\Resources\SektorResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SektorDetailResource;
use PhpParser\Node\Expr\PostDec;

class SektorController extends Controller
{
    public function allSektor()
    {
        $get = Sektor::all();
        // return response()->json(['data'=> $get]);
        return SektorDetailResource::collection($get);
        // return new SektorResource($allSektor);
    }

    public function sektorByid($id)
    {
        $get = Sektor::findOrFail($id);
        // return response()->json(['data'=> $get]);
        return new SektorDetailResource($get);
    }

    public function createSektor(Request $request)
    {
        $request->validate([
            'kode_sektor'=> 'required|string|max:255',
            'nama_sektor'=> 'required|string|max:255',
            'alamat_sektor'=> 'required|string|max:255',
            'nama_kepala_sektor'=> 'required|string|max:255',
            'kode_cabang'=> 'required|integer|max:255',
        ]);
        $post = Sektor::create($request->all());
        return new SektorDetailResource($post);
    }

    public function updateSektor(Request $request, $id)
    {
        $sektor = Sektor::findOrFail($id);
        $request->validate([
            'kode_sektor'=> 'sometimes|required|string|max:255',
            'nama_sektor'=> 'sometimes|required|string|max:255',
            'alamat_sektor'=> 'sometimes|required|string|max:255',
            'nama_kepala_sektor'=> 'sometimes|required|string|max:255',
            'kode_cabang'=> 'sometimes|required|string|max:255',
        ]);

        $sektor->fill($request->only([
            'kode_sektor',
            'nama_sektor',
            'alamat_sektor',
            'nama_kepala_sektor',
            'kode_cabang',
        ]));
        
        $sektor->save();
        return new SektorDetailResource($sektor);
    }

    public function deleteSektor($id)
    {
        $sektor = Sektor::findOrFail($id);
        $sektor -> delete();

        return new SektorDetailResource($sektor);
    }
    
}
