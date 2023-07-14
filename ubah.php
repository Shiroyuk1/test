<?php
require 'function.php';

// ambil data du URL
$id = $_GET['id'];
$mhs = query("SELECT* FROM mahasiswa WHERE id = $id")[0];

if ( isset($_POST["submit"])) {
    // cek apakah data berhasil diubah atau ngga
    if ( ubah($id, $_POST) > 0){
        // echo "Data Diubah";
        echo "
            <script>
                alert('Data Berhasil diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        // echo "Data Gagal Diubah";
        echo "
            <script>
                alert('Data Gagal diubah');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ubah Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
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
		<div class="row">
			<div class="col-md-20 mb-4 text-center">
				<h2 class="text-uppercase">Ubah data mahasiswa</h2>
			</div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama :</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs['nama'];?>">
                </div>
                <div class="mb-3">
                    <label for="NIM" class="form-label">NIM :</label>
                    <input type="text" class="form-control" id="NIM" name="NIM" required value="<?= $mhs['NIM'];?>">
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Prodi :</label>
                    <select class="form-select" aria-label="Default select example" id="prodi" name="prodi">
                        <option selected>Pilih prodi</option>
                        <option value="Teknik Telekomunikasi" <?php if ($mhs['prodi'] == 'Teknik Telekomunikasi') echo 'selected'; ?>>Teknik Telekomunikasi</option>
                        <option value="Teknik komputer" <?php if ($mhs['prodi'] == 'Teknik komputer') echo 'selected'; ?>>Teknik komputer</option>
                        <option value="Teknik Elektro" <?php if ($mhs['prodi'] == 'Teknik Elektro') echo 'selected'; ?>>Teknik Elektro</option>
                        <option value="Teknik Industri" <?php if ($mhs['prodi'] == 'Teknik Industri') echo 'selected'; ?>>Teknik Industri</option>
                        <option value="Teknik Logistik" <?php if ($mhs['prodi'] == 'Teknik Logistik') echo 'selected'; ?>>Teknik Logistik</option>
                        <option value="Sistem Informasi" <?php if ($mhs['prodi'] == 'Sistem Informasi') echo 'selected'; ?>>Sistem Informasi</option>
                        <option value="Teknologi Informasi" <?php if ($mhs['prodi'] == 'Teknologi Informasi') echo 'selected'; ?>>Teknologi Informasi</option>
                        <option value="Informatika" <?php if ($mhs['prodi'] == 'Informatika') echo 'selected'; ?>>Informatika</option>
                        <option value="Sains Data" <?php if ($mhs['prodi'] == 'Sains Data') echo 'selected'; ?>>Sains Data</option>
                        <option value="Rekayasa Perangkat Lunak" <?php if ($mhs['prodi'] == 'Rekayasa Perangkat Lunak') echo 'selected'; ?>>Rekayasa Perangkat Lunak</option>
                        <option value="Bisnis Digital" <?php if ($mhs['prodi'] == 'Bisnis Digital') echo 'selected'; ?>>Bisnis Digital</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fakultas" class="form-label">Fakultas :</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="FTIB" id="fakultas-ftib" name="fakultas" <?php if ($mhs['fakultas'] == 'FTIB') echo 'checked'; ?>>
                        <label class="form-check-label" for="fakultas-ftib">
                            FTIB
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="FTEIC" id="fakultas-fteic" name="fakultas" <?php if ($mhs['fakultas'] == 'FTEIC') echo 'checked'; ?>>
                        <label class="form-check-label" for="fakultas-fteic">
                            FTEIC
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="noTlp" class="form-label">No. Telpon :</label>
                    <input type="text" class="form-control" id="noTlp" name="noTlp" value="<?= $mhs['noTlp'];?>">
                </div>
                <div class="mb-3">
                    <label for="hobby" class="form-label">Hobby :</label>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Membaca" id="checkbox1" name="hobby[]" <?php if (in_array('Membaca', explode(', ', $mhs['hobby']))) echo 'checked'; ?>>
                                <label class="form-check-label" for="checkbox1">
                                    Membaca
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Olahraga" id="checkbox2" name="hobby[]" <?php if (in_array('Olahraga', explode(', ', $mhs['hobby']))) echo 'checked'; ?>>
                                <label class="form-check-label" for="checkbox2">
                                    Olahraga
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mendengarkan musik" id="checkbox3" name="hobby[]" <?php if (in_array('Mendengarkan musik', explode(', ', $mhs['hobby']))) echo 'checked'; ?>>
                                <label class="form-check-label" for="checkbox3">
                                    Mendengarkan musik
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Bermain Game" id="checkbox4" name="hobby[]" <?php if (in_array('Bermain game', explode(', ', $mhs['hobby']))) echo 'checked'; ?>>
                                <label class="form-check-label" for="checkbox4">
                                    Bermain game
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Jalan-jalan" id="checkbox5" name="hobby[]" <?php if (in_array('Jalan-jalan', explode(', ', $mhs['hobby']))) echo 'checked'; ?>>
                                <label class="form-check-label" for="checkbox5">
                                    Jalan-jalan
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mancing" id="checkbox6" name="hobby[]" <?php if (in_array('Mancing', explode(', ', $mhs['hobby']))) echo 'checked'; ?>>
                                <label class="form-check-label" for="checkbox6">
                                    Mancing
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mancing" id="checkbox6" name="hobby[]" <?php if (in_array('Masak', explode(', ', $mhs['hobby']))) echo 'checked'; ?>>
                                <label class="form-check-label" for="checkbox6">
                                    Masak
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mancing" id="checkbox6" name="hobby[]" <?php if (in_array('Tidur', explode(', ', $mhs['hobby']))) echo 'checked'; ?>>
                                <label class="form-check-label" for="checkbox6">
                                    Tidur
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin :</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Laki-laki" id="jk-lakilaki" name="jk" <?php if ($mhs['jk'] == 'Laki-laki') echo 'checked'; ?>>
                        <label class="form-check-label" for="jk-lakilaki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Perempuan" id="jk-perempuan" name="jk" <?php if ($mhs['jk'] == 'Perempuan') echo 'checked'; ?>>
                        <label class="form-check-label" for="jk-perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Pilih Foto</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                </div>
                <div class="row">
                <div class="col-md-6 text-start">
                    <a class="btn btn-primary" href="index.php" role="button">Kembali</a>
                    </div>
                <div class="col-md-6 text-end">
                    <button class="btn btn-success" type="submit" name="submit">Simpan</button>
                </div>
                </div>
            </form>
		</div>
	</div>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $file = $_FILES['gambar'];
    $fileName = $_FILES['gambar']['name'];
    $fileTmpName = $_FILES['gambar']['tmp_name'];
    $fileSize = $_FILES['gambar']['size'];
    $fileError = $_FILES['gambar']['error'];
    $fileType = $_FILES['gambar']['type'];

    if($fileError === UPLOAD_ERR_OK){
        $uploadPath = 'img/' . $fileName;
        if(move_uploaded_file($fileTmpName, $uploadPath)){
            echo "Gambar berhasil diunggah dan disimpan.";
        } else {
            echo "Terjadi kesalahan saat menyimpan file.";
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah gambar.";
    }
}
?>