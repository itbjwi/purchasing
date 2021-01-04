<?php

namespace App\Controllers;


use App\models\Model_dep;
use App\models\Model_arsip;
use App\models\Model_kategori;

class Arsip extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->Model_dep = new Model_dep();
        $this->Model_arsip = new Model_arsip();
        $this->Model_kategori = new Model_kategori();
    }

    public function index()
    {
        $data = array(
            'title' => 'Arsip',
            'isi' => 'arsip/v_index',
            'dep' => $this->Model_dep->all_data(),
            'arsip' => $this->Model_arsip->all_data(),
            'kategori' => $this->Model_kategori->all_data(),
        );
        return view('layout/v_wrapper', $data);
    }


    public function add()
    {
        if ($this->validate([
            'file_arsip' => [
                'label' => 'File Arsip',
                'rules' => 'uploaded[file_arsip]|max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
                'errors' => [
                    'uploaded' => '{field} Wajib Di Isi',
                    'max_size' => '{field} Maksimal 2048 KB',
                    'ext_in' => '{field} pdf ',
                ]
            ],
        ])) {

            $file_arsip = $this->request->getFile('file_arsip');
            $nama_file = $file_arsip->getRandomName();

            $ukuran_file = $file_arsip->getSize('kb');

            $data = array(

                'id_kategori' => $this->request->getPost('id_kategori'),
                'no_arsip' => $this->request->getPost('no_arsip'),
                'nama_file' => $this->request->getPost('nama_file'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tgl_upload' => date('Y-m-d'),
                'id_dep' => session()->get('id_dep'),
                'id_user' => session()->get('id_user'),
                'file_arsip' => $nama_file,
                'ukuran_file' =>  $ukuran_file
            );

            $file_arsip->move('file_arsip', $nama_file);

            $this->Model_arsip->add($data);

            session()->setFlashdata('pesan', 'Arsip Berhasil Ditambahkan');
            return redirect()->to(base_url('arsip'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('arsip'));
        }
    }





    public function edit($id_arsip)
    {
        $data = array(
            'title' => 'Edit Arsip',
            'dep' => $this->Model_dep->all_data(),
            'arsip' => $this->Model_arsip->detail_data($id_arsip),
            'kategori' => $this->Model_kategori->all_data(),
            'isi' => 'arsip/v_edit'
        );
        return view('layout/v_wrapper', $data);
    }


    public function update($id_arsip)
    {
        if ($this->validate([
            'file_arsip' => [
                'label' => 'File Arsip',
                'rules' => 'max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
                'errors' => [
                    'max_size' => '{field} Maksimal 2048 KB',
                    'ext_in' => '{field} pdf ',
                ]
            ],
        ])) {

            $file_arsip = $this->request->getFile('file_arsip');
            if ($file_arsip->getError() == 4) {
                //jika file tidak di ganti

                $data = array(
                    'id_arsip' => $id_arsip,
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'nama_file' => $this->request->getPost('nama_file'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('Y-m-d'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),

                );

                $this->Model_arsip->edit($data);
            } else {


                $arsip = $this->Model_arsip->detail_data($id_arsip);
                if ($arsip['file_arsip'] != "") {
                    unlink('file_arsip/' . $arsip['file_arsip']);
                }

                $nama_file = $file_arsip->getRandomName();

                $ukuran_file = $file_arsip->getSize('kb');

                $data = array(
                    'id_arsip' => $id_arsip,
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'nama_file' => $this->request->getPost('nama_file'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('d F, Y h:i:s'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),
                    'file_arsip' => $nama_file,
                    'ukuran_file' =>  $ukuran_file
                );

                $file_arsip->move('file_arsip', $nama_file);

                $this->Model_arsip->edit($data);
            }
            session()->setFlashdata('pesan', 'Arsip Berhasil Ditambahkan');
            return redirect()->to(base_url('arsip'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('arsip/edit' . $id_arsip));
        }
    }



    public function delete($id_arsip)
    {

        $arsip = $this->Model_arsip->detail_data($id_arsip);
        if ($arsip['file_arsip'] != "") {
            unlink('file_arsip/' . $arsip['file_arsip']);
        }
        $data = array(
            'id_arsip' => $id_arsip,
        );

        $this->Model_arsip->delete_data($data);

        session()->setFlashdata('pesan', 'Data Successfully Deleted');
        return redirect()->to(base_url('arsip'));
    }

    public function viewpdf($id_arsip)
    {
        $data = array(
            'title' => 'View Arsip',
            'isi' => 'arsip/v_viewpdf',
            'arsip' => $this->Model_arsip->detail_data($id_arsip),
        );
        return view('layout/v_wrapper', $data);
    }
}

   
