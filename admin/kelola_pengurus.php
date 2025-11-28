<?php
    include('header_admin.php');
    include('../config/db_config.php');

    // Ambil data pengurus
    $sql = "SELECT * FROM pengurus ORDER BY id ASC";
    $result = pg_query($conn, $sql);
    $daftar_pengurus = pg_fetch_all($result, PGSQL_ASSOC);
    if (!$daftar_pengurus) $daftar_pengurus = [];
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Pengurus Lab</h1>
</div>

<div class="card shadow-sm mb-5">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 text-kampus-blue fw-bold"><i class="bi bi-person-plus me-2"></i>Tambah Pengurus Baru</h5>
    </div>
    <div class="card-body">
        <form action="proses_tambah_pengurus.php" method="POST" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama Lengkap & Gelar</label>
                    <input type="text" name="nama" class="form-control" placeholder="Contoh: Erfan Rohadi, ST., M.Eng., Ph.D." required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" placeholder="Contoh: Kepala Lab / Peneliti" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Foto Profil</label>
                    <input type="file" name="foto_pengurus" class="form-control" accept="image/*" required>
                    <div class="form-text">Format: JPG/PNG. Disarankan rasio kotak (1:1).</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary bg-kampus-blue mt-3 px-4">
                <i class="bi bi-save me-2"></i> Simpan Data
            </button>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 text-kampus-blue fw-bold"><i class="bi bi-list-ul me-2"></i>Daftar Pengurus Saat Ini</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Foto</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                        <th class="text-end px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($daftar_pengurus)) : ?>
                        <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada data.</td></tr>
                    <?php else : ?>
                        <?php foreach ($daftar_pengurus as $pengurus) : ?>
                        <tr>
                            <td class="px-4">
                                <?php $foto = !empty($pengurus['foto_path']) ? '../'.$pengurus['foto_path'] : 'https://placehold.co/50x50'; ?>
                                <img src="<?php echo $foto; ?>" class="rounded-circle object-fit-cover" width="50" height="50">
                            </td>
                            <td class="fw-bold"><?php echo htmlspecialchars($pengurus['nama']); ?></td>
                            <td class="text-secondary"><?php echo htmlspecialchars($pengurus['jabatan']); ?></td>
                            <td class="text-end px-4">
                                <a href="hapus_pengurus.php?id=<?php echo $pengurus['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus?');">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('footer_admin.php'); ?>