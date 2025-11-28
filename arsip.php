<?php
    $page_title = "Arsip";
    $active_page = "arsip";
    include('header.php');
?>

<main class="container py-5">

    <!-- Judul Halaman -->
    <h1 class="text-center fw-bold text-kampus-blue mb-3">Arsip Dokumen</h1>
    <p class="text-center text-secondary mb-5">Menampilkan 5 dokumen terbaru yang dipublikasikan.</p>

    <!-- CARD LIST -->
    <div class="card shadow-sm border-0 p-4">

        <!-- ITEM 1 -->
        <div class="d-flex flex-column flex-md-row align-items-center p-3 border rounded mb-3">
            <i class="bi bi-filetype-pdf text-danger display-5 me-md-4 mb-3 mb-md-0"></i>

            <div class="flex-grow-1 text-center text-md-start">
                <h5 class="fw-bold text-kampus-blue mb-1">Judul Dokumen Arsip 1 (Terbaru)</h5>
                <small class="text-muted">Kategori: Penelitian | Dipublikasikan: 18 Nov 2025</small>
            </div>

            <a href="assets/dokumen_arsip_1.pdf"
               target="_blank"
               class="btn btn-primary ms-md-4 mt-3 mt-md-0">
                Lihat PDF
            </a>
        </div>

        <!-- ITEM 2 -->
        <div class="d-flex flex-column flex-md-row align-items-center p-3 border rounded mb-3">
            <i class="bi bi-filetype-pdf text-danger display-5 me-md-4 mb-3 mb-md-0"></i>

            <div class="flex-grow-1 text-center text-md-start">
                <h5 class="fw-bold text-kampus-blue mb-1">Judul Dokumen Arsip 2</h5>
                <small class="text-muted">Kategori: Pengabdian | Dipublikasikan: 15 Nov 2025</small>
            </div>

            <a href="assets/dokumen_arsip_2.pdf"
               target="_blank"
               class="btn btn-primary ms-md-4 mt-3 mt-md-0">
                Lihat PDF
            </a>
        </div>

        <!-- ITEM 3 -->
        <div class="d-flex flex-column flex-md-row align-items-center p-3 border rounded mb-3">
            <i class="bi bi-filetype-pdf text-danger display-5 me-md-4 mb-3 mb-md-0"></i>

            <div class="flex-grow-1 text-center text-md-start">
                <h5 class="fw-bold text-kampus-blue mb-1">Judul Dokumen Arsip 3</h5>
                <small class="text-muted">Kategori: Dokumen Lab | Dipublikasikan: 10 Nov 2025</small>
            </div>

            <a href="assets/dokumen_arsip_3.pdf"
               target="_blank"
               class="btn btn-primary ms-md-4 mt-3 mt-md-0">
                Lihat PDF
            </a>
        </div>

        <!-- ITEM 4 -->
        <div class="d-flex flex-column flex-md-row align-items-center p-3 border rounded mb-3">
            <i class="bi bi-filetype-pdf text-danger display-5 me-md-4 mb-3 mb-md-0"></i>

            <div class="flex-grow-1 text-center text-md-start">
                <h5 class="fw-bold text-kampus-blue mb-1">Judul Dokumen Arsip 4</h5>
                <small class="text-muted">Kategori: Penelitian | Dipublikasikan: 05 Nov 2025</small>
            </div>

            <a href="assets/dokumen_arsip_4.pdf"
               target="_blank"
               class="btn btn-primary ms-md-4 mt-3 mt-md-0">
                Lihat PDF
            </a>
        </div>

        <!-- ITEM 5 -->
        <div class="d-flex flex-column flex-md-row align-items-center p-3 border rounded mb-3">
            <i class="bi bi-filetype-pdf text-danger display-5 me-md-4 mb-3 mb-md-0"></i>

            <div class="flex-grow-1 text-center text-md-start">
                <h5 class="fw-bold text-kampus-blue mb-1">Judul Dokumen Arsip 5</h5>
                <small class="text-muted">Kategori: Manual | Dipublikasikan: 01 Nov 2025</small>
            </div>

            <a href="assets/dokumen_arsip_5.pdf"
               target="_blank"
               class="btn btn-primary ms-md-4 mt-3 mt-md-0">
                Lihat PDF
            </a>
        </div>

    </div>

</main>

<?php include('footer.php'); ?>
