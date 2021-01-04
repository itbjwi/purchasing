<?php

namespace App\Controllers;

use App\Models\Model_user;
use App\Models\Model_dep;

class User extends BaseController
{


	public function __construct()
	{

		$this->Model_user = new Model_user();
		$this->Model_dep = new Model_dep();
		helper('form');
	}

	public function index()
	{

		if (session()->get('level') <> 7) { 
			return redirect()->to(base_url('error'));
		
		} 

		$data = array(
			'title' => 'User',
			'title2' => 'Data User',
			'user' => $this->Model_user->all_data(),
			'isi' => 'user/v_index'
		);

		return view('layout/v_wrapper', $data);
	}





	public function add()
	{
		$data = array(
			'title' => 'Add User',
			'title2' => 'Add User',
			'dep' => $this->Model_dep->all_data(),
			'isi' => 'user/v_add'
		);

		return view('layout/v_wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'nama_user' => [
				'label' => 'Nama User',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
			'email' => [
				'label' => 'E-mail',
				'rules' => 'required|is_unique[tbl_user.email]',
				'errors' => [
					'required' => '{field} Wajib Di Isi',
					'is_unique' => '{field} Email sudah di pakai, mohon input {field} yang berbeda',
				]
			],
			'password' => [
				'label' => 'password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
			'level' => [
				'label' => 'Level',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
			'id_dep' => [
				'label' => 'Departement',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
		])) {

			$data = array(

				'nama_user' => $this->request->getPost('nama_user'),
				'email' => $this->request->getPost('email'),
				'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
				'level' => $this->request->getPost('level'),
				'id_dep' => $this->request->getPost('id_dep')
			);

			$this->Model_user->add($data);

			session()->setFlashdata('pesan', 'User Berhasil Ditambahkan');
			return redirect()->to(base_url('user'));
		} else {
			// jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('user/add'));
		}
	}


	public function delete($id_user)
	{
		$data = array(
			'id_user' => $id_user,
		);

		$this->Model_user->delete_data($data);

		session()->setFlashdata('pesan', 'User Berhasil Di Hapus');
		return redirect()->to(base_url('user'));
	}

	public function edit($id_user)
	{
		$data = array(
			'title' => 'Edit User',
			'title2' => 'Edit User',
			'dep' => $this->Model_dep->all_data(),
			'user' => $this->Model_user->detail_data($id_user),
			'isi' => 'user/v_edit'
		);

		return view('layout/v_wrapper', $data);
	}




	public function update($id_user)
	{
		if ($this->validate([
			'nama_user' => [
				'label' => 'Nama User',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
			'level' => [
				'label' => 'Level',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
			'id_dep' => [
				'label' => 'Departement',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Di Isi'
				]
			],
		])) {

				$data = array(
					'id_user' => $id_user,
					'nama_user' => $this->request->getPost('nama_user'),
					'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
					'level' => $this->request->getPost('level'),
					'id_dep' => $this->request->getPost('id_dep'),
				);

				$this->Model_user->edit($data);

			session()->setFlashdata('pesan', 'User Berhasil Diupdate');
			return redirect()->to(base_url('user'));

		} 
	}
}
