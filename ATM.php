<?php 

    session_start();
    ATM::main();

?>

<?php 

class ATM{
    public static function main(){
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
            echo "Selamat Datang Di Bank SMK AK NUSA BANGSA<br>";
            echo "<button><a href='bank.php'>akses tabungan</a></button> |";
            echo "<button><a href='logout.php'>Logout</a></button> <br>";
        }else{
            header('Location: index.php');
            exit();
        }
    }
}

?>