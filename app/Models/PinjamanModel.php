<?php namespace App\Models;

use CodeIgniter\Model;

class PinjamanModel extends Model{
  protected $table = 'peminjaman';
  protected $allowedFields = ['member_id', 'book_id', 'tanggal_kembali'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];
  
  protected function beforeInsert(array $data){
    $data['data']['tanggal_pinjam'] = date('Y-m-d');
    $data['data']['tanggal_kembali'] = date('Y-m-d', strtotime("+7 day"));

    return $data;
  }

  protected function beforeUpdate(array $data){
    $data['data']['tanggal_kembali'] = date('Y-m-d');
    return $data;
  }
}
