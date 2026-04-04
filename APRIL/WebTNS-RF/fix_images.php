<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$files = glob(__DIR__ . '/resources/views/*/*.blade.php');
$count = 0;

foreach ($files as $file) {
    if (strpos($file, 'layouts') !== false) continue;

    $original = file_get_contents($file);

    // Cari <img ... src="..."> yang TIDAK MENGGUNAKAN {{ asset(...) }}
    $updated = preg_replace_callback('/(<img[^>]+src=[\"\'])(?!{{\s*asset)(.+?)([\"\'])/i', function ($matches) {
        $path = $matches[2];
        if (preg_match('/images\/(.+)/i', $path, $m)) {
            // Jika path aslinya memuat 'images/', kita bungkus dengan asset('images/... ')
            return $matches[1] . "{{ asset('images/" . $m[1] . "') }}" . $matches[3];
        } else {
            // Jika hanya nama file (misal 'gambar.png'), anggap di public/images/
            $basename = basename($path);
            if (!empty($basename) && strpos($basename, '.') !== false) {
                return $matches[1] . "{{ asset('images/" . $basename . "') }}" . $matches[3];
            }
        }
        return $matches[0];
    }, $original);

    // Sesuaikan atribut data-src jika ada (ex: data-src="../images/...")
    $updated = preg_replace_callback('/(data-src=[\"\'])(?!{{\s*asset)(.+?)([\"\'])/i', function ($matches) {
        $path = $matches[2];
        if (preg_match('/images\/(.+)/i', $path, $m)) {
            return $matches[1] . "{{ asset('images/" . $m[1] . "') }}" . $matches[3];
        }
        return $matches[0];
    }, $updated);

    // Sesuaikan inline background-image url(...)
    $updated = preg_replace_callback('/(url\([\"\']?)(?!{{\s*asset)(.+?)([\"\']?\))/i', function ($matches) {
        $path = $matches[2];
        if (preg_match('/images\/(.+)/i', $path, $m)) {
            return $matches[1] . "{{ asset('images/" . $m[1] . "') }}" . $matches[3];
        }
        return $matches[0];
    }, $updated);

    // Fix link style/css atau js yang masih pakai relative, tapi css kan di layout
    // jadi tidak usah

    if ($updated !== $original) {
        file_put_contents($file, $updated);
        echo "Diperbaiki aset gambar pada file: " . str_replace(__DIR__, '', $file) . "\n";
        $count++;
    }
}

echo "\nTotal File Blade yang path gambarnya diperbaiki: {$count}\n";
