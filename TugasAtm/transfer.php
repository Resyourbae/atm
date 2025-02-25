<?php
session_start();
include "./proses/koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
$username_pengirim = $_SESSION['username'];

$sql = "SELECT username FROM atm WHERE username != '$username_pengirim'";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mau Transfer Ke Mana?</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-brands/css/uicons-brands.css'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./fontawesome/css/all.css">
</head>

<style>
    body {
        background-color: rgba(14, 29, 62, 0.97);
        /* background-image: url(./img/); */
        font-family: "Space Grotesk", serif;
        box-sizing: border-box;
    }

   i {
    color: white;
    text-decoration: none;
   }

</style>

<body>
    <a href="dashboard.php">
        <i class="fa-solid fa-arrow-left fa-xl ms-5 mt-5"></i>
    </a>
    <div class="bg-primary p-5 rounded" style="margin: 75px 350px 0 350px;">
        <form action="./proses/p_transfer.php" method="post">
            <div class="mb-2">
                <label for="nominal" class="form-label text-light">Masukkan Nominal</label>
                <input type="number" class="form-control border border-dark" name="nominal"
                    placeholder="Masukkan nominal" required>
            </div>
            <label for="rek" class="form-label text-light">Pilih Rekening</label>
            <select class="form-select" name="tujuan" required>
                <option value=""></option>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <option value="<?= $row['username']; ?>"><?= $row['username']; ?></option>
                <?php } ?>
            </select>
            <div class="mb-4">
                <label for="pin" class="form-label text-light">Masukkan Pin</label>
                <input type="password" class="form-control border border-dark" name="pin" placeholder="Masukkan pin"
                    minlength="6" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success" name="transfer">Transfer</button>
            </div>
        </form>
    </div>
    <script src="./fontawesome/js/all.js"></script>
</body>

</html>