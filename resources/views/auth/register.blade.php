<x-layout>
  <section class="bg-emerald-50 py-20 pt-32">
    <div class="mx-auto max-w-md px-4">
      <div class="rounded-4xl bg-white p-10 shadow-sm">
        <h1 class="text-3xl font-semibold text-slate-900">Daftar akun DonasiKita</h1>
        <p class="mt-3 text-slate-600">Isi data Anda untuk membuat akun dan masuk menggunakan email.</p>
        <form action="{{ url('/register') }}" method="POST" class="mt-8 space-y-5">
          @csrf
          <div>
            <label class="block text-sm font-medium text-slate-700">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" required
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-slate-900"
              placeholder="Nama Anda" />
            @error('name')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-slate-900"
              placeholder="Email Anda" />
            @error('email')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700">Password</label>
            <input type="password" name="password" required
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-slate-900"
              placeholder="Password" />
            @error('password')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-slate-900"
              placeholder="Ulangi password" />
          </div>
          <button type="submit"
            class="w-full rounded-full bg-emerald-600 px-6 py-3 text-sm font-semibold text-white hover:bg-emerald-700">Daftar</button>
        </form>
        <p class="mt-6 text-center text-sm text-slate-600">Sudah punya akun? <a href="{{ route('login') }}"
            class="font-semibold text-emerald-700">Login di sini</a></p>
      </div>
    </div>
  </section>
</x-layout>
