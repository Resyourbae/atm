<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['username'];
$pin = $_POST['pin'];

if (isset($_POST['bt_ubah'])) {
    $query = "UPDATE atm SET pin='$pin' WHERE username='$username'";

    if ($con->query($query) === TRUE) {
        echo "<script>alert('PIN berhasil diubah!'); window.location.href='../dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah PIN: " . $con->error . "');</script>";
    }
}

?>