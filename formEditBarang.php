<?php
/***** Include db connection file *****/
include 'helper/connection.php';

/***** QUERY TO GET SPECIFIC ITEM *****/
$id_barang = $_GET["id"]; // get id_barang from url

$query = "SELECT * FROM tb_barang WHERE id_barang = $id_barang";
$result = mysqli_query($con, $query);

$item = ''; // query result holder variable
if(mysqli_num_rows($result) == 1) {
    $item = mysqli_fetch_assoc($result);
} else {
    echo "Barang tidak ditemukan";
}
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
            <h2 class="mt-3 text-center">Form Tambah Barang</h2>
            <div class="row mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8">

                    <!-- We add value form query result to inputs -->

                    <form action="process/actionEditBarang.php" method="POST">
                        
                        <!-- 
                            We still need id_barang to inform update query command
                            User doesn't need to know the id_barang, so make it hidden
                        -->
                        <input type="hidden" name="idBarang" value="<?php echo $item["id_barang"] ?>">
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Nama Barang</label>
                            <div class="col-md-9">
                                <input type="text" name="namaBarang" id="namaBarang" class="form-control" placeholder="Nama Barang" required 
                                value="<?php echo $item["nama_barang"] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Harga Satuan</label>
                            <div class="col-md-9">
                                <input type="number" name="hargaBarang" id="hargaBarang" class="form-control" placeholder="Harga Satuan" required
                                value="<?php echo $item["harga_barang"] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Jumlah</label>
                            <div class="col-md-9">
                                <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah Barang" required
                                value="<?php echo $item["jml_barang"] ?>">
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <div class="col-md-4">
                                <!-- Back to home -->
                                <a name="backBtn" id="backBtn" class="btn btn-dark btn-block" href="index.php" role="button">Kembali</a>
                            </div>
                            <div class="col-md-4">
                                <!-- Clear form value using JS. Please check clearForm function -->
                                <button name="clearFormBtn" id="clearFormBtn" class="btn btn-warning btn-block" role="button" onclick="clearForm()">Clear</button>
                            </div>
                            <div class="col-md-4">
                                <!-- Input button to submit form. Please check href attribute -->
                                <input type="submit" name="tambah" class="btn btn-success btn-block" value="Update"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    <script>
        // clear form input
        function clearForm() {
            $('#namaBarang').val('');
            $('#hargaBarang').val('');
            $('#jumlah').val('');
        }
    </script>
    <body>
</html>