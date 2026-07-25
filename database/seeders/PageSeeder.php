<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'home',
                'name' => 'Home',
                'meta_title' => 'Investment Banking Advisory | Mergers, Acquisitions & Capital Raising',
                'meta_description' => 'Independent investment banking advisory for mergers & acquisitions, capital raising, and strategic financial consulting. Speak with our senior advisory team.',
                'focus_keyword' => 'investment banking advisory',
            ],
            [
                'slug' => 'about',
                'name' => 'About',
                'meta_title' => 'About Us | Our Story & Leadership Team',
                'meta_description' => 'Learn about our firm\'s history, values, and the senior leadership team behind every client engagement.',
                'focus_keyword' => 'investment banking firm about us',
            ],
            [
                'slug' => 'services',
                'name' => 'Services',
                'meta_title' => 'Our Services | M&A, Capital Raising, Valuation & Restructuring',
                'meta_description' => 'Explore our investment banking services: mergers & acquisitions, capital raising, valuation, restructuring, and strategic consulting.',
                'focus_keyword' => 'investment banking services',
            ],
            [
                'slug' => 'team',
                'name' => 'Team',
                'meta_title' => 'Our Team | Investment Banking Advisors',
                'meta_description' => 'Meet the senior advisors and dealmakers who lead every client engagement at our firm.',
                'focus_keyword' => 'investment banking team',
            ],
            [
                'slug' => 'blog',
                'name' => 'Insights',
                'meta_title' => 'Insights | Market Commentary & Analysis',
                'meta_description' => 'Read the latest market commentary, deal analysis, and financial insights from our advisory team.',
                'focus_keyword' => 'investment banking insights',
            ],
            [
                'slug' => 'contact',
                'name' => 'Contact',
                'meta_title' => 'Contact Us | Request a Consultation',
                'meta_description' => 'Get in touch with our investment banking advisory team to discuss your transaction or financing needs.',
                'focus_keyword' => 'contact investment bank',
            ],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
