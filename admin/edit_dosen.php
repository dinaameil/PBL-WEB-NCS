<?php
include('header_admin.php');
include('../config/db_config.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT * FROM dosen WHERE id = $1";
$result = pg_query_params($conn, $sql, [$id]);
$dosen = pg_fetch_assoc($result);

if (!$dosen) {
    echo "<div class='alert alert-danger'>Data tidak ditemukan</div>";
    include('footer_admin.php');
    exit;
}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Pengurus Lab</h1>
</div>

<div class="card shadow-sm mb-5">
    <div class="card-body">

        <form action="proses_update_dosen.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $dosen['id']; ?>">
            <input type="hidden" name="foto_lama" value="<?= $dosen['foto_path']; ?>">

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required
                           value="<?= htmlspecialchars($dosen['nama']); ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control"
                           value="<?= htmlspecialchars($dosen['jabatan']); ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Program Studi</label>
                    <input type="text" name="program_studi" class="form-control"
                           value="<?= htmlspecialchars($dosen['program_studi']); ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="<?= htmlspecialchars($dosen['email']); ?>">
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-bold">Alamat Kantor</label>
                    <textarea name="alamat_kantor" class="form-control" rows="2"><?= htmlspecialchars($dosen['alamat_kantor']); ?></textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Bidang Keahlian</label>
                    <input type="text" name="bidang_keahlian" class="form-control"
                           value="<?= htmlspecialchars($dosen['bidang_keahlian']); ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">LinkedIn</label>
                    <input type="text" name="linkedin" class="form-control"
                           value="<?= htmlspecialchars($dosen['linkedin']); ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Google Scholar</label>
                    <input type="text" name="google_scholar" class="form-control"
                           value="<?= htmlspecialchars($dosen['google_scholar']); ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">SINTA</label>
                    <input type="text" name="sinta" class="form-control"
                           value="<?= htmlspecialchars($dosen['sinta']); ?>">
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-bold">Pendidikan</label>
                    <textarea name="pendidikan" class="form-control" rows="3"><?= htmlspecialchars($dosen['pendidikan']); ?></textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">NIP</label>
                    <input type="text" name="nip" class="form-control" required
                           value="<?= htmlspecialchars($dosen['nip']); ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">NIDN</label>
                    <input type="text" name="nidn" class="form-control" required
                           value="<?= htmlspecialchars($dosen['nidn']); ?>">
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-bold">Foto Profil</label>
                    <?php if (!empty($dosen['foto_path'])): ?>
                        <div class="mb-2">
                            <img src="../<?= $dosen['foto_path']; ?>" width="120" class="rounded shadow-sm">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="foto_baru" class="form-control" accept="image/*">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                </div>

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Simpan Perubahan
                </button>
                <a href="kelola_dosen.php" class="btn btn-secondary ms-2">Batal</a>
            </div>

        </form>

    </div>
</div>

<?php include('footer_admin.php'); ?>
