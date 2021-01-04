<?php

namespace App\Controllers;

use App\Models\Model_pembelian;


class Cetak extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Model_pembelian = new Model_pembelian();
    }

	// Tampil Data PP Semua //

    public function index()
    {
		$tgl= date("d M Y");
        $data = array(
			'title' => 'Cetak Data Permintaan Pembelian Semua',
			'tgl' => $tgl,
            'pp' => $this->Model_pembelian->all_data(),
        );
        return view('pembelian/v_print', $data);
	}
	
	
	// Tampil Data Status Unfinish //

	public function unfinish()
    {
        $tgl= date("d M Y");
        $data = array(
			'title' => 'Cetak Data Permintaan Pembelian Status Unfinish',
			'tgl' => $tgl,
            'pp' => $this->Model_pembelian->all_data_unfinish(),
        );
        return view('pembelian/v_print', $data);
	}
	
	// Tampil Data Status Urgent //

	public function urgent()
    {
        $tgl= date("d M Y");
        $data = array(
			'title' => 'Cetak Data Permintaan Pembelian Status Urgent',
			'tgl' => $tgl,
            'pp' => $this->Model_pembelian->all_data_urgent(),
        );
        return view('pembelian/v_print', $data);
	}
	
	// Tampil Data Status Finish //

	public function finish()
    {
        $tgl= date("d M Y");
        $data = array(
			'title' => 'Cetak Data Permintaan Pembelian Status Finish',
			'tgl' => $tgl,
            'pp' => $this->Model_pembelian->all_data_finish(),
        );
        return view('pembelian/v_print', $data);
	}
	
	// Tampil Data Status Pending //

	public function pending()
    {
        $tgl= date("d M Y");
        $data = array(
			'title' => 'Cetak Data Permintaan Pembelian Status Pending',
			'tgl' => $tgl,
            'pp' => $this->Model_pembelian->all_data_pending(),
        );
        return view('pembelian/v_print', $data);
	}
	
	// Tampil Data Status Pending //

	public function today()
    {
        $tgl= date("d M Y");
        $data = array(
			'title' => 'Cetak Data Permintaan Pembelian Input Hari ini',
			'tgl' => $tgl,
            'pp' => $this->Model_pembelian->all_data_today(),
        );
        return view('pembelian/v_print', $data);
	}

	public function gresik()
    {
        $tgl= date("d M Y");
        $data = array(
			'title' => 'Cetak Data Permintaan Pembelian Lokasi Gresik',
			'tgl' => $tgl,
            'pp' => $this->Model_pembelian->all_data_gresik(),
        );
        return view('pembelian/v_print', $data);
	}
	
	public function gresik_unfinish()
    {
        $tgl= date("d M Y");
        $data = array(
			'title' => 'Cetak Data Permintaan Pembelian Lokasi Gresik Unfinish',
			'tgl' => $tgl,
            'pp' => $this->Model_pembelian->all_data_gresik_unfinish(),
        );
        return view('pembelian/v_print', $data);
	}

	public function luar()
    {
        $tgl= date("d M Y");
        $data = array(
			'title' => 'Cetak Data Permintaan Pembelian Lokasi Luar',
			'tgl' => $tgl,
            'pp' => $this->Model_pembelian->all_data_luar(),
        );
        return view('pembelian/v_print', $data);
	}
	
	public function luar_unfinish()
    {
        $tgl= date("d M Y");
        $data = array(
			'title' => 'Cetak Data Permintaan Pembelian Lokasi Luar Unfinish',
			'tgl' => $tgl,
            'pp' => $this->Model_pembelian->all_data_luar_unfinish(),
        );
        return view('pembelian/v_print', $data);
	}
   
}