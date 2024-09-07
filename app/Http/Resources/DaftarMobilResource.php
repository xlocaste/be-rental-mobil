<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DaftarMobilResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'image'            => $this->image,
            'nama'            => $this->nama,
            'merk'            => $this->merk,
            'kursi'            => $this->kursi,
            'bahan_bakar'            => $this->bahan_bakar,
            'harga'            => $this->harga,
            'created_at'            => $this->created_at,
            'updated_at'            => $this->updated_at,
        ];
    }
}
