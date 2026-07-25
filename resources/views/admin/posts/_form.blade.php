@csrf

<div class="admin-panel">
    <h2>Content</h2>

    <div class="c-form-group">
        <label class="c-form-label" for="title">Title</label>
        <input class="c-form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" required maxlength="200">
        @error('title')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>

    <div class="c-form-group">
        <label class="c-form-label" for="slug">Slug (URL)</label>
        <input class="c-form-control @error('slug') is-invalid @enderror" type="text" id="slug" name="slug" value="{{ old('slug', $post->slug ?? '') }}" required maxlength="220">
        <span class="c-form-hint">Leave matching the title unless you need a custom URL.</span>
        @error('slug')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>

    <div class="c-form-group">
        <label class="c-form-label" for="excerpt">Excerpt</label>
        <textarea class="c-form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" maxlength="320">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
        <span class="c-form-hint">Short summary shown on listing/card views.</span>
        @error('excerpt')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>

    <div class="c-form-group">
        <label class="c-form-label" for="body">Body</label>
        <textarea class="c-form-control @error('body') is-invalid @enderror" id="body" name="body" rows="16" required>{{ old('body', $post->body ?? '') }}</textarea>
        <span class="c-form-hint">Basic HTML allowed (p, h2, h3, ul, ol, a, img, blockquote). Content is sanitized on save.</span>
        @error('body')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>

    <div class="c-form-group">
        <label class="c-form-label" for="featured_image">Featured image</label>
        <input class="c-form-control @error('featured_image') is-invalid @enderror" type="file" id="featured_image" name="featured_image" accept="image/png,image/jpeg,image/webp">
        @if (!empty($post->featured_image_url))
            <img class="c-form-preview" src="{{ $post->featured_image_url }}" alt="" width="160">
        @endif
        @error('featured_image')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>
</div>

<div class="admin-panel">
    <h2>SEO</h2>

    <div class="c-form-group">
        <label class="c-form-label" for="meta_title">Meta title</label>
        <input class="c-form-control @error('meta_title') is-invalid @enderror" type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}" required maxlength="70">
        <span class="c-form-hint">Recommended max 60 characters.</span>
        @error('meta_title')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>

    <div class="c-form-group">
        <label class="c-form-label" for="meta_description">Meta description</label>
        <textarea class="c-form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" maxlength="160" required>{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
        <span class="c-form-hint">Recommended max 155 characters.</span>
        @error('meta_description')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>

    <div class="c-form-group">
        <label class="c-form-label" for="focus_keyword">Focus keyword</label>
        <input class="c-form-control @error('focus_keyword') is-invalid @enderror" type="text" id="focus_keyword" name="focus_keyword" value="{{ old('focus_keyword', $post->focus_keyword ?? '') }}" maxlength="100">
        @error('focus_keyword')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>
</div>

<div class="admin-panel">
    <h2>Publishing</h2>

    <div class="c-form-group">
        <label class="c-form-label" for="status">Status</label>
        <select class="c-form-control @error('status') is-invalid @enderror" id="status" name="status" required>
            <option value="draft" @selected(old('status', $post->status ?? 'draft') === 'draft')>Draft</option>
            <option value="published" @selected(old('status', $post->status ?? '') === 'published')>Published</option>
        </select>
        @error('status')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>

    <div class="c-form-group">
        <label class="c-form-label" for="published_at">Publish date</label>
        <input class="c-form-control @error('published_at') is-invalid @enderror" type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at', isset($post->published_at) ? $post->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}">
        @error('published_at')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>
</div>

<button type="submit" class="c-btn c-btn--primary">Save Post</button>
