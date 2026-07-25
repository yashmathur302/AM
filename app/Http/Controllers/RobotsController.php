<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class RobotsController extends Controller
{
    public function index()
    {
        $lines = [
            'User-agent: *',
            'Disallow: /admin',
            'Allow: /',
            'Sitemap: '.route('sitemap'),
        ];

        return Response::make(implode("\n", $lines)."\n", 200, ['Content-Type' => 'text/plain']);
    }
}
