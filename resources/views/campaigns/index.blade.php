<x-layout>
  <section class="bg-white py-16">
    <div class="mx-auto max-w-6xl px-4">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <p class="text-sm uppercase tracking-[0.22em] text-emerald-600">Campaign</p>
          <h1 class="mt-3 text-4xl font-semibold text-slate-900">Semua campaign aktif</h1>
        </div>
        <a href="{{ route('campaigns.create') }}" class="inline-flex items-center justify-center rounded-full bg-emerald-600 px-6 py-3 text-sm font-semibold text-white hover:bg-emerald-700">Tambah Campaign</a>
      </div>

      <div class="mt-10 grid gap-6 lg:grid-cols-2">
        @foreach ($campaigns as $campaign)
          <article class="rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm">
            <div class="flex items-start justify-between gap-4">
              <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">{{ $campaign['category'] }}</span>
              <span class="text-sm text-slate-500">{{ $campaign['location'] }}</span>
            </div>
            <h2 class="mt-4 text-2xl font-semibold text-slate-900">{{ $campaign['title'] }}</h2>
            <p class="mt-3 text-slate-600">{{ $campaign['excerpt'] }}</p>
            <div class="mt-6 space-y-3 text-sm text-slate-500">
              <div class="flex items-center justify-between">
                <span>Status</span>
                <span class="font-semibold text-slate-900">{{ ucfirst($campaign['status']) }}</span>
              </div>
              <div class="flex items-center justify-between">
                <span>Target</span>
                <span class="font-semibold text-slate-900">Rp {{ number_format($campaign['target'], 0, ',', '.') }}</span>
              </div>
              <div class="flex items-center justify-between">
                <span>Donasi terkumpul</span>
                <span class="font-semibold text-slate-900">Rp {{ number_format($campaign['current'], 0, ',', '.') }}</span>
              </div>
            </div>
            <div class="mt-5 h-3 overflow-hidden rounded-full bg-zinc-200">
              <div class="h-full rounded-full bg-emerald-500" style="width: {{ min(100, round($campaign['current'] / max(1, $campaign['target']) * 100)) }}%"></div>
            </div>
            <div class="mt-6 flex flex-wrap gap-3">
              <a href="{{ route('campaigns.show', $campaign['id']) }}" class="rounded-full border border-emerald-600 px-5 py-2 text-sm font-semibold text-emerald-700 hover:bg-emerald-50">Lihat Detail</a>
              <span class="rounded-full bg-zinc-100 px-4 py-2 text-sm text-slate-600">{{ $campaign['donors'] }} donor</span>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </section>
</x-layout>
