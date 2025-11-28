<?php
include('header_admin.php');
include('../config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Ambil semua data
    $id = (int)$_POST['id'];
    $nama = pg_escape_string($conn, $_POST['nama']);
    $jabatan = pg_escape_string($conn, $_POST['jabatan']);
    $foto_lama_path = pg_escape_string($conn, $_POST['foto_lama']);

    $foto_path_db = $foto_lama_path; // Defaultnya, pakai foto lama

    // 2. Cek apakah ada FOTO BARU yang diupload
    if (isset($_FILES['foto_baru']) && $_FILES['foto_baru']['error'] == 0) {
        
        // --- Ada foto baru, jalankan proses upload ---
        $file = $_FILES['foto_baru'];
        $file_name = time() . '_' . basename($file['name']);
        
        $target_dir_server = "../img/pengurus/"; 
        $target_file_server = $target_dir_server . $file_name;
        
        if (move_uploaded_file($file['tmp_name'], $target_file_server)) {
            // JIKA upload berhasil, update path foto baru
            $foto_path_db = "img/pengurus/" . $file_name; 
            
            // Hapus foto lama
            $file_path_lama_server = '../' . $foto_lama_path;
            if (file_exists($file_path_lama_server) && !empty($foto_lama_path)) {
                unlink($file_path_lama_server); 
            }
        } else {
            die("Error: Gagal upload foto baru.");
        }
    } 
    // --- Jika tidak ada foto baru, $foto_path_db tetap berisi $foto_lama_path ---

    // 3. Buat query UPDATE ke database
    $sql = "UPDATE pengurus SET nama = $1, jabatan = $2, foto_path = $3 WHERE id = $4";
    $result = pg_query_params($conn, $sql, [$nama, $jabatan, $foto_path_db, $id]);

    if ($result) {
        header("Location: kelola_pengurus.php");
        exit();
    } else {
        die("Error: " . pg_last_error($conn));
    }

} else {
    header("Location: kelola_pengurus.php");
    exit();
}
?>