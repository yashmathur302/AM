<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Demo data only — for local development while real articles are being
     * prepared. Does not run outside the local environment.
     */
    public function run(): void
    {
        if (! app()->environment('local')) {
            return;
        }

        $author = User::first();

        if (! $author) {
            return;
        }

        Post::updateOrCreate(['slug' => 'welcome-to-our-insights'], [
            'user_id' => $author->id,
            'title' => 'Welcome to Our Insights',
            'excerpt' => 'An introduction to our market commentary and analysis.',
            'body' => '<p>This is a placeholder article demonstrating the blog layout. Replace with real content once the client provides final copy.</p>',
            'meta_title' => 'Welcome to Our Insights',
            'meta_description' => 'An introduction to our market commentary and analysis section.',
            'focus_keyword' => 'investment banking insights',
            'status' => 'published',
            'published_at' => now(),
        ]);
    }
}
