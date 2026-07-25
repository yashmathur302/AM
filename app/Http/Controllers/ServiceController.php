<?php

namespace App\Http\Controllers;

use App\Models\Page;

class ServiceController extends Controller
{
    public function index()
    {
        $seo = Page::seo('services');

        return view('pages.services', [
            'seoTitle' => $seo['title'],
            'seoDescription' => $seo['description'],
            'seoKeyword' => $seo['keyword'],
            'seoImage' => $seo['image'],
        ]);
    }
}
