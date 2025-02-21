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
    $query = "UPDATE users SET pin='$pin' WHERE username='$username'";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('PIN berhasil diubah!'); window.location.href='../menu.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah PIN: " . $con->error . "');</script>";
    }
}

?>