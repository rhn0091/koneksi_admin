<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=utf-8");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ukk_amri";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);


// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Periksa apakah terdapat permintaan POST untuk pengeditan data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui POST
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $deskripsi = $_POST['deskripsi'];

    // Query untuk mengupdate data berdasarkan ID
    $sql = "UPDATE barang SET nama_barang='$nama_barang', harga='$harga', jumlah='$jumlah', deskripsi='$deskripsi' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully";
    } else {
        echo "Error updating data: " . $conn->error;
    }
} else {
    echo "No data updated";
}

// Tutup koneksi
$conn->close();
?>
