<?php 

    session_start();
    include 'pin.php';

    // jika form login disubmit, panggil fungsi verfikasi PIN start
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $inputPin = $_POST['pin'];
        pin::verify($inputPin);
    }
    // jika form login disubmit, panggil fungsi verfikasi PIN end

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ATM</title>
</head>
<body>
    <h2>Masukan PIN Anda</h2>
    <form method="POST">
        <label for="pin">PIN:</label>
        <input type="password" id="pin" name="pin" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>