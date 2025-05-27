<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Test Configuration - CI4 Tailwind Template',
            'description' => 'Page de test pour vérifier la configuration Vite, Tailwind CSS et Alpine.js',
            'keywords' => 'test, vite, tailwind, alpine.js, configuration'
        ];

        return view('test/index', $data);
    }

    /**
     * Test des assets Vite en mode développement
     */
    public function vite_dev()
    {
        $data = [
            'title' => 'Test Vite Dev - CI4 Tailwind Template',
            'description' => 'Test du mode développement Vite avec HMR',
            'vite_dev_mode' => true
        ];

        return view('test/index', $data);
    }

    /**
     * Test des performances de build
     */
    public function performance()
    {
        $manifestPath = FCPATH . 'assets/.vite/manifest.json';
        $manifestExists = file_exists($manifestPath);
        
        $data = [
            'title' => 'Performance Test - CI4 Tailwind Template',
            'description' => 'Test des performances et du build de production',
            'manifest_exists' => $manifestExists,
            'manifest_path' => $manifestPath
        ];

        if ($manifestExists) {
            $data['manifest_content'] = json_decode(file_get_contents($manifestPath), true);
        }

        return view('test/performance', $data);
    }

    /**
     * API pour vérifier l'état du serveur Vite
     */
    public function vite_status()
    {
        helper('vite');
        
        $isRunning = is_vite_dev_server_running();
        
        return $this->response->setJSON([
            'vite_dev_server' => $isRunning,
            'environment' => ENVIRONMENT,
            'timestamp' => date('Y-m-d H:i:s')
        ]);
    }
}
