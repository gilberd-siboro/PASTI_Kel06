<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SektorDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this-> id,
            'kode_sektor' => $this->kode_sektor,
            'nama_sektor' => $this->nama_sektor,
            'alamat_sektor' => $this -> alamat_sektor,
            'nama_kepala_sektor' => $this -> nama_kepala_sektor,
            'id_cabang' => $this-> id_cabang,
            'created_at' =>$this->created_at ? date_format($this -> created_at, "Y/m/d H:i:s") : null,
            'updated_at' => $this->updated_at ? date_format($this -> updated_at, "Y/m/d H:i:s") :null,
        ];
    }
}
