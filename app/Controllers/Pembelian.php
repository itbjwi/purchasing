<?php

namespace App\Controllers;


use App\Models\Model_pembelian;
use App\Models\Model_log;

class Pembelian extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Model_pembelian = new Model_pembelian();
        $this->Model_log = new Model_log();
    }

	// Tampil Data PP Semua //

    public function index()
    {
        $data = array(
            'title' => 'Data Permintaan Pembelian',
            'isi' => 'pembelian/v_index',
            'pp' => $this->Model_pembelian->all_data(),
        );
        return view('layout/v_wrapper', $data);
    }

	// Tampil Data Status Unfinish //

	public function all_data_unfinish()
    {
        $data = array(
            'title' => 'Data Permintaan Pembelian Status Unfinish',
            'isi' => 'pembelian/v_index',
            'pp' => $this->Model_pembelian->all_data_unfinish(),
        );
        return view('layout/v_wrapper', $data);
	}
	
	// Tampil Data Status Urgent //

	public function all_data_urgent()
    {
        $data = array(
            'title' => 'Data Permintaan Pembelian Status Urgent',
            'isi' => 'pembelian/v_index',
            'pp' => $this->Model_pembelian->all_data_urgent(),
        );
        return view('layout/v_wrapper', $data);
	}
	
	// Tampil Data Status Finish //

	public function all_data_finish()
    {
        $data = array(
            'title' => 'Data Permintaan Pembelian Status Finish',
            'isi' => 'pembelian/v_index',
            'pp' => $this->Model_pembelian->all_data_finish(),
        );
        return view('layout/v_wrapper', $data);
	}
	
	// Tampil Data Status Pending //

	public function all_data_pending()
    {
        $data = array(
            'title' => 'Data Permintaan Pembelian Status Pending',
            'isi' => 'pembelian/v_index',
            'pp' => $this->Model_pembelian->all_data_pending(),
        );
        return view('layout/v_wrapper', $data);
	}
	
	// Tampil Data Status Pending //

	public function all_data_today()
    {
        $data = array(
            'title' => 'Data Permintaan Pembelian Input Hari ini',
            'isi' => 'pembelian/v_index',
            'pp' => $this->Model_pembelian->all_data_today(),
        );
        return view('layout/v_wrapper', $data);
    }

	// Tambah Data PP //

    public function add()
    {
        if($this->validate([
			'kode'		=> 'required',
			'kd'		=> 'required',
			'nama'		=> 'required',
			'qty'		=> 'required',
			'satuan'	=> 'required',
			'foto'	=> [
				'rules' => 'max_size[foto,6144]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
			]
		]
		)) {
				// get file foto from input
			$filefoto = $this->request->getFile('foto');
			
			// ambil nama file
			$namafoto = $filefoto->getName();
			if($namafoto == '') {
				$namaFoto = 'default-mimin.png';
			} else {
				$namaFoto = $namafoto;
			};


			$this->Model_pembelian->save([
				'op' 		=> $this->request->getVar('op'),
				'kode' 		=> $this->request->getVar('kode'),
				'kd' 		=> $this->request->getVar('kd'),
				'nama' 		=> $this->request->getVar('nama'),
				'status' 	=> $this->request->getVar('status'),
				'spec' 		=> $this->request->getVar('spec'),
				'mandarin' 	=> $this->request->getVar('mandarin'),
				'qty' 		=> $this->request->getVar('qty'),
				'satuan' 	=> $this->request->getVar('satuan'),
				'lokasi' 	=> $this->request->getVar('lokasi'),
				'po' 		=> $this->request->getVar('po'),
				'note' 	    => $this->request->getVar('note'),
				'foto'		=> $namaFoto
			]);
			
			$this->Model_log->save([
				'log_user' 		=> $this->request->getVar('log_user_add'),
				'log_action' 	=> 'Tambah',
				'log_kode' 		=> $this->request->getVar('kode'),
				'log_kd' 		=> $this->request->getVar('kd'),
				'log_nama' 		=> $this->request->getVar('nama')
			]);
			
			if($namaFoto == 'default-mimin.png') {
				session()->setFlashdata('pesan', 'Permintaan Pembelian Berhasil Ditambahkan');
				return redirect()->to('/public/pembelian');
			} else {
				$filefoto->move('foto');
				session()->setFlashdata('pesan', 'Permintaan Pembelian Berhasil Ditambahkan');
				return redirect()->to('/public/pembelian');
			};
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to('/public/pembelian/all_data_unfinish');
		}
		
	}
	
	// Mendapatkan Data Status untuk Finish Data PP //

	public function status_finish()
	{
		$id = $_POST['id'];
		$data = $this->Model_pembelian->to_finish($id);
		echo json_encode ($data);
	}

	// Mengubah Status menjadi Finish //

	public function ubah_status_finish()
	{
		$tgl_finish = date("Y-m-d");
        $data = array(
			'id_pp' => $this->request->getPost('id_status_finish1'),
            'status' => $this->request->getPost('status_finish'),
            'tgl_selesai' => $tgl_finish
		);

		$this->Model_pembelian->edit($data);
		
		$this->Model_log->save([
			'log_user' 		=> $this->request->getVar('log_user_finish'),
			'log_action' 	=> 'Finish',
			'log_kode' 		=> $this->request->getVar('kode_status_finish1'),
			'log_kd' 		=> $this->request->getVar('kd_status_finish1'),
			'log_nama' 		=> $this->request->getVar('nama_status_finish1')
		]);

		session()->setFlashdata('pesan', 'Permintaan Pembelian Finish');
		return redirect()->to('/public/pembelian/all_data_unfinish');
	}

	// Mendapatkan Data Edit Admin Data PP //

	public function get_edit_admin()
	{
		$id = $_POST['id'];
		$data = $this->Model_pembelian->to_finish($id);
		echo json_encode ($data);

	}

	// Edit as Admin Data PP //

	public function edit_admin()
	{
        $data = array(
			'id_pp' => $this->request->getPost('id_edit'),
            'status' => $this->request->getPost('status_edit'),
			'kode' => $this->request->getPost('kode_edit'),
			'kd' => $this->request->getPost('kd_edit'),
			'nama' => $this->request->getPost('nama_edit'),
			'qty' => $this->request->getPost('qty_edit'),
			'satuan' => $this->request->getPost('satuan_edit'),
			'po' => $this->request->getPost('po_edit'),
			'op' => $this->request->getPost('op_edit'),
			'spec' => $this->request->getPost('spec_edit'),
			'lokasi' => $this->request->getPost('lokasi_edit'),
			'mandarin' => $this->request->getPost('mandarin_edit'),
			'note' => $this->request->getPost('note_edit')
		);

		$this->Model_pembelian->edit($data);
		
		$this->Model_log->save([
			'log_user' 		=> $this->request->getVar('log_user_edit_adm'),
			'log_action' 	=> 'Edit',
			'log_kode' 		=> $this->request->getVar('kode_edit'),
			'log_kd' 		=> $this->request->getVar('kd_edit'),
			'log_nama' 		=> $this->request->getVar('nama_edit')
		]);

		session()->setFlashdata('pesan', 'Permintaan Pembelian Berhasil Diedit!');
		return redirect()->to('/public/pembelian/all_data_unfinish');
	}
	
	// Edit as User Data PP //

	public function edit_user()
	{
        $data = array(
			'id_pp' => $this->request->getPost('id_edit_user'),
			'qty' => $this->request->getPost('qty_edit_user'),
			'satuan' => $this->request->getPost('satuan_edit_user'),
			'spec' => $this->request->getPost('spec_edit_user'),
			'note' => $this->request->getPost('note_edit_user')
		);

		$this->Model_pembelian->edit($data);
		
		$this->Model_log->save([
			'log_user' 		=> $this->request->getPost('log_user_edit_user'),
			'log_action' 	=> 'Edit',
			'log_kode' 		=> $this->request->getPost('kode_edit_user'),
			'log_kd' 		=> $this->request->getPost('kd_edit_user'),
			'log_nama' 		=> $this->request->getPost('nama_edit_user')
		]);

		session()->setFlashdata('pesan', 'Permintaan Pembelian Berhasil Diedit!');
		return redirect()->to('/public/pembelian/all_data_unfinish');
	}

	// Get Status Data PP Pending //

	public function get_pending()
	{
		$id = $_POST['id'];
		$data = $this->Model_pembelian->to_finish($id);
		echo json_encode ($data);
	}

	//Ubah Status Data PP menjadi Pending //

	public function pending()
	{
		$tgl_finish = date("Y-m-d");
        $data = array(
			'id_pp' => $this->request->getPost('id_pending'),
            'status' => $this->request->getPost('status_pending'),
            'tgl_selesai' => $tgl_finish
		);

		$this->Model_pembelian->edit($data);

		session()->setFlashdata('pesan', 'Permintaan Pembelian Dipending!');
		return redirect()->to('/public/pembelian/all_data_unfinish');
	}


   
}