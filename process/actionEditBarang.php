<?php
// Include DB connection file
include '../helper/connection.php';

// Get the form update value
$idBarang = $_POST["idBarang"];
$namaBarang = $_POST["namaBarang"];
$hargaBarang = $_POST["hargaBarang"];
$jumlah = $_POST["jumlah"];

// Update query command
$query = "UPDATE tb_barang 
    SET nama_barang = '$namaBarang', harga_barang = '$hargaBarang', jml_barang = '$jumlah'
    WHERE id_barang = $idBarang";

// Do insert query
if (mysqli_query($con, $query)) {
    header("Location:../index.php");
} else {
    $error = urldecode("Data tidak berhasil di update");
    header("Location:../index.php?error=$error");
}

// close mysql connection
mysqli_close($con); 

?>