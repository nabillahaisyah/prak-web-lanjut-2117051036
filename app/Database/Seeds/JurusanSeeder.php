<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\JurusanModel;

class JurusanSeeder extends Seeder
{
    public function run()
    {
        $jurusanModel = new JurusanModel();

        $jurusanModel->save([
            'nama_jurusan' => 'Matematika'
        ]);
        $jurusanModel->save([
            'nama_jurusan' => 'Fisika'
        ]);
        $jurusanModel->save([
            'nama_jurusan' => 'Kimia'
        ]);
        $jurusanModel->save([
            'nama_jurusan' => 'Ilmu Komputer'
        ]);
        $jurusanModel->save([
            'nama_jurusan' => 'Biologi'
        ]);
    }
}
