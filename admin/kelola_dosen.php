<?php
    include('header_admin.php');
    include('../config/db_config.php');

    // Ambil data dosen
    $sql = "SELECT * FROM dosen ORDER BY id ASC";
    $result = pg_query($conn, $sql);
    $daftar_dosen = pg_fetch_all($result, PGSQL_ASSOC);
    if (!$daftar_dosen) $daftar_dosen = [];
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelola Pengurus Lab</h1>
</div>

<div class="card shadow-sm mb-5">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 text-kampus-blue fw-bold"><i class="bi bi-person-plus me-2"></i>Tambah Pengurus Baru</h5>
    </div>
    <div class="card-body">
        <form action="proses_tambah_dosen.php" method="POST" enctype="multipart/form-data">
    <div class="row g-3">

        <div class="col-md-6">
            <label class="form-label fw-bold">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label fw-bold">Jabatan</label>
            <input type="text" name="jabatan" class="form-control">
        </div>

        <div class="col-md-6">
        <label class="form-label fw-bold">Program Studi</label>
        <input type="text" name="program_studi" class="form-control" value="Teknik Informatika">
        </div>

        <div class="col-md-6">
            <label class="form-label fw-bold">Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="col-md-12">
            <label class="form-label fw-bold">Alamat Kantor</label>
            <textarea name="alamat_kantor" class="form-control" rows="2">
        Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang
            </textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label fw-bold">Bidang Keahlian</label>
            <input type="text" name="bidang_keahlian" class="form-control"
                placeholder="Network Security, Cyber Security">
        </div>

        <div class="col-md-6">
            <label class="form-label fw-bold">LinkedIn</label>
            <input type="text" name="linkedin" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label fw-bold">Google Scholar</label>
            <input type="text" name="google_scholar" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label fw-bold">SINTA</label>
            <input type="text" name="sinta" class="form-control">
        </div>

        <div class="col-md-12">
            <label class="form-label fw-bold">Pendidikan</label>
            <textarea name="pendidikan" class="form-control" rows="3"></textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label fw-bold">NIP</label>
            <input type="text" name="nip" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label fw-bold">NIDN</label>
            <input type="text" name="nidn" class="form-control" required>
        </div>

        <div class="col-md-12">
            <label class="form-label fw-bold">Foto Profil</label>
            <input type="file" name="foto_dosen" class="form-control" accept="image/*">
        </div>

    </div>

    <button type="submit" class="btn btn-primary mt-3">
        Simpan Data
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
                        <th>NIP</th>
                        <th>NIDN</th>
                        <th class="text-end px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($daftar_dosen)) : ?>
                        <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada data.</td></tr>
                    <?php else : ?>
                        <?php foreach ($daftar_dosen as $dosen) : ?>
                        <tr>
                            <td class="px-4">
                                <?php $foto = !empty($dosen['foto_path']) ? '../'.$dosen['foto_path'] : 'https://placehold.co/50x50'; ?>
                                <img src="<?php echo $foto; ?>" class="rounded-circle object-fit-cover" width="50" height="50">
                            </td>
                            <td class="fw-bold"><?php echo htmlspecialchars($dosen['nama']); ?></td>
                            <td class="text-secondary"><?php echo htmlspecialchars($dosen['jabatan']); ?></td>
                            <td><?php echo htmlspecialchars($dosen['nip']); ?></td>
                            
                            <td><?php echo htmlspecialchars($dosen['nidn']); ?></td>

                                                        <td class="text-end px-4">
                                <a href="edit_dosen.php?id=<?php echo $dosen['id']; ?>" 
                                class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>

                                <a href="hapus_dosen.php?id=<?php echo $dosen['id']; ?>" 
                                class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Yakin hapus?');">
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