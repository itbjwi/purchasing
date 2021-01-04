<?php

namespace App\Controllers;


use App\Models\Model_log;

class Log extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Model_log = new Model_log();
    }

	// Tampil Data Log Semua //

    public function index()
    {
        $data = array(
            'title' => 'Data Log Permintaan Pembelian',
            'isi' => 'v_log',
            'log' => $this->Model_log->all_data_log(),
        );
        return view('layout/v_wrapper', $data);
    }
}