<?php
require 'function.php';

if (isset($_GET['id'])) {
	// Ambil ID dari parameter URL
	$id = $_GET['id'];

	$mhs = query("SELECT* FROM mahasiswa WHERE id = $id")[0];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Detail Mahasiswa</title>
</head>
<body class="bg-body">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
	<!-- NAVBAR -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<div class="container-fluid">
    		<a class="navbar-brand">Institut Tekonologi Kyoto</a>
    		
  		</div>
	</nav>
	<!-- <div style="background-image: url(https://cdn.shopify.com/s/files/1/0533/2089/files/5-websites-to-download-free-subtle-textures-subtle.jpg?5724472906039650661)"> -->
	<!-- MAIN -->
	<div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
          <div class="col-10 col-sm-8 col-lg-6">
			<h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 text-uppercase"><?= $mhs['nama'];?></h1>
			<form>
				<div class="row mb-3">
					<label for="NIM" class="col-sm-2 col-form-label">NIM</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="NIM" name="NIM" required value="<?= $mhs['NIM'];?>" disabled readonly>
					</div>
				</div>
				<div class="row mb-3">
					<label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="prodi" name="prodi" value="<?= $mhs['prodi'];?>" disabled readonly>
					</div>
				</div>
				<div class="row mb-3">
					<label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="fakultas" name="fakultas" value="<?= $mhs['fakultas'];?>" disabled readonly>
					</div>
				</div>
				<div class="row mb-3">
					<label for="hobby" class="col-sm-2 col-form-label">Hobby</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="hobby" name="hobby" value="<?= $mhs['hobby'];?>" disabled readonly>
					</div>
				</div>
				<div class="row mb-3">
					<label for="noTlp" class="col-sm-2 col-form-label">No. Telepon</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="noTlp" name="noTlp" value="<?= $mhs['noTlp'];?>" disabled readonly>
					</div>
				</div>
				<div class="row mb-3">
					<label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="jk" name="jk" value="<?= $mhs['jk'];?>" disabled readonly>
					</div>
				</div>
				<a href="index.php" class="btn btn-primary">Kembali</a>
			</form>
          </div>
          <div class="col-lg-6">
		  	<img src="img/<?= $mhs['gambar'];?>" alt="foto_mhs" class="d-block mx-lg-auto img-fluid" width="50%" alt="foto_ayank" loading="lazy" />
          </div>
        </div>
      </div>
</body>
</html>
