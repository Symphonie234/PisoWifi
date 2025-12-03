<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>PISO-WIFI Portal</title>
    @vite(['resources/js/app.js'])
</head>
<body class="page">
    <main class="card">
        <h1 class="brand">PISO-WIFI</h1>
        <p class="lead">Welcome! Insert a coin into the PISO-WIFI machine to get a voucher code.</p>

        <form method="POST" action="/insert-coin">
            @csrf
            <button class="primary" type="submit">I inserted a coin</button>
        </form>

        <p class="tip">If you already have a voucher, <a href="#redeem">enter it below</a>.</p>

        <hr>

        <section id="redeem">
            <h2>Redeem Voucher</h2>
            @if($errors->any())
                <div class="errors">
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/redeem">
                @csrf
                <input name="code" placeholder="Enter voucher code" class="input" />
                <button class="secondary" type="submit">Redeem</button>
            </form>
        </section>
    </main>
</body>
</html>
