@php
  $role = ['Team Lead', 'UI + Deploy', 'Isi sendiri'];
@endphp

<div class="mx-auto flex max-w-5xl flex-wrap justify-center gap-4">
  @foreach ($teams as $i => $team)
    <article class="min-w-full space-y-4 rounded-xl bg-white px-4 py-8 text-center shadow-sm sm:min-w-72">
      <div>
        <img
          src="https://ui-avatars.com/api/?name={{ urlencode($team['nama']) }}&background=06b6d4&color=ffffff&size=128"
          alt="" class="mx-auto block h-20 w-auto rounded-full">
      </div>
      <div class="mt-2 space-y-2 pt-4">
        <span class="rounded-full bg-cyan-100 px-3 py-1.5 text-sm font-semibold text-cyan-700">
          {{ $role[$i] }}
        </span>
        <h3 class="mt-4 text-lg font-medium">
          {{ $team['nama'] }}
        </h3>
        <p>
          {{ $team['nim'] }}
        </p>
      </div>
    </article>
  @endforeach
</div>
