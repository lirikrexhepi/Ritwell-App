<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
<<<<<<< HEAD
        '/webhooks/github',
=======
        '/webhooks/githubb',
>>>>>>> 06bddbf67dbc30c9f0260a7d5c8f46dfa6dd49a7
    ];
}
