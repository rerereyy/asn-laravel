<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="{{ $description ?? config('brand.description') }}" />

  <title>{{ $title ?? config('brand.title') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <x-navbar />

  <main class="grow">
    {{ $slot }}
  </main>

  <x-footer />
</body>

</html>
