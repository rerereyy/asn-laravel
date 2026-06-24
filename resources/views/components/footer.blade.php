<footer class="border-t border-zinc-200 bg-white py-12">
  <div class="mx-auto flex max-w-6xl flex-col gap-10 px-4 md:flex-row md:justify-between md:items-start">
    <div class="space-y-4 md:max-w-sm">
      <div class="flex items-center gap-3 text-emerald-700">
        <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-emerald-100 text-lg font-bold">DK</span>
        <div>
          <p class="text-xl font-semibold">DonasiKita</p>
          <p class="text-sm text-slate-500">Berbagi Jadi Lebih Mudah</p>
        </div>
      </div>
      <p class="text-sm text-slate-600">Platform donasi untuk membantu campaign kesehatan, pendidikan, bencana, dan sosial dengan identitas yang tepercaya.</p>
      <p class="text-sm text-slate-500">Email: support@donasikita.id · Telepon: +62 812 3456 7890</p>
    </div>

    <div class="grid grid-cols-2 gap-8 sm:grid-cols-3">
      <div>
        <h3 class="text-sm font-semibold text-slate-900">Tautan</h3>
        <ul class="mt-4 space-y-2 text-sm text-slate-600">
          <li><a href="{{ route('home') }}" class="hover:text-emerald-600">Beranda</a></li>
          <li><a href="{{ route('campaigns.index') }}" class="hover:text-emerald-600">Campaign</a></li>
          <li><a href="{{ route('about') }}" class="hover:text-emerald-600">About</a></li>
        </ul>
      </div>
      <div>
        <h3 class="text-sm font-semibold text-slate-900">Layanan</h3>
        <ul class="mt-4 space-y-2 text-sm text-slate-600">
          <li>Campaign yang mudah dikelola</li>
          <li>Form donasi jelas</li>
          <li>Statistik transparan</li>
        </ul>
      </div>
      <div>
        <h3 class="text-sm font-semibold text-slate-900">Ikuti Kami</h3>
        <ul class="mt-4 space-y-2 text-sm text-slate-600">
          <li><span>Instagram: @donasikita</span></li>
          <li><span>Facebook: DonasiKita</span></li>
          <li><span>Twitter: @donasikita_id</span></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
