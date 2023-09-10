<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jenis;
use Datetime;
use DB;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = [
            [
                'nama' => "Konsumsi",
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
            [
                'nama' => "Pembersih",
                'created_at' => new DateTime(),
                'updated_at' => null,
            ],
        ];

        DB::table('jenis')->insert($jenis);
    }
}
