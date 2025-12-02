<?php
include('header_admin.php');
include('../config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $judul = pg_escape_string($conn, $_POST['judul']);
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];

    // Upload File
    if (isset($_FILES['file_arsip']) && $_FILES['file_arsip']['error'] == 0) {
        $file = $_FILES['file_arsip'];
        $file_name = time() . '_' . basename($file['name']);
        
        // Buat folder dokumen jika belum ada (di luar folder admin)
        $target_dir = "../dokumen/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi PDF
        if ($file_type != "pdf") {
            echo "<script>alert('Hanya file PDF yang diperbolehkan!'); window.location='kelola_arsip.php';</script>";
            exit();
        }

        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            // Path simpan di DB (tanpa ../)
            $db_path = "dokumen/" . $file_name;

            $sql = "INSERT INTO arsip (judul, kategori, tanggal, file_path) VALUES ($1, $2, $3, $4)";
            $result = pg_query_params($conn, $sql, [$judul, $kategori, $tanggal, $db_path]);

            if ($result) {
                echo "<script>alert('Dokumen berhasil diunggah!'); window.location='kelola_arsip.php';</script>";
            } else {
                echo "Error: " . pg_last_error($conn);
            }
        }
    }
}
?>