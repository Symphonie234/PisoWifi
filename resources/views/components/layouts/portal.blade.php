<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title ?? 'PISO-WIFI' }}</title>
    @vite(['resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-50 to-white text-slate-800">
  <div class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-2xl">
      <header class="flex items-center gap-4 mb-6">
        <div class="w-12 h-12 rounded-md flex items-center justify-center bg-indigo-600 text-white shadow-md">
          <span class="font-semibold">P</span>
        </div>
        <div>
          <div class="text-lg font-semibold">PISO-WIFI</div>
          <div class="text-sm text-slate-500">Secure, simple pay-and-use Wi‑Fi</div>
        </div>
      </header>

      <main>
        {{ $slot }}
      </main>

      <footer class="mt-8 text-center text-xs text-slate-400">
        &copy; {{ date('Y') }} PisoWifi — Built for kiosks and cafes
      </footer>
    </div>
  </div>
</body>
</html>
