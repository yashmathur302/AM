<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\TeamMember;

class HomeController extends Controller
{
    public function index()
    {
        $seo = Page::seo('home');

        return view('pages.home', [
            'seoTitle' => $seo['title'],
            'seoDescription' => $seo['description'],
            'seoKeyword' => $seo['keyword'],
            'seoImage' => $seo['image'],
            'latestPosts' => Post::published()->latest('published_at')->take(3)->get(),
            'teamPreview' => TeamMember::active()->take(3)->get(),
        ]);
    }
}
