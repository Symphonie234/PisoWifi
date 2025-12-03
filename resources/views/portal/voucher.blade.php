<!doctype html>
<html lang="en">
<x-layouts.portal>
    <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
        <h1 class="text-indigo-600 text-xl font-semibold mb-2">Voucher Generated</h1>
        <p class="text-slate-600 mb-6">Take note of your voucher code below. Redeem it on the portal to start your session.</p>

        <div class="mb-4">
            <div id="voucherCode" class="text-3xl font-extrabold tracking-widest text-slate-800 select-all">{{ $voucher->code }}</div>
            <div class="text-sm text-slate-500 mt-2">Valid for {{ $voucher->duration_minutes }} minutes</div>
        </div>

        <div class="flex items-center justify-center gap-3">
            <button class="bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700" onclick="copyVoucher()">Copy code</button>
            <a class="text-indigo-600 underline" href="/">Back to portal</a>
        </div>
    </div>
</x-layouts.portal>
