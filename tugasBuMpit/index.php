<?php
session_start();
include 'pin.php'; // Include class Pin

// Jika form login disubmit, panggil fungsi verifikasi PIN
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputPin = $_POST['pin'];
    Pin::verify($inputPin);  // Verifikasi PIN yang diinput
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

    body{
        background-color: #2F4F4F;
    }

    .main {
        height: 100vh;
    }

    .login-box {
        width: 500px;
        height: 500px;
        box-sizing: border-box;
        border-radius: 10px;
        background-color: #eee;
        box-shadow: -6px 8px 6px #F0F8FF;
    }
</style>


<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 ">
            <h3 class="d-flex flex-column align-items-center ">
            <form method="POST">Masukan Pin Anda:</h3>
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username Anda...." required>
                </div>
                <div>
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password...." required>
                </div>
                <div>
                    <label for="pin">Pin:</label>
                    <input type="password" class="form-control" id="pin" name="pin" required>
                </div>
                <div>
                    <label for="pin">Pin:</label>
                    <input type="password" class="form-control" id="pin" name="pin" required>
                </div>
                <div>
                    <button class="btn btn-primary form-control mt-3" type="submit">submit</button>
                    <button class="btn btn-danger form-control mt-3" type="reset" name="btnlogin">Batal</button>

                </div>
            </form>
        </div>
</body>
</html>
