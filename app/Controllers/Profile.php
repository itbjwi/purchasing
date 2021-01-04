<?php

namespace App\Controllers;

use App\models\Model_home;
use App\models\Model_user;
use App\models\Model_dep;
use App\models\Model_profile;

class Profile extends BaseController
{

    public function __construct()
    {
        $this->Model_home = new Model_home();
        $this->Model_user = new Model_user();
        $this->Model_dep = new Model_dep();
        $this->Model_profile = new Model_profile();
        helper('form');
    }


    public function akun()
    {
       
        $session    = \Config\Services::session();
        $id_user     = $session->get('id_user');
        $model         = new Model_user();
        $user         = $model->detail_data($id_user);
        $modeldep         = new Model_dep();
        $dep        = $modeldep->all_data();
       
            $data = array(
                'title'        => 'Update Profile',
                'user'        => $user,
                'title2' => 'Update Profile',
                'dep' => $dep,
                'isi' => 'user/v_profile'
            );
            return view('layout/v_wrapper', $data); 
    }


    public function update($id_user)
    {
        if ($this->validate([ 
            
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Max 1 MB',
                    'mime_in' => '{field} Only PNG,JPG dan JPEG',
                ]
            ],
        ])) {
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {

                $data = array(
                    'id_user' => $id_user,
					'nama_user' => $this->request->getPost('nama_user'),
					'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
					'level' => $this->request->getPost('level'),
					'id_dep' => $this->request->getPost('id_dep'),
                );

                $this->Model_user->edit($data);
            } else {

                $user = $this->Model_user->detail_data($id_user);
            
                if ($user['foto'] != "") { 
                
                   
                }
                $nama_file = $foto->getRandomName();
                $data = array(
                    'id_user' => $id_user,
					'nama_user' => $this->request->getPost('nama_user'),
					'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
					'level' => $this->request->getPost('level'),
					'id_dep' => $this->request->getPost('id_dep'),
					'foto' => $nama_file
                );
              
                $foto->move('foto', $nama_file); 
             
                $this->Model_user->edit($data);
              
            }
            
            session()->setFlashdata('pesan', 'User Berhasil Diupdate');
            return redirect()->to(base_url('profile/akun/'));
        } else {
        
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('profile/akun/' . $id_user));
        }
    }
}
