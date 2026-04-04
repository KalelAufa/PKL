<?php
$out = ["kategori" => [], "produk" => []];
$old = "c:/laragon/www/PKL/APRIL/WebTNS/";

$hc = file_get_contents($old . "app/Http/Controllers/HomeController.php");
if (preg_match("/\[\s*\[(.*?)\]\s*\]/is", $hc, $m)) {
    // Actually, I will write it all manually by having php do reflection or eval.
}

