<?php
    $page_title = "Layanan";
    $active_page = "layanan";
    include('header.php');
    include('config/db_config.php');

    // Ambil teks dari database (Judul & Deskripsi Sarana/Konsultasi)
    $sql = "SELECT kunci, isi FROM konten_teks WHERE kunci LIKE 'layanan_%'";
    $result = pg_query($conn, $sql);
    $konten = [];
    while ($row = pg_fetch_assoc($result)) {
        $konten[$row['kunci']] = $row['isi'];
    }
?>

    <main class="container py-5">
        <h1 class="text-center fw-bold text-kampus-blue mb-5">Layanan & Fasilitas</h1>

        <div class="card shadow-sm mb-5 border-0">
            <div class="card-body p-5">
                <h3 class="fw-bold text-kampus-blue mb-4 text-center border-bottom pb-3">
                    <?php echo htmlspecialchars($konten['layanan_sarana_judul'] ?? 'Sarana & Prasarana'); ?>
                </h3>
                
                <p class="text-center text-secondary mb-5">
                    <?php echo nl2br(htmlspecialchars($konten['layanan_sarana_isi'] ?? 'Fasilitas laboratorium yang menunjang kegiatan praktikum dan penelitian.')); ?>
                </p>

                <div class="row g-4">
                    <div class="col-md-4">
                        <img src="https://placehold.co/400x300?text=Server+Rack" class="img-fluid rounded shadow-sm" alt="Server">
                        <p class="text-center mt-2 fw-bold text-muted">Server Room</p>
                    </div>
                    <div class="col-md-4">
                        <img src="https://placehold.co/400x300?text=Komputer+Lab" class="img-fluid rounded shadow-sm" alt="PC Lab">
                        <p class="text-center mt-2 fw-bold text-muted">Workstation High-Spec</p>
                    </div>
                    <div class="col-md-4">
                        <img src="https://placehold.co/400x300?text=IoT+Devices" class="img-fluid rounded shadow-sm" alt="IoT">
                        <p class="text-center mt-2 fw-bold text-muted">Perangkat IoT</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0 bg-kampus-blue text-white">
            <div class="card-body p-5">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h3 class="fw-bold mb-3">
                            <?php echo htmlspecialchars($konten['layanan_konsultasi_judul'] ?? 'Layanan Konsultasi'); ?>
                        </h3>
                        <p class="lead mb-4">
                            <?php echo nl2br(htmlspecialchars($konten['layanan_konsultasi_isi'] ?? 'Kami membuka layanan konsultasi terkait keamanan jaringan, audit sistem, dan implementasi IoT bagi mahasiswa maupun mitra industri.')); ?>
                        </p>
                        <a href="https://wa.me/6281234567890" class="btn btn-light text-kampus-blue fw-bold px-4 py-2 rounded-pill">
                            <i class="bi bi-whatsapp me-2"></i> Hubungi Kami
                        </a>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="img/consultation_illustration.png" onerror="this.src='https://placehold.co/300x300?text=Consultation'" class="img-fluid rounded-circle border border-4 border-white shadow">
                    </div>
                </div>
            </div>
        </div>

    </main>

<?php include('footer.php'); ?>