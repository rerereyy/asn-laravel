@php
  $menus = config('navigation');
@endphp
<header class="fixed top-2 z-50 w-full px-4" x-data="{ open: false }">
  <nav class="shadow-xs mx-auto max-w-5xl rounded-full border border-zinc-200/60 bg-white/40 pl-4 backdrop-blur-xl">
    <div class="flex items-center justify-between">
      {{-- LOGO --}}
      <a href="/" class="overflow-hidden py-2 font-semibold">
        <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm text-emerald-700">
          <span class="rounded-full bg-emerald-500 px-2 py-1 text-white">DK</span>
          <span>DonasiKita</span>
        </span>
      </a>
      {{-- Desktop menu --}}
      <div class="hidden items-center gap-1 self-stretch p-1 text-sm font-medium md:flex">
        @foreach ($menus as $menu)
          @php
            $route = $menu['route'] ?? 'home';
            $isActive = request()->routeIs($route);
          @endphp
          <a href="{{ route($route) }}"
            class="{{ $isActive ? 'shadow-sm bg-white/80 text-zinc-900 border border-zinc-200/60' : 'opacity-80 hover:opacity-100 hover:bg-zinc-500/10' }} flex items-center self-stretch rounded-full px-4 transition-all duration-200 ease-in-out active:scale-95">
            {{ $menu['label'] }}
          </a>
        @endforeach
      </div>

      <div class="hidden items-center gap-2 pr-4 md:flex">
        @auth
          <a href="{{ route('dashboard') }}" class="rounded-full bg-emerald-500 px-4 py-2 text-sm text-white">Dashboard</a>
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button class="rounded-full border border-emerald-500 px-4 py-2 text-sm text-emerald-700 hover:bg-emerald-50">Logout</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="rounded-full border border-emerald-500 bg-white px-4 py-2 text-sm text-emerald-700 hover:bg-emerald-50">Login</a>
          <a href="{{ route('register') }}" class="rounded-full bg-emerald-500 px-4 py-2 text-sm text-white">Register</a>
        @endauth
      </div>

      <button class="pr-4 text-xl md:hidden" @click="open = !open">
        <x-heroicon-o-bars-2 class="size-6" />
      </button>
    </div>
  </nav>
  {{-- Mobile menu --}}
  <div class="fixed inset-0 -z-10" @click="open = false" x-transition x-show="open"></div>
  <div x-show="open" x-transition
    class="fixed inset-x-4 top-14 z-20 flex flex-col rounded-2xl border border-zinc-200/60 bg-white/50 p-2 font-medium backdrop-blur-xl md:hidden">
    @foreach ($menus as $menu)
      @php
        $isActive = request()->routeIs($menu['route'] ?? 'home');
      @endphp
      <a href="{{ route($menu['route'] ?? 'home') }}"
        class="{{ $isActive ? 'text-zinc-800 font-semibold' : 'text-zinc-500' }} p-4 text-lg">
        {{ $menu['label'] }}
      </a>
    @endforeach
  </div>
</header>
