<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$katalog = config('katalog');
$missing = [];
$total = 0;

if (isset($katalog['kategori'])) {
    foreach ($katalog['kategori'] as $slug => $data) {
        $total++;
        $imgPath = rtrim(__DIR__ . '/public/' . ltrim($data['image'], '/'), '/');

        if (!file_exists($imgPath)) {
            $missing[] = "Kategori [{$slug}]: {$data['image']}";
        }
    }
}

if (isset($katalog['produk'])) {
    foreach ($katalog['produk'] as $katSlug => $produks) {
        foreach ($produks as $prodSlug => $prodData) {
            $total++;
            if (!empty($prodData['image'])) {
                $imgPath = rtrim(__DIR__ . '/public/' . ltrim($prodData['image'], '/'), '/');
                if (!file_exists($imgPath)) {
                    $missing[] = "Produk [{$katSlug} -> {$prodSlug}]: {$prodData['image']}";
                }
            }
        }
    }
}

echo "Total Data Gambar Dicocokkan: {$total}\n";
echo "Jumlah Gambar Hilang/Tidak Tampil: " . count($missing) . "\n\n";

if (count($missing) > 0) {
    foreach ($missing as $m) {
        echo "- {$m}\n";
    }
} else {
    echo "Semua gambar ($total foto) tersedia dan akan tampil di website!\n";
}
