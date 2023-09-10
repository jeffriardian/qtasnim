<?php

namespace App\Repositories;

use App\Http\Requests\TransaksiRequest;
use App\Interfaces\TransaksiInterface;
use App\Traits\ResponseAPI;
use App\Models\Transaksi;
use DB;

class TransaksiRepository implements TransaksiInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getAllTransaksi()
    {
        try {
            $query = DB::table('transaksis')
                     ->select('transaksis.id as no', 'barangs.nama as nama_barang', 'barangs.stok', 'transaksis.jumlah as jumlah_terjual', 'transaksis.tanggal as tanggal_transaksi', 'jenis.nama as jenis_barang')
                     ->join('barangs', 'barangs.id', '=', 'transaksis.id_barang')
                     ->join('jenis', 'jenis.id', '=', 'barangs.id_jenis')
                     ->orderby('transaksis.id')
                     ->get();
     
            $transaksi = json_decode($query);

            return $this->success("Semua Transaksi", $transaksi);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getTransaksiById($id)
    {
        try {
            $query = DB::table('transaksis')
                     ->select('transaksis.id as no', 'barangs.nama as nama_barang', 'barangs.stok', 'transaksis.jumlah as jumlah_terjual', 'transaksis.tanggal as tanggal_transaksi', 'jenis.nama as jenis_barang')
                     ->join('barangs', 'barangs.id', '=', 'transaksis.id_barang')
                     ->join('jenis', 'jenis.id', '=', 'barangs.id_jenis')
                     ->where('transaksis.id', '=', $id)
                     ->get();
     
            $transaksi = json_decode($query);
            
            // Check the transaksi
            if(!$transaksi) return $this->error("Data transaksi tidak ditemukan", 404);

            return $this->success("Detail Transaksi", $transaksi);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getTransaksiByName($nama)
    {
        try {
            $query = DB::table('transaksis')
                     ->select('transaksis.id as no', 'barangs.nama as nama_barang', 'barangs.stok', 'transaksis.jumlah as jumlah_terjual', 'transaksis.tanggal as tanggal_transaksi', 'jenis.nama as jenis_barang')
                     ->join('barangs', 'barangs.id', '=', 'transaksis.id_barang')
                     ->join('jenis', 'jenis.id', '=', 'barangs.id_jenis')
                     ->where('barangs.nama','LIKE','%'.$nama.'%')
                     ->orderby('barangs.nama')
                     ->get();
            
            $transaksi = json_decode($query);
            
            // Check the transaksi
            if(!$transaksi) return $this->error("Data transaksi tidak ditemukan", 404);

            return $this->success("Detail Transaksi", $transaksi);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function requestTransaksi(TransaksiRequest $request, $id = null)
    {
        DB::beginTransaction();
        try {
            // If transaksi exists when we find it
            // Then update the transaksi
            // Else create the new one.
            $transaksi = $id ? Transaksi::find($id) : new Transaksi;

            // Check the Transaksi 
            if($id && !$transaksi) return $this->error("Data transaksi tidak ditemukan", 404);

            $transaksi->id_barang = $request->id_barang;
            $transaksi->tanggal = $request->tanggal;
            $transaksi->jumlah = $request->jumlah;

            // Save the Transaksi
            $transaksi->save();

            DB::commit();
            return $this->success(
                $id ? "Transaksi berhasil diupdate"
                    : "Transaksi berhasil dibuat",
                $transaksi, $id ? 200 : 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function deleteTransaksi($id)
    {
        DB::beginTransaction();
        try {
            $transaksi = Transaksi::find($id);

            // Check the Transaksi
            if(!$transaksi) return $this->error("Data transaksi tidak ditemukan", 404);

            // Delete the Transaksi
            $transaksi->delete();

            DB::commit();
            return $this->success("Data transaksi berhasil dihapus", $transaksi);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}