<?php

namespace App\Controllers;

use App\Models\Model_auth;
use App\Models\Model_register;

class Auth extends BaseController
{

    public function __construct()
    {
        helper('form');

        $this->Model_auth = new Model_auth();
    }

    public function index()
    {
        $data = array(
            'title' => 'Login',
        );
        return view('v_login', $data);
    }

    public function login()
    {
        $session = session();
        $model = new Model_register();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('nama_user', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'email'    => $data['email'],
                    'id_user'    => $data['id_user'],
                    'password'    => $data['password'],
                    'nama_user' => $data['nama_user'],
                    'level'    => $data['level'],
                    'id_dep'    => $data['id_dep'],
                    'log'     => true,
                ];
                $session->set($ses_data);
                session()->setFlashdata('pesan', 'Login success');
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('fail', 'Login Fail !!! Email or Password Error');
                return redirect()->to(base_url('auth'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nama_user');
        session()->remove('id_user');
        session()->remove('email');
        session()->remove('password');
        session()->remove('level');
        session()->remove('id_dep');
        session()->remove('id_kategori');
        session()->setFlashdata('logout', 'Logout success');
        return redirect()->to(base_url('auth'));
    }
}
