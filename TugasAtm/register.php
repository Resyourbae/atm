<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ATM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-brands/css/uicons-brands.css'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./fontawesome/css/all.css">
    <style>
        @import url('https://cdn-uicons.flaticon.com/2.6.0/uicons-brands/css/uicons-brands.css');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url(./img/bg2.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            font-family: "Space Grotesk", serif;
            font-optical-sizing: auto;
            position: relative;
            background-attachment: fixed;
            background-position: center;
            display: flex;
            justify-content: center;
        }

        .main {
            height: 100vh;
            width: 100%;
            display: grid;
            place-items: center;
            position: absolute;
            max-width: 400px;
            margin: 10px 0;
        }

        .login-box {
            background-color: rgb(248, 242, 242);
            border-radius: 10px;
            box-shadow: 0 0 50px rgb(130, 13, 122);
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 600px;
            gap: 10px;
        }

        .login-box h3 {
            color: #000;
        }

        .login-box span {
            background-color: rgb(23, 38, 114);
            border-radius: 50px;
            text-shadow: 0 0 10px rgb(255, 255, 255);
            color: rgb(255, 255, 255);
            padding: 10px;
        }

        .login-box input {
            border-radius: 10px;
            margin: 10px 0;
            border: 1px solid rgba(53, 32, 145, 0.63);
            padding: 10px;
            width: 100%;
            border-radius: 20px;
            background-color: transparent;
        }

        .login-box input i {
            margin-right: 10px;
            font-size: 1.3em;
            display: contents;
        }

        .login-box button {
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
            color: rgb(23, 20, 119);
            z-index: 1;
        }

        /* .login-box button .btn{
            color: rgb(23, 20, 119);
        } */

        .login-box button::after {
            content: '';
            display: block;
            width: 50px;
            height: 50px;
            transform: translate(-50%, -50%);
            position: absolute;
            border-radius: 50%;
            z-index: -1;
            background-color: rgb(54, 49, 215);
            transition: 1s ease;
        }

        .login-box button::before {
            top: -1em;
            left: -1em;
        }

        .login-box button::after{
            left: calc(100% + 0.6em);
            top: calc(100% + 0.6em);
        }

        .login-box button:hover::before, button:hover::after{
            height: 500%;
            width: 500%;
        }

        .login-box button:hover {
            color: rgb(230, 230, 240);
        }

        .login-box button:active{
            filter: brightness(.9);
        }

        .geser {
            margin-top: 10px;
        }

        .geser a {
            color: rgb(73, 26, 106);
            text-decoration: none;
        }
    </style>
</head>

<body>
        <div class="main d-flex flex-column justify-content-center align-items-center">
            <div class="login-box p-5 ">
                <h3 class="d-flex flex-column align-items-center ">
                    <form method="POST" action="./proses/p_register.php">Register <span>Akun Anda:</span>
                </h3>
                <div>
                    <label for="username"><i class="fa-solid fa-user"></i> Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username Anda...." required>
                </div>
                <div>
                    <label for="Password"><i class="fa-solid fa-lock"></i> Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password...." required>
                </div>
                <div>
                    <label for="pin"><i class="fa-solid fa-key"></i> Pin:</label>
                    <input type="password" class="form-control" id="pin" name="pin" placeholder="Masukan Pin Anda...." required>
                </div>
                <div>
                    <button class="btn form-control mt-3" type="submit">submit</button>
                    <button class="btn form-control mt-3" type="reset" name="btnlogin">Batal</button>
                </div>
                <div class="geser">
                <p>Sudah Punya Akun? <a href="index.php">Login Disini😉</a></p>
                </div>
                </form>
            </div>
    <script src="./fontawesome/js/all.js"></script>
</body>

</html>