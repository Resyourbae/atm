<?php 
 $server = "localhost";
 $user = "root";
 $password = "";
 $db = "Atm";

 $con = mysqli_connect("localhost", "root", "", "Atm");

 if($con){
    echo "berhasil";
 }
 else{
    echo "gagal";
 }
?>