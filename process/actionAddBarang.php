<?php
// Include DB connection file
include '../helper/connection.php';

// Get the form value
$namaBarang = $_POST["namaBarang"];
$hargaBarang = $_POST["hargaBarang"];
$jumlah = $_POST["jumlah"];

// Insert query command
$query = "INSERT INTO tb_barang (nama_barang, harga_barang, jml_barang) 
    VALUES ('$namaBarang', '$hargaBarang', '$jumlah')";

// Do insert query
if (mysqli_query($con, $query)) {
    header("Location:../index.php");
} else {
    $error = urldecode("Data tidak berhasil ditambahakan");
    header("Location:../index.php?error=$error");
}

// close mysql connection
mysqli_close($con); 

?>