<x-layout>
  <section class="bg-white py-16">
    <div class="mx-auto max-w-6xl px-4">
      <div class="grid gap-10 lg:grid-cols-[1.5fr_1fr]">
        <div class="space-y-6">
          <img class="h-80 w-full rounded-[2rem] object-cover" src="{{ $campaign['cover_image'] }}" alt="{{ $campaign['title'] }}">
          <div class="flex flex-wrap items-center gap-3">
            <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-emerald-700">{{ $campaign['category'] }}</span>
            <span class="text-sm text-slate-500">Deadline: {{ $campaign['deadline'] }}</span>
            <span class="text-sm text-slate-500">Lokasi: {{ $campaign['location'] }}</span>
          </div>
          <h1 class="text-4xl font-semibold text-slate-900">{{ $campaign['title'] }}</h1>
          <p class="text-slate-600 leading-8">{{ $campaign['description'] }}</p>

          <div class="rounded-3xl border border-zinc-200 bg-zinc-50 p-6">
            <div class="flex items-center justify-between text-sm text-slate-600">
              <span>Dana terkumpul</span>
              <span class="font-semibold text-slate-900">Rp {{ number_format($campaign['current'], 0, ',', '.') }}</span>
            </div>
            <div class="mt-4 h-4 overflow-hidden rounded-full bg-zinc-200">
              <div class="h-full rounded-full bg-emerald-500" style="width: {{ min(100, round($campaign['current'] / max(1, $campaign['target']) * 100)) }}%"></div>
            </div>
            <div class="mt-4 flex items-center justify-between text-sm text-slate-600">
              <span>Target</span>
              <span class="font-semibold text-slate-900">Rp {{ number_format($campaign['target'], 0, ',', '.') }}</span>
            </div>
            <div class="mt-3 text-sm text-slate-500">Progress {{ min(100, round($campaign['current'] / max(1, $campaign['target']) * 100)) }}%</div>
          </div>

          <div class="grid gap-4 md:grid-cols-2">
            <div class="rounded-3xl border border-zinc-200 bg-white p-6">
              <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Komentar</p>
              <div class="mt-4 space-y-4">
                @foreach ($comments as $comment)
                  <div class="rounded-2xl bg-zinc-50 p-4">
                    <p class="font-semibold text-slate-900">{{ $comment['name'] }}</p>
                    <p class="mt-2 text-sm text-slate-600">{{ $comment['content'] }}</p>
                    <p class="mt-2 text-xs text-slate-500">{{ $comment['date'] }}</p>
                  </div>
                @endforeach
              </div>
            </div>
            <div class="rounded-3xl border border-zinc-200 bg-white p-6">
              <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Riwayat donasi</p>
              <div class="mt-4 space-y-4">
                @foreach ($donations as $donation)
                  <div class="rounded-2xl bg-zinc-50 p-4">
                    <div class="flex items-center justify-between text-sm text-slate-900">
                      <span>{{ $donation['name'] }}</span>
                      <span class="font-semibold">Rp {{ number_format($donation['amount'], 0, ',', '.') }}</span>
                    </div>
                    <p class="mt-2 text-sm text-slate-600">{{ $donation['message'] }}</p>
                    <p class="mt-2 text-xs text-slate-500">{{ $donation['date'] }}</p>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <aside class="space-y-6">
          <div class="rounded-[2rem] border border-zinc-200 bg-white p-8 shadow-sm">
            <h2 class="text-xl font-semibold text-slate-900">Form Donasi</h2>
            <p class="mt-3 text-sm text-slate-600">Isi nominal donasi dan dukungan Anda. Opsi anonim tersedia.</p>
            <form action="{{ route('campaigns.donate', $campaign['id']) }}" method="POST" class="mt-6 space-y-4">
              @csrf
              <label class="block text-sm font-medium text-slate-700">Nominal Donasi</label>
              <input type="number" name="amount" min="1000" required placeholder="Rp 100.000" class="w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-3 text-slate-900" />
              <label class="block text-sm font-medium text-slate-700">Pesan untuk campaign</label>
              <textarea name="donor_message" rows="4" class="w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-3 text-slate-900" placeholder="Dukungan dan doa untuk campaign." /></textarea>
              <label class="flex items-center gap-3 text-sm text-slate-700">
                <input type="checkbox" name="is_anonymous" value="1" class="h-4 w-4 rounded border-zinc-300 text-emerald-600 focus:ring-emerald-500" />
                Donasi anonim
              </label>
              <button type="submit" class="w-full rounded-full bg-emerald-600 px-6 py-3 text-sm font-semibold text-white hover:bg-emerald-700">Donasi Sekarang</button>
            </form>
          </div>
          <div class="rounded-[2rem] border border-zinc-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-semibold text-slate-900">Informasi Campaign</p>
            <div class="mt-4 space-y-3 text-sm text-slate-600">
              <div class="flex justify-between"><span>Organiser</span><span class="font-semibold text-slate-900">{{ $campaign['organizer'] }}</span></div>
              <div class="flex justify-between"><span>Target</span><span class="font-semibold text-slate-900">Rp {{ number_format($campaign['target'], 0, ',', '.') }}</span></div>
              <div class="flex justify-between"><span>Status</span><span class="font-semibold text-slate-900">{{ ucfirst($campaign['status']) }}</span></div>
            </div>
          </div>
          @auth
            <div class="rounded-[2rem] border border-zinc-200 bg-white p-6 shadow-sm">
              <p class="text-sm font-semibold text-slate-900">Tambah Komentar</p>
              <form action="{{ route('campaigns.comment', $campaign['id']) }}" method="POST" class="mt-4 space-y-4">
                @csrf
                <textarea name="content" rows="4" class="w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-3 text-slate-900" placeholder="Dukung campaign ini dengan kata-kata." required></textarea>
                <button type="submit" class="w-full rounded-full bg-cyan-600 px-6 py-3 text-sm font-semibold text-white hover:bg-cyan-700">Kirim Komentar</button>
              </form>
            </div>
          @else
            <div class="rounded-[2rem] border border-zinc-200 bg-white p-6 shadow-sm text-center">
              <p class="text-sm text-slate-600">Login untuk menulis komentar dan melihat riwayat donasi Anda.</p>
              <a href="{{ route('login') }}" class="mt-4 inline-flex rounded-full bg-emerald-600 px-6 py-3 text-sm font-semibold text-white hover:bg-emerald-700">Login sekarang</a>
            </div>
          @endauth
        </aside>
      </div>
    </div>
  </section>
</x-layout>
