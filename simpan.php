<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=utf-8");

// Menghubungkan ke database
include_once("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data POST
    $nama_barang = mysqli_real_escape_string($db, $_POST["nama_barang"]);
    $harga = floatval($_POST["harga"]);
    $jumlah = intval($_POST["jumlah"]);
    $deskripsi = mysqli_real_escape_string($db, $_POST["deskripsi"]);

    // Menyiapkan SQL statement dengan parameterized query
    $stmt = $db->prepare("INSERT INTO barang (nama_barang, harga, jumlah, deskripsi) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdis", $nama_barang, $harga, $jumlah, $deskripsi);

    // Menjalankan query
    if ($stmt->execute()) {
        echo json_encode(["status" => "Success", "message" => "Data berhasil disimpan."]);
    } else {
        echo json_encode(["status" => "Error", "message" => "Gagal menyimpan data."]);
    }

    // Menutup statement dan koneksi
    $stmt->close();
    $db->close();
} else {
    echo json_encode(["status" => "Error", "message" => "Request method not allowed."]);
}
?>
