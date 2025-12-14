<?php
    $page_title = "Layanan";
    $active_page = "layanan";
    include('header.php');
    include('config/db_config.php');

    // 1. AMBIL DATA DARI DATABASE (Hasil inputan Admin)
    $sql = "SELECT kunci, isi FROM konten_teks WHERE kunci LIKE 'layanan_%'";
    $result = pg_query($conn, $sql);
    
    $konten = [];
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            $konten[$row['kunci']] = $row['isi'];
        }
    }
?>

<div class="container py-5">

    <h1 class="text-center fw-bold text-kampus-blue mb-3">Layanan & Fasilitas</h1>
    <p class="text-center text-muted mb-4 small">
        Laboratorium NCS berkomitmen menyediakan infrastruktur terbaik dan layanan profesional bagi seluruh civitas akademika.
    </p>

    <div class="card shadow-sm mb-5 border-0 overflow-hidden">
    <div class="row g-0 align-items-center"> 
        <div class="col-md-4 position-relative">
            
            <?php 
                // Cek apakah data ada di DB
                $foto_db = $konten['layanan_sarana_foto'] ?? '';
                
                // Cek apakah file fisiknya benar-benar ada
                if (!empty($foto_db) && file_exists($foto_db)) {
                    // $foto_db isinya sudah "img/layanan/namafile.jpg"
                    $foto_sarana = $foto_db;
                } else {
                    // Gambar cadangan placeholder
                    $foto_sarana = "https://placehold.co/600x600/003366/ffffff?text=Fasilitas+Lab";
                }
            ?>

            <img src="<?php echo $foto_sarana; ?>" 
                 class="img-fluid w-100 object-fit-cover" 
                 alt="Fasilitas Lab" 
                 style="height: 100%; min-height: 250px; max-height: 300px;">
        </div>
        
        <div class="col-md-8">
            <div class="card-body p-4">
                <h4 class="fw-bold text-kampus-blue mb-2">
                    <i class="bi bi-building-gear me-2"></i>
                    <?php echo htmlspecialchars($konten['layanan_sarana_judul'] ?? 'Fasilitas & Infrastruktur'); ?>
                </h4>
                <p class="text-muted small mb-3">
                    <?php echo nl2br(htmlspecialchars($konten['layanan_sarana_isi'] ?? 'Laboratorium kami...')); ?>
                </p>
                 </div>
        </div>
    </div>
</div>

    <div class="mb-5">
        <div class="section-title mb-4 d-flex align-items-center">
            <div class="line bg-warning" style="width: 5px; height: 30px; border-radius: 2px;"></div>
            <h3 class="ms-2 fw-bold text-kampus-blue">Katalog Layanan</h3>
        </div>

        <div id="peminjaman" class="card mb-4 border-0 shadow-sm border-start border-4 border-primary hover-shadow transition section-target"> 
            <div class="card-body p-4">
                <div class="d-flex align-items-start">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3 d-none d-md-block">
                        <i class="bi bi-tools text-primary fs-3"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold text-primary">1. Peminjaman Alat & Perangkat</h4>
                        <p class="text-muted">
                            Mahasiswa aktif dapat meminjam perangkat untuk keperluan pengerjaan tugas akhir, skripsi, atau penelitian mandiri.
                        </p>
                        <div class="alert alert-light border small text-muted">
                            <i class="bi bi-info-circle me-1"></i> <strong>Syarat:</strong> KTM Aktif, Surat Permohonan (jika > 3 hari), dan mengisi Form Peminjaman di Laboran.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="ruang" class="card mb-4 border-0 shadow-sm border-start border-4 border-success hover-shadow transition section-target"> 
            <div class="card-body p-4">
                <div class="d-flex align-items-start">
                    <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3 d-none d-md-block">
                        <i class="bi bi-door-open text-success fs-3"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold text-success">2. Penggunaan Ruang Laboratorium</h4>
                        <p class="text-muted">
                            Fasilitas ruang lab dapat digunakan di luar jam perkuliahan untuk kegiatan diskusi kelompok studi, latihan CTF, atau riset.
                        </p>
                        <div class="alert alert-light border small text-muted">
                            <i class="bi bi-clock me-1"></i> <strong>Jam Operasional:</strong> Senin - Jumat (08.00 - 16.00 WIB). Wajib konfirmasi ke asisten lab H-1.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="konsultasi" class="card mb-4 border-0 shadow-sm border-start border-4 border-warning hover-shadow transition section-target">
            <div class="card-body p-4">
                <div class="d-flex align-items-start">
                    <div class="bg-warning bg-opacity-10 p-3 rounded-circle me-3 d-none d-md-block">
                        <i class="bi bi-people text-warning fs-3"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold text-warning">
                            3. <?php echo htmlspecialchars($konten['layanan_konsultasi_judul'] ?? 'Konsultasi & Pendampingan Riset'); ?>
                        </h4>
                        <p class="text-muted">
                            <?php echo nl2br(htmlspecialchars($konten['layanan_konsultasi_isi'] ?? 'Layanan konsultasi terkait keamanan siber, audit sistem, dan jaringan komputer.')); ?>
                        </p>
                        <div class="mt-3">
                            <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-warning btn-sm fw-bold rounded-pill px-4">
                                <i class="bi bi-whatsapp me-1"></i> Chat Asisten Lab
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    /* Agar scroll smooth */
    html {
        scroll-behavior: smooth;
    }
    
    /* PENTING: Memberi jarak scroll supaya tidak ketutup Header Fixed */
    .section-target {
        scroll-margin-top: 100px; 
    }

    /* Efek Hover Kartu */
    .hover-shadow:hover {
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        transform: translateY(-2px);
    }
    .transition { transition: all 0.3s ease; }
    .text-kampus-blue { color: #003366; }

    /* Efek Highlight (Berkedip) saat diklik dari Beranda */
    :target {
        animation: highlight 1.5s ease-out;
        border: 2px solid #FFCC00 !important;
    }

    @keyframes highlight {
        0% { background-color: rgba(255, 204, 0, 0.2); }
        100% { background-color: transparent; }
    }
</style>

<?php include('footer.php'); ?>