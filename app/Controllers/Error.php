<?php

namespace App\Controllers;



class Error extends BaseController
{



    public function index()
    {
        $data = array(
            'title' => 'ERRORSS',
            'title1' => 'ERRORSS',

            'isi' => 'v_error'
        );

        return view('v_error', $data);
    }
}
