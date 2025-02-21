<?php
session_start();
include 'koneksi.php';

$username = $_SESSION['username']; // Ambil username dari sesi
$jumlah = intval($_POST['nominal']); // Pastikan jumlah adalah angka
$input_pin = ($_POST['pin']);

// Cek saldo saat ini
$sql = "SELECT saldo, pin FROM users WHERE username='$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
$saldo_sekarang = $user['saldo'];
$pin = $user['pin'];

if ($input_pin !== $pin) {
    echo "<script>alert('PIN salah! Silakan coba lagi.'); window.location.href='tarik_simpan.php';</script>";
    exit;
}

if (isset($_POST['btn_simpan'])) {
    // Tambah saldo
    $saldo_baru = $saldo_sekarang + $jumlah;
    $query = "UPDATE users SET saldo=$saldo_baru WHERE username='$username'";
    $con->query($query);
    echo "<script>alert('Saldo berhasil ditambahkan!'); window.location.href='dashboard.php';</script>";

} elseif (isset($_POST['btn_tarik'])) {
    if ($saldo_sekarang >= $jumlah) {
        // Tarik saldo jika cukup
        $saldo_baru = $saldo_sekarang - $jumlah;
        $query = "UPDATE users SET saldo=$saldo_baru WHERE username='$username'";
        $con->query($query);
        echo "<script>alert('Penarikan berhasil!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Saldo tidak cukup!'); window.location.href='tarik_simpan.php';</script>";
    }
}

$conn->close();
?>

?>