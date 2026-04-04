<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$files = glob(__DIR__ . '/resources/views/*/*.blade.php');
$missing = [];
$total_images = 0;

foreach ($files as $file) {
    if (strpos($file, 'layouts/app') !== false) continue; // skip layout
    $content = file_get_contents($file);
    if (preg_match_all('/<img[^>]+src=[\"\'\s]+([^\"\'>\s]+)[\"\'\s]+/i', $content, $matches)) {
        foreach ($matches[1] as $src) {
            // Remove {{ asset('') }} or generic blade echo
            $cleanSrc = str_replace(['{{', '}}', 'asset(', '\'', '"', ')', ' '], '', $src);
            if (empty($cleanSrc) || strpos($cleanSrc, 'http') === 0 || strpos($cleanSrc, 'data:image') === 0) continue;

            // Hapus base path jika ada (misal /images/...) menjadi images/...
            $cleanSrc = ltrim($cleanSrc, '/');
            $fullPath = __DIR__ . '/public/' . $cleanSrc;

            $total_images++;
            if (!file_exists($fullPath)) {
                $shortFile = str_replace(str_replace('/', DIRECTORY_SEPARATOR, __DIR__) . DIRECTORY_SEPARATOR, '', $file);
                $missing[] = "$shortFile => $cleanSrc";
            }
        }
    }
}

echo "Total <img> hardcode di file Blade: {$total_images}\n";
echo "Jumlah gambar yang HILANG di public: " . count($missing) . "\n\n";

foreach ($missing as $m) {
    echo "- {$m}\n";
}
