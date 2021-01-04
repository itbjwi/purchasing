<?php


namespace App\Controllers;

use App\models\Model_kategori;

class Kategori extends BaseController
{


	public function __construct()
	{

		$this->Model_kategori = new Model_kategori();
		helper('form');
	}

	public function index()
	{

		if (session()->get('level') <> 1) { 
			return redirect()->to(base_url('error'));
		
		} 
		$data = array(
			'title' => 'Kategori',
			'title1' => 'Data Kategori',
			'kategori' => $this->Model_kategori->all_data(),
			'isi' => 'v_kategori'
		);

		return view('layout/v_wrapper', $data);
	}

	public function add()
	{
		$data = array('nama_kategori' => $this->request->getPost('nama_kategori'));
		$this->Model_kategori->add($data);

		session()->setFlashdata('pesan', 'Data Added Successfully');
		return redirect()->to(base_url('kategori'));
	}


	public function edit($id_kategori)
	{
		$data = array(
			'id_kategori' => $id_kategori,
			'nama_kategori' => $this->request->getPost('nama_kategori')
		);

		$this->Model_kategori->edit($data);

		session()->setFlashdata('pesan', 'Successfully Updated Data');
		return redirect()->to(base_url('kategori'));
	}

	public function delete($id_kategori)
	{
		$data = array(
			'id_kategori' => $id_kategori,
		);

		$this->Model_kategori->delete_data($data);

		session()->setFlashdata('pesan', 'Data Successfully Deleted');
		return redirect()->to(base_url('kategori'));
	}
}
