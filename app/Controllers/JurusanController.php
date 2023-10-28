<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\JurusanModel;
use App\Controllers\BaseController;

class JurusanController extends BaseController
{
    public $userModel;
    public $jurusanModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->jurusanModel = new JurusanModel();
    }


    public function index()
    {
        $data=[
            'title' => 'List Jurusan',
            'jurusan' => $this->jurusanModel->getJurusan(),
        ];
        return view('list_jurusan', $data);
    }

    

    

    public function create()
    {
        $this->jurusanModel = new JurusanModel();
        $jurusan = $this->jurusanModel->getJurusan();

        if(session('validation')!=null){
            $validation = session('validation');
        }
        else{
            $validation = \Config\Services::validation();
        }
        // $data = [
        //     'jurusan' => $jurusan, 
        //     'validation' => $validation
        // ]; 

        $data = [
            'jurusan' => $jurusan,
            'validation' => $validation,
            'title' => 'Create Jurusan',
        ];
        return view('create_jurusan', $data);
    }

    public function store()
    {
        $this->jurusanModel = new JurusanModel();
        $nama_jurusan = $this->request->getPost('nama_jurusan');

        //Vadlidation
        if(!$this->validate([
            'nama_jurusan' => 'required',
        ]

        )){
            return redirect()->to('/jurusan/create')->withInput()->with('validation', $this->validator);

        }

        $validation = \Config\Services::validation();

        $data=[
            'nama_jurusan' => $nama_jurusan,
            'validation' => $validation
        ];
        $this->jurusanModel = new JurusanModel();

        $this->jurusanModel->saveJurusan($data);
        return redirect()->to('/jurusan');
    }

    public function show($id){
        $jurusan = $this->jurusanModel->getJurusan($id);

        $data = [
            'title' => 'Jurusan',
            'jurusan' => $jurusan
        ];
        return view('list_jurusan', $data);
    }

    public function edit($id){
        $this->jurusanModel = new JurusanModel();
        $jurusan = $this->jurusanModel->getJurusan();
        
        if(session('validation')!=null){
            $validation = session('validation');
        }
        else{
            $validation = \Config\Services::validation();
        }

        $jurusan = $this->jurusanModel->getJurusan($id);

        $data = [
            'jurusan' => $jurusan,
            'validation' => $validation,
            'title' => 'Edit Jurusan'
        ];
        // dd($jurusan);
        return view('edit_jurusan', $data);
        
    }

    public function update($id){
        $data = [
            'nama_jurusan' => $this->request->getVar('nama_jurusan')
        ];

        $result = $this->jurusanModel->updateJurusan($data, $id);
        if(!$result){
            return redirect()->back()->withInput()->with('error', 'Gagal Menyimpan Data');
        }

        return redirect()->to(base_url('jurusan'));
    }

    public function destroy($id){
        $result = $this->jurusanModel->deleteJurusan($id);
        if(!$result){
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
        return redirect()->to(base_url('/jurusan'))->with('success', 'Berhasil menghapus data');
    }


    

    }



