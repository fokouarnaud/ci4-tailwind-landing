<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index()
    {
        return view('pages/about', [
            'title' => lang('Main.about')
        ]);
    }
}
