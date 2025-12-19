<?php
    include('header_admin.php');
    include('../config/db_config.php');

    $sql = "SELECT * FROM galeri ORDER BY tanggal DESC";
    $result = pg_query($conn, $sql);
    $data_galeri = pg_fetch_all($result, PGSQL_ASSOC);
    if (!$data_galeri) $data_galeri = [];
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Galeri Kegiatan</h1>
</div>

<div class="card shadow-sm mb-5">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 text-kampus-blue fw-bold"><i class="bi bi-image me-2"></i>Upload Foto Baru</h5>
    </div>
    <div class="card-body">
        <form action="proses_tambah_galeri.php" method="POST" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Judul Kegiatan</label>
                    <input type="text" name="judul" class="form-control" required placeholder="Contoh: Workshop Cyber Security">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="Kegiatan">Dokumentasi Kegiatan</option>
                        <option value="Agenda">Agenda (Akan Datang)</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-bold">File Foto</label>
                    <input type="file" name="foto_galeri" class="form-control" accept="image/*" required>
                    <div class="form-text">Format: JPG/PNG.</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary bg-kampus-blue mt-3 px-4">
                <i class="bi bi-cloud-upload me-2"></i> Upload
            </button>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 text-kampus-blue fw-bold"><i class="bi bi-images me-2"></i>Daftar Galeri</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Foto</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th class="text-end px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data_galeri)) : ?>
                        <tr><td colspan="5" class="text-center py-4 text-muted">Belum ada foto.</td></tr>
                    <?php else : ?>
                        <?php 
                        $hari_ini = date('Y-m-d'); // Tambahkan ini
                        foreach ($data_galeri as $item) : 
                            // Cek status otomatis berdasarkan tanggal
                            $is_agenda = ($item['tanggal'] >= $hari_ini);
                        ?>
                        <tr>
                            <td class="px-4">
                                <img src="../<?php echo $item['foto_path']; ?>" class="rounded object-fit-cover" width="80" height="50">
                            </td>
                            <td class="fw-bold"><?php echo htmlspecialchars($item['judul']); ?></td>
                            <td><?php echo date('d M Y', strtotime($item['tanggal'])); ?></td>
                            <td>
                                <?php if ($is_agenda) : ?>
                                    <span class="badge bg-warning text-dark">Agenda (Akan Datang)</span>
                                <?php else : ?>
                                    <span class="badge bg-success">Selesai / Kegiatan</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-end px-4">
                                <a href="hapus_galeri.php?id=<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus foto ini?');">
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