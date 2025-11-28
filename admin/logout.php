<?php
// Selalu mulai session di file manapun yang berhubungan dengan login
session_start();

// 1. Hancurkan semua data session (logout)
session_unset();
session_destroy();

// 2. Tendang user kembali ke halaman login (di luar folder admin)
header("Location: ../login.php");
exit();
?>