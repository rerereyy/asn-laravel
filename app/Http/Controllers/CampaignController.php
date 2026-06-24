<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        return view('campaigns.index', [
            'campaigns' => $this->campaigns(),
            'totals' => $this->totals(),
        ]);
    }

    public function show($id)
    {
        $campaign = $this->findCampaign($id);

        if (! $campaign) {
            abort(404);
        }

        return view('campaigns.show', [
            'campaign' => $campaign,
            'donations' => $this->campaignDonations($id),
            'comments' => $this->campaignComments($id),
        ]);
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'target' => 'required|numeric|min:1000',
            'description' => 'required|string',
            'cover_image' => 'nullable|url',
        ]);

        $campaign = [
            'id' => $this->nextCampaignId(),
            'title' => $data['title'],
            'category' => $data['category'],
            'target' => (int) $data['target'],
            'current' => 0,
            'donors' => 0,
            'status' => 'draft',
            'excerpt' => str()->limit($data['description'], 120),
            'description' => $data['description'],
            'cover_image' => $data['cover_image'] ?: 'https://images.unsplash.com/photo-1516569422542-23f5d04b9dca?auto=format&fit=crop&w=1200&q=80',
            'deadline' => now()->addWeeks(4)->format('d M Y'),
            'organizer' => 'DonasiKita',
            'location' => 'Indonesia',
        ];

        session()->push('campaigns', $campaign);

        return redirect()->route('campaigns.index')->with('success', 'Campaign baru berhasil ditambahkan.');
    }

    public function donate(Request $request, $id)
    {
        $campaign = $this->findCampaign($id);

        if (! $campaign) {
            abort(404);
        }

        $data = $request->validate([
            'amount' => 'required|numeric|min:1000',
            'donor_message' => 'nullable|string|max:300',
            'is_anonymous' => 'nullable|boolean',
        ]);

        $donation = [
            'campaign_id' => $id,
            'name' => $data['is_anonymous'] ? 'Anonim' : 'Pengguna DonasiKita',
            'amount' => (int) $data['amount'],
            'message' => $data['donor_message'] ?: 'Semoga bermanfaat untuk campaign ini.',
            'date' => now()->format('d M Y'),
        ];

        session()->push('donations', $donation);

        return back()->with('success', 'Terima kasih atas donasi Anda!');
    }

    public function comment(Request $request, $id)
    {
        $campaign = $this->findCampaign($id);

        if (! $campaign) {
            abort(404);
        }

        $data = $request->validate([
            'content' => 'required|string|max:300',
        ]);

        $comment = [
            'name' => 'Pengguna DonasiKita',
            'content' => $data['content'],
            'date' => now()->format('d M Y'),
        ];

        session()->push("comments.$id", $comment);

        return back()->with('success', 'Komentar Anda telah ditambahkan.');
    }

    private function campaigns()
    {
        return array_merge($this->sampleCampaigns(), session('campaigns', []));
    }

    private function sampleCampaigns()
    {
        return [
            [
                'id' => 1,
                'title' => 'Bantu Anak Sekolah',
                'category' => 'Pendidikan',
                'target' => 20000000,
                'current' => 12450000,
                'donors' => 124,
                'status' => 'active',
                'excerpt' => 'Dukung pembelian buku, seragam, dan perangkat belajar untuk anak-anak kurang mampu.',
                'description' => 'Campaign ini membantu anak-anak dari keluarga kurang mampu mendapatkan kebutuhan sekolah, seperti buku, seragam, tas, dan alat tulis agar mereka tetap semangat belajar.',
                'cover_image' => 'https://images.unsplash.com/photo-1554774853-bf4c20587658?auto=format&fit=crop&w=1200&q=80',
                'deadline' => '30 Juli 2026',
                'organizer' => 'DonasiKita',
                'location' => 'Jakarta',
            ],
            [
                'id' => 2,
                'title' => 'Rumah Aman Korban Banjir',
                'category' => 'Bencana',
                'target' => 50000000,
                'current' => 34200000,
                'donors' => 298,
                'status' => 'active',
                'excerpt' => 'Bangun hunian sementara dan paket darurat untuk keluarga terdampak banjir.',
                'description' => 'Banjir meninggalkan banyak keluarga tanpa tempat tinggal. Dana ini akan digunakan untuk hunian sementara, selimut, dan logistik dasar di area terdampak.',
                'cover_image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80',
                'deadline' => '20 Agustus 2026',
                'organizer' => 'DonasiKita',
                'location' => 'Bandung',
            ],
            [
                'id' => 3,
                'title' => 'Ambulans Gratis untuk Puskesmas',
                'category' => 'Kesehatan',
                'target' => 32000000,
                'current' => 19800000,
                'donors' => 187,
                'status' => 'active',
                'excerpt' => 'Sediakan ambulans dan logistik kesehatan untuk layanan Puskesmas di daerah terpencil.',
                'description' => 'Dana akan digunakan untuk membeli ambulans, obat-obatan penting, dan perlengkapan medis pendukung di puskesmas yang membutuhkan.',
                'cover_image' => 'https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&w=1200&q=80',
                'deadline' => '15 Juli 2026',
                'organizer' => 'DonasiKita',
                'location' => 'Yogyakarta',
            ],
            [
                'id' => 4,
                'title' => 'Paket Sembako Peduli Lansia',
                'category' => 'Sosial',
                'target' => 13000000,
                'current' => 10100000,
                'donors' => 83,
                'status' => 'active',
                'excerpt' => 'Berikan paket sembako dan kebutuhan sehari-hari untuk lansia yang tinggal sendiri.',
                'description' => 'Kami mengumpulkan dana untuk paket sembako, vitamin, dan kebutuhan rumah tangga ringan bagi lansia yang membutuhkan dukungan sosial dan kesehatan.',
                'cover_image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=1200&q=80',
                'deadline' => '22 Juli 2026',
                'organizer' => 'DonasiKita',
                'location' => 'Surabaya',
            ],
        ];
    }

    private function totals()
    {
        $campaigns = $this->campaigns();

        return [
            'donations' => array_sum(array_map(fn($item) => $item['current'], $campaigns)),
            'campaigns' => count($campaigns),
            'active' => count(array_filter($campaigns, fn($item) => $item['status'] === 'active')),
            'donors' => array_sum(array_map(fn($item) => $item['donors'], $campaigns)),
        ];
    }

    private function campaignDonations($id)
    {
        $default = [
            ['name' => 'Rina', 'amount' => 150000, 'message' => 'Semoga cepat sukses!', 'date' => '20 Juni 2026'],
            ['name' => 'Budi', 'amount' => 250000, 'message' => 'Turut membantu.' , 'date' => '18 Juni 2026'],
            ['name' => 'Dewi', 'amount' => 100000, 'message' => 'Semoga bermanfaat.', 'date' => '16 Juni 2026'],
        ];

        $saved = array_filter(session('donations', []), fn($donation) => $donation['campaign_id'] === (int) $id);

        return array_merge($default, array_values($saved));
    }

    private function campaignComments($id)
    {
        $default = [
            ['name' => 'Andi', 'content' => 'Semangat terus untuk timnya!', 'date' => '21 Juni 2026'],
            ['name' => 'Sari', 'content' => 'Semoga target cepat tercapai.', 'date' => '19 Juni 2026'],
        ];

        return array_merge($default, session("comments.$id", []));
    }

    private function findCampaign($id)
    {
        return collect($this->campaigns())->first(fn($campaign) => $campaign['id'] === (int) $id);
    }

    private function nextCampaignId()
    {
        $campaigns = $this->campaigns();

        return empty($campaigns) ? 1 : max(array_column($campaigns, 'id')) + 1;
    }
}
