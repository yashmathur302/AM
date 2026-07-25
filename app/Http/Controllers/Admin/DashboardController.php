<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactLead;
use App\Models\Post;
use App\Models\TeamMember;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'postCount' => Post::count(),
            'publishedPostCount' => Post::published()->count(),
            'teamCount' => TeamMember::count(),
            'unreadLeadCount' => ContactLead::where('is_read', false)->count(),
            'recentLeads' => ContactLead::latest()->take(5)->get(),
        ]);
    }
}
