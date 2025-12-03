<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Your Voucher</title>
    @vite(['resources/js/app.js'])
</head>
<body class="page">
    <main class="card">
        <h1 class="brand">Voucher Generated</h1>
        <p class="lead">Take note of your voucher code below. Enter it into the redemption form to get internet access.</p>

        <div class="voucher">
            <div class="code">{{ $voucher->code }}</div>
            <div class="meta">Valid for {{ $voucher->duration_minutes }} minutes</div>
        </div>

        <a class="primary" href="/">Back to portal</a>
    </main>
</body>
</html>
