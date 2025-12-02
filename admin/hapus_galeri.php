<?php
include('header_admin.php');
include('../config/db_config.php');

$id = (int)$_GET['id'];

if ($id > 0) {
    // Ambil info file dulu
    $sql_cek = "SELECT foto_path FROM galeri WHERE id = $1";
    $res_cek = pg_query_params($conn, $sql_cek, [$id]);
    $data = pg_fetch_assoc($res_cek);

    // Hapus dari DB
    $sql_del = "DELETE FROM galeri WHERE id = $1";
    $res_del = pg_query_params($conn, $sql_del, [$id]);

    if ($res_del) {
        // Hapus file fisik
        if ($data && !empty($data['foto_path'])) {
            $file_path = '../' . $data['foto_path'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        echo "<script>alert('Foto berhasil dihapus!'); window.location='kelola_galeri.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus.'); window.location='kelola_galeri.php';</script>";
    }
}
?>