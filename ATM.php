<?php
session_start();
ATM::main();  // Panggil fungsi ATM setelah login berhasil
?>

<?php
class ATM
{
    public static function main()
    {
        // Mengecek apakah pengguna sudah login dengan PIN yang benar
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            echo "Selamat datang di Bank SMK AK NUSA BANGSA<br>";
        } else {
            header('Location: index.php'); // Redirect ke halaman login jika belum login
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login ATM</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>

    <style>
        body {
            background-color: #2F4F4F;

        }

        .main {
            height: 100vh;
        }

        .login-box {
            width: 500px;
            /* height: 400px; */
            box-sizing: border-box;
            border-radius: 10px;
            background-color: #F0FFFF;
            box-shadow: -2px 5px 9px #F0F8FF;

        }

        p {
            align-items: center;
            text-align: center;
        }

        span {
            width: 500px;
            /* height: 400px; */
            box-sizing: border-box;
            border-radius: 10px;
            background-color: #A52A2A;
            color: #fff;
            font-weight: 400;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        a {
            text-decoration: none;
            color: #000;
        }

        button {
            border-radius: 10px;
            border: #000;
        }

        @import url("https://fonts.googleapis.com/css2?family=Russo+One&display=swap");

        svg {
            font-family: "Russo One", sans-serif;
            width: 100%;
            height: 100%;
        }

        svg text {
            animation: stroke 5s infinite alternate;
            stroke-width: 2;
            stroke: #365FA0;
            font-size: 100px;
        }

        @keyframes stroke {
            0% {
                fill: rgba(72, 138, 204, 0);
                stroke: rgba(54, 95, 160, 1);
                stroke-dashoffset: 25%;
                stroke-dasharray: 0 50%;
                stroke-width: 2;
            }

            70% {
                fill: rgba(72, 138, 204, 0);
                stroke: rgba(54, 95, 160, 1);
            }

            80% {
                fill: rgba(72, 138, 204, 0);
                stroke: rgba(54, 95, 160, 1);
                stroke-width: 3;
            }

            100% {
                fill: rgba(72, 138, 204, 1);
                stroke: rgba(54, 95, 160, 0);
                stroke-dashoffset: -25%;
                stroke-dasharray: 50% 0;
                stroke-width: 0;
            }
        }

        /* .wrapper {
            background-color: #FFFFFF
        } */

        ;
    </style>


    <body>
        <div class="main d-flex flex-column justify-content-center align-items-center">
            <div class="login-box p-5 ">
                <h3 class="d-flex flex-column align-items-center ">
                    <form method="POST">
                        <div class="wrapper">
                            <svg>
                                <text x="50%" y="50%" dy=".35em" text-anchor="middle">
                                    Wellcome
                                </text>
                            </svg>
                        </div>
                </h3>
                <p><?php echo "<button><a href='bank.php'>Akses Tabungan</a></button>"; ?></p>
                <p><?php echo "<button><a href='logout.php'>Logout</a></button><br>"; ?></p>
            </div>
            </form>
        </div>
    </body>

    </html>