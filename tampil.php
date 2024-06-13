<?php
include "koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM tb_datatamu");

if (!$query) {
    // Jika terjadi kesalahan saat menjalankan kueri, kirim pesan kesalahan
    die(json_encode(["error" => mysqli_error($conn)]));
}

$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

// Periksa apakah ada data yang diambil
if ($data) {
    // Mengirim respons JSON jika data berhasil diambil
    echo json_encode($data);
} else {
    // Mengirim pesan kesalahan jika tidak ada data yang diambil
    die(json_encode(["error" => "Data tidak ditemukan"]));
}
?>