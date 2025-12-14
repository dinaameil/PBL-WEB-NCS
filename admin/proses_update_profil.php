<?php
session_start();
include('../config/db_config.php');

// Cek akses via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Amankan input Visi Misi
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

    // --- 3. UPDATE FOTO LAB UTAMA (Bagian ini yang diubah) ---
    // Cek apakah ada file 'foto_lab_baru' yang diupload dan tidak error
    if (isset($_FILES['foto_lab_baru']) && $_FILES['foto_lab_baru']['error'] == 0) {
        
        $target_dir = "../img/"; // Folder tujuan
        // Beri nama unik: fotolab_TIMESTAMP_namafileasli
        $file_name = "fotolab_" . time() . "_" . basename($_FILES["foto_lab_baru"]["name"]);
        $target_file = $target_dir . $file_name;
        $db_path = "img/" . $file_name; // Path yang disimpan di DB
        
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png'];

        // Validasi tipe file
        if (in_array($imageFileType, $allowed_types)) {
            // Upload file
            if (move_uploaded_file($_FILES["foto_lab_baru"]["tmp_name"], $target_file)) {
                
                // Jika sukses upload, update path di database dengan kunci 'foto_lab_path'
                $cek_foto = pg_query($conn, "SELECT 1 FROM konten_teks WHERE kunci = 'foto_lab_path'");
                
                if (pg_num_rows($cek_foto) > 0) {
                    // Update jika sudah ada
                    $q_foto = "UPDATE konten_teks SET isi = '$db_path' WHERE kunci = 'foto_lab_path'";
                } else {
                    // Insert jika belum ada
                    $q_foto = "INSERT INTO konten_teks (kunci, isi) VALUES ('foto_lab_path', '$db_path')";
                }
                pg_query($conn, $q_foto);
            } else {
                 echo "<script>alert('Gagal mengupload foto. Periksa permission folder.'); window.location='edit_profil.php';</script>";
                 exit();
            }
        } else {
             echo "<script>alert('Format file tidak sesuai. Hanya JPG atau PNG.'); window.location='edit_profil.php';</script>";
             exit();
        }
    }

    // Redirect kembali ke halaman edit
    echo "<script>alert('Data Profil & Foto Berhasil Diperbarui!'); window.location='edit_profil.php';</script>";

} else {
    header("Location: edit_profil.php");
}
?>