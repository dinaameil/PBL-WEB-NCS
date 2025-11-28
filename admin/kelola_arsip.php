<?php
    include('header_admin.php');
    // include('../config/db_config.php'); 
    
    // LOGIKA PHP: Fetch data arsip (Nanti ganti dengan query SQL asli)
    // $sql = "SELECT * FROM arsip ORDER BY tanggal DESC";
    // $result = pg_query($conn, $sql);
    // $data_arsip = pg_fetch_all($result, PGSQL_ASSOC);
    
    // Dummy Data
    $data_arsip = [
        ['id'=>1, 'judul'=>'Panduan Praktikum Jaringan', 'kategori'=>'Modul', 'tanggal'=>'2025-11-01', 'file'=>'file1.pdf'],
        ['id'=>2, 'judul'=>'Laporan Penelitian IoT', 'kategori'=>'Penelitian', 'tanggal'=>'2025-10-20', 'file'=>'file2.pdf']
    ];
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Arsip Dokumen</h1>
</div>

<div class="card shadow-sm mb-5">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold text-kampus-blue">Upload Dokumen Baru</h5>
    </div>
    <div class="card-body">
        <form action="proses_tambah_arsip.php" method="POST" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Judul Dokumen</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="Penelitian">Penelitian</option>
                        <option value="Pengabdian">Pengabdian</option>
                        <option value="Modul">Modul Praktikum</option>
                        <option value="SOP">SOP / Manual</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tanggal Terbit</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label">File Dokumen (PDF)</label>
                    <input type="file" name="file_arsip" class="form-control" accept=".pdf" required>
                    <div class="form-text">Maksimal ukuran file 5MB. Format PDF.</div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary bg-kampus-blue mt-3">
                <i class="bi bi-upload me-2"></i> Upload Dokumen
            </button>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold text-kampus-blue">Daftar Arsip</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>File</th>
                        <th class="text-end px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_arsip as $item) : ?>
                    <tr>
                        <td class="px-4 fw-bold"><?php echo $item['judul']; ?></td>
                        <td><span class="badge bg-info text-dark"><?php echo $item['kategori']; ?></span></td>
                        <td><?php echo $item['tanggal']; ?></td>
                        <td>
                            <a href="../assets/<?php echo $item['file']; ?>" target="_blank" class="btn btn-sm btn-outline-secondary">
                                Lihat PDF
                            </a>
                        </td>
                        <td class="text-end px-4">
                            <a href="hapus_arsip.php?id=<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus dokumen ini?');">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('footer_admin.php'); ?>