<?php
session_start();
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM atm WHERE username='$username'";
    $result = $con -> query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: ../dashboard.php");
            exit();

        } else {
            echo "<script> alert ('Password Salah!!');
            document.location='../index.php'
            </script>";
        }
    } else {
        echo "<script> alert ('Username Tidak Ditemukan!!');
        document.location='../index.php'
        </script>";
    }
}
    $con->close();
?>