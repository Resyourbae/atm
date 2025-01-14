<?php 
class Pin{
    public static function verify($inputPin){
        $correctPin = 1234;
        $maxAttempts = 4;

        // jika pin benar start
        if($inputPin == $correctPin){
            $_SESSION['logged_in'] = true;
            header('Location: ATM.php');
        }
        else{
            if(!isset($_SESSION['attempt'])){
                $_SESSION['attempt'] = 1;
            }
            else{
                $_SESSION['attempt']++;
            }
       
        // jika pin benar end
        if($_SESSION['attempt'] >= $maxAttempts){
            echo "KARTU ANDA TELAH DIBLOKIR, SILAHKAN HUBUNGI BANK TERDEKAT<br>";
            session_destroy();
        }
        else{
            echo "Maaf, PIN anda salah. Percobaan Ke: {$_SESSION['attempt']}<br>";
        }
        }
    }
}
?>