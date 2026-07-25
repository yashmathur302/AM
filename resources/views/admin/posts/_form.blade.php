@csrf

<x-admin.panel>
    <h2 class="mb-4">Content</h2>

    <x-ui.form.input name="title" label="Title" required maxlength="200" :value="$post->title ?? ''" />
    <x-ui.form.input name="slug" label="Slug (URL)" required maxlength="220" :value="$post->slug ?? ''" hint="Leave matching the title unless you need a custom URL." />
    <x-ui.form.textarea name="excerpt" label="Excerpt" maxlength="320" :value="$post->excerpt ?? ''" hint="Short summary shown on listing/card views." rows="3" />
    <x-ui.form.textarea name="body" label="Body" required :value="$post->body ?? ''" rows="16" hint="Basic HTML allowed (p, h2, h3, ul, ol, a, img, blockquote). Content is sanitized on save." />
    <x-ui.form.file name="featured_image" label="Featured image" :preview="$post->featured_image_url ?? null" />
</x-admin.panel>

<x-admin.panel>
    <h2 class="mb-4">SEO</h2>

    <x-ui.form.input name="meta_title" label="Meta title" required maxlength="70" :value="$post->meta_title ?? ''" hint="Recommended max 60 characters." />
    <x-ui.form.textarea name="meta_description" label="Meta description" required maxlength="160" :value="$post->meta_description ?? ''" hint="Recommended max 155 characters." rows="3" />
    <x-ui.form.input name="focus_keyword" label="Focus keyword" maxlength="100" :value="$post->focus_keyword ?? ''" />
</x-admin.panel>

<x-admin.panel>
    <h2 class="mb-4">Publishing</h2>

    <x-ui.form.select name="status" label="Status" required>
        <option value="draft" @selected(old('status', $post->status ?? 'draft') === 'draft')>Draft</option>
        <option value="published" @selected(old('status', $post->status ?? '') === 'published')>Published</option>
    </x-ui.form.select>

    <x-ui.form.input
        name="published_at"
        type="datetime-local"
        label="Publish date"
        :value="isset($post->published_at) ? $post->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')"
    />
</x-admin.panel>

<x-ui.button type="submit" variant="primary">Save Post</x-ui.button>
