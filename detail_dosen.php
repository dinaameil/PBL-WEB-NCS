<?php
$page_title = "Profil Dosen";
$active_page = "dosen";
include('header.php');
include('config/db_config.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT * FROM dosen WHERE id = $1";
$result = pg_query_params($conn, $sql, [$id]);
$dosen = pg_fetch_assoc($result);

if (!$dosen) {
    echo "
    <main class='container py-5 text-center'>
        <i class='bi bi-person-x display-1 text-muted'></i>
        <h4 class='mt-3'>Data dosen tidak ditemukan</h4>
        <a href='profil.php' class='btn btn-outline-secondary mt-3'>Kembali ke Profil</a>
    </main>";
    include('footer.php');
    exit();
}
?>

<main class="container py-5">
    <div class="mb-4">
        <a href="profil.php#struktur-lab"
           class="btn btn-sm btn-outline-secondary mb-3">
           <i class="bi bi-arrow-left"></i> Kembali ke Profil
        </a>
        <hr class="mt-3">
    </div>

    <div class="row g-4">

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 text-center sticky-top" style="top:100px">
                <div class="card-body p-4">

                    <?php
                        $foto_path = !empty($dosen['foto_path']) ? htmlspecialchars($dosen['foto_path']) : 'https://placehold.co/300x400?text=Foto+Dosen';
                    ?>
                    <img
                        src="<?= $foto_path; ?>"
                        class="img-fluid rounded shadow mb-3"
                        alt="<?= htmlspecialchars($dosen['nama']); ?>"
                        style="max-height:320px; object-fit:cover;"
                    >

                    <h4 class="fw-bold text-kampus-blue mb-1">
                        <?= htmlspecialchars($dosen['nama']); ?>
                    </h4>

                    <div class="text-muted mb-3">
                        <?= htmlspecialchars($dosen['jabatan']); ?>
                    </div>

                    <div class="list-group list-group-flush small text-start">
                        <div class="list-group-item">
                            <strong>NIP</strong><br><span class="text-muted"><?= htmlspecialchars($dosen['nip']); ?></span>
                        </div>
                        <div class="list-group-item">
                            <strong>NIDN</strong><br><span class="text-muted"><?= htmlspecialchars($dosen['nidn']); ?></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-8">

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5 class="fw-bold text-kampus-blue mb-3">
                        Informasi Umum
                    </h5>

                    <?php if ($dosen['linkedin'] || $dosen['google_scholar'] || $dosen['sinta']): ?>
                        <div class="d-flex gap-2 flex-wrap small mb-3">
                            <?php if ($dosen['linkedin']): ?>
                                <a href="<?= htmlspecialchars($dosen['linkedin']); ?>" target="_blank"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-linkedin me-1"></i> LinkedIn
                                </a>
                            <?php endif; ?>
                            <?php if ($dosen['google_scholar']): ?>
                                <a href="<?= htmlspecialchars($dosen['google_scholar']); ?>" target="_blank"
                                   class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-journal-check me-1"></i> Google Scholar
                                </a>
                            <?php endif; ?>
                            <?php if ($dosen['sinta']): ?>
                                <a href="<?= htmlspecialchars($dosen['sinta']); ?>" target="_blank"
                                   class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-bar-chart-fill me-1"></i> SINTA
                                </a>
                            <?php endif; ?>
                        </div>
                        <hr class="my-3">
                    <?php endif; ?>

                    <div class="row g-3 small">
                        <div class="col-md-6">
                            <strong>Program Studi</strong><br>
                            <span class="text-muted"><?= htmlspecialchars($dosen['program_studi']); ?></span>
                        </div>

                        <?php if ($dosen['email']): ?>
                        <div class="col-md-6">
                            <strong>Email</strong><br>
                            <a href="mailto:<?= htmlspecialchars($dosen['email']); ?>"
                               class="text-decoration-none text-secondary">
                                <?= htmlspecialchars($dosen['email']); ?>
                            </a>
                        </div>
                        <?php endif; ?>

                        <?php if ($dosen['alamat_kantor']): ?>
                        <div class="col-12">
                            <strong>Alamat Kantor</strong><br>
                            <span class="text-muted"><?= htmlspecialchars($dosen['alamat_kantor']); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>

            <?php if ($dosen['bidang_keahlian']): ?>
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5 class="fw-bold text-kampus-blue mb-3">
                        Bidang Keahlian
                    </h5>

                    <?php foreach (explode(',', $dosen['bidang_keahlian']) as $b): ?>
                        <span class="badge bg-light text-secondary border px-3 py-2 me-1 mb-1 rounded-pill">
                            <?= trim(htmlspecialchars($b)); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($dosen['pendidikan']): ?>
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5 class="fw-bold text-kampus-blue mb-3">
                        Pendidikan
                    </h5>
                    <div class="text-muted lh-lg">
                        <?= nl2br(htmlspecialchars($dosen['pendidikan'])); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($dosen['mata_kuliah']): ?>
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-kampus-blue mb-3">
                        Mata Kuliah yang Diampu
                    </h5>

                    <div class="row g-2 small">
                        <?php foreach (explode(',', $dosen['mata_kuliah']) as $mk): ?>
                            <div class="col-md-6">
                                <div class="bg-light p-2 rounded border">
                                    <i class="bi bi-book me-1 text-primary"></i> <?= trim(htmlspecialchars($mk)); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>

</main>

<?php include('footer.php'); ?>