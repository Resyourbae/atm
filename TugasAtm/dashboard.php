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
    <link rel="stylesheet" href="./css/dashboard.css">
</head>

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
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    🔑Lupa pin?
                </button>
            </div>
    </nav>
    </div>
    <!-- navbar end -->

    <!-- Saldo anda start -->
    <div class="saldo">
        <nav class="navbar navbar-light bg-primary p-3 mb-4">
            <i class="fa-solid fa-wallet" style="font-size: 30px;"></i>
            <h4 class="d-flex mr-5">Kamu punya saldo</h4>

            <?php
            $username = $_SESSION['username'];
            $sql = "SELECT saldo FROM atm WHERE username='$username'";
            $result = $con->query($sql);
            $user = $result->fetch_assoc();

            echo "<p>Rp. " . number_format($user['saldo'], 0, ',', '.') . "</p>";
            ?>

    </div>
    </nav>
    <!-- Saldo anda end -->

    <!-- Carousel start -->
    <div class="container-fluid mt-2">
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
                <i class="fa-solid fa-gem" style="font-size: 30px;"></i>

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
                <i class="fa-solid fa-bolt" style="font-size: 30px;"></i>
                Bayar Token Listrik
            </p>
            <p>
                Token Listrik
            </p>
            <a>See All
            </a>
        </div>
        <div class="card">
            <p class="heading">
                <i class="fa-solid fa-phone-volume" style="font-size: 30px;"></i>
                Beli Pulsa Murah
            </p>
            <p>
                Pulsa
            </p>
            <a>See All
            </a>
        </div>
        <div class="card">
            <p class="heading">
                <i class="fa-brands fa-google-play" style="font-size: 30px;"></i>
                Promo Google Play
            </p>
            <p>
                Google Play
            </p>
            <a>See All
            </a>
        </div>
        <div class="card">
            <p class="heading">
                <i class="fa-solid fa-book" style="font-size: 30px;"></i>
                Promo Bayar Tagihan
            </p>
            <p>
                Bayar Tagihan
            </p>
            <a>See All
            </a>
        </div>
    </div>

    <!-- Ubah pin -->
    <!-- Button trigger modal -->
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
                <form action="./proses/ubah.php" method="post" style="background-color: rgba(14, 29, 62, 0.97); color: rgb(255, 255, 255);">
                    <div class="modal-body">
                        <label for="pin_baru">Masukkan pin</label>
                        <input type="password" class="form-control" placeholder="Pin baru" aria-label="Pin"
                            aria-describedby="addon-wrapping" minlength="6" name="pin" required style="border-radius: 50px;">
                    </div>

                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" style=" padding: 0.8em 1.7em;
    background-color: transparent;
    border-radius: 50px;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    transition: .5s;
    font-weight: 400;
    font-size: 17px;
    border: 1px solid rgb(252, 7, 7);
    font-family: inherit;
    text-transform: unset;
    color: rgb(255, 255, 255);
    z-index: 1;
    text-decoration: none;">Batal</button>
                        <button type="submit" name="bt_ubah" style=" padding: 0.8em 1.7em;
    background-color: transparent;
    border-radius: 50px;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    transition: .5s;
    font-size: 17px;
    border: 1px solid rgb(239, 143, 9);
    font-family: inherit;
    text-transform: unset;
    color: rgb(255, 255, 255);
    z-index: 1;
    text-decoration: none;
    ">Simpan</button>
                        <!-- type="submit" -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- tarik dan transfer -->
    <div class="container mt-3 p-5 d-flex justify-content-around col-6">
        <div class="kartu wallet">
            <div class="overlay"></div>
            <div class="circle">


                <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="23 29 78 60" height="60px" width="78px">

                    <defs></defs>
                    <g transform="translate(23.000000, 29.500000)" fill-rule="evenodd" fill="none" stroke-width="1" stroke="none" id="icon">
                        <rect rx="4.70247832" height="21.8788565" width="9.40495664" y="26.0333433" x="67.8357511" fill="#AC8BE9" id="Rectangle-3"></rect>
                        <rect rx="4.70247832" height="10.962961" width="9.40495664" y="38.776399" x="67.8357511" fill="#6A5297" id="Rectangle-3"></rect>
                        <polygon points="57.3086772 0 67.1649301 26.3776902 14.4413177 45.0699507 4.58506484 18.6922605" fill="#6A5297" id="Rectangle-2">
                        </polygon>
                        <path fill="#8B6FC0" id="Rectangle" d="M0,19.6104296 C0,16.2921718 2.68622235,13.6021923 5.99495032,13.6021923 L67.6438591,13.6021923 C70.9547788,13.6021923 73.6388095,16.2865506 73.6388095,19.6104296 L73.6388095,52.6639057 C73.6388095,55.9821635 70.9525871,58.672143 67.6438591,58.672143 L5.99495032,58.672143 C2.68403068,58.672143 0,55.9877847 0,52.6639057 L0,19.6104296 Z"></path>
                        <path fill="#F6F1FF" id="Fill-12" d="M47.5173769,27.0835169 C45.0052827,24.5377699 40.9347162,24.5377699 38.422622,27.0835169 L36.9065677,28.6198808 L35.3905134,27.0835169 C32.8799903,24.5377699 28.8078527,24.5377699 26.2957585,27.0835169 C23.7852354,29.6292639 23.7852354,33.7559532 26.2957585,36.3001081 L36.9065677,47.0530632 L47.5173769,36.3001081 C50.029471,33.7559532 50.029471,29.6292639 47.5173769,27.0835169"></path>
                        <rect height="12.863158" width="15.6082259" y="26.1162588" x="58.0305835" fill="#AC8BE9" id="Rectangle-4"></rect>
                        <ellipse ry="2.23319575" rx="2.20116007" cy="33.0919007" cx="65.8346965" fill="#FFFFFF" id="Oval">
                        </ellipse>
                    </g>
                </svg>

            </div>
            <h2><a href="transfer.php">Transfer? Klik disini!</a></h2>
        </div>
        <div class="kartu wallet">
            <div class="overlay"></div>
            <div class="circle">


                <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="23 29 78 60" height="60px" width="78px">

                    <defs></defs>
                    <g transform="translate(23.000000, 29.500000)" fill-rule="evenodd" fill="none" stroke-width="1" stroke="none" id="icon">
                        <rect rx="4.70247832" height="21.8788565" width="9.40495664" y="26.0333433" x="67.8357511" fill="#AC8BE9" id="Rectangle-3"></rect>
                        <rect rx="4.70247832" height="10.962961" width="9.40495664" y="38.776399" x="67.8357511" fill="#6A5297" id="Rectangle-3"></rect>
                        <polygon points="57.3086772 0 67.1649301 26.3776902 14.4413177 45.0699507 4.58506484 18.6922605" fill="#6A5297" id="Rectangle-2">
                        </polygon>
                        <path fill="#8B6FC0" id="Rectangle" d="M0,19.6104296 C0,16.2921718 2.68622235,13.6021923 5.99495032,13.6021923 L67.6438591,13.6021923 C70.9547788,13.6021923 73.6388095,16.2865506 73.6388095,19.6104296 L73.6388095,52.6639057 C73.6388095,55.9821635 70.9525871,58.672143 67.6438591,58.672143 L5.99495032,58.672143 C2.68403068,58.672143 0,55.9877847 0,52.6639057 L0,19.6104296 Z"></path>
                        <path fill="#F6F1FF" id="Fill-12" d="M47.5173769,27.0835169 C45.0052827,24.5377699 40.9347162,24.5377699 38.422622,27.0835169 L36.9065677,28.6198808 L35.3905134,27.0835169 C32.8799903,24.5377699 28.8078527,24.5377699 26.2957585,27.0835169 C23.7852354,29.6292639 23.7852354,33.7559532 26.2957585,36.3001081 L36.9065677,47.0530632 L47.5173769,36.3001081 C50.029471,33.7559532 50.029471,29.6292639 47.5173769,27.0835169"></path>
                        <rect height="12.863158" width="15.6082259" y="26.1162588" x="58.0305835" fill="#AC8BE9" id="Rectangle-4"></rect>
                        <ellipse ry="2.23319575" rx="2.20116007" cy="33.0919007" cx="65.8346965" fill="#FFFFFF" id="Oval">
                        </ellipse>
                    </g>
                </svg>

            </div>
            <h2><a href="tarik.php">Tambah Saldo? Klik disini!</a></h2>
        </div>

        <div class="kartu wallet">
            <div class="overlay"></div>
            <div class="circle">


            <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="23 29 78 60" height="60px" width="78px">
                <defs></defs>
                <g transform="translate(23.000000, 29.500000)" fill-rule="evenodd" fill="none" stroke-width="1" stroke="none" id="icon">
                    <rect rx="4.70247832" height="21.8788565" width="9.40495664" y="26.0333433" x="67.8357511" fill="#AC8BE9" id="Rectangle-3"></rect>
                    <rect rx="4.70247832" height="10.962961" width="9.40495664" y="38.776399" x="67.8357511" fill="#6A5297" id="Rectangle-3"></rect>
                    <polygon points="57.3086772 0 67.1649301 26.3776902 14.4413177 45.0699507 4.58506484 18.6922605" fill="#6A5297" id="Rectangle-2">
                    </polygon>
                    <path fill="#8B6FC0" id="Rectangle" d="M0,19.6104296 C0,16.2921718 2.68622235,13.6021923 5.99495032,13.6021923 L67.6438591,13.6021923 C70.9547788,13.6021923 73.6388095,16.2865506 73.6388095,19.6104296 L73.6388095,52.6639057 C73.6388095,55.9821635 70.9525871,58.672143 67.6438591,58.672143 L5.99495032,58.672143 C2.68403068,58.672143 0,55.9877847 0,52.6639057 L0,19.6104296 Z"></path>
                    <path fill="#F6F1FF" id="Fill-12" d="M47.5173769,27.0835169 C45.0052827,24.5377699 40.9347162,24.5377699 38.422622,27.0835169 L36.9065677,28.6198808 L35.3905134,27.0835169 C32.8799903,24.5377699 28.8078527,24.5377699 26.2957585,27.0835169 C23.7852354,29.6292639 23.7852354,33.7559532 26.2957585,36.3001081 L36.9065677,47.0530632 L47.5173769,36.3001081 C50.029471,33.7559532 50.029471,29.6292639 47.5173769,27.0835169"></path>
                    <rect height="12.863158" width="15.6082259" y="26.1162588" x="58.0305835" fill="#AC8BE9" id="Rectangle-4"></rect>
                    <ellipse ry="2.23319575" rx="2.20116007" cy="33.0919007" cx="65.8346965" fill="#FFFFFF" id="Oval">
                    </ellipse>
                </g>
                </svg>

            </div>
            <h2><a href="transfer.php">...? Klik disini!</a></h2>
        </div>
    </div>

    <!-- script fontawesome -->
    <script src="./fontawesome/js/all.js"></script>

</body>

</html>