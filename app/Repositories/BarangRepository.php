<?php

namespace App\Repositories;

use App\Http\Requests\BarangRequest;
use App\Interfaces\BarangInterface;
use App\Traits\ResponseAPI;
use App\Models\Barang;
use DB;

class BarangRepository implements BarangInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAllBarang()
    {
        try {
            $barangs = Barang::all();
            return $this->success("Semua Barang", $barangs);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getBarangById($id)
    {
        try {
            $barang = Barang::where('id', $id)->first();
            
            // Check the barang
            if(!$barang) return $this->error("Data barang tidak ditemukan", 404);

            return $this->success("Detail Barang", $barang);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function requestBarang(BarangRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            // If barang exists when we find it
            // Then update the barang
            // Else create the new one.
            $barang = $id ? Barang::where('id', $id)->first() : new Barang;

            // Check the barang 
            if($id && !$barang) return $this->error("Data barang tidak ditemukan", 404);

            $barang->id_jenis   = $request->id_jenis;
            $barang->nama       = $request->nama;
            $barang->stok       = $request->stok;

            // Save the barang
            $barang->save();

            DB::commit();
            return $this->success(
                $id ? "Data barang berhasil diupdate"
                    : "Data barang berhasil dibuat",
                $barang, $id ? 200 : 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function deleteBarang($id)
    {
        DB::beginTransaction();
        try {
            $barang = Barang::where('id', $id)->first();

            // Check the barang
            if(!$barang) return $this->error("Data barang tidak ditemukan", 404);

            // Delete the barang
            $barang->delete();

            DB::commit();
            return $this->success("Data barang berhasil dihapus", $barang);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}