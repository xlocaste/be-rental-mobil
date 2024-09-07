<?php

namespace App\Http\Controllers;

use App\Models\daftar_mobil;
use App\Http\Controllers\Controller;
use App\Http\Requests\DaftarMobilStoreRequest;
use App\Http\Requests\DaftarMobilUpdateRequest;
use App\Http\Resources\DaftarMobilResource;
use Illuminate\Support\Facades\Storage;

class DaftarMobilController extends Controller
{
    public function index()
    {
        $daftar_mobil = daftar_mobil::all();

        return DaftarMobilResource::collection($daftar_mobil);
    }

    public function store(DaftarMobilStoreRequest $request)
    {
        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = $image->hashName();
            $image->storeAs('public/images', $imageName);

            $daftar_mobil = daftar_mobil::create([
                'image' => $imageName,
                'nama' => $request->nama,
                'merk' => $request->merk,
                'kursi' => $request->kursi,
                'bahan_bakar' => $request->bahan_bakar,
                'harga' => $request->harga,
            ]);
        }

        return (new DaftarMobilResource($daftar_mobil))->additional([
            'message' => 'Daftar Mobil Berhasil Ditambahkan!',
        ]);
    }

    public function show($daftar_mobil)
    {
        $daftar_mobil = daftar_mobil::findOrFail($daftar_mobil);

        return new DaftarMobilResource($daftar_mobil, [
            'status' => true,
            'message' => 'Data Produk Ditemukan!'
        ]);
    }

    public function update(DaftarMobilUpdateRequest $request, daftar_mobil $daftar_mobil)
    {
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());

            Storage::delete('public/images/' . $daftar_mobil->image);

            $daftar_mobil->update([
                'image'         => $image->hashName(),
                'nama'          => $request->nama,
                'merk'          => $request->merk,
                'kursi'         => $request->kursi,
                'bahan_bakar'   => $request->bahan_bakar,
                'harga'         => $request->harga,
            ]);
        } else {
            $daftar_mobil->update([
                'nama'          => $request->nama,
                'merk'          => $request->merk,
                'kursi'         => $request->kursi,
                'bahan_bakar'   => $request->bahan_bakar,
                'harga'         => $request->harga,
            ]);
        }

        return (new DaftarMobilResource($daftar_mobil))->additional([
            'message' => 'Data Berhasil di Ubah!'
        ]);
    }

    public function destroy(daftar_mobil $daftar_mobil)
    {
        $daftar_mobil->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus!',
        ]);
    }
}
