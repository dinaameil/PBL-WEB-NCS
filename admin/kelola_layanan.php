<?php
    include('header_admin.php');
    include('../config/db_config.php');

    // Ambil data saat ini untuk ditampilkan di form
    $sql = "SELECT kunci, isi FROM konten_teks WHERE kunci LIKE 'layanan_%'";
    $result = pg_query($conn, $sql);
    $konten = [];
    while ($row = pg_fetch_assoc($result)) {
        $konten[$row['kunci']] = $row['isi'];
    }
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Halaman Layanan</h1>
</div>

<form action="proses_update_layanan.php" method="POST">
    
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white fw-bold text-kampus-blue py-3">
            <i class="bi bi-building-gear me-2"></i>Edit Bagian Sarana & Prasarana
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label fw-bold">Judul Seksi</label>
                <input type="text" name="judul_sarana" class="form-control" 
                    value="<?php echo htmlspecialchars($konten['layanan_sarana_judul'] ?? ''); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi Fasilitas</label>
                <textarea name="isi_sarana" class="form-control" rows="5"><?php echo htmlspecialchars($konten['layanan_sarana_isi'] ?? ''); ?></textarea>
                <div class="form-text">Jelaskan alat-alat dan fasilitas apa saja yang dimiliki lab.</div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white fw-bold text-kampus-blue py-3">
            <i class="bi bi-people me-2"></i>Edit Bagian Konsultasi
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label fw-bold">Judul Seksi</label>
                <input type="text" name="judul_konsultasi" class="form-control" 
                    value="<?php echo htmlspecialchars($konten['layanan_konsultasi_judul'] ?? ''); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi Layanan</label>
                <textarea name="isi_konsultasi" class="form-control" rows="5"><?php echo htmlspecialchars($konten['layanan_konsultasi_isi'] ?? ''); ?></textarea>
                <div class="form-text">Jelaskan jasa konsultasi atau pelatihan yang ditawarkan.</div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary bg-kampus-blue px-5 mb-5">
        <i class="bi bi-save me-2"></i> Simpan Perubahan
    </button>
</form>

<?php include('footer_admin.php'); ?>