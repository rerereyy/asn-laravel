<x-layout>
  <section class="relative overflow-hidden bg-slate-50 pb-20 pt-32">
    <div class="absolute inset-x-0 top-0 -z-10 h-72 bg-emerald-100/70"></div>

    <div class="mx-auto max-w-6xl px-4">
      <div class="flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
        <div class="max-w-3xl">
          <p class="text-sm uppercase tracking-[0.24em] text-emerald-600">Dashboard</p>
          <h1
            class="bg-linear-to-r mt-3 from-cyan-500 to-purple-700 bg-clip-text py-2 text-4xl font-semibold text-transparent sm:text-5xl">
            Selamat datang, {{ $user->name }}</h1>
          <p class="mt-4 max-w-2xl text-lg text-slate-600">Pantau ringkasan aktivitas Anda, lihat donasi terbaru, dan
            lanjutkan campaign yang sudah dibuat.</p>
        </div>

        <div class="rounded-3xl border border-emerald-100 bg-white p-6 shadow-sm">
          <p class="text-sm uppercase tracking-[0.2em] text-emerald-600">Akun</p>
          <div class="mt-3 space-y-2 text-sm text-slate-600">
            <p><span class="font-semibold text-slate-900">Nama:</span> {{ $user->name }}</p>
            <p><span class="font-semibold text-slate-900">Email:</span> {{ $user->email }}</p>
          </div>
          <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf
            <button type="submit"
              class="inline-flex w-full items-center justify-center rounded-full border border-emerald-500 px-4 py-3 text-sm font-semibold text-emerald-700 hover:bg-emerald-50">Logout</button>
          </form>
        </div>
      </div>

      <div class="mt-10 grid gap-6 md:grid-cols-3">
        <article class="rounded-3xl bg-white p-8 shadow-sm">
          <p class="text-sm uppercase tracking-[0.2em] text-emerald-600">Campaign dibuat</p>
          <h2 class="mt-4 text-4xl font-semibold text-slate-900">{{ count($createdCampaigns) }}</h2>
          <p class="mt-2 text-sm text-slate-600">Campaign yang sedang Anda kelola.</p>
        </article>
        <article class="rounded-3xl bg-white p-8 shadow-sm">
          <p class="text-sm uppercase tracking-[0.2em] text-emerald-600">Donasi terbaru</p>
          <h2 class="mt-4 text-4xl font-semibold text-slate-900">{{ count($recentDonations) }}</h2>
          <p class="mt-2 text-sm text-slate-600">Riwayat donasi yang tercatat di dashboard.</p>
        </article>
        <article class="rounded-3xl bg-white p-8 shadow-sm">
          <p class="text-sm uppercase tracking-[0.2em] text-emerald-600">Status aktif</p>
          <h2 class="mt-4 text-4xl font-semibold text-slate-900">
            {{ collect($createdCampaigns)->where('status', 'Active')->count() }}</h2>
          <p class="mt-2 text-sm text-slate-600">Campaign yang masih berjalan.</p>
        </article>
      </div>

      <div class="mt-10 grid gap-6 lg:grid-cols-2">
        <section class="rounded-3xl bg-white p-8 shadow-sm">
          <div class="flex items-center justify-between gap-4">
            <div>
              <p class="text-sm uppercase tracking-[0.2em] text-emerald-600">Donasi terbaru</p>
              <h2 class="mt-2 text-2xl font-semibold text-slate-900">Aktivitas donasi</h2>
            </div>
            <a href="{{ route('campaigns.index') }}"
              class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">Lihat campaign</a>
          </div>

          <div class="mt-6 space-y-4">
            @foreach ($recentDonations as $donation)
              <article class="rounded-2xl border border-slate-200 bg-slate-50 p-5">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                  <div>
                    <h3 class="font-semibold text-slate-900">{{ $donation->campaign?->title ?? 'Campaign' }}</h3>
                    <p class="text-sm text-slate-500">{{ $donation['date'] }}</p>
                  </div>
                  <span class="text-lg font-semibold text-emerald-700">Rp
                    {{ number_format($donation['amount'], 0, ',', '.') }}</span>
                </div>
              </article>
            @endforeach
          </div>
        </section>

        <section class="rounded-3xl bg-white p-8 shadow-sm">
          <div class="flex items-center justify-between gap-4">
            <div>
              <p class="text-sm uppercase tracking-[0.2em] text-emerald-600">Campaign Anda</p>
              <h2 class="mt-2 text-2xl font-semibold text-slate-900">Daftar campaign dibuat</h2>
            </div>
            <a href="{{ route('campaigns.create') }}"
              class="text-sm font-semibold text-emerald-700 hover:text-emerald-900">Tambah campaign</a>
          </div>

          <div class="mt-6 space-y-4">
            @foreach ($createdCampaigns as $campaign)
              <article class="rounded-2xl border border-slate-200 p-5">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                  <div>
                    <h3 class="font-semibold text-slate-900">{{ $campaign['title'] }}</h3>
                    <p class="text-sm text-slate-500">Campaign milik akun Anda</p>
                  </div>
                  <span
                    class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">{{ $campaign['status'] }}</span>
                </div>
              </article>
            @endforeach
          </div>
        </section>
      </div>
    </div>
  </section>
</x-layout>
