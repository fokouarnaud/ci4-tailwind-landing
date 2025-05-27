<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
    public $baseURL = 'http://localhost:8080/';

    public $indexPage = '';

    public $uriProtocol = 'REQUEST_URI';

    public $defaultLocale = 'fr';

    public $supportedLocales = ['en', 'fr'];

    public $negotiateLocale = true;

    public $appTimezone = 'Africa/Douala';

    public $charset = 'UTF-8';

    public $forceGlobalSecureRequests = false;

    public $allowedHostnames = ['localhost'];

    public $proxyIPs = [];

    public $sessionDriver = 'CodeIgniter\Session\Handlers\FileHandler';
    public $sessionCookieName = 'ci_session';
    public $sessionExpiration = 7200;
    public $sessionSavePath = null;
    public $sessionMatchIP = false;
    public $sessionTimeToUpdate = 300;
    public $sessionRegenerateDestroy = false;

    public $cookiePrefix = '';
    public $cookieDomain = '';
    public $cookiePath = '/';
    public $cookieSecure = false;
    public $cookieHTTPOnly = false;
    public $cookieSameSite = 'Lax';

    public $CSRFTokenName = 'csrf_test_name';
    public $CSRFHeaderName = 'X-CSRF-TOKEN';
    public $CSRFCookieName = 'csrf_cookie_name';
    public $CSRFExpire = 7200;
    public $CSRFRegenerate = true;
    public $CSRFRedirect = true;
    public $CSRFSameSite = 'Lax';

    public $CSPEnabled = false;
}
