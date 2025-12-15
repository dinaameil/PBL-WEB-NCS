<?php
session_start();

if ( !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin' ) {
    header("Location: ../login.php?error=2"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Lab NCS</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style> 
        body { font-family: 'Inter', sans-serif; background-color: #f4f6f9; } 

        .bg-kampus-blue { background-color: #003366 !important; }
        .text-kampus-blue { color: #003366 !important; }
        
        .nav-link { color: rgba(255,255,255,0.8); }
        .nav-link:hover { color: #fff; }

        .card-admin { border: none; box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075); transition: transform 0.2s; }
        .card-admin:hover { transform: translateY(-5px); }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-kampus-blue shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="dashboard.php">Admin Panel Lab NCS</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center gap-2">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php" target="_blank">Lihat Website</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-danger btn-sm px-3 ms-2">
                            Logout (<?php echo $_SESSION['user_email']; ?>)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-5">