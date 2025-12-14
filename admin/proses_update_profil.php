<?php
session_start();
include('../config/db_config.php');

// Cek akses via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Amankan input
    $visi = pg_escape_string($conn, $_POST['visi']);
    $misi = pg_escape_string($conn, $_POST['misi']);

    // --- 1. UPDATE VISI ---
    $cek_visi = pg_query($conn, "SELECT 1 FROM konten_teks WHERE kunci = 'visi'");
    if (pg_num_rows($cek_visi) > 0) {
        $query_visi = "UPDATE konten_teks SET isi = '$visi' WHERE kunci = 'visi'";
    } else {
        $query_visi = "INSERT INTO konten_teks (kunci, isi) VALUES ('visi', '$visi')";
    }
    pg_query($conn, $query_visi);

    // --- 2. UPDATE MISI ---
    $cek_misi = pg_query($conn, "SELECT 1 FROM konten_teks WHERE kunci = 'misi'");
    if (pg_num_rows($cek_misi) > 0) {
        $query_misi = "UPDATE konten_teks SET isi = '$misi' WHERE kunci = 'misi'";
    } else {
        $query_misi = "INSERT INTO konten_teks (kunci, isi) VALUES ('misi', '$misi')";
    }
    pg_query($conn, $query_misi);

    // --- 3. UPDATE LOGO (Optional) ---
    if (isset($_FILES['logo_baru']) && $_FILES['logo_baru']['error'] == 0) {
        $target_dir = "../img/";
        // Beri nama unik agar gambar tidak bentrok/cache
        $file_name = "logo_" . time() . "_" . basename($_FILES["logo_baru"]["name"]);
        $target_file = $target_dir . $file_name;
        $db_path = "img/" . $file_name;
        
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png'];

        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES["logo_baru"]["tmp_name"], $target_file)) {
                // Update database path
                $cek_logo = pg_query($conn, "SELECT 1 FROM konten_teks WHERE kunci = 'logo_path'");
                if (pg_num_rows($cek_logo) > 0) {
                    $q_logo = "UPDATE konten_teks SET isi = '$db_path' WHERE kunci = 'logo_path'";
                } else {
                    $q_logo = "INSERT INTO konten_teks (kunci, isi) VALUES ('logo_path', '$db_path')";
                }
                pg_query($conn, $q_logo);
            }
        }
    }

    // Redirect kembali ke halaman edit
    echo "<script>alert('Data Profil Berhasil Diperbarui!'); window.location='edit_profil.php';</script>";

} else {
    header("Location: edit_profil.php");
}
?>