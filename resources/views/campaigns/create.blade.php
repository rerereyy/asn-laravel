<x-layout>
  <section class="bg-emerald-50 py-16 pt-32">
    <div class="mx-auto max-w-3xl px-4">
      <div class="rounded-4xl bg-white p-10 shadow-sm">
        <h1 class="text-3xl font-semibold text-slate-900">Buat Campaign Baru</h1>
        <p class="mt-3 text-slate-600">Isi detail campaign untuk membantu penggalangan dana Anda lebih mudah ditemukan.
        </p>
        <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data" class="mt-10 space-y-6">
          @csrf
          <div>
            <label class="text-sm font-medium text-slate-700">Judul Campaign</label>
            <input type="text" name="title" required
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-slate-900"
              placeholder="Contoh: Bantu Anak Sekolah" />
          </div>
          <div>
            <label class="text-sm font-medium text-slate-700">Kategori</label>
            <select name="category" required
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-slate-900">
              <option value="">Pilih kategori</option>
              @foreach (config('brand.categories') as $category)
                <option value="{{ $category }}">{{ $category }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label class="text-sm font-medium text-slate-700">Target Donasi (Rp)</label>
            <input type="number" name="target_amount" min="1000" required
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-slate-900"
              placeholder="25000000" />
          </div>
          <div>
            <label class="text-sm font-medium text-slate-700">Deskripsi Campaign</label>
            <textarea name="description" rows="6" required
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-slate-900"
              placeholder="Jelaskan tujuan, kebutuhan, dan manfaat campaign Anda."></textarea>
          </div>
          <div>
            <label class="text-sm font-medium text-slate-700">Gambar Sampul Campaign</label>
<<<<<<< HEAD
     <input type="file" name="image" accept="image/*" required
    class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-sm text-zinc-500 file:mr-4 file:rounded-xl file:border-0 file:bg-emerald-600 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-emerald-700" />
</div>
=======
            <input type="file" name="cover_image" accept="image/*" required
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-sm text-zinc-500 file:mr-4 file:rounded-xl file:border-0 file:bg-emerald-600 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-emerald-700" />
          </div>
>>>>>>> c75f79e87b48931d73803e14e6191904b66f7b35
          <button type="submit"
            class="inline-flex items-center justify-center rounded-full bg-emerald-600 px-8 py-3 text-sm font-semibold text-white hover:bg-emerald-700">Simpan
            Campaign</button>
        </form>
      </div>
    </div>
  </section>
</x-layout>
