<?php
session_start();

if (isset($_POST['bilang_pertama']) && isset($_POST['bilang_kedua'])) {
    $_SESSION['message_error_bilang_pertama'] = '';
    $_SESSION['message_error_bilang_kedua'] = '';
    $bilangPertama = 0;
    $bilangKedua = 0;

    if ($_POST['bilang_pertama'] == '') {
        $_SESSION['message_error_bilang_pertama'] = 'Tolong isi bilangan pertama';
        return header('Location: http://localhost/basic_php/');
    } else if ($_POST['bilang_kedua'] == '') {
        $_SESSION['message_error_bilang_kedua'] = 'Tolong isi bilangan kedua';
        return header('Location: http://localhost/basic_php/');
    }
    $bilangPertama = $_POST['bilang_pertama']; // 10 * 10 = 100
    $bilangKedua = $_POST['bilang_kedua']; // 10 * 10 = 100

    echo (int) kelipatanSepuluh($bilangPertama) + (int) kelipatanDikurangSepuluh($bilangKedua);
}

function kelipatanSepuluh($angka) // function paramaternya required
{
    $hasil = $angka * 10;
    return $hasil;
}

function kelipatanDikurangSepuluh($angka = 0) // function paramaternya optional
{
    $angkaBaru = $angka;
    if ($angka < 10) $angkaBaru = 10;
    $hasil = $angkaBaru - 10;
    return $hasil;
}