<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $seo = Page::seo('blog');

        return view('pages.blog-index', [
            'seoTitle' => $seo['title'],
            'seoDescription' => $seo['description'],
            'seoKeyword' => $seo['keyword'],
            'seoImage' => $seo['image'],
            'pageClass' => 'page-blog',
            'posts' => Post::published()->latest('published_at')->paginate(9),
        ]);
    }

    public function show(Post $post)
    {
        abort_unless($post->status === 'published' && $post->published_at?->isPast(), 404);

        return view('pages.blog-show', [
            'seoTitle' => $post->meta_title,
            'seoDescription' => $post->meta_description,
            'seoKeyword' => $post->focus_keyword,
            'seoImage' => $post->featured_image_url,
            'seoType' => 'article',
            'seoArticle' => [
                'published_at' => $post->published_at->toAtomString(),
                'modified_at' => $post->updated_at->toAtomString(),
                'author' => $post->author->name,
            ],
            'pageClass' => 'page-blog-single',
            'post' => $post,
            'related' => Post::published()
                ->where('id', '!=', $post->id)
                ->latest('published_at')
                ->take(3)
                ->get(),
        ]);
    }
}
