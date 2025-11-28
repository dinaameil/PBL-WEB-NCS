<?php
include('header_admin.php');
include('../config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Ambil data dari form (Perhatikan nama variabelnya sudah disesuaikan)
    // Menggunakan pg_escape_string untuk keamanan database PostgreSQL
    $judul_sarana     = pg_escape_string($conn, $_POST['judul_sarana']);
    $isi_sarana       = pg_escape_string($conn, $_POST['isi_sarana']);
    $judul_konsultasi = pg_escape_string($conn, $_POST['judul_konsultasi']);
    $isi_konsultasi   = pg_escape_string($conn, $_POST['isi_konsultasi']);

    // 2. Siapkan query-query UPDATE / UPSERT
    // Kita gunakan logika: "Coba INSERT, kalau kuncinya sudah ada, lakukan UPDATE"
    
    // --- BAGIAN SARANA ---
    $sql1 = "INSERT INTO konten_teks (kunci, isi) VALUES ('layanan_sarana_judul', '$judul_sarana') 
             ON CONFLICT (kunci) DO UPDATE SET isi = '$judul_sarana'";
             
    $sql2 = "INSERT INTO konten_teks (kunci, isi) VALUES ('layanan_sarana_isi', '$isi_sarana') 
             ON CONFLICT (kunci) DO UPDATE SET isi = '$isi_sarana'";
             
    // --- BAGIAN KONSULTASI ---
    $sql3 = "INSERT INTO konten_teks (kunci, isi) VALUES ('layanan_konsultasi_judul', '$judul_konsultasi') 
             ON CONFLICT (kunci) DO UPDATE SET isi = '$judul_konsultasi'";
             
    $sql4 = "INSERT INTO konten_teks (kunci, isi) VALUES ('layanan_konsultasi_isi', '$isi_konsultasi') 
             ON CONFLICT (kunci) DO UPDATE SET isi = '$isi_konsultasi'";

    // 3. Eksekusi semua query
    $r1 = pg_query($conn, $sql1);
    $r2 = pg_query($conn, $sql2);
    $r3 = pg_query($conn, $sql3);
    $r4 = pg_query($conn, $sql4);

    // 4. Cek hasil
    if ($r1 && $r2 && $r3 && $r4) {
        // Berhasil, kembalikan ke halaman edit
        echo "<script>alert('Data layanan berhasil diperbarui!'); window.location='kelola_layanan.php';</script>";
        exit();
    } else {
        // Gagal
        echo "Error: " . pg_last_error($conn);
    }

} else {
    header("Location: dashboard.php");
    exit();
}
?>