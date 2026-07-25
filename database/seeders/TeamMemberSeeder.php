<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Demo data only — for local development while real team profiles are
     * being prepared. Does not run outside the local environment.
     */
    public function run(): void
    {
        if (! app()->environment('local')) {
            return;
        }

        $members = [
            ['name' => 'Alexandra Ford', 'role' => 'Managing Director', 'sort_order' => 1],
            ['name' => 'James Whitfield', 'role' => 'Director, M&A Advisory', 'sort_order' => 2],
            ['name' => 'Priya Nair', 'role' => 'Director, Capital Markets', 'sort_order' => 3],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(['name' => $member['name']], $member + ['is_active' => true]);
        }
    }
}
