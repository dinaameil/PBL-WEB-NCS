<?php
include('../config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = (int)$_POST['id'];

    $foto_path_db = $_POST['foto_lama'];

    // upload foto baru (opsional)
    if (!empty($_FILES['foto_baru']['name'])) {
        $file = $_FILES['foto_baru'];
        $file_name = time() . '_' . basename($file['name']);
        $target_dir = "../img/dosen/";

        if (move_uploaded_file($file['tmp_name'], $target_dir . $file_name)) {
            $foto_path_db = "img/dosen/" . $file_name;

            if (!empty($_POST['foto_lama'])) {
                $old = "../" . $_POST['foto_lama'];
                if (file_exists($old)) unlink($old);
            }
        }
    }

    $sql = "
        UPDATE dosen SET
            nama = $1,
            jabatan = $2,
            program_studi = $3,
            email = $4,
            alamat_kantor = $5,
            bidang_keahlian = $6,
            linkedin = $7,
            google_scholar = $8,
            sinta = $9,
            pendidikan = $10,
            foto_path = $11
        WHERE id = $12
    ";

    $result = pg_query_params($conn, $sql, [
        $_POST['nama'],
        $_POST['jabatan'],
        $_POST['program_studi'],
        $_POST['email'],
        $_POST['alamat_kantor'],
        $_POST['bidang_keahlian'],
        $_POST['linkedin'],
        $_POST['google_scholar'],
        $_POST['sinta'],
        $_POST['pendidikan'],
        $foto_path_db,
        $id
    ]);

    if ($result) {
        header("Location: kelola_dosen.php");
        exit();
    } else {
        die("Error: " . pg_last_error($conn));
    }
}
?>
