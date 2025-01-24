<?php
session_start();
//include 'bank.php'; // Include class Bank

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php'); // Redirect ke halaman login jika belum login
    exit();
}

// Cek Saldo
$bank = new Bank(5000000);  // Membuat objek Bank dengan saldo awal Rp. 5.000.000
$bank_2 = new Bank(3000000);
// Jika user memilih untuk simpan atau ambil uang
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'simpan') {
            $jumlah = intval($_POST['jumlah']);
            $bank->simpanUang($jumlah);
        } elseif ($_POST['action'] === 'ambil') {
            $jumlah = intval($_POST['jumlah']);
            $bank->ambilUang($jumlah);
        } elseif ($_POST['action'] === 'transferUang') {
            $jumlah = intval($_POST['jumlah']);
            $bank-> transferUang($jumlah); 
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bank Tabungan</title>
</head>
<body>
    <h2>Bank Tabungan ATM</h2>

    <!-- Tampilkan saldo -->
    <p><?php echo $bank->getSaldo(); ?></p>

    <form method="POST" action="">
        <label for="jumlah">Jumlah Uang: </label>
        <input type="number" id="jumlah" name="jumlah" required>
        <br>
        <label for="norek">nomor rekening</label>
        <input type="number" id="norek" name="norek" required>
        <br>
        <button type="submit" name="action" value="simpan">Simpan Uang</button>
        <button type="submit" name="action" value="ambil">Ambil Uang</button>
        <button type="submit" name="action" value="ambil">transfer</button>
    </form>

    <br>
    <button type="back" name="action" value="back"><a href="ATM.php">Menu Utama</a></button> | 
    <button type="logout" name="action" value="logout"><a href="logout.php">Logout</a></button>
</body>
</html>

<?php
class Bank {
    private $saldo;

    public function __construct($saldo) {
        $this->saldo = $saldo;
    }

    public function getSaldo() {
        return "Saldo saat ini: Rp. " . number_format($this->saldo) . "<br>";
    }

    public function simpanUang($jumlah) {
        $this->saldo += $jumlah;
        echo "Anda menyimpan uang sebesar Rp. " . number_format($jumlah) . "<br>";
    }

    public function ambilUang($jumlah) {
        
        if ($jumlah > $this->saldo) {
            echo "Saldo tidak mencukupi untuk transfer.<br>";
        } else {
            $this->saldo -= $jumlah;
            echo "transfer berhasil " . number_format($jumlah) . "<br>";
        }
    }       

    public function transferUang($jumlah) {
        if ($jumlah > $this->saldo) {
            echo "saldo tidak cukup untuk transfer.<br>";
        } else {
            $this->saldo -= $jumlah;
            echo "berhasil transfer sebesar " . number_format($jumlah) . "<br>";
        }
    }       

    }




?>