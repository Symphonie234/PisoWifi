<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Your Voucher</title>
    @vite(['resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 flex items-center justify-center p-6">
    <main class="bg-white max-w-md w-full rounded-xl shadow-lg p-8 text-center">
        <h1 class="text-indigo-600 text-xl font-semibold mb-1">Voucher Generated</h1>
        <p class="text-slate-600 mb-6">Take note of your voucher code below. Enter it into the redemption form to get internet access.</p>

        <div class="mb-6">
            <div class="text-2xl font-bold tracking-wider text-slate-800">{{ $voucher->code }}</div>
            <div class="text-sm text-slate-500 mt-1">Valid for {{ $voucher->duration_minutes }} minutes</div>
        </div>

        <a class="inline-block bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700" href="/">Back to portal</a>
    </main>
</body>
</html>
