<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Area - Lab NCS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .login-card { max-width: 400px; width: 100%; }
        .text-kampus-blue { color: #003366; }
        .bg-kampus-blue { background-color: #003366; color: white; }
        .bg-kampus-blue:hover { background-color: #002244; color: white; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

    <div class="login-card p-3">
        
        <div class="d-flex justify-content-center mb-4 gap-3">
            <img style="height: 50px;" src="img/logo_polinema.jpg" alt="Logo Kampus">
        </div>

        <div class="card shadow border-0">
            <div class="card-body p-4">
                <h3 class="card-title text-center font-weight-bold text-kampus-blue mb-4">Login Area Lab NCS</h3>

                <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                    <div class="alert alert-danger text-center py-2" role="alert">
                        Email atau Password salah!
                    </div>
                <?php endif; ?>
                
                <form action="login_process.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn bg-kampus-blue btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center mt-3">
            <a href="index.php" class="text-decoration-none text-muted small hover-primary">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>