<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'npm', 'id_kelas', 'foto', 'id_jurusan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function saveUser($data){
        $this->insert($data);
    }

    public function getUser($id = null){
        if($id != null){
            return $this->select('user.*, kelas.nama_kelas')->join('kelas', 'kelas.id=user.id_kelas')->select('user.*, jurusan.nama_jurusan')->join('jurusan', 'jurusan.id=user.id_jurusan')->find($id);
        }
        return $this->select('user.*, kelas.nama_kelas')->join('kelas', 'kelas.id=user.id_kelas')->select('user.*, jurusan.nama_jurusan')->join('jurusan', 'jurusan.id=user.id_jurusan')->findAll();
    }

    public function updateUser($data, $id){
        return $this->update($id, $data);
    }

    public function deleteUser($id){
        return $this->delete($id);
    }
}
