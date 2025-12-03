<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PISO-WIFI Portal</title>
        @vite(['resources/js/app.js'])
</head>
<body>
    <x-layouts.portal>
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <div class="md:flex md:items-center md:gap-8">
                <div class="flex-1">
                    <h1 class="text-2xl font-bold text-slate-800 mb-2">Pay & Connect</h1>
                    <p class="text-slate-500 mb-6">Insert a coin into the PISO-WIFI machine. We'll generate a short voucher code you can redeem for fast internet access.</p>

                    <form method="POST" action="/insert-coin" class="mb-6">
                        @csrf
                        <button class="w-full md:w-auto bg-gradient-to-r from-indigo-600 to-indigo-500 text-white py-3 px-6 rounded-lg shadow hover:from-indigo-700 transition">I inserted a coin</button>
                    </form>

                    <p class="text-sm text-slate-500">Have a voucher already? <a href="#redeem" class="text-indigo-600 underline">Redeem it here</a>.</p>
                </div>

                <div class="mt-6 md:mt-0 md:w-56 md:flex-shrink-0">
                    <div class="w-full h-40 rounded-lg bg-gradient-to-br from-indigo-50 to-white border border-slate-100 flex items-center justify-center">
                        <div class="text-indigo-600 font-semibold">Coin slot</div>
                    </div>
                </div>
            </div>

            <hr class="my-6" />

            <section id="redeem">
                <h2 class="text-lg font-medium text-slate-800 mb-3">Redeem Voucher</h2>

                @if($errors->any())
                    <div class="bg-red-50 text-red-800 p-3 rounded-md mb-3">
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/redeem" class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    @csrf
                    <input name="code" placeholder="Enter voucher code" class="col-span-2 border rounded-md px-3 py-2" />
                    <button class="bg-indigo-600 text-white rounded-md px-4 py-2 hover:bg-indigo-700" type="submit">Redeem</button>
                </form>
            </section>
        </div>
    </x-layouts.portal>
</body>
</html>
