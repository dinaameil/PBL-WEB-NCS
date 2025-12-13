<?php
include('../config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $foto_path_db = null;

    // Upload foto (opsional)
    if (!empty($_FILES['foto_dosen']['name'])) {
        $file = $_FILES['foto_dosen'];
        $file_name = time() . '_' . basename($file['name']);
        $target_dir = "../img/dosen/";

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($file['tmp_name'], $target_dir . $file_name)) {
            $foto_path_db = "img/dosen/" . $file_name;
        }
    }

    $sql = "
        INSERT INTO dosen (
            nama, nip, nidn, jabatan, foto_path,
            program_studi, email, alamat_kantor,
            bidang_keahlian,
            linkedin, google_scholar, sinta,
            pendidikan
        ) VALUES (
            $1,$2,$3,$4,$5,
            $6,$7,$8,
            $9,
            $10,$11,$12,
            $13
        )
    ";

    $result = pg_query_params($conn, $sql, [
        $_POST['nama'],
        $_POST['nip'],
        $_POST['nidn'],
        $_POST['jabatan'],
        $foto_path_db,
        $_POST['program_studi'],
        $_POST['email'],
        $_POST['alamat_kantor'],
        $_POST['bidang_keahlian'],
        $_POST['linkedin'],
        $_POST['google_scholar'],
        $_POST['sinta'],
        $_POST['pendidikan']
    ]);

    if ($result) {
        header("Location: kelola_dosen.php");
        exit();
    } else {
        die("Error: " . pg_last_error($conn));
    }
}
?>
