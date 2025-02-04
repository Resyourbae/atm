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
            $bank->transferUang($jumlah);
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Bank Tabungan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #2F4F4F;
    }

    .container {
        width: 500px;
        height: 500px;
        box-sizing: border-box;
        border-radius: 10px;
        background-color: #eee;
        box-shadow: -6px 8px 3px #F0F8FF;
    }

    a {
        color: #fff;
        text-decoration: none;
    }
</style>

<body>

    <div class="container mt-5">
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <h2 class="text-center p-4">Bank Tabungan ATM</h2>

        <!-- Tampilkan saldo -->
        <p><?php echo $bank->getSaldo(); ?></p>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="jumlah">Jumlah Uang: </label>
                <input type="number" id="jumlah" name="jumlah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="norek">nomor rekening</label>
                <input type="number" id="norek" name="norek" class="form-control" required>
            </div>
            <button class="btn btn-warning" type="submit" name="action" value="simpan">Simpan Uang</button>
            <button class="btn btn-warning" type="submit" name="action" value="ambil">Ambil Uang</button>
            <button class="btn btn-warning" type="submit" name="action" value="ambil">transfer</button>
        </form>

        <br>
        <button class="btn btn-primary" type="back" name="action" value="back"><a href="ATM.php">Menu Utama</a></button> |
        <button class="btn btn-primary" type="logout" name="action" value="logout"><a href="logout.php">Logout</a></button>
    </div>
    </div>
</body>

</html>

<?php
class Bank
{
    private $saldo;

    public function __construct($saldo)
    {
        $this->saldo = $saldo;
    }

    public function getSaldo()
    {
        return "Saldo saat ini: Rp. " . number_format($this->saldo) . "<br>";
    }

    public function simpanUang($jumlah)
    {
        $this->saldo += $jumlah;
        echo "Anda menyimpan uang sebesar Rp. " . number_format($jumlah) . "<br>";
    }

    public function ambilUang($jumlah)
    {

        if ($jumlah > $this->saldo) {
            echo "Saldo tidak mencukupi untuk transfer.<br>";
        } else {
            $this->saldo -= $jumlah;
            echo "transfer berhasil " . number_format($jumlah) . "<br>";
        }
    }

    public function transferUang($jumlah)
    {
        if ($jumlah > $this->saldo) {
            echo "saldo tidak cukup untuk transfer.<br>";
        } else {
            $this->saldo -= $jumlah;
            echo "berhasil transfer sebesar " . number_format($jumlah) . "<br>";
        }
    }
}




?>