<?php

namespace App\Controllers;

class Portfolio extends BaseController
{
    public function index()
    {
        // Sample projects data - in a real app, this would come from a database
        $projects = [
            [
                'title' => 'ENAM',
                'url' => 'https://concours.enam.cm',
                'image' => 'enam.jpg',
                'description' => 'Main.project_enam',
                'technologies' => ['CodeIgniter', 'MySQL', 'Bootstrap', 'PHP']
            ],
            [
                'title' => lang('Main.school_management'),
                'url' => '#',
                'image' => 'school.jpg',
                'description' => 'Main.school_desc',
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Tailwind']
            ],
            [
                'title' => lang('Main.hr_solution'),
                'url' => '#',
                'image' => 'hr.jpg',
                'description' => 'Main.hr_desc',
                'technologies' => ['CodeIgniter', 'Alpine.js', 'MySQL', 'REST API']
            ]
        ];

        return view('pages/portfolio', [
            'title' => lang('Main.projects'),
            'projects' => $projects
        ]);
    }
}
