<x-layout>
  <section class="bg-slate-50 py-20">
    <div class="mx-auto max-w-6xl px-4">
      <div class="max-w-3xl">
        <p class="text-sm uppercase tracking-[0.24em] text-cyan-600">Admin Dashboard</p>
        <h1 class="mt-3 text-4xl font-semibold text-slate-900 sm:text-5xl">Ringkasan pengelolaan campaign</h1>
        <p class="mt-4 text-lg text-slate-600">Pantau statistik utama dan progres campaign terbaru dalam satu tampilan.
        </p>
      </div>

      <div class="mt-10 grid gap-6 md:grid-cols-4">
        <article class="rounded-3xl bg-white p-6 shadow-sm">
          <p class="text-sm uppercase tracking-[0.2em] text-cyan-600">Total campaign</p>
          <h2 class="mt-4 text-4xl font-semibold text-slate-900">{{ $stats['total_campaigns'] }}</h2>
        </article>
        <article class="rounded-3xl bg-white p-6 shadow-sm">
          <p class="text-sm uppercase tracking-[0.2em] text-cyan-600">Campaign aktif</p>
          <h2 class="mt-4 text-4xl font-semibold text-slate-900">{{ $stats['active_campaigns'] }}</h2>
        </article>
        <article class="rounded-3xl bg-white p-6 shadow-sm">
          <p class="text-sm uppercase tracking-[0.2em] text-cyan-600">Donatur</p>
          <h2 class="mt-4 text-4xl font-semibold text-slate-900">
            {{ number_format($stats['total_donors'], 0, ',', '.') }}</h2>
        </article>
        <article class="rounded-3xl bg-white p-6 shadow-sm">
          <p class="text-sm uppercase tracking-[0.2em] text-cyan-600">Total donasi</p>
          <h2 class="mt-4 text-3xl font-semibold text-slate-900">Rp
            {{ number_format($stats['total_donations'], 0, ',', '.') }}</h2>
        </article>
      </div>

      <div class="mt-10 rounded-3xl bg-white p-8 shadow-sm">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
          <div>
            <p class="text-sm uppercase tracking-[0.2em] text-cyan-600">Campaign terbaru</p>
            <h2 class="mt-2 text-2xl font-semibold text-slate-900">Progres penggalangan dana</h2>
          </div>
          <a href="{{ route('campaigns.index') }}" class="text-sm font-semibold text-cyan-700 hover:text-cyan-900">Lihat
            semua campaign</a>
        </div>

        <div class="mt-6 space-y-4">
          @foreach ($recentCampaigns as $campaign)
            <article class="rounded-2xl border border-slate-200 p-5">
              <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                  <h3 class="font-semibold text-slate-900">{{ $campaign['title'] }}</h3>
                  <p class="text-sm text-slate-500">Target Rp {{ number_format($campaign['target'], 0, ',', '.') }}</p>
                </div>
                <span class="text-sm font-semibold text-emerald-700">Rp
                  {{ number_format($campaign['current'], 0, ',', '.') }}</span>
              </div>
              <div class="mt-4 h-3 overflow-hidden rounded-full bg-slate-100">
                <div class="h-full rounded-full bg-cyan-500"
                  style="width: {{ min(100, round(($campaign['current'] / max(1, $campaign['target'])) * 100)) }}%">
                </div>
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </div>
  </section>
</x-layout>
