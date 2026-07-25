<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\TeamMember;

class AboutController extends Controller
{
    public function index()
    {
        $seo = Page::seo('about');

        return view('pages.about', [
            'seoTitle' => $seo['title'],
            'seoDescription' => $seo['description'],
            'seoKeyword' => $seo['keyword'],
            'seoImage' => $seo['image'],
            'leadership' => TeamMember::active()->get(),
        ]);
    }
}
