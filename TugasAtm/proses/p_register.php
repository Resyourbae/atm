<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pin = $_POST['pin'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO atm (username, password, pin, saldo) VALUES ('$username', '$hashed_password', '$pin', 0)";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Berhasil membuat akun!'); window.location='../index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Terjadi kesalahan: " . $con->error . "');</script>";
    }
    $con->close();
}
?>

