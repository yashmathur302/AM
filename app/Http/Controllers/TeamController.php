<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\TeamMember;

class TeamController extends Controller
{
    public function index()
    {
        $seo = Page::seo('team');

        return view('pages.team', [
            'seoTitle' => $seo['title'],
            'seoDescription' => $seo['description'],
            'seoKeyword' => $seo['keyword'],
            'seoImage' => $seo['image'],
            'members' => TeamMember::active()->get(),
        ]);
    }
}
