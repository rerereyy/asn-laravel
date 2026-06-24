<x-layout>
  <section class="mt-12 p-4">
    <div class="mx-auto max-w-5xl">
      <div class="shadow-xs max-w-md rounded-xl border border-neutral-200 bg-neutral-50 p-4">
        <h1 class="text-xl font-semibold">Daftar Ide Proyek</h1>
        <br>
        <form action="{{ route('ideas.store') }}" method="POST" class="flex flex-col gap-4">
          @csrf
          <input type="text" name="title" placeholder="Masukkkan ide project" required>
          <input type="text" name="category" placeholder="Masukan Category">
          <input type="text" name="status" placeholder="Status project...">

          <textarea class="rounded-md border border-neutral-200 p-2" name="description" placeholder="Deskripsi project" required></textarea>

          <x-button title="Simpan" />

        </form>
      </div>
      <br>
      <div class="flex flex-wrap gap-4">
        @foreach ($ideas as $idea)
          <div class="shadow-xs flex min-w-60 flex-col gap-2 rounded-xl border border-neutral-200 bg-white p-4">
            <h2 class="font-medium">{{ $idea->title }}</h2>
            <p class="text-sm">{{ $idea->description }}</p>
            <p class="text-sm">{{ $idea->category }}</p>
            <p class="text-sm">{{ $idea->status }}</p>
            <br>
            <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
              @csrf
              @method('DELETE')

              <button class="w-full rounded-xl bg-red-100 p-2 text-sm text-red-500" type="submit">Hapus</button>
            </form>
          </div>
        @endforeach
      </div>
    </div>
  </section>
</x-layout>
