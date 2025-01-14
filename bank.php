<?php 

session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
    header('location: index.php');
    exit();
}
    $bank = new Bank(6000000);
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['action'])){
            if($_POST['action'] === 'simpan'){
                $jumlah = intval($_POST['jumlah']);
                $bank->simpanUang($jumlah);
            }elseif($_POST['action'] === 'ambil'){
                $jumlah = intval($_POST['jumlah']);
                $bank->ambilUang($jumlah);
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Tabungan</title>
</head>
<body>
    <h2>Bank Tabungan ATM</h2>
    <!-- tampilkan saldo -->
     <p><?php echo $bank->getSaldo();?></p>
     <form action="" method="POST">
        <label for="jumlah">JUMLAH UANG:</label>
        <input type="number" id="jumlah" name="jumlah" requaired>
        <button type="submit" name="action" value="simpan">simpan uang</button>
        <button type="submit" name="action" value="ambil">ambil uang</button>
     </form>
     <br>
     <button type="back" name="action" value="back"><a href="ATM.php">Menu utama</a></button> |
     <button type="logout" name="action" value="logout"><a href="logout.php">logout</a></button> |
     <button type="cek" name="action" value="cek"><a href="ceksaldo.php">ceksaldo</a></button> |
</body>
</html>

<?php 
class Bank{
    private $saldo;
    public function __construct($saldo){
        $this->saldo = $saldo;
    }
    public function getSaldo(){
        return "Saldo saat ini: Rp.########################";
        // . number_format($this->saldo) . "<br>";  
    }
    public function simpanUang($jumlah){
        $this->saldo += $jumlah;
        echo "Anda menyimpan uang sebesar Rp."
        .  number_format($jumlah) . "<br>";
    }

    public function ambilUang($jumlah){
        if($jumlah > $this->saldo){
            echo "Saldo tidak mencakupi untuk penarikan.<br>";
        }else{
            $this->saldo -= $jumlah;
            echo "anda mengambil uang sebesar Rp."
            . number_format($jumlah) . "<br";
        }
    }
}
?>