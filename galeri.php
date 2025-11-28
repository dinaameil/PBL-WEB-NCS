<?php
    $page_title = "Galeri";
    $active_page = "galeri";
    include('header.php');
?>

<div class="container py-5">

    <h1 class="fw-bold text-kampus-blue mb-4">Galeri Kegiatan</h1>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4" id="galleryTabs">
        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#kegiatan">Kegiatan (Sudah Lewat)</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#agenda">Agenda (Akan Datang)</button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">

        <!-- Kegiatan -->
        <div class="tab-pane fade show active" id="kegiatan">

            <div class="row g-4">

                <!-- Foto 1 -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="https://placehold.co/600x400/eeeeee/999999?text=Foto+Kegiatan+1"
                             class="zoom-img card-img-top"
                             alt="Foto 1">
                        <div class="card-body">
                            <h5 class="fw-semibold">Workshop Cyber Security</h5>
                            <p class="text-muted small mb-0">15 Oktober 2025</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 2 -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="https://placehold.co/600x400/eeeeee/999999?text=Foto+Kegiatan+2"
                             class="zoom-img card-img-top"
                             alt="Foto 2">
                        <div class="card-body">
                            <h5 class="fw-semibold">Kunjungan Industri</h5>
                            <p class="text-muted small mb-0">01 November 2025</p>
                        </div>
                    </div>
                </div>

                <!-- Foto 3 -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="https://placehold.co/600x400/eeeeee/999999?text=Foto+Kegiatan+3"
                             class="zoom-img card-img-top"
                             alt="Foto 3">
                        <div class="card-body">
                            <h5 class="fw-semibold">Lomba CTF</h5>
                            <p class="text-muted small mb-0">10 November 2025</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Agenda -->
        <div class="tab-pane fade" id="agenda">
            <div class="card p-4 shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="bg-kampus-blue text-white rounded p-3 text-center me-3">
                        <div class="fs-2 fw-bold">25</div>
                        <div>NOV</div>
                    </div>
                    <div>
                        <h5 class="fw-bold text-kampus-blue">Seminar Nasional AI & Security</h5>
                        <p class="text-muted mb-0">Pendaftaran akan segera dibuka.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?php include('footer.php'); ?>
