<?php
include('header_admin.php');
include('../config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $judul_sarana     = pg_escape_string($conn, $_POST['judul_sarana']);
    $isi_sarana       = pg_escape_string($conn, $_POST['isi_sarana']);
    $judul_konsultasi = pg_escape_string($conn, $_POST['judul_konsultasi']);
    $isi_konsultasi   = pg_escape_string($conn, $_POST['isi_konsultasi']);

    $queries = [
        "INSERT INTO konten_teks (kunci, isi) VALUES ('layanan_sarana_judul', '$judul_sarana') ON CONFLICT (kunci) DO UPDATE SET isi = '$judul_sarana'",
        "INSERT INTO konten_teks (kunci, isi) VALUES ('layanan_sarana_isi', '$isi_sarana') ON CONFLICT (kunci) DO UPDATE SET isi = '$isi_sarana'",
        "INSERT INTO konten_teks (kunci, isi) VALUES ('layanan_konsultasi_judul', '$judul_konsultasi') ON CONFLICT (kunci) DO UPDATE SET isi = '$judul_konsultasi'",
        "INSERT INTO konten_teks (kunci, isi) VALUES ('layanan_konsultasi_isi', '$isi_konsultasi') ON CONFLICT (kunci) DO UPDATE SET isi = '$isi_konsultasi'"
    ];

    if (isset($_FILES['foto_sarana']) && $_FILES['foto_sarana']['error'] === UPLOAD_ERR_OK) {
        
        $fileTmpPath = $_FILES['foto_sarana']['tmp_name'];
        $fileName    = $_FILES['foto_sarana']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        
        $uploadFileDir = '../img/layanan/';

        $dest_path = $uploadFileDir . $newFileName;

        $db_path = 'img/layanan/' . $newFileName;

        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg', 'webp');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }

            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                $queries[] = "INSERT INTO konten_teks (kunci, isi) VALUES ('layanan_sarana_foto', '$db_path') ON CONFLICT (kunci) DO UPDATE SET isi = '$db_path'";
            }
        }
    }

    $berhasil = true;
    foreach ($queries as $sql) {
        if (!pg_query($conn, $sql)) {
            $berhasil = false;
            echo "Error: " . pg_last_error($conn);
            break;
        }
    }

    if ($berhasil) {
        echo "<script>alert('Data layanan berhasil diperbarui!'); window.location='kelola_layanan.php';</script>";
    }

} else {
    header("Location: kelola_layanan.php");
    exit();
}
?>