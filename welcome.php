<?php

$hargaPPN = 0;
$hargaAkhir = 0;


$timeout = 10;

//Set the maxlifetime of the session

ini_set("session.gc_maxlifetime", $timeout);

//Set the cookie lifetime of the session

ini_set("session.cookie_lifetime", $timeout);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['harga_produk'])) {
        $productPrice = $_POST['harga_produk'];
        $hargaAkhir = checkHargaBarang($productPrice);
    }
}

function checkHargaBarang($harga, $ppnProduct = 1000)
{
    $kalkulasiPPN = 0;
    if ($ppnProduct == 1000) {
        $kalkulasiPPN = $harga * 10 / 100;
    }
    $hargaPPN = $kalkulasiPPN;
    $kalkulasi = (int) $harga + $hargaPPN;
    return $kalkulasi;
}



?>
<?php echo 'Harga PPN Produk  : ' . $hargaPPN . '<br>'; ?>
<?php echo 'Harga Yang Dibayar  : ' . $hargaAkhir . '<br>'; ?>