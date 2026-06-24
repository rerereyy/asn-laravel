<?php

namespace Tests\Feature;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CampaignTest extends TestCase
{
    use RefreshDatabase;

    public function test_donation_updates_campaign_progress(): void
    {
        $user = User::factory()->create();
        $campaign = Campaign::create([
            'user_id' => $user->id,
            'title' => 'Bantu Anak Sekolah',
            'category' => 'Pendidikan',
            'target_amount' => 20000000,
            'current_amount' => 12450000,
            'donor_count' => 124,
            'status' => 'active',
            'description' => 'Campaign test',
            'cover_image' => 'https://example.com/image.jpg',
        ]);

        $donateResponse = $this->post(route('campaigns.donate', $campaign->id), [
            'amount' => 100000,
            'donor_message' => 'Semoga sukses terus.',
            'is_anonymous' => 0,
        ])->assertRedirect();

        $campaign->refresh();
        $this->assertEquals(12550000, (float) $campaign->current_amount);
        $this->assertEquals(125, $campaign->donor_count);
    }
}
