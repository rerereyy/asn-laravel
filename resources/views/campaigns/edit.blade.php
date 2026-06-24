<x-layout>
  <section class="bg-emerald-50 py-16 pt-32">
    <div class="mx-auto max-w-3xl px-4">
      <div class="rounded-4xl bg-white p-10 shadow-sm">
        <h1 class="text-3xl font-semibold text-slate-900">Edit Campaign</h1>
        <p class="mt-3 text-slate-600">Perbarui detail campaign Anda.</p>
        <form action="{{ route('campaigns.update', $campaign) }}" method="POST" class="mt-10 space-y-6"
          enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div>
            <label class="text-sm font-medium text-slate-700">Judul Campaign</label>
            <input type="text" name="title" value="{{ $campaign->title }}" required
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-slate-900"
              placeholder="Contoh: Bantu Anak Sekolah" />
          </div>
          <div>
            <label class="text-sm font-medium text-slate-700">Kategori</label>
            <select name="category" required
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-slate-900">
              <option value="">Pilih kategori</option>
              @foreach (config('brand.categories') as $category)
                <option value="{{ $category }}" {{ $campaign->category === $category ? 'selected' : '' }}>
                  {{ $category }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label class="text-sm font-medium text-slate-700">Target Donasi (Rp)</label>
            <input type="number" name="target_amount" min="1000" value="{{ $campaign->target_amount }}" required
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-slate-900"
              placeholder="25000000" />
          </div>
          <div>
            <label class="text-sm font-medium text-slate-700">Status</label>
            <select name="status" required
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-slate-900">
              <option value="draft" {{ $campaign->status === 'draft' ? 'selected' : '' }}>Draft</option>
              <option value="active" {{ $campaign->status === 'active' ? 'selected' : '' }}>Aktif</option>
              <option value="completed" {{ $campaign->status === 'completed' ? 'selected' : '' }}>Selesai</option>
              <option value="cancelled" {{ $campaign->status === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
          </div>
          <div>
            <label class="text-sm font-medium text-slate-700">Deskripsi Campaign</label>
            <textarea name="description" rows="6" required
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-slate-900"
              placeholder="Jelaskan tujuan, kebutuhan, dan manfaat campaign Anda.">{{ $campaign->description }}</textarea>
          </div>
          <div>
            <label class="mb-4 block text-sm font-medium text-slate-700">Gambar Sampul</label>
            @if ($campaign->cover_image)
              <div class="mb-4">
                <img src="{{ Storage::url($campaign->cover_image) }}" alt="{{ $campaign->title }}"
                  class="h-40 w-full rounded-2xl object-cover">
              </div>
            @endif
            <input type="file" accept="image/*" name="cover_image"
              class="mt-3 w-full rounded-2xl border border-zinc-200 bg-zinc-50 p-4 text-slate-900"
              placeholder="https://" />
          </div>
          <div class="flex gap-4">
            <a href="{{ route('campaigns.show', $campaign) }}"
              class="inline-flex items-center justify-center rounded-full border border-zinc-300 px-8 py-3 text-sm font-semibold text-slate-700 hover:bg-zinc-50">Batal</a>
            <button type="submit"
              class="inline-flex items-center justify-center rounded-full bg-emerald-600 px-8 py-3 text-sm font-semibold text-white hover:bg-emerald-700">Update
              Campaign</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-layout>
