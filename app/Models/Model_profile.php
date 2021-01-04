<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_profile extends Model
{


    public function detail_data($id_user)
     {
         return $this->db->table('tbl_user')
         ->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_dep','left')
         ->where('id_user', $id_user)
         ->get()
         ->getRowArray();
           
     }

     public function edit($data)
     {
         $this->db->table('tbl_user')
         ->where('id_user', $data['id_user'])
         ->update($data);
     }

}
