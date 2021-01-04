<?php


namespace App\Controllers;

use App\models\Model_dep;

class Dep extends BaseController
{


	public function __construct()
	{

		$this->Model_dep = new Model_dep();
		helper('form');
	}

	public function index()
	{

		if (session()->get('level') <> 1) { 
			return redirect()->to(base_url('error'));
		
		} 
		
		$data = array(
			'title' => 'Departement',
			'title1' => 'Data Departement',
			'dep' => $this->Model_dep->all_data(),
			'isi' => 'v_dep'
		);

		return view('layout/v_wrapper', $data);
	}

	public function add()
	{
		$data = array('nama_dep' => $this->request->getPost('nama_dep'));
		$this->Model_dep->add($data);

		session()->setFlashdata('pesan', 'Data Added Successfully');
		return redirect()->to(base_url('dep'));
	}


	public function edit($id_dep)
	{
		$data = array(
			'id_dep' => $id_dep,
			'nama_dep' => $this->request->getPost('nama_dep')
		);

		$this->Model_dep->edit($data);

		session()->setFlashdata('pesan', 'Successfully Updated Data');
		return redirect()->to(base_url('dep'));
	}

	public function delete($id_dep)
	{
		$data = array(
			'id_dep' => $id_dep,
		);

		$this->Model_dep->delete_data($data);

		session()->setFlashdata('pesan', 'Data Successfully Deleted');
		return redirect()->to(base_url('dep'));
	}

	//--------------------------------------------------------------------

}
