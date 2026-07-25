@csrf

<div class="admin-panel">
    <div class="c-form-group">
        <label class="c-form-label" for="name">Name</label>
        <input class="c-form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name', $member->name ?? '') }}" required maxlength="150">
        @error('name')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>

    <div class="c-form-group">
        <label class="c-form-label" for="role">Role / Title</label>
        <input class="c-form-control @error('role') is-invalid @enderror" type="text" id="role" name="role" value="{{ old('role', $member->role ?? '') }}" required maxlength="150">
        @error('role')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>

    <div class="c-form-group">
        <label class="c-form-label" for="bio">Bio</label>
        <textarea class="c-form-control @error('bio') is-invalid @enderror" id="bio" name="bio" maxlength="2000">{{ old('bio', $member->bio ?? '') }}</textarea>
        @error('bio')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>

    <div class="c-form-group">
        <label class="c-form-label" for="photo">Photo</label>
        <input class="c-form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo" accept="image/png,image/jpeg,image/webp">
        @if (!empty($member->photo_url))
            <img class="c-form-preview" src="{{ $member->photo_url }}" alt="" width="120">
        @endif
        @error('photo')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>

    <div class="c-form-group">
        <label class="c-form-label" for="linkedin_url">LinkedIn URL</label>
        <input class="c-form-control @error('linkedin_url') is-invalid @enderror" type="url" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url', $member->linkedin_url ?? '') }}" maxlength="255">
        @error('linkedin_url')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>

    <div class="c-form-group">
        <label class="c-form-label" for="sort_order">Display order</label>
        <input class="c-form-control @error('sort_order') is-invalid @enderror" type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $member->sort_order ?? 0) }}" min="0">
        @error('sort_order')<span class="c-form-error">{{ $message }}</span>@enderror
    </div>

    <div class="c-form-group">
        <label class="c-form-label">
            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $member->is_active ?? true))> Active (visible on site)
        </label>
    </div>
</div>

<button type="submit" class="c-btn c-btn--primary">Save Team Member</button>
