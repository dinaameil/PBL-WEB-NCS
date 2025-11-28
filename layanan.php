<?php
    $page_title = "Layanan";
    $active_page = "layanan";
    include('header.php');
?>

<div class="container py-5">

    <!-- Judul Halaman -->
    <h1 class="text-center fw-bold text-kampus-blue mb-4">Layanan Laboratorium NCS</h1>

    <p class="text-center text-muted mb-5">
        Berikut adalah layanan utama yang tersedia di Laboratorium Network & Cyber Security.
    </p>

    <!-- ===================================================== -->
    <!-- SARANA & PRASARANA -->
    <!-- ===================================================== -->
    <div class="mb-5">
        <h3 class="fw-bold text-kampus-blue mb-3">Sarana & Prasarana</h3>

        <div class="row g-4">

            <!-- Item 1 -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="fw-bold text-kampus-blue">Perangkat Jaringan</h5>
                        <p class="text-muted">
                            Router, switch, access point, dan perangkat pendukung lainnya tersedia untuk kegiatan praktikum dan riset.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="fw-bold text-kampus-blue">Ruang Laboratorium</h5>
                        <p class="text-muted">
                            Ruang laboratorium dapat digunakan untuk belajar mandiri, riset, atau persiapan kompetisi jaringan & keamanan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="fw-bold text-kampus-blue">Komputer Praktikum</h5>
                        <p class="text-muted">
                            Komputer dengan spesifikasi yang mendukung simulasi jaringan, virtualisasi, dan tools cyber security.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ===================================================== -->
    <!-- LAYANAN KONSULTASI -->
    <!-- ===================================================== -->
    <div class="mb-5">
        <h3 class="fw-bold text-kampus-blue mb-3">Layanan Konsultasi</h3>

        <div class="row g-4">

            <!-- Konsultasi 1 -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="fw-bold text-kampus-blue">Pendampingan Materi Praktikum</h5>
                        <p class="text-muted">
                            Asisten laboratorium siap membantu pemahaman materi jaringan dasar, routing, switching, keamanan jaringan, dan lainnya.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Konsultasi 2 -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="fw-bold text-kampus-blue">Konsultasi Riset</h5>
                        <p class="text-muted">
                            Dosen dan asisten dapat memberikan arahan untuk topik riset seperti cyber security, IoT security, digital forensic, dan network simulation.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<?php include('footer.php'); ?>
