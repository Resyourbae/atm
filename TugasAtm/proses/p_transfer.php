<?php
session_start();
include 'koneksi.php';

$username_pengirim = $_SESSION['username']; // Pengguna yang login
$tujuan = $_POST['tujuan']; // Username penerima
$jumlah = intval($_POST['nominal']); // Jumlah transfer
$input_pin = $_POST['pin']; // PIN yang dimasukkan

// Cek saldo & PIN pengirim
$sql = "SELECT saldo, pin FROM atm WHERE username='$username_pengirim'";
$result = $con->query($sql);
$user_pengirim = $result->fetch_assoc();

$saldo_pengirim = $user_pengirim['saldo'];
$pin_pengirim = trim(strval($user_pengirim['pin'])); // Konversi PIN ke string

if ($input_pin !== $pin_pengirim) {
    echo "<script>alert('PIN salah!'); window.location.href='../transfer.php';</script>";
    exit;
}

// Cek apakah saldo cukup
if ($saldo_pengirim < $jumlah) {
    echo "<script>alert('Saldo tidak cukup!'); window.location.href='../transfer.php';</script>";
    exit;
}

// Cek apakah penerima ada di database
$sql = "SELECT saldo FROM atm WHERE username='$tujuan'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $user_tujuan = $result->fetch_assoc();
    $saldo_penerima = $user_tujuan['saldo'];

    // Kurangi saldo pengirim
    $saldo_pengirim_baru = $saldo_pengirim - $jumlah;
    $query1 = "UPDATE atm SET saldo=$saldo_pengirim_baru WHERE username='$username_pengirim'";

    // Tambahkan saldo ke penerima
    $saldo_penerima_baru = $saldo_penerima + $jumlah;
    $query2 = "UPDATE atm SET saldo=$saldo_penerima_baru WHERE username='$tujuan'";

    if ($con->query($query1) && $con->query($query2)) {
        echo "<script>alert('Transfer berhasil!'); window.location.href='../dashboard.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat transfer!'); window.location.href='../transfer.php';</script>";
    }
} else {
    echo "<script>alert('Username tujuan tidak ditemukan!'); window.location.href='../transfer.php';</script>";
}

$con->close();
?>