<!doctype html>
<html lang="en">
<head>
<x-layouts.portal>
    <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
        <h1 class="text-indigo-600 text-xl font-semibold mb-2">Access Granted</h1>
        <p class="text-slate-700 mb-2">Your voucher <strong id="activeCode">{{ $voucher->code }}</strong> has been activated.</p>
        <p class="text-slate-500 mb-4">You have <strong id="duration">{{ $voucher->duration_minutes }}</strong> minutes of internet access.</p>

        <div class="mb-4">
            <div class="text-sm text-slate-500">Time remaining:</div>
            <div id="countdown" class="text-2xl font-semibold text-slate-800 mt-1">--:--</div>
        </div>

        <p class="text-sm text-slate-500">Enjoy your session. Close this page to continue browsing.</p>
    </div>

    <script>
        // initialize countdown from server-provided duration (minutes)
        window.addEventListener('DOMContentLoaded', () => {
            const minutes = parseInt(document.getElementById('duration').textContent || '0', 10);
            if (minutes > 0) startCountdown(minutes * 60);
        });
    </script>
</x-layouts.portal>
