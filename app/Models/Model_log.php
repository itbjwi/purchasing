<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_log extends Model
{
    protected $table = 'tbl_log';
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'tgl_log';
    protected $updatedField = 'tgl_log_edit';
    protected $allowedFields = ['log_user', 'log_action', 'log_kode', 'log_kd' ,'log_nama'];


    public function all_data_log()
    {
        return $this->db->table('tbl_log')
            ->orderBy('id_log', 'DESC')
            ->get()
            ->getResultArray();
    }

}
