<?php
session_start();
include "proses/koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarik Saldo </title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <a href="dashboard.php">
        <i class="fa-solid fa-arrow-left fa-xl ms-5 mt-5 text-dark"></i>
    </a>
    <div class="bg-primary p-5 rounded" style="margin: 75px 350px 0 350px;">
        <form action="./proses/p_tarik.php" method="post">
            <div class="mb-2">
                <label for="nominal" class="form-label text-light">Masukkan Nominal</label>
                <input type="number" class="form-control border border-dark" name="nominal"
                    placeholder="Masukkan nominal" required min="1">
            </div>
            <div class="mb-4">
                <label for="pin" class="form-label text-light">Masukkan Pin</label>
                <input type="password" class="form-control border border-dark" name="pin" placeholder="Masukkan pin"
                    minlength="6"required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success" name="btn_simpan">Simpan saldo</button>
                <button type="submit" class="btn btn-danger" name="btn_tarik">Tarik saldo</button>
            </div>
        </form>
    </div>
    <script src="../fontawesome/js/all.js"></script>
</body>

</html>