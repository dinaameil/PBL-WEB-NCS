<?php
    include('header_admin.php');
    // include('../config/db_config.php'); 
    // $daftar_galeri = ... (Ambil dari DB)
    
    // Dummy Data
    $dummy_galeri = [
        ['id' => 1, 'judul' => 'Workshop Cyber Security', 'kategori' => 'Kegiatan', 'tanggal' => '2025-10-15', 'foto' => 'https://placehold.co/100x60'],
        ['id' => 2, 'judul' => 'Seminar Nasional', 'kategori' => 'Agenda', 'tanggal' => '2025-11-25', 'foto' => 'https://placehold.co/100x60'],
    ];
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Galeri</h1>
</div>

<div class="card shadow-sm mb-5">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold text-kampus-blue">Tambah Foto / Agenda</h5>
    </div>
    <div class="card-body">
        <form action="proses_tambah_galeri.php" method="POST" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Judul Kegiatan</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="kegiatan">Kegiatan</option>
                        <option value="agenda">Agenda</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Upload Foto</label>
                    <input type="file" name="foto_galeri" class="form-control" accept="image/*" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary bg-kampus-blue mt-3">Tambah Data</button>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="px-4">Preview</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th class="text-end px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dummy_galeri as $item) : ?>
                <tr>
                    <td class="px-4"><img src="<?php echo $item['foto']; ?>" class="rounded" width="60"></td>
                    <td class="fw-bold"><?php echo $item['judul']; ?></td>
                    <td>
                        <?php if($item['kategori'] == 'Agenda'): ?>
                            <span class="badge bg-success">Agenda</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Kegiatan</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $item['tanggal']; ?></td>
                    <td class="text-end px-4">
                        <a href="hapus_galeri.php?id=<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('footer_admin.php'); ?>