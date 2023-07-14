<?php
require 'function.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

// tombil cari ditekan
if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Admin</title>
	<script src="script/jquery-3.7.0.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<script>
		$(document).ready(function () {
			var delayTimer;

			// Fungsi untuk menampilkan animasi loading
			function showLoading() {
				$("#spinner").show();
			}

			// Fungsi untuk menyembunyikan animasi loading
			function hideLoading() {
				$("#spinner").hide();
			}

			// Fungsi untuk melakukan pencarian
			function search() {
				var keyword = $("#search-input").val().toLowerCase();
				clearTimeout(delayTimer);

				showLoading(); // Menampilkan animasi loading

				// Delay untuk buffering saat pengguna mengetik
				delayTimer = setTimeout(function () {
					var $rows = $(".table tbody tr");
					var noResults = true;

					$rows.hide(); // Sembunyikan semua baris

					// Loop melalui setiap baris dan periksa keyword
					$rows.each(function () {
						var $row = $(this);
						var rowData = $row.text().toLowerCase();

						if (rowData.indexOf(keyword) > -1) {
							$row.show(); // Tampilkan baris jika keyword cocok
							noResults = false;
						}
					});

					hideLoading(); // Menyembunyikan animasi loading

					if (noResults) {
						$("#not-found").show(); // Tampilkan pesan "Not Found" jika tidak ada hasil
					} else {
						$("#not-found").hide(); // Sembunyikan pesan "Not Found" jika ada hasil
					}
				}, 300);
			}

			// Event listener saat tombol pencarian ditekan
			$("#search-button").click(function () {
				search();
			});

			// Event listener saat teks input pencarian berubah
			$("#search-input").on("keyup", function () {
				search();
			});
		});

	</script>
</head>

<body class="bg-body">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
		integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
		integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
		crossorigin="anonymous"></script>
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
				<h2 class="text-uppercase">Data mahasiswa</h2>
			</div>
			<div class="col-md-5 mv-3">
				<a class="btn btn-primary" href="tambah.php" role="button">Tambah data</a>
			</div>
			<div class="col-md-7 mb-3">
				<form class="d-flex" role="search" method="post">
					<input class="form-control me-2" type="text" placeholder="Cari data mahasiswa" id="search-input"
						aria-label="Search" name="keyword">
					<button class="btn btn-outline-success" id="search-button" type="submit" name="cari">
						<span class="spinner-border spinner-border-sm" id="spinner" role="status"
							aria-hidden="true"></span>
						Cari
					</button>
				</form>
			</div>
			<table class="table table-light table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Foto</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Prodi</th>
						<th>Fakultas</th>
						<th>Hobby</th>
						<th>No. Telpon</th>
						<th>Jenis kelamin</th>
						<th>Ubah | Hapus</th>
					</tr>
				</thead>

				<?php $i = 1; ?>

				<?php foreach ($mahasiswa as $row): ?>
					<tbody>
						<tr>
							<td>
								<?= $i; ?>
							</td>
							<td><img src="img/<?= $row["gambar"] ?>" alt="foto_mhs" width="70"></td>
							<td>
								<?= $row["NIM"] ?>
							</td>
							<td><a class="text-decoration-none text-dark" href="tampil.php?id=<?= $row["id"] ?>"><?= $row["nama"] ?></a></td>
							<td>
								<?= $row["prodi"] ?>
							</td>
							<td>
								<?= $row["fakultas"] ?>
							</td>
							<td>
								<?= $row["hobby"] ?>
							</td>
							<td>
								<?= $row["noTlp"] ?>
							</td>
							<td>
								<?= $row["jk"] ?>
							</td>
							<td>
								<a href="ubah.php?id=<?= $row["id"] ?>">Ubah</a> |
								<a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin?');">Hapus</a>
							</td>
						</tr>
						<?php $i++; ?>
					</tbody>

				<?php endforeach; ?>

			</table>
			<p id="not-found" style="display: none; text-align: center;">Not Found</p>

		</div>
	</div>
</body>

</html>