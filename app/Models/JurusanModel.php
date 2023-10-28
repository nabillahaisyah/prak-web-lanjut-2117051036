<?php

namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jurusan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_jurusan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // public function getJurusan(){
    //     return $this->findAll();
    // }

    public function saveJurusan($data){
        $this->insert($data);
    }

    public function getJurusan($id = null){
        if($id != null){
            return $this->find($id);
        }
        return $this->findAll();
    }

    public function updateJurusan($data, $id){
        return $this->update($id, $data);
    }

    public function deleteJurusan($id){
        return $this->delete($id);
    }

}
