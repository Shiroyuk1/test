<?php

    
// Koneksi
$conn = mysqli_connect("localhost", "root", "", "mahasiswa");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data){
    global $conn;
    // ambil data tiap elemen dalam form
    $NIM = htmlspecialchars($data["NIM"]);
    $nama = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $fakultas = $_POST['fakultas'];
    $noTlp = htmlspecialchars($data["noTlp"]);
    $jk = $_POST['jk'];
    $gambar = $_FILES["gambar"]["name"];

    // ambil nilai checkbox hobby
    $hobbyArray = $_POST["hobby"];
    $hobby = implode(", ", $hobbyArray);

    // query insert data
    $query = "INSERT INTO mahasiswa
                VALUES
                ('', '$nama', '$NIM', '$hobby', '$prodi', '$gambar','$fakultas','$noTlp','$jk')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($id, $data) {
    global $conn;
    $NIM = htmlspecialchars($data["NIM"]);
    $nama = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $fakultas = $_POST['fakultas'];
    $noTlp = htmlspecialchars($data["noTlp"]);
    $jk = $_POST['jk'];

    $hobbyArray = $_POST["hobby"];
    $hobby = implode(", ", $hobbyArray);

    // cek apakah ada gambar yang diunggah
    if ($_FILES['gambar']['error'] === 0) {
        $gambar = $_FILES["gambar"]["name"];
    } else {
        $gambar = $data["gambar"]; // gunakan nama gambar yang sudah ada di database
    }


    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                NIM = '$NIM',
                hobby = '$hobby',
                prodi = '$prodi',
                gambar = '$gambar',
                fakultas = '$fakultas',
                noTlp = '$noTlp',
                jk = '$jk'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword){
    $query = "SELECT * FROM mahasiswa
                WHERE
                nama LIKE '%$keyword%' OR
                NIM LIKE '%$keyword%' OR
                hobby LIKE '%$keyword%' OR
                jk LIKE '%$keyword%' OR
                noTlp LIKE '%$keyword%' OR
                fakultas LIKE '%$keyword%' OR
                prodi LIKE '%$keyword%'
    ";

    return query($query);
}


function tampil($id) {
    global $conn;

    $query = "SELECT * FROM mahasiswa WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute(['id' => $id]);
    $mahasiswa = $stmt->fetch();

    return $mahasiswa;
}

?>