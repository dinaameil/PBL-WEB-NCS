<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<style>
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
    border-radius: 14px;
    border: 2px solid transparent;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 14px 35px rgba(0,0,0,0.18);
    /* Mengubah warna border hover agar senada dengan warna kampus */
    border-color: rgba(0, 51, 102, 0.4); /* Menggunakan --kampus-blue */
}

.zoom-img {
    transition: transform 0.35s ease;
}
.zoom-img:hover {
    transform: scale(1.07);
}

.ripple {
    position: relative;
    overflow: hidden;
}
.ripple:after {
    content: "";
    position: absolute;
    width: 6px;
    height: 6px;
    background: rgba(0, 115, 230, 0.3);
    border-radius: 50%;
    transform: scale(0);
    opacity: 0;
    pointer-events: none;
}
.ripple:active:after {
    opacity: 1;
    transform: scale(30);
    transition: transform 0.5s ease-out, opacity 0.7s ease-out;
    left: var(--x);
    top: var(--y);
}
</style>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - Lab NCS' : 'Lab NCS - Website Resmi'; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/style.css">

    <style>
        /* Custom Colors Definition */
        :root {
            --kampus-blue: #003366;
            --kampus-gold: #FFCC00;
        }

        /* Body and Global Layout */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6; /* Warna background sedikit abu biar konten nonjol */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding-top: 80px; 
        }

        .text-kampus-blue { color: var(--kampus-blue) !important; }
        .bg-kampus-blue { background-color: var(--kampus-blue) !important; color: white; }
        .border-kampus-gold {
            border-color: var(--kampus-gold) !important;
            border-width: 4px !important;
        }

        .navbar-custom {
            background-color: var(--kampus-blue) !important;
            padding-top: 12px;
            padding-bottom: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-custom .nav-link {
            color: white !important;
            font-weight: 500;
            padding: 10px 15px; 
        }

        .navbar-custom .nav-link.active,
        .navbar-custom .nav-link:hover {
            color: var(--kampus-gold) !important;
            font-weight: 700;
            border-bottom: 3px solid var(--kampus-gold);
            padding-bottom: 7px; 
        }

        .navbar-custom .navbar-brand span {
            color: white !important;
            font-size: 1.5rem; 
        }

        .navbar-brand img { height: 45px; margin-right: 5px; }

        .nav-link.active { border-color: transparent !important; } 
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom fixed-top border-bottom border-kampus-gold">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="img/logo_polinema.png" alt="Logo Kampus">
            <span class="fw-bold text-kampus-blue ms-2">Lab NCS</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav gap-3">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($active_page == 'index') ? 'active fw-bold' : ''; ?>" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($active_page == 'profil') ? 'active fw-bold' : ''; ?>" href="profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($active_page == 'galeri') ? 'active fw-bold' : ''; ?>" href="galeri.php">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($active_page == 'arsip') ? 'active fw-bold' : ''; ?>" href="arsip.php">Arsip</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($active_page == 'layanan') ? 'active fw-bold' : ''; ?>" href="layanan.php">Layanan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>