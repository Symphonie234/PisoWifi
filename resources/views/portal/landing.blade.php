<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>PISO-WIFI Portal</title>
    @vite(['resources/js/app.js'])
</head>
</head>
<body class="min-h-screen bg-slate-50 flex items-center justify-center p-6">
    <main class="bg-white max-w-md w-full rounded-xl shadow-lg p-8">
        <h1 class="text-indigo-600 text-xl font-semibold mb-1">PISO-WIFI</h1>
        <p class="text-slate-600 mb-6">Welcome! Insert a coin into the PISO-WIFI machine to get a voucher code.</p>

        <form method="POST" action="/insert-coin" class="mb-4">
            @csrf
            <button class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition" type="submit">I inserted a coin</button>
        </form>

        <p class="text-sm text-slate-500 mb-4">If you already have a voucher, <a class="text-indigo-600 underline" href="#redeem">enter it below</a>.</p>

        <div class="border-t my-4"></div>

        <section id="redeem">
            <h2 class="text-lg font-medium mb-3">Redeem Voucher</h2>
            @if($errors->any())
                <div class="bg-red-50 text-red-800 p-3 rounded-md mb-3">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/redeem" class="flex flex-col sm:flex-row gap-2">
                @csrf
                <input name="code" placeholder="Enter voucher code" class="border rounded-md px-3 py-2 flex-1" />
                <button class="bg-slate-100 text-indigo-600 px-4 py-2 rounded-md hover:bg-slate-200" type="submit">Redeem</button>
            </form>
        </section>
    </main>
</body>
</html>
