<?php

// 1. Daftarkan file autoload dari Composer agar semua library terbaca
require __DIR__ . '/../public/index.php';

// 2. Jalankan bootstrap aplikasi Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 3. Tangani request yang masuk melalui Kernel Laravel dan kirim responsenya ke Vercel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);