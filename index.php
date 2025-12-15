<?php
$page_title = "Beranda";
$active_page = "index";
include('header.php');

include('config/db_config.php');

// ambil 3 data galeri terbaru
$sql_galeri = "SELECT * FROM galeri ORDER BY tanggal DESC LIMIT 3";
$res_galeri = pg_query($conn, $sql_galeri);
$list_galeri = ($res_galeri) ? pg_fetch_all($res_galeri, PGSQL_ASSOC) : [];

// ambil 3 arsip terbaru
$sql_arsip = "SELECT * FROM arsip ORDER BY tanggal DESC LIMIT 3";
$res_arsip = pg_query($conn, $sql_arsip);
$list_arsip = ($res_arsip) ? pg_fetch_all($res_arsip, PGSQL_ASSOC) : [];

$sql_preview = "
    SELECT id, nama, jabatan, foto_path
    FROM dosen
    WHERE jabatan ILIKE '%Kepala%' OR jabatan ILIKE '%Peneliti%'
    ORDER BY
        CASE
            WHEN jabatan ILIKE '%Kepala%' THEN 1
            WHEN jabatan ILIKE '%Peneliti%' THEN 2
            ELSE 3
        END
    LIMIT 2
";

$res_preview = pg_query($conn, $sql_preview);
$preview_dosen = $res_preview ? pg_fetch_all($res_preview, PGSQL_ASSOC) : [];
?>

<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>

    <div class="hero-inner text-center">
        <h1 class="hero-title">
            <span class="hero-title-light">Laboratorium</span><br>
            <span class="hero-title-bold">Network & Cyber Security</span>
        </h1>

        <p class="lead">
            LAB NCS — Pendidikan, Penelitian, dan Layanan di Bidang Jaringan & Keamanan Siber
        </p>
    </div>
</section>
<div class="divider-gold"></div>

<section class="section container">

    <div class="section-title mb-4 d-flex align-items-center">
        <div class="line"></div>
        <h3 class="ms-2">Bidang Fokus</h3>
    </div>

    <div class="row align-items-start">

        <div class="col-lg-6 mb-4">
            <div class="card p-3 h-100">
                <div class="card-body">
                    <h4 class="card-title">Tentang Lab NCS</h4>
                    <p class="mb-2 text-muted">
                        Laboratorium Network & Cyber Security (NCS) adalah fasilitas pembelajaran dan riset
                        pada Program Studi Teknologi Informasi. Fokus pada jaringan, keamanan siber,
                        digital forensics, dan pengembangan solusi infrastruktur.
                    </p>
                    <a href="profil.php" class="text-decoration-none fw-bold text-kampus-blue">
                        Selengkapnya &rarr;
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row g-4">

                <div class="col-md-6">
                    <div class="card card-hover h-100">
                        <div class="card-body d-flex gap-3">
                            <div class="icon-focus"><i class="bi bi-hdd-network"></i></div>
                            <div>
                                <h5 class="card-title mb-1">Network Engineering</h5>
                                <p class="text-muted small mb-0">
                                    Desain, konfigurasi, dan manajemen jaringan kampus & lab.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-hover h-100">
                        <div class="card-body d-flex gap-3">
                            <div class="icon-focus"><i class="bi bi-cloud-fill"></i></div>
                            <div>
                                <h5 class="card-title mb-1">Cloud & Virtualization</h5>
                                <p class="text-muted small mb-0">
                                    Virtualisasi layanan & infrastruktur untuk penelitian.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-hover h-100">
                        <div class="card-body d-flex gap-3">
                            <div class="icon-focus"><i class="bi bi-file-earmark-text"></i></div>
                            <div>
                                <h5 class="card-title mb-1">Digital Forensics</h5>
                                <p class="text-muted small mb-0">
                                    Investigasi digital dan pemulihan bukti elektronik.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-hover h-100">
                        <div class="card-body d-flex gap-3">
                            <div class="icon-focus"><i class="bi bi-shield-lock"></i></div>
                            <div>
                                <h5 class="card-title mb-1">Cyber Security</h5>
                                <p class="text-muted small mb-0">
                                    Penelitian dan praktik keamanan sistem & aplikasi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section container py-5">
    
    <div class="section-title mb-4 d-flex align-items-center">
        <div class="line"></div>
        <h3 class="ms-2">Layanan Utama</h3>
    </div>

    <div class="row g-4">
        
        <div class="col-md-4">
            <div class="card card-hover h-100 border-0 shadow-sm overflow-hidden">
                <div class="img-wrapper position-relative">
                    <img src="https://images.unsplash.com/photo-1520869562399-e772f042f422?q=80&w=800&auto=format&fit=crop" 
                         alt="Rak Server dan Alat Jaringan" 
                         class="card-img-top img-zoom"
                         style="object-fit: cover; height: 200px; width: 100%;">
                    <div class="position-absolute top-0 end-0 m-2 bg-warning text-dark fw-bold px-3 py-1 rounded-pill small shadow-sm">Gratis</div>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold text-kampus-blue">Peminjaman Alat</h5>
                    <p class="text-muted small">Mahasiswa dapat meminjam Router, Switch, dan perangkat IoT untuk keperluan praktikum atau skripsi.</p>
                    <a href="layanan.php#peminjaman" class="text-decoration-none fw-bold text-warning stretched-link">
                        Lihat Prosedur <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-hover h-100 border-0 shadow-sm overflow-hidden">
                <div class="img-wrapper position-relative">
                    <img src="https://images.unsplash.com/photo-1599658880436-c61792e70672?q=80&w=800&auto=format&fit=crop" 
                         alt="Ruang Lab" class="card-img-top img-zoom"
                         style="object-fit: cover; height: 200px; width: 100%;">
                    <div class="position-absolute top-0 end-0 m-2 bg-success text-white fw-bold px-3 py-1 rounded-pill small shadow-sm">Tersedia</div>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold text-kampus-blue">Penggunaan Ruang</h5>
                    <p class="text-muted small">Reservasi ruang laboratorium untuk kegiatan riset mandiri, diskusi tim, atau latihan kompetisi.</p>
                    <a href="layanan.php#ruang" class="text-decoration-none fw-bold text-warning stretched-link">
                        Lihat Jadwal <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-hover h-100 border-0 shadow-sm overflow-hidden">
                <div class="img-wrapper position-relative">
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=800&auto=format&fit=crop" 
                         alt="Konsultasi" class="card-img-top img-zoom"
                         style="object-fit: cover; height: 200px; width: 100%;">
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold text-kampus-blue">Konsultasi & Riset</h5>
                    <p class="text-muted small">Layanan konsultasi keamanan jaringan dan pendampingan riset oleh asisten laboratorium.</p>
                    <a href="layanan.php#konsultasi" class="text-decoration-none fw-bold text-warning stretched-link">
                        Hubungi Kami <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    .img-wrapper {
        height: 200px;
        overflow: hidden; 
    }

    .img-zoom {
        width: 100%;
        height: 100%;
        object-fit: cover; 
        transition: transform 0.5s ease;
    }

    .card-hover:hover .img-zoom {
        transform: scale(1.1); 
    }
</style>

<section class="section">
    <div class="container">
        <div class="section-title mb-4 d-flex align-items-center">
            <div class="line"></div>
            <h3 class="ms-2">Dokumentasi Terbaru</h3>
        </div>

        <div class="row g-4">
            <?php if (!empty($list_galeri)): ?>
                <?php foreach ($list_galeri as $item): ?>
                    <div class="col-md-4">
                        <div class="card card-hover h-100">
                            <img src="<?php echo $item['foto_path']; ?>" alt="<?php echo htmlspecialchars($item['judul']); ?>" class="img-cover" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h6 class="card-title fw-bold"><?php echo htmlspecialchars($item['judul']); ?></h6>
                                <p class="text-muted small mb-0">
                                    <i class="bi bi-calendar3 me-1"></i> <?php echo date('d M Y', strtotime($item['tanggal'])); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada dokumentasi terbaru.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-4">
            <a href="galeri.php" class="btn btn-outline-secondary rounded-pill px-4">Lihat Semua Galeri</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-title mb-4 d-flex align-items-center">
            <div class="line"></div>
            <h3 class="ms-2">Arsip Terbaru</h3>
        </div>

        <div class="row g-3">
            <?php if (!empty($list_arsip)): ?>
                <?php foreach ($list_arsip as $doc): ?>
                    <div class="col-md-4">
                        <div class="archive-item p-3 border rounded d-flex align-items-center bg-white h-100 card-hover">
                            <div class="pdf-icon me-3"><i class="bi bi-file-earmark-pdf text-danger" style="font-size:24px;"></i></div>
                            <div class="flex-grow-1">
                                <div class="fw-bold text-dark text-truncate" style="max-width: 180px;">
                                    <?php echo htmlspecialchars($doc['judul']); ?>
                                </div>
                                <div class="text-muted small">
                                    <?php echo $doc['kategori']; ?> — <?php echo date('d/m/Y', strtotime($doc['tanggal'])); ?>
                                </div>
                            </div>
                            <div class="ms-auto">
                                <a href="<?php echo $doc['file_path']; ?>" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill">Lihat</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-4">
                    <p class="text-muted">Belum ada arsip terbaru.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-4">
            <a href="arsip.php" class="btn btn-outline-secondary rounded-pill px-4">Lihat Semua Arsip</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-title mb-4 d-flex align-items-center">
            <div class="line"></div>
            <h3 class="ms-2">Struktur Laboratorium</h3>
        </div>

        <div class="row g-4 align-items-center">

            <?php foreach ($preview_dosen as $dosen): ?>
            <div class="col-md-3 text-center">

                <a href="detail_dosen.php?id=<?= $dosen['id']; ?>"
                   class="text-decoration-none text-dark">

                    <div class="card p-3 h-100 border-0 shadow-sm card-hover">

                        <?php
                            $foto = !empty($dosen['foto_path'])
                                ? $dosen['foto_path']
                                : 'https://placehold.co/150x150?text=No+Foto';
                        ?>

                        <img src="<?= $foto; ?>"
                             alt="<?= htmlspecialchars($dosen['nama']); ?>"
                             class="rounded-circle mb-3 mx-auto"
                             style="width:100px;height:100px;object-fit:cover;">

                        <div class="fw-bold"><?= htmlspecialchars($dosen['jabatan']); ?></div>
                        <div class="text-muted small"><?= htmlspecialchars($dosen['nama']); ?></div>

                    </div>
                </a>

            </div>
            <?php endforeach; ?>

            <div class="col-md-6">
                <div class="card p-4 h-100 border-0 bg-light">
                    <div class="card-body">
                        <h6 class="fw-bold text-kampus-blue">Preview Organisasi</h6>
                        <p class="text-muted small mb-0">
                            Laboratorium dikelola oleh dosen ahli & tim asisten.
                            Lihat struktur organisasi dan profil lengkap dosen.
                        </p>
                        <div class="mt-3">
                            <a href="profil.php#struktur-lab" class="btn btn-sm btn-outline-secondary mb-3">
                                Lihat Struktur Lengkap
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="py-5 bg-kampus-blue text-white mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h3 class="fw-bold mb-2">Tertarik Bekerja Sama?</h3>
                <p class="mb-0 text-white-50">Kami terbuka untuk kolaborasi riset, pelatihan, dan pengabdian masyarakat.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-warning fw-bold px-4 py-3 rounded-pill shadow">
                    <i class="bi bi-whatsapp me-2"></i> Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    .ls-2 { letter-spacing: 2px; }
    .hover-top { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .hover-top:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }

    /* Styling Hero */
    .hero { position: relative; min-height: 80vh; display: flex; align-items: center; justify-content: center; color: white; overflow: hidden; }
    .hero-bg { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: cover; background-position: center; z-index: -2; }
    /* Overlay Gelap */
    .hero::before { content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 51, 102, 0.85); z-index: -1; }
    .hero-inner { position: relative; z-index: 1; }
    .hero-title-light { font-weight: 300; font-size: 2.5rem; }
    .hero-title-bold { font-weight: 700; font-size: 3.5rem; }

    /* Divider */
    .divider-gold { height: 5px; background-color: #FFCC00; width: 100%; }

    /* Section Title Style */
    .section-title .line { width: 5px; height: 30px; background-color: #FFCC00; border-radius: 2px; }

    /* Buttons */
    .btn-cta { background-color: #FFCC00; color: #003366; font-weight: bold; padding: 10px 25px; border-radius: 50px; border: none; }
    .btn-cta:hover { background-color: #e6b800; color: #003366; }
    .btn-cta-outline { background-color: transparent; color: white; border: 2px solid white; font-weight: bold; padding: 8px 23px; border-radius: 50px; }
    .btn-cta-outline:hover { background-color: white; color: #003366; }

    /* Cards */
    .card-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .card-hover:hover { transform: translateY(-5px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .text-kampus-blue { color: #003366; }
</style>

<?php
include('footer.php');
?>