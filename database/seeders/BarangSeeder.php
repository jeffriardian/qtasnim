<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;
use Datetime;
use DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = [
            [
                'id_jenis'      => 1,
                'nama'          => "Kopi",
                'stok'          => 100,
                'created_at'    => new DateTime(),
                'updated_at'    => null,
            ],
            [
                'id_jenis'      => 1,
                'nama'          => "Teh",
                'stok'          => 100,
                'created_at'    => new DateTime(),
                'updated_at'    => null,
            ],
            [
                'id_jenis'      => 1,
                'nama'          => "Kopi",
                'stok'          => 90,
                'created_at'    => new DateTime(),
                'updated_at'    => null,
            ],
            [
                'id_jenis'      => 2,
                'nama'          => "Pasta Gigi",
                'stok'          => 100,
                'created_at'    => new DateTime(),
                'updated_at'    => null,
            ],
            [
                'id_jenis'      => 2,
                'nama'          => "Sabun Mandi",
                'stok'          => 100,
                'created_at'    => new DateTime(),
                'updated_at'    => null,
            ],
            [
                'id_jenis'      => 2,
                'nama'          => "Sampo",
                'stok'          => 100,
                'created_at'    => new DateTime(),
                'updated_at'    => null,
            ],
        ];

        DB::table('barangs')->insert($barang);
    }
}
