<?php
/***** Include db connection file *****/

include 'helper/connection.php';

?>
<html>
    <!-- Include header.php that contain header informations -->
    <?php include 'header.php' ?>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Toko Maju Mundur Bersama Tbk.</a>
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <h2 class="mt-3 text-center">Daftar Barang</h2>
            <?php
            /***** Get get error message from actionAddBarang.php ******/
            $message = '';
            if(isset($_GET["error"])) {
                $message = $_GET["error"];
                echo "
                <p style='color:red; font-style:italic'>$message</p>
                ";
            }
            ?>
            <a href="formAddBarang.php" class="btn btn-success mt-3">Tambah Barang</a>
            <div class="row">
                <table class="table table-stripped text-center mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Query command
                    $query = "SELECT * FROM tb_barang";
                    // Do query
                    // $con is db connection
                    // $query is query command
                    $result = mysqli_query($con, $query);

                    // Check row number, if we have data on db ( > 0), show the result data
                    if (mysqli_num_rows($result) > 0){
                        // Create row index
                        $index = 1;
                        // Do loop through data
                        while($row = mysqli_fetch_assoc($result)){
                            // Print result to HTML structure
                            // $row is the iterator
                            // nama_barang, harga_barang, and jml_barang is array key,
                            // They are the coloums names in table tb_barang
                            echo "
                            <tr>
                                <td>" . $index++ . "</td>
                                <td>" .$row["nama_barang"]. "</td>
                                <td>" .$row["harga_barang"]. "</td>
                                <td>" .$row["jml_barang"]. "</td>
                                <td>Action Button</td>
                            </tr>
                            ";
                        }
                    }
                    // close mysql connection
                    mysqli_close($con); 
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    <body>
</html>