<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProdisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodis')->insert([
            'id' => 1,
            'id_fakultas' => 1,
            'kode_prodi' => 'SI',
            'prodi' => 'Sistem Informasi',
            'ka_prodi' => '1',
            'jenjang' => 'S1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
