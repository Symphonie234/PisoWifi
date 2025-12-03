<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Access Granted</title>
    @vite(['resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 flex items-center justify-center p-6">
    <main class="bg-white max-w-md w-full rounded-xl shadow-lg p-8 text-center">
        <h1 class="text-indigo-600 text-xl font-semibold mb-1">Access Granted</h1>
        <p class="text-slate-700 mb-2">Your voucher <strong>{{ $voucher->code }}</strong> has been activated.</p>
        <p class="text-slate-500 mb-4">You have <strong>{{ $voucher->duration_minutes }} minutes</strong> of internet access.</p>

        <p class="text-sm text-slate-500">Enjoy your session. Close this page to continue browsing.</p>
    </main>
</body>
</html>
