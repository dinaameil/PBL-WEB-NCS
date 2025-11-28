<?php
    $page_title = "Beranda";
    $active_page = "index";
    include('header.php');
?>

    <main>
        <div class="hero-section">
            <div class="hero-overlay"></div>
            <div class="hero-content text-center">
                <h1 class="display-4 fw-bold">Laboratorium Network & Cyber Security</h1>
                <p class="mt-3 lead">Selamat datang di portal informasi Lab NCS.</p>
            </div>
        </div>

        <div class="container py-5">
            <div class="row g-4">
                
                <div class="col-md-6 col-lg-3">
                    <a href="profil.php" class="card h-100 text-decoration-none shadow-sm hover-shadow transition">
                        <div class="card-img-top bg-kampus-blue d-flex align-items-center justify-content-center" style="height: 180px;">
                            <svg class="text-white" style="width: 60px; height: 60px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-kampus-blue fw-bold">Profil Lab</h5>
                            <p class="card-text text-muted small">Lihat visi, misi, dan struktur organisasi laboratorium kami.</p>
                            <span class="text-primary fw-medium">Selengkapnya &rarr;</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="galeri.php" class="card h-100 text-decoration-none shadow-sm">
                        <div class="card-img-top bg-kampus-blue d-flex align-items-center justify-content-center" style="height: 180px;">
                            <svg class="text-white" style="width: 60px; height: 60px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l-1.586-1.586a2 2 0 00-2.828 0L6 14m6-6l.01.01" />
                            </svg>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-kampus-blue fw-bold">Galeri Kegiatan</h5>
                            <p class="card-text text-muted small">Dokumentasi kegiatan dan acara yang telah kami laksanakan.</p>
                            <span class="text-primary fw-medium">Selengkapnya &rarr;</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="arsip.php" class="card h-100 text-decoration-none shadow-sm">
                        <div class="card-img-top bg-kampus-blue d-flex align-items-center justify-content-center" style="height: 180px;">
                            <svg class="text-white" style="width: 60px; height: 60px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-kampus-blue fw-bold">Arsip</h5>
                            <p class="card-text text-muted small">Kumpulan dokumen, penelitian, dan pengabdian masyarakat.</p>
                            <span class="text-primary fw-medium">Selengkapnya &rarr;</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="layanan.php" class="card h-100 text-decoration-none shadow-sm">
                        <div class="card-img-top bg-kampus-blue d-flex align-items-center justify-content-center" style="height: 180px;">
                            <svg class="text-white" style="width: 60px; height: 60px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.628V18a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h4.372M20.5 6.5l-11 11M15 3h6v6" />
                            </svg>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-kampus-blue fw-bold">Layanan</h5>
                            <p class="card-text text-muted small">Sarana, prasarana, dan layanan konsultasi yang kami tawarkan.</p>
                            <span class="text-primary fw-medium">Selengkapnya &rarr;</span>
                        </div>
                    </a>
                </div>
                
            </div>
        </div>
    </main>

<?php include('footer.php'); ?>