<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\KelasModel;
use App\Controllers\BaseController;

class KelasController extends BaseController
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
            'title' => 'List Kelas',
            'kelas' => $this->kelasModel->getKelas(),
        ];
        return view('list_kelas', $data);
    }

    

    

    public function create()
    {
        $this->kelasModel = new KelasModel();
        $kelas = $this->kelasModel->getKelas();

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
            'title' => 'Create Kelas',
        ];
        return view('create_kelas', $data);
    }

    public function store()
    {
        $this->kelasModel = new KelasModel();
        $nama_kelas = $this->request->getPost('nama_kelas');

        //Vadlidation
        if(!$this->validate([
            'nama_kelas' => 'required',
        ]

        )){
            return redirect()->to('/kelas/create')->withInput()->with('validation', $this->validator);

        }

        $validation = \Config\Services::validation();

        $data=[
            'nama_kelas' => $nama_kelas,
            'validation' => $validation
        ];
        $this->kelasModel = new KelasModel();

        $this->kelasModel->saveKelas($data);
        return redirect()->to('/kelas');
    }

    public function show($id){
        $kelas = $this->kelasModel->getKelas($id);

        $data = [
            'title' => 'Kelas',
            'kelas' => $kelas
        ];
        return view('list_kelas', $data);
    }

    public function edit($id){
        $this->kelasModel = new KelasModel();
        $kelas = $this->kelasModel->getKelas();
        
        if(session('validation')!=null){
            $validation = session('validation');
        }
        else{
            $validation = \Config\Services::validation();
        }

        $kelas = $this->kelasModel->getKelas($id);

        $data = [
            'kelas' => $kelas,
            'validation' => $validation,
            'title' => 'Edit Kelas'
        ];
        // dd($kelas);
        return view('edit_kelas', $data);
        
    }

    public function update($id){
        $data = [
            'nama_kelas' => $this->request->getVar('nama_kelas')
        ];

        $result = $this->kelasModel->updateKelas($data, $id);
        if(!$result){
            return redirect()->back()->withInput()->with('error', 'Gagal Menyimpan Data');
        }

        return redirect()->to(base_url('kelas'));
    }

    public function destroy($id){
        $result = $this->kelasModel->deleteKelas($id);
        if(!$result){
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
        return redirect()->to(base_url('/kelas'))->with('success', 'Berhasil menghapus data');
    }


    

    }



