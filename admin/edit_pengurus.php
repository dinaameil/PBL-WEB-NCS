<?php
    include('header_admin.php');
    include('../config/db_config.php');

    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM pengurus WHERE id = $1";
    $result = pg_query_params($conn, $sql, [$id]);
    $data = pg_fetch_assoc($result);

    if (!$data) { echo "<script>alert('Data tidak ditemukan'); window.location='kelola_pengurus.php';</script>"; exit(); }
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Pengurus</h1>
    <a href="kelola_pengurus.php" class="btn btn-outline-secondary btn-sm">&larr; Kembali</a>
</div>

<div class="card shadow-sm" style="max-width: 600px;">
    <div class="card-body p-4">
        <form action="proses_update_pengurus.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <input type="hidden" name="foto_lama" value="<?php echo $data['foto_path']; ?>">

            <div class="mb-3">
                <label class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($data['nama']); ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" value="<?php echo htmlspecialchars($data['jabatan']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label d-block fw-bold">Foto Saat Ini</label>
                <img src="../<?php echo $data['foto_path']; ?>" alt="Foto" class="img-thumbnail mb-2" style="height: 100px;">
                
                <label class="form-label d-block small text-muted">Ganti Foto (Opsional)</label>
                <input type="file" name="foto_baru" class="form-control form-control-sm" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary bg-kampus-blue w-100">Simpan Perubahan</button>
        </form>
    </div>
</div>

<?php include('footer_admin.php'); ?>