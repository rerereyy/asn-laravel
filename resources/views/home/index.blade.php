<x-layout>
  <section class="relative overflow-hidden bg-emerald-50 py-20">
    <div class="mx-auto max-w-6xl px-4 text-center">
      <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-4 py-2 text-sm font-semibold text-emerald-700">DonasiKita</span>
      <h1 class="mt-8 text-4xl font-semibold text-slate-900 sm:text-5xl">Berbagi jadi lebih mudah untuk semua campaign sosial</h1>
      <p class="mx-auto mt-6 max-w-3xl text-lg text-slate-600">Platform donasi dan penggalangan dana yang ramah, profesional, dan mudah diakses untuk organisasi maupun individu.</p>
      <div class="mt-10 flex flex-col gap-3 justify-center sm:flex-row">
        <a href="{{ route('campaigns.index') }}" class="inline-flex items-center justify-center rounded-full bg-emerald-600 px-8 py-3 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700">Lihat Campaign</a>
        <a href="{{ route('campaigns.create') }}" class="inline-flex items-center justify-center rounded-full border border-emerald-600 bg-white px-8 py-3 text-sm font-semibold text-emerald-700 shadow-sm hover:bg-emerald-50">Buat Campaign</a>
      </div>
    </div>
  </section>

  <section class="px-4 py-16">
    <div class="mx-auto max-w-6xl">
      <div class="grid gap-6 md:grid-cols-3">
        <div class="rounded-3xl bg-white p-8 shadow-sm">
          <p class="text-sm uppercase tracking-[0.2em] text-emerald-600">Statistik</p>
          <h2 class="mt-4 text-3xl font-semibold text-slate-900">{{ number_format($stats['total_donations'], 0, ',', '.') }}</h2>
          <p class="mt-2 text-sm text-slate-600">Total dana terkumpul</p>
        </div>
        <div class="rounded-3xl bg-white p-8 shadow-sm">
          <p class="text-sm uppercase tracking-[0.2em] text-emerald-600">Donatur</p>
          <h2 class="mt-4 text-3xl font-semibold text-slate-900">{{ $stats['total_donors'] }}</h2>
          <p class="mt-2 text-sm text-slate-600">Donatur aktif</p>
        </div>
        <div class="rounded-3xl bg-white p-8 shadow-sm">
          <p class="text-sm uppercase tracking-[0.2em] text-emerald-600">Campaign</p>
          <h2 class="mt-4 text-3xl font-semibold text-slate-900">{{ $stats['active_campaigns'] }}</h2>
          <p class="mt-2 text-sm text-slate-600">Campaign aktif saat ini</p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-16">
    <div class="mx-auto max-w-6xl px-4">
      <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
        <div>
          <p class="text-sm uppercase tracking-[0.2em] text-emerald-600">Kategori</p>
          <h2 class="mt-3 text-3xl font-semibold text-slate-900">Campaign untuk semua tujuan</h2>
        </div>
        <p class="max-w-xl text-sm text-slate-600">Temukan campaign kesehatan, pendidikan, bencana, dan sosial yang bisa Anda dukung dengan percaya diri.</p>
      </div>
      <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($categories as $category)
          <span class="rounded-3xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-700">{{ $category }}</span>
        @endforeach
      </div>
    </div>
  </section>

  <section class="px-4 py-16">
    <div class="mx-auto max-w-6xl">
      <div class="mb-10 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <div>
          <p class="text-sm uppercase tracking-[0.2em] text-emerald-600">Campaign Unggulan</p>
          <h2 class="mt-3 text-3xl font-semibold text-slate-900">Dukung cerita nyata yang sedang berjalan</h2>
        </div>
        <a href="{{ route('campaigns.index') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">Lihat semua campaign →</a>
      </div>
      <div class="grid gap-6 lg:grid-cols-2">
        @foreach ($featuredCampaigns as $campaign)
          <article class="overflow-hidden rounded-3xl bg-white shadow-sm">
            <img class="h-64 w-full object-cover" src="{{ $campaign['image'] }}" alt="{{ $campaign['title'] }}">
            <div class="p-8">
              <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-emerald-700">{{ $campaign['category'] }}</span>
              <h3 class="mt-4 text-2xl font-semibold text-slate-900">{{ $campaign['title'] }}</h3>
              <p class="mt-3 text-slate-600">{{ $campaign['excerpt'] }}</p>
              <div class="mt-6 space-y-4">
                <div class="flex items-center justify-between text-sm text-slate-500">
                  <span>{{ $campaign['donors'] }} donor</span>
                  <span>{{ number_format($campaign['current'], 0, ',', '.') }} / {{ number_format($campaign['target'], 0, ',', '.') }}</span>
                </div>
                <div class="h-3 overflow-hidden rounded-full bg-zinc-200">
                  <div class="h-full rounded-full bg-emerald-500" style="width: {{ min(100, round($campaign['current'] / $campaign['target'] * 100)) }}%"></div>
                </div>
              </div>
              <a href="{{ $campaign['route'] }}" class="mt-8 inline-flex items-center justify-center rounded-full bg-emerald-600 px-6 py-3 text-sm font-semibold text-white hover:bg-emerald-700">Donasi Sekarang</a>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  <section class="bg-emerald-50 py-16">
    <div class="mx-auto max-w-6xl px-4">
      <div class="text-center">
        <p class="text-sm uppercase tracking-[0.2em] text-emerald-600">Testimoni</p>
        <h2 class="mt-3 text-3xl font-semibold text-slate-900">Cerita pengguna yang percaya pada DonasiKita</h2>
      </div>
      <div class="mt-10 grid gap-6 md:grid-cols-2">
        @foreach ($testimonials as $quote)
          <div class="rounded-3xl bg-white p-8 shadow-sm">
            <p class="text-slate-600">“{{ $quote['text'] }}”</p>
            <p class="mt-6 font-semibold text-slate-900">{{ $quote['name'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="px-4 py-16">
    <div class="mx-auto max-w-6xl">
      @include('home.team')
    </div>
  </section>
</x-layout>
