<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Access Granted</title>
    @vite(['resources/js/app.js'])
</head>
<body class="page">
    <main class="card">
        <h1 class="brand">Access Granted</h1>
        <p class="lead">Your voucher <strong>{{ $voucher->code }}</strong> has been activated.</p>
        <p class="meta">You have <strong>{{ $voucher->duration_minutes }} minutes</strong> of internet access.</p>

        <p>Enjoy your session. Close this page to continue browsing.</p>
    </main>
</body>
</html>
