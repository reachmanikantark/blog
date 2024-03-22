<?php
use Authentication\AuthenticationService;
use Authentication\Middleware\AuthenticationMiddleware;

return [
    'Authentication' => [
        'unauthenticatedRedirect' => '/login', // Redirect URL for unauthenticated users
        'queryParam' => 'redirect', // Query parameter name for redirect
        // Other authentication configurations...
    ],
];
