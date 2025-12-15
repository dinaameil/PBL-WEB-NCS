<?php
session_start();
include('config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = pg_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $password_md5 = md5($password);

    $query = "SELECT * FROM users WHERE email = $1 AND password = $2";
    $result = pg_query_params($conn, $query, array($email, $password_md5));

    if ($result && pg_num_rows($result) > 0) {
        $user = pg_fetch_assoc($result);

        // simpan data ke session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: index.php");
        }
        exit();

    } else {
        header("Location: login.php?error=1");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>