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
    <title>Selamat datang!</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-brands/css/uicons-brands.css'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./fontawesome/css/all.css">
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: rgba(14, 29, 62, 0.97);
        /* background-image: url(./img/); */
        background-size: cover;
        background-repeat: no-repeat;
        font-family: "Space Grotesk", serif;
    }

    .user {
        display: flex;
        align-items: center;
    }

    .nav {
        background-color: rgb(55, 60, 160);
        padding: 10px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        border-bottom: 2px solid rgb(74, 3, 102);
        box-shadow: 0 0 7px rgb(61, 0, 102);
    }

    .nav h3 {
        font-weight: bold;
    }

    .nav a {
        color: white;
    }

    .nav a:hover {
        color: #f1f1f1;
    }

    .nav i {
        font-size: 20px;
    }

    .nav i:hover {
        color: #f1f1f1;
    }

    nav .nav .user {
        display: flex;
        align-items: center;
        margin: 0 10px;
    }

    nav .nav .user h3 {
        font-weight: bold;
        border-radius: 20px;
        /* text-shadow: 0 0 10px rgb(255, 255, 255); */
        color: rgb(255, 255, 255);
        padding: 10px;
        box-shadow: 0 0 10px rgb(255, 255, 255);
        background-color: rgb(29, 6, 70);
        margin: 0 20px;
    }

    .button button {
        padding: 0.8em 1.7em;
        background-color: transparent;
        border-radius: 50px;
        position: relative;
        overflow: hidden;
        cursor: pointer;
        transition: .5s;
        font-weight: 400;
        font-size: 17px;
        border: 1px solid;
        font-family: inherit;
        text-transform: unset;
        color: rgb(227, 226, 255);
        z-index: 1;
        text-decoration: none;
    }

    .button button:after {
        content: '';
        display: block;
        width: 50px;
        height: 50px;
        transform: translate(-50%, -50%);
        position: absolute;
        border-radius: 50%;
        z-index: -1;
        background-color: rgb(239, 143, 9);
        transition: 1s ease;
    }

    .button button::before {
        top: -1em;
        left: -1em;
    }

    .button button::after {
        left: calc(100% + 0.6em);
        top: calc(100% + 0.6em);
    }

    .button button:hover::before,
    button:hover::after {
        height: 500%;
        width: 500%;
    }

    .button button:hover {
        color: rgba(255, 255, 255, 0.26);
    }

    button:active {
        filter: brightness(.9);
    }

    .main {
        display: flexbox;
        box-sizing: border-box;
        margin: 20px;
        align-items: center;
        text-align: center;
        justify-content: center;
        padding: 50px;
        border-radius: 20px;
        margin-top: 10px;
        max-width: 500px;
        background-color: rgb(44, 184, 236);
    }

    .carousel-inner {
        border-radius: 10px;
        margin-top: 50px;
    }

    .carousel-item img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius: 10px;
    }

    /* From Uiverse.io by gharsh11032000 */
    .card {
        margin-top: 10px;
        position: relative;
        width: 190px;
        height: 254px;
        background-color:rgb(175, 210, 205);
        display: flex;
        flex-direction: column;
        justify-content: end;
        padding: 12px;
        gap: 12px;
        border-radius: 8px;
        cursor: pointer;
    }

    .card::before {
        content: '';
        position: absolute;
        inset: 0;
        left: -5px;
        margin: auto;
        width: 200px;
        height: 264px;
        border-radius: 10px;
        background: linear-gradient(-45deg,rgb(113, 9, 182) 0%,rgb(51, 74, 249) 100%);
        z-index: -10;
        pointer-events: none;
        transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .card::after {
        content: "";
        z-index: -1;
        position: absolute;
        inset: 0;
        box-shadow: 0 0 20px 10px rgb(113, 9, 182);
        background: linear-gradient(-45deg, rgb(113, 9, 182) 0%,rgb(51, 74, 249) 100%);
        transform: translate3d(0, 0, 0) scale(0.95);
        filter: blur(20px);
    }

    .heading {
        font-size: 20px;
        text-transform: capitalize;
        font-weight: 700;
    }

    .card a:not(.heading) {
        font-size: 14px;
    }

    .card a:last-child {
        color: #e81cff;
        font-weight: 600;
    }

    .card:hover::after {
        filter: blur(30px);
    }

    .card:hover::before {
        transform: rotate(-90deg) scaleX(1.34) scaleY(0.77);
    }
</style>

<body>
    <!-- navbar start -->
    <nav>
        <div class="nav container-fluid p-3 mb-4 ">
            <h3 class="text-light">
                <div class="user">
                    <i class="fa-solid fa-user"></i>
                    <?php
                    $current_user = $_SESSION['username'];
                    $sql = "SELECT username FROM atm WHERE username = '$current_user'";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<h3 style='font-weight: bold; color: white; display: flex; align-items: center;'>" . ($row["username"]) . "</h3>";
                    } else {
                        echo "User not found";
                    }
                    ?>
                </div>
            </h3>

            <div class="button">
                <button><a href="./proses/logout.php" class="text-decoration-none text-light ms-auto"><i
                            class="fa-solid fa-sign-out fa-fw"></i>Logout</a></button>
            </div>
    </nav>
    </div>
    <!-- navbar end -->

    <!-- Carousel start -->
    <div class="container-fluid mt-5">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="1000">
                    <img src="./img/bg_shiroko.png" class="d-block" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="./img/ruby.jpg" class="d-block" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="./img/thumb-1920-1296147.png" class="d-block" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel end -->

    <!-- Card start-->
     <div class="container mt-5 d-flex justify-content-around">
    <div class="card">
        <p class="heading">
        <i class="fa-solid fa-gem"></i>
        
            Top Up Murah!!
        </p>
        <p>
            Top Up
        </p>
        <a>See All
        </a>
    </div>
    <div class="card">
        <p class="heading">
            Top Up Murah!!
        </p>
        <p>
            Top Up
        </p>
        <a>See All
        </a>
    </div>
    <div class="card">
        <p class="heading">
            Top Up Murah!!
        </p>
        <p>
            Top Up
        </p>
        <a>See All
        </a>
    </div>
    <div class="card">
        <p class="heading">
            Popular this month
        </p>
        <p>
            Powered By
        </p>
        <a>See All
        </a>
    </div>
    <div class="card">
        <p class="heading">
            Popular this month
        </p>
        <p>
            Powered By
        </p>
        <a>See All
        </a>
    </div>
</div>

    <!-- Saldo -->

    <!-- Kolom 1 -->
    <div
        class="main d-flex flex-column justify-content-center align-items-center mt-5">
        <i class="fa-solid fa-wallet" style="font-size: 50px;"></i>
        <div>
            <h4 class="m-0">Kamu punya saldo</h4>

            <?php
            $username = $_SESSION['username'];
            $sql = "SELECT saldo FROM atm WHERE username='$username'";
            $result = $con->query($sql);
            $user = $result->fetch_assoc();

            echo "<p>Rp. " . number_format($user['saldo'], 0, ',', '.') . "</p>";
            ?>

        </div>
    </div>

    <div class="container">
        <!-- Kolom 2 -->
        <div class="d-flex flex-column w-100">
            <a href="tarik_simpan.php" class="text-decoration-none w-100">
                <div class="bg-primary p-4 w-100 text-light text-center rounded mb-2 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-money-bill fa-xl"></i>
                    <h5 class="m-0">Tarik dan simpan saldo</h5>
                </div>
            </a>

            <a href="transfer.php" class="text-decoration-none w-100">
                <div class="bg-primary p-4 w-100 text-light text-center rounded d-flex align-items-center gap-2">
                    <i class="fa-solid fa-money-bill-transfer fa-xl"></i>
                    <h5 class="m-0">Transfer ke rekening lain</h5>
                </div>
            </a>
        </div>

    </div>

    <!-- Ubah pin -->
    <!-- Button trigger modal -->
    <div class="w-100 text-center mt-3">
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            😢 Lupa pin?
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Masukkan pin baru mu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Input form -->
                <form action="proses/ubah.php" method="post">
                    <div class="modal-body">
                        <label for="pin_baru">Masukkan pin</label>
                        <input type="password" class="form-control" placeholder="Pin baru" aria-label="Pin"
                            aria-describedby="addon-wrapping" minlength="6" name="pin" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="bt_ubah">Simpan</button>
                        <!-- type="submit" -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- script fontawesome -->
    <script src="./fontawesome/js/all.js"></script>

</body>

</html>