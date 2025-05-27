<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
    /**
     * Base Site URL
     * 
     * Auto-détection pour développement et production
     * - Local: http://localhost:8080/
     * - Render: https://yourapp.onrender.com/
     */
    public $baseURL = '';

    public $indexPage = '';

    public $uriProtocol = 'REQUEST_URI';

    public $defaultLocale = 'fr';

    public $supportedLocales = ['en', 'fr'];

    public $negotiateLocale = true;

    public $appTimezone = 'Africa/Douala';

    public $charset = 'UTF-8';

    /**
     * Force HTTPS en production (Render)
     */
    public $forceGlobalSecureRequests = false; // Auto-détecté

    /**
     * Allowed hostnames - auto-configuration
     */
    public $allowedHostnames = [];

    public $proxyIPs = [];

    // Session Configuration
    public $sessionDriver = 'CodeIgniter\Session\Handlers\FileHandler';
    public $sessionCookieName = 'ci_session';
    public $sessionExpiration = 7200;
    public $sessionSavePath = null;
    public $sessionMatchIP = false;
    public $sessionTimeToUpdate = 300;
    public $sessionRegenerateDestroy = false;

    // Cookie Configuration
    public $cookiePrefix = '';
    public $cookieDomain = '';
    public $cookiePath = '/';
    public $cookieSecure = false; // Auto-détecté HTTPS
    public $cookieHTTPOnly = false;
    public $cookieSameSite = 'Lax';

    // CSRF Configuration
    public $CSRFTokenName = 'csrf_test_name';
    public $CSRFHeaderName = 'X-CSRF-TOKEN';
    public $CSRFCookieName = 'csrf_cookie_name';
    public $CSRFExpire = 7200;
    public $CSRFRegenerate = true;
    public $CSRFRedirect = true;
    public $CSRFSameSite = 'Lax';

    public $CSPEnabled = false;

    /**
     * Configuration automatique basée sur l'environnement
     */
    public function __construct()
    {
        parent::__construct();
        
        // Auto-détection de l'URL de base
        if (empty($this->baseURL)) {
            $this->baseURL = $this->detectBaseURL();
        }
        
        // Auto-détection HTTPS
        if ($this->isHTTPS()) {
            $this->forceGlobalSecureRequests = true;
            $this->cookieSecure = true;
        }
        
        // Configuration des hostnames autorisés
        if (empty($this->allowedHostnames)) {
            $this->allowedHostnames = $this->detectAllowedHostnames();
        }
    }
    
    /**
     * Détecte automatiquement l'URL de base
     */
    private function detectBaseURL(): string
    {
        // Si en ligne de commande, utiliser une URL par défaut
        if (is_cli()) {
            return 'http://localhost:8080/';
        }
        
        // Détection du protocole
        $protocol = $this->isHTTPS() ? 'https' : 'http';
        
        // Détection du host
        $host = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? 'localhost';
        
        // Port spécifique si nécessaire
        $port = '';
        if (isset($_SERVER['SERVER_PORT'])) {
            $serverPort = (int) $_SERVER['SERVER_PORT'];
            if (($protocol === 'http' && $serverPort !== 80) || 
                ($protocol === 'https' && $serverPort !== 443)) {
                $port = ':' . $serverPort;
            }
        }
        
        return $protocol . '://' . $host . $port . '/';
    }
    
    /**
     * Détecte si la connexion est HTTPS
     */
    private function isHTTPS(): bool
    {
        return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
               (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
               (!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on') ||
               (isset($_SERVER['SERVER_PORT']) && (int) $_SERVER['SERVER_PORT'] === 443);
    }
    
    /**
     * Détecte les hostnames autorisés
     */
    private function detectAllowedHostnames(): array
    {
        $hostnames = ['localhost', '127.0.0.1'];
        
        // Ajouter le hostname actuel
        if (isset($_SERVER['HTTP_HOST'])) {
            $hostnames[] = $_SERVER['HTTP_HOST'];
        }
        
        if (isset($_SERVER['SERVER_NAME'])) {
            $hostnames[] = $_SERVER['SERVER_NAME'];
        }
        
        // Domaines Render.com
        $hostnames[] = '*.onrender.com';
        
        return array_unique($hostnames);
    }
}
