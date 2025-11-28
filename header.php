<?php
// Cek session, jika belum ada, start session (biar tidak error di halaman lain)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Website'; ?> - Lab NCS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #f4f7f6; /* Warna background sedikit abu biar konten nonjol */
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Agar footer selalu di bawah */
        }
        
        /* Custom Colors */
        :root {
            --kampus-blue: #003366;
            --kampus-gold: #FFCC00;
        }

        .text-kampus-blue { color: var(--kampus-blue) !important; }
        .bg-kampus-blue { background-color: var(--kampus-blue) !important; color: white; }
        
        /* Navbar Styling */
        .navbar-brand img { height: 40px; margin-right: 10px; }
        .nav-link { font-weight: 500; color: #555; }
        .nav-link:hover, .nav-link.active { color: var(--kampus-blue); font-weight: 700; }
        
        /* Hero Section (Khusus Index) */
        .hero-section {
            min-height: 60vh;
            background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 51, 102, 0.8)), url('img/hero_background.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="img/logo_kampus.jpg" alt="Logo"> 
                <img src="img/logo_jurusan.jpg" alt="Logo">
                <span class="fw-bold text-kampus-blue ms-2">Lab NCS</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($active_page == 'index') ? 'active border-bottom border-primary' : ''; ?>" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($active_page == 'profil') ? 'active border-bottom border-primary' : ''; ?>" href="profil.php">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($active_page == 'galeri') ? 'active border-bottom border-primary' : ''; ?>" href="galeri.php">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($active_page == 'arsip') ? 'active border-bottom border-primary' : ''; ?>" href="arsip.php">Arsip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($active_page == 'layanan') ? 'active border-bottom border-primary' : ''; ?>" href="layanan.php">Layanan</a>
                    </li>

                    </li>
                </ul>
            </div>
        </div>
    </nav>