<?php 
require "bank.php";
?>
<?php 
 class saldo{
    private $saldo;
    public function __construct($saldo){
        $this->saldo = $saldo;
    }
    public function getSaldo(){
        return "Saldo saat ini: Rp."
        . number_format($this->saldo) . "<br>";  
    }

}
?>
