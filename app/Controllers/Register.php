<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_register;
use App\Models\Model_dep;

class Register extends Controller
{
	public function index()
	{

		//include helper form
		$this->Model_dep = new Model_dep();
		helper(['form']);
		$data = array(
			'title' => 'Register',
			'dep' => $this->Model_dep->all_data(),
		);
		echo view('v_register', $data);
	}

	public function save()
	{

		$data = array(
			'title' => 'Register',
		);

		//include helper form
		helper(['form']);
		//set rules validation form
		$rules = [
			'nama_user'     => 'required|min_length[3]|max_length[20]',
			'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_user.email]',
			'password'      => 'required|min_length[6]|max_length[200]',
			'confpassword'  => 'matches[password]',
			'level'     	=> 'required|max_length[1]|max_length[2]',
			'id_dep'     	=> 'required|max_length[1]|max_length[2]',
		];

		if ($this->validate($rules)) {
			$model = new Model_register();
			$data = [
				'nama_user'     => $this->request->getVar('nama_user'),
				'email'    => $this->request->getVar('email'),
				'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
				'level'    => $this->request->getVar('level'),
				'id_dep'    => $this->request->getVar('id_dep'),
			];
			$model->save($data);


			return redirect()->to(base_url('auth'));
		} else {
			$data['validation'] = $this->validator;
			echo view('v_register', $data);
		}
	}
}
