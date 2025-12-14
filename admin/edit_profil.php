<?php
    include('header_admin.php');
    include('../config/db_config.php');

    // --- 1. AMBIL DATA SAAT INI DARI DATABASE ---
    // Kita ambil visi, misi, dan path FOTO LAB dari tabel konten_teks
    $sql = "SELECT kunci, isi FROM konten_teks WHERE kunci IN ('visi', 'misi', 'foto_lab_path')";
    $result = pg_query($conn, $sql);
    
    $data = [];
    while ($row = pg_fetch_assoc($result)) {
        $data[$row['kunci']] = $row['isi'];
    }

    // Set nilai default jika database masih kosong
    $visi_saat_ini = isset($data['visi']) ? $data['visi'] : '';
    $misi_saat_ini = isset($data['misi']) ? $data['misi'] : '';
    
    // Ambil path foto lab saat ini
    // Cek apakah isinya link eksternal (placeholder) atau file lokal
    $path_db = isset($data['foto_lab_path']) ? $data['foto_lab_path'] : '';
    if (strpos($path_db, 'http') === 0) {
        $foto_lab_saat_ini = $path_db; // Gunakan langsung jika link eksternal
    } elseif (!empty($path_db)) {
        $foto_lab_saat_ini = '../' . $path_db; // Tambahkan ../ jika file lokal
    } else {
        // Default jika kosong sama sekali
        $foto_lab_saat_ini = 'https://placehold.co/600x400/eeeeee/999999?text=Foto+Lab+Belum+Diatur';
    }
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <h1 class="h2 fw-bold text-dark">Edit Halaman Profil</h1>
</div>

<div class="row">
    <div class="col-lg-8">
        
        <form action="proses_update_profil.php" method="POST" enctype="multipart/form-data">
            
            <div class="card shadow-sm mb-4 border-0">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 fw-bold text-kampus-blue"><i class="bi bi-file-text me-2"></i>Visi & Misi</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <label for="visi" class="form-label fw-bold text-secondary">Visi Laboratorium</label>
                        <textarea class="form-control" id="visi" name="visi" rows="4" placeholder="Masukkan visi laboratorium..." required><?php echo htmlspecialchars($visi_saat_ini); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="misi" class="form-label fw-bold text-secondary">Misi Laboratorium</label>
                        <textarea class="form-control" id="misi" name="misi" rows="6" placeholder="Masukkan poin-poin misi..." required><?php echo htmlspecialchars($misi_saat_ini); ?></textarea>
                        <div class="form-text">Tips: Pisahkan setiap poin misi dengan baris baru (Enter).</div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-4 border-0">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 fw-bold text-kampus-blue"><i class="bi bi-image me-2"></i>Foto Laboratorium Utama</h5>
                </div>
                <div class="card-body p-4">
                    
                    <div class="mb-3">
                        <label class="form-label d-block fw-bold text-secondary mb-2">Preview Foto Saat Ini</label>
                        <div class="p-2 border rounded bg-light text-center">
                             <img src="<?php echo $foto_lab_saat_ini; ?>" 
                                  alt="Preview Foto Lab" 
                                  class="img-fluid rounded shadow-sm" 
                                  style="max-height: 300px; width: auto; object-fit: cover;"
                                  onerror="this.src='https://placehold.co/600x400?text=Gagal+Muat'">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="foto_lab" class="form-label fw-bold text-secondary">Ganti Foto Baru</label>
                        <input class="form-control" type="file" id="foto_lab" name="foto_lab_baru" accept="image/png, image/jpeg, image/jpg">
                        
                        <div class="alert alert-light border mt-3 mb-0 py-2 small text-muted">
                            <i class="bi bi-info-circle me-1"></i> 
                            Kosongkan jika tidak ingin mengubah foto. <br>
                            Format: <strong>JPG</strong> atau <strong>PNG</strong>. Disarankan ukuran landscape (sekitar 600x400 pixel atau lebih besar).
                        </div>
                    </div>

                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
                <a href="dashboard.php" class="btn btn-outline-secondary px-4 fw-bold me-md-2">Batal</a>
                <button type="submit" class="btn btn-primary bg-kampus-blue px-5 fw-bold shadow-sm">
                    <i class="bi bi-save me-2"></i> Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm border-0 bg-primary bg-opacity-10">
            <div class="card-body">
                <h6 class="fw-bold text-primary"><i class="bi bi-lightbulb me-2"></i>Informasi</h6>
                <p class="small text-secondary mb-0">
                    Halaman ini digunakan untuk mengubah Visi, Misi, dan <strong>Foto Utama</strong> yang tampil di halaman Profil.
                    <br><br>
                    Gunakan foto dengan resolusi yang cukup bagus agar tampilan website terlihat profesional.
                </p>
            </div>
        </div>
    </div>
</div>

<?php include('footer_admin.php'); ?>