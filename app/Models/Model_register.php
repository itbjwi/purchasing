<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Model_register extends Model{
    protected $table = 'tbl_user';
    protected $allowedFields = ['nama_user', 'email', 'password','foto','level', 'id_dep'];
}