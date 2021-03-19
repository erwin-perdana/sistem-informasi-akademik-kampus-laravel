<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            'id' => 1,
            'nim' => 16220320,
            'nama' => 'Erwin Perdana',
            'tempat_lahir' => 'Tanjungbalai',
            'tanggal_lahir' => date('Y-m-d'),
            'alamat' => 'TPO',
            'id_prodi' => 1,
            'id_kelas' => 1,
            'agama' => 'Islam',
            'telp' => '082256457898',
            'email' => 'eperdana03@gmail.com',
            'jenis_kelamin' => 'L',
            'photo' => "",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
