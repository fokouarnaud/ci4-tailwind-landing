<?php

namespace App\Controllers;

class Services extends BaseController
{
    public function index()
    {
        return view('pages/services', [
            'title' => lang('Main.services')
        ]);
    }
}
