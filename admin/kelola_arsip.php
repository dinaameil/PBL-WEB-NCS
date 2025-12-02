<?php
    include('header_admin.php');
    include('../config/db_config.php');

    // Ambil data
    $sql = "SELECT * FROM arsip ORDER BY tanggal DESC";
    $result = pg_query($conn, $sql);
    $data_arsip = pg_fetch_all($result, PGSQL_ASSOC);
    if (!$data_arsip) $data_arsip = [];
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Arsip Dokumen</h1>
</div>

<div class="card shadow-sm mb-5">
    <div class="card-header bg-white fw-bold text-kampus-blue py-3">
        <i class="bi bi-upload me-2"></i>Upload Dokumen Baru
    </div>
    <div class="card-body">
        <form action="proses_tambah_arsip.php" method="POST" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Judul Dokumen</label>
                    <input type="text" name="judul" class="form-control" required placeholder="Contoh: Modul Jaringan Dasar">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="Modul Praktikum">Modul Praktikum</option>
                        <option value="SOP Lab">SOP / Aturan</option>
                        <option value="Penelitian">Hasil Penelitian</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-bold">File PDF</label>
                    <input type="file" name="file_arsip" class="form-control" accept=".pdf" required>
                    <div class="form-text text-danger">*Hanya menerima file format PDF.</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary bg-kampus-blue mt-3 px-4">
                <i class="bi bi-cloud-arrow-up me-2"></i> Upload File
            </button>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_arsip as $item) : ?>
                <tr>
                    <td class="ps-4 fw-bold"><?php echo htmlspecialchars($item['judul']); ?></td>
                    <td><span class="badge bg-light text-dark border"><?php echo $item['kategori']; ?></span></td>
                    <td><?php echo date('d/m/Y', strtotime($item['tanggal'])); ?></td>
                    <td>
                        <a href="../<?php echo $item['file_path']; ?>" target="_blank" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-eye"></i></a>
                        <a href="hapus_arsip.php?id=<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus dokumen ini?');"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('footer_admin.php'); ?>