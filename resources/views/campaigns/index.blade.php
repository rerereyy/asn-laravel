<x-layout>
  <section class="bg-linear-to-b from-transparent via-white to-transparent pb-16 pt-32">
    <div class="mx-auto max-w-6xl px-4">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <p class="text-sm uppercase tracking-[0.22em] text-emerald-600">
            Campaign
          </p>

          <h1
            class="bg-linear-to-r mt-3 from-cyan-500 to-purple-700 bg-clip-text text-4xl font-semibold text-transparent">
            Semua Campaign Aktif
          </h1>
        </div>

        <a href="{{ route('campaigns.create') }}"
          class="inline-flex items-center justify-center rounded-full bg-emerald-600 px-6 py-3 text-sm font-semibold text-white hover:bg-emerald-700">
          Tambah Campaign
        </a>
      </div>

<<<<<<< HEAD
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
=======
      {{-- Empty State --}}
      @if ($campaigns->isEmpty())
        <div class="mt-10 rounded-3xl border border-dashed border-zinc-300 bg-white px-8 py-16 text-center shadow-sm">

          <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-100 text-3xl">
            📢
          </div>

          <h2 class="mt-6 text-2xl font-semibold text-slate-900">
            Belum Ada Campaign
          </h2>

          <p class="mx-auto mt-3 max-w-md text-slate-600">
            Saat ini belum ada campaign yang tersedia.
            Jadilah yang pertama membuat campaign dan mulai
            menggalang dukungan dari banyak orang.
          </p>

          <a href="{{ route('campaigns.create') }}"
            class="mt-8 inline-flex items-center justify-center rounded-full bg-emerald-600 px-6 py-3 text-sm font-semibold text-white hover:bg-emerald-700">
            Buat Campaign Pertama
          </a>
        </div>
      @else
        {{-- Campaign List --}}
        <div class="mt-10 grid gap-6 lg:grid-cols-2">
          @foreach ($campaigns as $campaign)
            <article class="rounded-3xl border border-zinc-200 bg-white p-6 shadow-sm transition hover:shadow-md">

              <div class="flex items-start justify-between gap-4">
                <span
                  class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">
                  {{ $campaign->category }}
                </span>

                <span class="text-sm text-slate-500">
                  {{ $campaign->user?->name ?? 'DonasiKita' }}
                </span>
>>>>>>> c75f79e87b48931d73803e14e6191904b66f7b35
              </div>

              <h2 class="mt-4 text-2xl font-semibold text-slate-900">
                {{ $campaign->title }}
              </h2>

              <p class="mt-3 text-slate-600">
                {{ $campaign->excerpt }}
              </p>

              <div class="mt-6 space-y-3 text-sm text-slate-500">
                <div class="flex items-center justify-between">
                  <span>Status</span>
                  <span class="font-semibold text-slate-900">
                    {{ ucfirst($campaign->status) }}
                  </span>
                </div>

                <div class="flex items-center justify-between">
                  <span>Target</span>
                  <span class="font-semibold text-slate-900">
                    Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}
                  </span>
                </div>

                <div class="flex items-center justify-between">
                  <span>Donasi Terkumpul</span>
                  <span class="font-semibold text-slate-900">
                    Rp {{ number_format($campaign->donations_sum_amount ?? 0, 0, ',', '.') }}
                  </span>
                </div>
              </div>

              {{-- Progress --}}
              <div class="mt-5">
                <div class="mb-2 flex justify-between text-xs text-slate-500">
                  <span>Progress</span>
                  <span>{{ $campaign->progressPercent }}%</span>
                </div>

                <div class="h-3 overflow-hidden rounded-full bg-zinc-200">
                  <div class="h-full rounded-full bg-emerald-500" style="width: {{ $campaign->progressPercent }}%">
                  </div>
                </div>
              </div>
<<<<<<< HEAD
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
=======

              <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ route('campaigns.show', $campaign) }}"
                  class="rounded-full border border-emerald-600 px-5 py-2 text-sm font-semibold text-emerald-700 hover:bg-emerald-50">
                  Lihat Detail
                </a>

                @auth
                  <a href="{{ route('campaigns.edit', $campaign) }}"
                    class="rounded-full border border-cyan-600 px-5 py-2 text-sm font-semibold text-cyan-700 hover:bg-cyan-50">
                    Edit
                  </a>

                  <form action="{{ route('campaigns.destroy', $campaign) }}" method="POST" class="inline"
                    onsubmit="return confirm('Yakin ingin menghapus campaign ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                      class="rounded-full border border-red-600 px-5 py-2 text-sm font-semibold text-red-700 hover:bg-red-50">
                      Hapus
                    </button>
                  </form>
                @endauth

                <span class="rounded-full bg-zinc-100 px-4 py-2 text-sm text-slate-600">
                  {{ $campaign->donations_count ?? 0 }} donor
                </span>
              </div>
            </article>
          @endforeach
        </div>
      @endif
>>>>>>> c75f79e87b48931d73803e14e6191904b66f7b35
    </div>
  </section>
</x-layout>
