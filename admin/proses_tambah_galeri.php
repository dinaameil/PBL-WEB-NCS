<?php
include('header_admin.php');
include('../config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $judul = pg_escape_string($conn, $_POST['judul']);
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    
    // Upload Foto
    if (isset($_FILES['foto_galeri']) && $_FILES['foto_galeri']['error'] == 0) {
        $file = $_FILES['foto_galeri'];
        $file_name = time() . '_' . basename($file['name']);
        
        // Buat folder galeri jika belum ada
        $target_dir = "../img/galeri/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . $file_name;
        
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            $foto_path_db = "img/galeri/" . $file_name; 

            // Simpan ke DB
            $sql = "INSERT INTO galeri (judul, tanggal, kategori, foto_path) VALUES ($1, $2, $3, $4)";
            $result = pg_query_params($conn, $sql, [$judul, $tanggal, $kategori, $foto_path_db]);

            if ($result) {
                echo "<script>alert('Foto berhasil diupload!'); window.location='kelola_galeri.php';</script>";
            } else {
                echo "Error DB: " . pg_last_error($conn);
            }
        } else {
            echo "<script>alert('Gagal upload file!'); window.location='kelola_galeri.php';</script>";
        }
    }
}
?>