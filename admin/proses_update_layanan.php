<?php
include('header_admin.php');
include('../config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari form
    $judul_sarana     = pg_escape_string($conn, $_POST['judul_sarana']);
    $isi_sarana       = pg_escape_string($conn, $_POST['isi_sarana']);
    $judul_konsultasi = pg_escape_string($conn, $_POST['judul_konsultasi']);
    $isi_konsultasi   = pg_escape_string($conn, $_POST['isi_konsultasi']);

    // Query UPSERT (Update jika ada, Insert jika belum)
    // Kita lakukan satu per satu untuk setiap field
    
    $queries = [
        "INSERT INTO konten_teks (kunci, isi) VALUES ('layanan_sarana_judul', '$judul_sarana') ON CONFLICT (kunci) DO UPDATE SET isi = '$judul_sarana'",
        "INSERT INTO konten_teks (kunci, isi) VALUES ('layanan_sarana_isi', '$isi_sarana') ON CONFLICT (kunci) DO UPDATE SET isi = '$isi_sarana'",
        "INSERT INTO konten_teks (kunci, isi) VALUES ('layanan_konsultasi_judul', '$judul_konsultasi') ON CONFLICT (kunci) DO UPDATE SET isi = '$judul_konsultasi'",
        "INSERT INTO konten_teks (kunci, isi) VALUES ('layanan_konsultasi_isi', '$isi_konsultasi') ON CONFLICT (kunci) DO UPDATE SET isi = '$isi_konsultasi'"
    ];

    $berhasil = true;
    foreach ($queries as $sql) {
        if (!pg_query($conn, $sql)) {
            $berhasil = false;
            echo "Error: " . pg_last_error($conn);
            break;
        }
    }

    if ($berhasil) {
        echo "<script>alert('Halaman Layanan berhasil diperbarui!'); window.location='kelola_layanan.php';</script>";
    }

} else {
    header("Location: kelola_layanan.php");
    exit();
}
?>