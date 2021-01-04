<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_pembelian extends Model
{
    protected $table = 'tbl_pp';
    protected $useTimestamps = true;
    protected $dateFormat = 'date';
    protected $createdField = 'tgl_order';
    protected $updatedField = 'tgl_edit';
    protected $allowedFields = ['op', 'kode', 'kd', 'nama', 'status', 'spec', 'qty', 'satuan', 'lokasi', 'mandarin', 'note', 'foto', 'tgl_selesai', 'po'];


    public function all_data()
    {
        return $this->db->table('tbl_pp')
            ->orderBy('id_pp', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function all_data_unfinish()
    {
        $where = "status='Unfinish'";
        return $this->db->table('tbl_pp')
            -> where($where)
            ->orderBy('id_pp', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function all_data_urgent()
    {
        $where = "status='Urgent'";
        return $this->db->table('tbl_pp')
            -> where($where)
            ->orderBy('id_pp', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function all_data_finish()
    {
        $where = "status='Finish'";
        return $this->db->table('tbl_pp')
            -> where($where)
            ->orderBy('id_pp', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function all_data_pending()
    {
        $where = "status='Pending'";
        return $this->db->table('tbl_pp')
            -> where($where)
            ->orderBy('id_pp', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function all_data_today()
    {
        $today = date("Y-m-d");
        return $this->db->table('tbl_pp')
            -> where('tgl_order', $today)
            ->orderBy('id_pp', 'DESC')
            ->get()
            ->getResultArray();
    }


     public function all_data_gresik()
    {
        $where = "lokasi='Gresik'";
        return $this->db->table('tbl_pp')
            -> where($where)
            ->orderBy('id_pp', 'DESC')
            ->get()
            ->getResultArray();
    }
    
    public function all_data_gresik_unfinish()
    {
        $lokasi = "Gresik";
        $status = "Unfinish";
        return $this->db->table('tbl_pp')
            -> where('lokasi' ,$lokasi)
            -> where('status' ,$status)
            ->orderBy('id_pp', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function all_data_luar()
    {
        $where = "lokasi='Luar'";
        return $this->db->table('tbl_pp')
            -> where($where)
            ->orderBy('id_pp', 'DESC')
            ->get()
            ->getResultArray();
    }
    
    public function all_data_luar_unfinish()
    {
        $lokasi = "Luar";
        $status = "Unfinish";
        return $this->db->table('tbl_pp')
            -> where('lokasi' ,$lokasi)
            -> where('status' ,$status)
            ->orderBy('id_pp', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function detail_data($id_arsip)
    {
        return $this->db->table('tbl_arsip')
            ->join('tbl_dep', 'tbl_dep.id_dep = tbl_arsip.id_dep', 'left')
            ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user', 'left')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori', 'left')
            ->where('id_arsip', $id_arsip)
            ->get()
            ->getRowArray();
    }



    public function edit($data)
    {
        $this->db->table('tbl_pp')
            ->where('id_pp', $data['id_pp'])
            ->update($data);
    }



    public function delete_data($data)
    {
        $this->db->table('tbl_arsip')
            ->where('id_arsip', $data['id_arsip'])
            ->delete($data);
    }


    // START QUERY FOR HOME PAGES

    public function tot_pp()
    {
            return $this->db->table('tbl_pp')->countAll();
    }

    public function tot_urgent()
    {
        $where = "status='Urgent'";
           return $this->db->table('tbl_pp')
                ->where($where)
                ->countAllResults();
    }

    public function tot_unfinish()
    {
        $where = "status='Unfinish'";
         return   $this->db->table('tbl_pp')
                -> where($where)
                ->countAllResults();
    }

    public function tot_finish()
    {
        $where = "status='Finish'";
         return   $this->db->table('tbl_pp')
                -> where($where)
                ->countAllResults();
    }

    public function tot_pending()
    {
        $where = "status='Pending'";
         return   $this->db->table('tbl_pp')
                -> where($where)
                ->countAllResults();
    }

    public function tot_today()
    {
        $tgl_finish = date("Y-m-d");
         return   $this->db->table('tbl_pp')
                -> where('tgl_order', $tgl_finish)
                ->countAllResults();
    }

    // Ganti Status Finish
    
    public function to_finish($id)
    {
        return $this->db->table('tbl_pp')
        ->where('id_pp',$id)
        ->get()
        ->getRowArray();
    }

}
