<?php
include('header_admin.php');
include('../config/db_config.php');

$id = (int)$_GET['id'];

if ($id > 0) {
    // 1. Ambil path foto dulu
    $sql_cek = "SELECT foto_path FROM pengurus WHERE id = $1";
    $res_cek = pg_query_params($conn, $sql_cek, [$id]);
    $data = pg_fetch_assoc($res_cek);

    // 2. Hapus dari Database
    $sql_del = "DELETE FROM pengurus WHERE id = $1";
    $res_del = pg_query_params($conn, $sql_del, [$id]);

    if ($res_del) {
        // 3. Hapus file fisik jika ada
        if ($data && !empty($data['foto_path'])) {
            $file_path = '../' . $data['foto_path'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        echo "<script>alert('Data berhasil dihapus!'); window.location='kelola_pengurus.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data.'); window.location='kelola_pengurus.php';</script>";
    }
} else {
    header("Location: kelola_pengurus.php");
}
?>