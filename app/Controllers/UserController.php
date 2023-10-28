<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\KelasModel;
use App\Models\JurusanModel;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public $userModel;
    public $kelasModel;
    public $jurusanModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
        $this->jurusanModel = new JurusanModel();

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

    // public function profile($id)
    // {
    //     $user = $this->userModel->getUser($id);
    //     $data = [
    //         'title' => 'Profile',
    //         'user' => $user
    //     ];
    //     return view('profile', $data);
    // }

    public function create()
    {
        $this->kelasModel = new KelasModel();
        $kelas = $this->kelasModel->getKelas();
        $this->jurusanModel = new JurusanModel();
        $jurusan = $this->jurusanModel->getJurusan();
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
            'jurusan' => $jurusan,

        ];
        return view('create_user', $data);
    }

    public function store()
    {
        $this->userModel = new UserModel();

        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto');
        $name = $foto->getRandomName();
        if($foto->move($path,$name)){
            $foto = base_url($path . $name);
        }

        $nama = $this->request->getPost('nama');
        $kelas = $this->request->getPost('kelas');
        $jurusan = $this->request->getPost('jurusan');
        $npm = $this->request->getPost('npm');

        //Vadlidation
        if(!$this->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
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
            'id_jurusan' => $jurusan,
            'foto' => $foto,
            'validation' => $validation
        ];
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
        $this->jurusanModel = new JurusanModel();


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

    public function show($id){
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user' => $user
        ];
        return view('profile', $data);
    }

    public function edit($id){
        $this->kelasModel = new KelasModel();
        $kelas = $this->kelasModel->getKelas();
        $this->jurusanModel = new JurusanModel();
        $jurusan = $this->jurusanModel->getJurusan();
        
        if(session('validation')!=null){
            $validation = session('validation');
        }
        else{
            $validation = \Config\Services::validation();
        }

        $user = $this->userModel->getUser($id);

        $data = [
            'kelas' => $kelas,
            'jurusan' => $jurusan,
            'validation' => $validation,
            'title' => 'Edit User',
            'user' => $user
        ];
        // dd($user);
        return view('edit_user', $data);
        
    }

    public function update($id){
        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto');

        $data = [
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'id_jurusan' => $this->request->getVar('jurusan'),
            'npm' => $this->request->getVar('npm'),
        ];

        if($foto->isValid()){
            $name = $foto->getRandomName();
            if($foto->move($path, $name)){
                $foto_path = base_url($path . $name);
                $data['foto'] = $foto_path;
            }
        }

        $result = $this->userModel->updateUser($data, $id);
        if(!$result){
            return redirect()->back()->withInput()->with('error', 'Gagal Menyimpan Data');
        }

        return redirect()->to(base_url('user'));
    }

    public function destroy($id){
        $result = $this->userModel->deleteUser($id);
        if(!$result){
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
        return redirect()->to(base_url('/user'))->with('success', 'Berhasil menghapus data');
    }


    

    }



