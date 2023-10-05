<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\KelasModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public $userModel;
    public $kelasModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }


    public function index()
    {
        $data=[
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
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
        $this->kelasModel = new KelasModel();
        $kelas = $this->kelasModel->getKelas();
        // $kelas = [
        //     [
        //         'id' => 1, 
        //         'nama_kelas' => 'A'
        //     ], 
        //     [
        //         'id' => 2, 
        //         'nama_kelas' => 'B'
        //     ], 
        //     [
        //         'id' => 3, 
        //         'nama_kelas' => 'C'
        //     ], 
        //     [
        //         'id' => 4, 
        //         'nama_kelas' => 'D'
        //     ], 
        // ];
        
        if(session('validation')!=null){
            $validation = session('validation');
        }
        else{
            $validation = \Config\Services::validation();
        }
        // $data = [
        //     'kelas' => $kelas, 
        //     'validation' => $validation
        // ]; 

        $data = [
            'kelas' => $kelas,
            'validation' => $validation,
            'title' => 'Create User',
            'kelas' => $kelas,
        ];
        return view('create_user', $data);
    }

    public function store()
    {
        $this->userModel = new UserModel();
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
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();

        $this->userModel->saveUser($data);
        return redirect()->to('/user');
        // $data_new=[
        //     'nama' => $nama,
        //     'npm' => $npm,
        //     'id_kelas' => $this->kelasModel->find($kelas)['nama_kelas'],
        //     'validation' => $validation
        // ];
    // $kelas=$this->kelasModel->find($this->request->getVar('kelas'));
    // if($kelas){
    //     $namaKelas=$kelas['nama_kelas'];
    // }

    // $data=[
    //     'nama'=>$this->request->getVar('nama'),
    //     'npm'=>$this->request->getVar('npm'),
    //     'id_kelas'=>$this->request->getVar('kelas'),
    // ];

    // return view('profile', $data_new);
    }

    

    }



