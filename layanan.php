<?php
    $page_title = "Layanan";
    $active_page = "layanan";
    include('header.php');
    include('config/db_config.php'); // Koneksi Database

    // Ambil data teks dari tabel konten_teks
    $sql = "SELECT kunci, isi FROM konten_teks WHERE kunci LIKE 'layanan_%'";
    $result = pg_query($conn, $sql);
    
    // Simpan ke array biar mudah dipanggil
    $konten = [];
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            $konten[$row['kunci']] = $row['isi'];
        }
    }
?>

<div class="container py-5">
    
    <div class="text-center mb-5">
        <h1 class="fw-bold text-kampus-blue mb-3">Layanan & Fasilitas</h1>
        <p class="text-muted">
            Laboratorium NCS menyediakan berbagai fasilitas unggulan dan layanan profesional.
        </p>
    </div>

    <div class="card shadow-sm mb-5 border-0">
        <div class="row g-0 align-items-center">
            <div class="col-md-5">
                <img src="https://placehold.co/600x400/003366/ffffff?text=Fasilitas+Lab" 
                     class="img-fluid rounded-start h-100 object-fit-cover" 
                     alt="Fasilitas" style="min-height: 300px;">
            </div>
            <div class="col-md-7">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-kampus-blue mb-3">
                        <?php echo htmlspecialchars($konten['layanan_sarana_judul'] ?? 'Fasilitas Lab'); ?>
                    </h3>
                    <p class="text-muted lh-lg mb-4">
                        <?php echo nl2br(htmlspecialchars($konten['layanan_sarana_isi'] ?? 'Deskripsi fasilitas belum diisi.')); ?>
                    </p>
                    
                    <div class="row g-3">
                        <div class="col-6"><i class="bi bi-cpu me-2 text-primary"></i>Server High-End</div>
                        <div class="col-6"><i class="bi bi-router me-2 text-primary"></i>Router & Switch</div>
                        <div class="col-6"><i class="bi bi-wifi me-2 text-primary"></i>IoT Devices</div>
                        <div class="col-6"><i class="bi bi-shield-lock me-2 text-primary"></i>Security Tools</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 bg-kampus-blue text-white">
        <div class="card-body p-5 text-center text-md-start">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="fw-bold mb-3">
                        <?php echo htmlspecialchars($konten['layanan_konsultasi_judul'] ?? 'Konsultasi'); ?>
                    </h3>
                    <p class="lead mb-4 text-white-50">
                        <?php echo nl2br(htmlspecialchars($konten['layanan_konsultasi_isi'] ?? 'Deskripsi konsultasi belum diisi.')); ?>
                    </p>
                    <a href="https://wa.me/6281234567890" class="btn btn-warning fw-bold px-4 py-2 rounded-pill shadow">
                        <i class="bi bi-whatsapp me-2"></i>Hubungi Kami
                    </a>
                </div>
                <div class="col-md-4 text-center mt-4 mt-md-0">
                    <i class="bi bi-headset display-1 text-white-50"></i>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include('footer.php'); ?>