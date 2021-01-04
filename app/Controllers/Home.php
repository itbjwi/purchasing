<?php

namespace App\Controllers;

use App\Models\Model_pembelian;

class Home extends BaseController
{

	public function __construct()
	{
		$this->Model_pembelian = new Model_pembelian();
	}

	
	public function index()
	{
		$tgl_finish = date("Y-m-d");
		$data = array(
			'title' 		=> 'Home',
			// 'tot_kategori'	=> $this->Model_home->tot_kategori(),
			// 'tot_dep'		=> $this->Model_home->tot_dep(),
			// 'tot_user'		=> $this->Model_home->tot_user(),
			// 'tot_arsip'		=> $this->Model_home->tot_arsip(),
			'tot_pp'			=> $this->Model_pembelian->tot_pp(),
			'tot_urgent'		=> $this->Model_pembelian->tot_urgent(),
			'tot_unfinish'		=> $this->Model_pembelian->tot_unfinish(),
			'tot_finish'		=> $this->Model_pembelian->tot_finish(),
			'tot_pending'		=> $this->Model_pembelian->tot_pending(),
			'tot_today'			=> $this->Model_pembelian->tot_today(),
			'tgl'				=> $tgl_finish,
			'isi'			=> 'v_home'
		);
		return view('layout/v_wrapper', $data);
	}
}
