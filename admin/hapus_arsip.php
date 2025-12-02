<?php
include('../config/db_config.php'); // Cukup include DB saja

$id = (int)$_GET['id'];

if ($id > 0) {
    // Ambil path file
    $sql = "SELECT file_path FROM arsip WHERE id = $1";
    $res = pg_query_params($conn, $sql, [$id]);
    $data = pg_fetch_assoc($res);

    // Hapus DB
    $del = pg_query_params($conn, "DELETE FROM arsip WHERE id = $1", [$id]);

    if ($del) {
        // Hapus file fisik
        if ($data && !empty($data['file_path'])) {
            $file = '../' . $data['file_path'];
            if (file_exists($file)) unlink($file);
        }
        echo "<script>alert('Dokumen dihapus!'); window.location='kelola_arsip.php';</script>";
    }
}
?>