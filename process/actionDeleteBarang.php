<?php
// Include DB connection file
include '../helper/connection.php';

// Get id from form
$idBarang = $_GET["id"];

// Delete query command
// This is not a gud way to delete data. We have a better choice to handle this
// This method called hard delete
// The better one is soft delete. We just need a "flag" for each data
$query = "DELETE FROM tb_barang WHERE id_barang = $idBarang";

// Do delete query
if (mysqli_query($con, $query)) {
    header("Location:../index.php");
} else {
    $error = urldecode("Data tidak berhasil di delete");
    header("Location:../index.php?error=$error");
}

// close mysql connection
mysqli_close($con); 

?>