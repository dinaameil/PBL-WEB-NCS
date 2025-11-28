<?php
session_start();
include('config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ambil input dan bersihkan
    $email = pg_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Enkripsi password input dengan MD5 (sesuai database tadi)
    $password_md5 = md5($password);

    // Cek ke Database PostgreSQL
    $query = "SELECT * FROM users WHERE email = $1 AND password = $2";
    $result = pg_query_params($conn, $query, array($email, $password_md5));

    if ($result && pg_num_rows($result) > 0) {
        $user = pg_fetch_assoc($result);

        // Cek Role
        if ($user['role'] == 'admin') {
            // Set Session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = 'admin';

            // Redirect ke Admin
            header("Location: admin/dashboard.php");
            exit();
        } else {
            // Jika bukan admin (misal member biasa)
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = 'member';
            
            header("Location: index.php");
            exit();
        }
    } else {
        // Gagal Login
        header("Location: login.php?error=1");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>