<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('pages/home', [
            'title' => lang('Main.welcome')
        ]);
    }

    public function language($locale)
    {
        $session = session();
        
        if (in_array($locale, ['en', 'fr'])) {
            $session->set('locale', $locale);
        }
        
        return redirect()->back();
    }
}
