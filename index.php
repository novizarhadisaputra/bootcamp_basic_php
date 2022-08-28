<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Barang Form</h2>
    <form method="POST" action="welcome.php">
        Harga: <input type="text" name="harga_produk">
        <input type="submit" value="Submit">
    </form>

    <h2>Penjumlahan Form</h2>
    <form method="POST" action="penjumlahan.php">
        <?php
        session_start();
        ?>
        <input type="text" name="bilang_pertama" placeholder="Bilangan Pertama">
        <?php
        if (isset($_SESSION['message_error_bilang_pertama'])) {
            echo $_SESSION['message_error_bilang_pertama'] . '<br>';
        }
        ?>
        <input type="text" name="bilang_kedua" placeholder="Bilangan Kedua">
        <?php
        if (isset($_SESSION['message_error_bilang_kedua'])) {
            echo $_SESSION['message_error_bilang_kedua'] . '<br>';
        }
        ?>
        <input type="submit" value="Tambah">
    </form>

    <h2>Login Form</h2>

    <form method="POST" action="login.php">
        <input type="text" name="username" placeholder="Username">
        <?php
        if (isset($_SESSION['message_error_username'])) {
            echo $_SESSION['message_error_username'] . '<br>';
        }
        ?>
        <input type="text" name="password" placeholder="Password">
        <?php
        if (isset($_SESSION['message_error_password'])) {
            echo $_SESSION['message_error_password'] . '<br>';
        }
        ?>
        <input type="submit" value="Login">
    </form>

    <h2>Search Form</h2>

    <form method="GET" action="search.php">
        <input type="text" name="search" placeholder="Search....">
        <?php
        if (isset($_SESSION['message_error_search'])) {
            echo $_SESSION['message_error_search'] . '<br>';
        }
        ?>

        <input type="submit" value="Search">
    </form>

    <?php
    // define variables and set to empty values
    $hargaPPN = 0;
    $hargaAkhir = 0;
    // $indomie = 'Kering';

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
</body>

</html>