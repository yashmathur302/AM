<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $xml = Cache::remember('sitemap.xml', now()->addHour(), function () {
            $staticUrls = [
                ['loc' => route('home'), 'priority' => '1.0'],
                ['loc' => route('about'), 'priority' => '0.8'],
                ['loc' => route('services.index'), 'priority' => '0.8'],
                ['loc' => route('team.index'), 'priority' => '0.6'],
                ['loc' => route('blog.index'), 'priority' => '0.7'],
                ['loc' => route('contact'), 'priority' => '0.6'],
            ];

            $postUrls = Post::published()->get()->map(fn (Post $post) => [
                'loc' => route('blog.show', $post),
                'lastmod' => $post->updated_at->toAtomString(),
                'priority' => '0.6',
            ]);

            $urls = collect($staticUrls)->concat($postUrls);

            return view('sitemap', ['urls' => $urls])->render();
        });

        return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
