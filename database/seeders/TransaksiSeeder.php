<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use Datetime;
use DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transaksi = [
            [
                'id_barang'     => 1,
                'tanggal'       => "2021-05-01",
                'jumlah'        => 10,
                'created_at'    => new DateTime(),
                'updated_at'    => null,
            ],
            [
                'id_barang'     => 2,
                'tanggal'       => "2021-05-05",
                'jumlah'        => 19,
                'created_at'    => new DateTime(),
                'updated_at'    => null,
            ],
            [
                'id_barang'     => 3,
                'tanggal'       => "2021-05-10",
                'jumlah'        => 15,
                'created_at'    => new DateTime(),
                'updated_at'    => null,
            ],
            [
                'id_barang'     => 4,
                'tanggal'       => "2021-05-11",
                'jumlah'        => 20,
                'created_at'    => new DateTime(),
                'updated_at'    => null,
            ],
            [
                'id_barang'     => 5,
                'tanggal'       => "2021-05-11",
                'jumlah'        => 30,
                'created_at'    => new DateTime(),
                'updated_at'    => null,
            ],
            [
                'id_barang'     => 6,
                'tanggal'       => "2021-05-12",
                'jumlah'        => 25,
                'created_at'    => new DateTime(),
                'updated_at'    => null,
            ],
        ];

        DB::table('transaksis')->insert($transaksi);
    }
}
