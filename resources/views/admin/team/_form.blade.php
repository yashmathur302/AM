@csrf

<x-admin.panel>
    <x-ui.form.input name="name" label="Name" required maxlength="150" :value="$member->name ?? ''" />
    <x-ui.form.input name="role" label="Role / Title" required maxlength="150" :value="$member->role ?? ''" />
    <x-ui.form.textarea name="bio" label="Bio" maxlength="2000" :value="$member->bio ?? ''" rows="4" />
    <x-ui.form.file name="photo" label="Photo" :preview="$member->photo_url ?? null" />
    <x-ui.form.input name="linkedin_url" type="url" label="LinkedIn URL" maxlength="255" :value="$member->linkedin_url ?? ''" />
    <x-ui.form.input name="sort_order" type="number" label="Display order" min="0" :value="$member->sort_order ?? 0" />
    <x-ui.form.checkbox name="is_active" label="Active (visible on site)" :checked="$member->is_active ?? true" />
</x-admin.panel>

<x-ui.button type="submit" variant="primary">Save Team Member</x-ui.button>
