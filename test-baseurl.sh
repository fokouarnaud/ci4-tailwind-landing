#!/bin/bash

echo "🔧 Testing Base URL Configuration"
echo "================================="

# Test the current base URL detection
php -r "
require_once 'app/Config/App.php';
\$app = new \Config\App();

echo 'Base URL: ' . \$app->baseURL . PHP_EOL;
echo 'Force HTTPS: ' . (\$app->forceGlobalSecureRequests ? 'Yes' : 'No') . PHP_EOL;
echo 'Allowed Hostnames: ' . implode(', ', \$app->allowedHostnames) . PHP_EOL;
echo 'Environment: ' . (getenv('CI_ENVIRONMENT') ?: 'development') . PHP_EOL;

// Test base_url() function
if (function_exists('base_url')) {
    echo 'base_url(): ' . base_url() . PHP_EOL;
    echo 'base_url(\"assets/test.css\"): ' . base_url('assets/test.css') . PHP_EOL;
} else {
    echo 'base_url() function not available (need CodeIgniter bootstrap)' . PHP_EOL;
}
"

echo ""
echo "🌐 Current Environment Variables:"
echo "CI_ENVIRONMENT: ${CI_ENVIRONMENT:-not set}"
echo "HTTP_HOST: ${HTTP_HOST:-not set}"
echo "SERVER_NAME: ${SERVER_NAME:-not set}"
echo ""

echo "✅ Configuration should now auto-detect:"
echo "- localhost:8080 for development"
echo "- https://yourapp.onrender.com for production"
echo "- Force HTTPS on Render automatically"
echo "- Allow Render hostnames automatically"
