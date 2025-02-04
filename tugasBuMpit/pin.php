<?php
class Pin {
    public static function verify($inputPin) {
        $correctPin = 1234;  // PIN yang benar
        $maxAttempts = 3;    // Jumlah maksimum percobaan

        // Jika input PIN benar
        if ($inputPin == $correctPin) {
            $_SESSION['logged_in'] = true; // Set session sebagai logged in
            header('Location: ATM.php');   // Redirect ke halaman ATM
        } else {
            // Menyimpan jumlah percobaan dalam session
            if (!isset($_SESSION['attempt'])) {
                $_SESSION['attempt'] = 1;
            } else {
                $_SESSION['attempt']++;
            }

            // Jika sudah melebihi batas percobaan
            if ($_SESSION['attempt'] >= $maxAttempts) {
                echo "KARTU ANDA TELAH DIBLOKIR, SILAHKAN HUBUNGI BANK TERDEKAT<br>";
                session_destroy();  // Menghapus semua session
            } else {
                echo "Maaf, PIN anda salah. Percobaan ke: {$_SESSION['attempt']}<br>";
            }
        }
    }
}
?>
