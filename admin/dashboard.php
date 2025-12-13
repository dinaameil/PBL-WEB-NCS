<?php
    include('header_admin.php');
    // Pastikan session sudah start di header_admin.php
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard Admin</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" disabled>
                <?php echo date('l, d F Y'); ?>
            </button>
        </div>
    </div>
</div>

<div class="alert alert-primary shadow-sm border-0" role="alert">
    <h4 class="alert-heading"><i class="bi bi-person-circle me-2"></i>Selamat Datang, Admin!</h4>
    <p class="mb-0">
        Selamat bekerja di Panel Kontrol Lab NCS. Anda login sebagai <strong><?php echo $_SESSION['user_email']; ?></strong>.
        Gunakan menu di bawah untuk mengelola konten website.
    </p>
</div>

<div class="row g-4 mt-2">
    
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm border-0 hover-card">
            <div class="card-body text-center p-4">
                <div class="bg-light rounded-circle d-inline-flex p-3 mb-3">
                    <i class="bi bi-gear-wide-connected text-kampus-blue fs-2"></i>
                </div>
                <h5 class="card-title fw-bold text-kampus-blue">Layanan & Fasilitas</h5>
                <p class="card-text text-muted small">Update info Sarana, Prasarana, dan Konsultasi.</p>
                <a href="kelola_layanan.php" class="btn btn-sm btn-outline-primary mt-2 stretched-link">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm border-0 hover-card">
            <div class="card-body text-center p-4">
                <div class="bg-light rounded-circle d-inline-flex p-3 mb-3">
                    <i class="bi bi-people-fill text-kampus-blue fs-2"></i>
                </div>
                <h5 class="card-title fw-bold text-kampus-blue">Data Pengurus</h5>
                <p class="card-text text-muted small">Tambah atau hapus data dosen & peneliti lab.</p>
                <a href="kelola_dosen.php" class="btn btn-sm btn-outline-primary mt-2 stretched-link">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm border-0 hover-card">
            <div class="card-body text-center p-4">
                <div class="bg-light rounded-circle d-inline-flex p-3 mb-3">
                    <i class="bi bi-file-earmark-pdf-fill text-danger fs-2"></i>
                </div>
                <h5 class="card-title fw-bold text-kampus-blue">Arsip Dokumen</h5>
                <p class="card-text text-muted small">Upload Modul, Penelitian, atau SOP baru.</p>
                <a href="kelola_arsip.php" class="btn btn-sm btn-outline-primary mt-2 stretched-link">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm border-0 hover-card">
            <div class="card-body text-center p-4">
                <div class="bg-light rounded-circle d-inline-flex p-3 mb-3">
                    <i class="bi bi-images text-success fs-2"></i>
                </div>
                <h5 class="card-title fw-bold text-kampus-blue">Galeri & Agenda</h5>
                <p class="card-text text-muted small">Upload dokumentasi kegiatan lab.</p>
                <a href="kelola_galeri.php" class="btn btn-sm btn-outline-primary mt-2 stretched-link">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm border-0 hover-card">
            <div class="card-body text-center p-4">
                <div class="bg-light rounded-circle d-inline-flex p-3 mb-3">
                    <i class="bi bi-building text-warning fs-2"></i>
                </div>
                <h5 class="card-title fw-bold text-kampus-blue">Profil Lab</h5>
                <p class="card-text text-muted small">Edit Visi, Misi, dan Logo utama.</p>
                <a href="edit_profil.php" class="btn btn-sm btn-outline-primary mt-2 stretched-link">Kelola</a>
            </div>
        </div>
    </div>

</div>

<style>
    .hover-card { transition: transform 0.2s; }
    .hover-card:hover { transform: translateY(-5px); border: 1px solid #003366 !important; }
</style>

<?php
    include('footer_admin.php');
?>