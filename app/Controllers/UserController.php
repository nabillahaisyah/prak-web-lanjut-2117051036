<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\KelasModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        //
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

    public function create()
    {
        $kelas = [
            [
                'id' => 1, 
                'nama_kelas' => 'A'
            ], 
            [
                'id' => 2, 
                'nama_kelas' => 'B'
            ], 
            [
                'id' => 3, 
                'nama_kelas' => 'C'
            ], 
            [
                'id' => 4, 
                'nama_kelas' => 'D'
            ], 
        ];
        
        if(session('validation')!=null){
            $validation = session('validation');
        }
        else{
            $validation = \Config\Services::validation();
        }
        $data = [
            'kelas' => $kelas, 
            'validation' => $validation
        ]; 
        return view('create_user', $data);
    }

    public function store()
    {
        $userModel = new UserModel();
        $nama = $this->request->getPost('nama');
        $kelas = $this->request->getPost('kelas');
        $npm = $this->request->getPost('npm');

        //Vadlidation
        if(!$this->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'npm' => [
                'rules' => 'required|numeric|is_unique[user.npm]',
                'errors' => [
                    'required' => 'NPM harus diisi',
                    'numeric' => 'NPM harus berupa angka',
                    'is_unique' => 'NPM sudah terdaftar' 
                ]
            ]
        ]

        )){
            return redirect()->to('/user/create')->withInput()->with('validation', $this->validator);

        }

        $validation = \Config\Services::validation();

        $data=[
            'nama' => $nama,
            'npm' => $npm,
            'id_kelas' => $kelas,
            'validation' => $validation
        ];
        $userModel = new UserModel();
        $kelasModel = new KelasModel();

        $userModel->saveUser($data);
        $data_new=[
            'nama' => $nama,
            'npm' => $npm,
            'id_kelas' => $kelasModel->find($kelas)['nama_kelas'],
            'validation' => $validation
        ];
    // $kelas=$this->kelasModel->find($this->request->getVar('kelas'));
    // if($kelas){
    //     $namaKelas=$kelas['nama_kelas'];
    // }

    // $data=[
    //     'nama'=>$this->request->getVar('nama'),
    //     'npm'=>$this->request->getVar('npm'),
    //     'id_kelas'=>$this->request->getVar('kelas'),
    // ];

    return view('profile', $data_new);
}
    }



