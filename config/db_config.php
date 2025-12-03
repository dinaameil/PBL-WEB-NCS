<?php

// --- PENGATURAN KONEKSI DATABASE POSTGRESQL ---
// (Sesuaikan ini dengan pengaturan pgAdmin kamu)

$DB_HOST = "localhost";
$DB_PORT = "5432";      // Port default PostgreSQL
$DB_USER = "postgres";  // User default PostgreSQL
$DB_PASS = "123";     // GANTI DENGAN PASSWORD pgAdmin-mu
$DB_NAME = "pbl_web_ncs"; // Nama database kita

// --- Buat String Koneksi ---
$conn_string = "host={$DB_HOST} port={$DB_PORT} dbname={$DB_NAME} user={$DB_USER} password={$DB_PASS}";

// --- Buat Koneksi ---
$conn = pg_connect($conn_string);

// --- Cek Koneksi ---
if (!$conn) {
    // Jika koneksi gagal, hentikan script dan tampilkan error
    die("KONEKSI GAGAL: Tidak bisa terhubung ke database PostgreSQL.");
}

// Jika berhasil, file ini siap di-include
// echo "Koneksi PostgreSQL berhasil!"; // (Hapus komentar ini jika sudah tes)

?>