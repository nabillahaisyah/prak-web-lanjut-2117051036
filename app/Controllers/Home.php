<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('landing_page');
    }

    public function profile($nama="", $kelas="", $npm="")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];
        return view('profile', $data); 
    }
    public function tes(){
        return view('tes');
    }
}
