<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {
        $data = [
            'title' => lang('Main.contact'),
            'validation' => \Config\Services::validation()
        ];

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required|min_length[3]|max_length[100]',
                'email' => 'required|valid_email',
                'subject' => 'required|min_length[5]|max_length[100]',
                'message' => 'required|min_length[10]'
            ];

            if ($this->validate($rules)) {
                // In a real application, you would handle the email sending here
                session()->setFlashdata('success', lang('Main.message_sent'));
                return redirect()->to(current_url());
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('pages/contact', $data);
    }
}
