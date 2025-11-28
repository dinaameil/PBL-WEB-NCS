<?php
include('header_admin.php');
include('../config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = pg_escape_string($conn, $_POST['nama']);
    $jabatan = pg_escape_string($conn, $_POST['jabatan']);
    $foto_path_db = ""; 

    // Proses Upload Foto
    if (isset($_FILES['foto_pengurus']) && $_FILES['foto_pengurus']['error'] == 0) {
        
        $file = $_FILES['foto_pengurus'];
        // Ganti nama file biar unik (pake waktu)
        $file_name = time() . '_' . basename($file['name']);
        
        // Folder tujuan (Pastikan folder img/pengurus sudah dibuat di luar folder admin)
        $target_dir_server = "../img/pengurus/"; 
        
        // Buat folder kalau belum ada
        if (!file_exists($target_dir_server)) {
            mkdir($target_dir_server, 0777, true);
        }

        $target_file_server = $target_dir_server . $file_name;
        
        if (move_uploaded_file($file['tmp_name'], $target_file_server)) {
            // Path yang disimpan di database (tanpa ../)
            $foto_path_db = "img/pengurus/" . $file_name; 
        } else {
            echo "<script>alert('Gagal upload gambar!'); window.location='kelola_pengurus.php';</script>";
            exit();
        }
    }

    // Insert ke PostgreSQL
    $sql = "INSERT INTO pengurus (nama, jabatan, foto_path) VALUES ($1, $2, $3)";
    $result = pg_query_params($conn, $sql, [$nama, $jabatan, $foto_path_db]);

    if ($result) {
        echo "<script>alert('Data pengurus berhasil ditambahkan!'); window.location='kelola_pengurus.php';</script>";
    } else {
        echo "Error: " . pg_last_error($conn);
    }

} else {
    header("Location: kelola_pengurus.php");
    exit();
}
?>