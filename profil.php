<?php
$page_title = "Profil";
$active_page = "profil";
include('header.php');

include('config/db_config.php');

$sql_teks = "SELECT kunci, isi FROM konten_teks WHERE kunci IN ('visi', 'misi', 'foto_lab_path')";
$result_teks = pg_query($conn, $sql_teks);

$data_teks = [];
while ($row = pg_fetch_assoc($result_teks)) {
    $data_teks[$row['kunci']] = $row['isi'];
}

$visi = isset($data_teks['visi']) ? $data_teks['visi'] : "Visi belum diatur oleh Admin.";
$misi = isset($data_teks['misi']) ? $data_teks['misi'] : "Misi belum diatur oleh Admin.";

$path_foto_db = isset($data_teks['foto_lab_path']) ? $data_teks['foto_lab_path'] : '';
if (strpos($path_foto_db, 'http') === 0) {
    $foto_lab_src = $path_foto_db;
} elseif (!empty($path_foto_db)) {
    $foto_lab_src = $path_foto_db;
} else {
    $foto_lab_src = 'https://placehold.co/600x400/eeeeee/999999?text=Foto+Lab+NCS';
}
// ambil data dari tabel 'dosen' n urutkan Kepala Lab ada di urutan awal
$sql = "SELECT * FROM dosen ORDER BY 
    CASE WHEN jabatan ILIKE '%kepala lab%' THEN 1
    WHEN jabatan ILIKE '%koordinator%' THEN 2
    WHEN jabatan ILIKE '%peneliti%' THEN 3
    ELSE 4 END, 
    id ASC";
$result = pg_query($conn, $sql);
$daftar_pengurus = [];
if ($result) {
    $daftar_pengurus = pg_fetch_all($result, PGSQL_ASSOC);
}
$baris_pertama = array_slice($daftar_pengurus, 0, 3);
$baris_kedua = array_slice($daftar_pengurus, 3);

?>

<div class="container py-5">

    <h1 class="text-center fw-bold text-kampus-blue mb-4">Profil Laboratorium NCS</h1>

    <p class="text-center text-muted mb-5">
        Laboratorium Network & Cyber Security (NCS) merupakan fasilitas pembelajaran dan riset
        yang berfokus pada jaringan komputer, keamanan siber, dan teknologi informasi modern.
    </p>

    <div class="row align-items-stretch mb-5 g-0 shadow-sm rounded overflow-hidden">
    
    <div class="col-lg-5" style="min-height: 300px;">
        <img src="<?php echo $foto_lab_src; ?>"
             class="w-100 h-100" 
             alt="Foto Laboratorium NCS"
             style="object-fit: cover;">
    </div>

    <div class="col-lg-7"> 
        <div class="card border-0 h-100 bg-white">
            <div class="card-body p-4 p-lg-5 d-flex flex-column justify-content-center">
                <h3 class="fw-bold text-kampus-blue mb-3">Tentang Laboratorium</h3>
                <p class="text-muted lead"> 
                    Laboratorium NCS digunakan sebagai sarana praktik mahasiswa Program Studi Teknologi Informasi
                    dalam mempelajari jaringan komputer, keamanan jaringan, penetration testing, digital forensics, dan topik terkait lainnya.
                </p>
                <p class="text-muted mb-0">
                    Selain praktikum, laboratorium ini juga menjadi pusat kegiatan riset, kompetisi CTF,
                    workshop keamanan siber, serta pengembangan inovasi di bidang jaringan dan keamanan informasi.
                </p>
            </div>
        </div>
    </div>
</div>

    <div class="mb-5">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-kampus-blue">Visi dan Misi</h3>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card shadow-sm h-100 border-0 border-start border-4 border-primary">
                    <div class="card-body">
                        <h5 class="fw-bold text-primary">Visi</h5>
                        <p class="text-muted mb-0">
                            <?php echo nl2br(htmlspecialchars($visi)); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm h-100 border-0 border-start border-4 border-warning">
                    <div class="card-body">
                        <h5 class="fw-bold text-warning">Misi</h5>
                        <div class="text-muted mb-0 ps-3">
                            <?php echo nl2br(htmlspecialchars($misi)); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-5">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-kampus-blue">Fokus Kegiatan Laboratorium</h3>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 hover-card">
                    <div class="card-body text-center">
                        <div class="mb-3 text-primary"><i class="bi bi-diagram-3-fill fs-1"></i></div>
                        <h5 class="fw-bold text-kampus-blue">Praktikum Jaringan</h5>
                        <p class="text-muted small">Konfigurasi router, switch, VLAN, routing, subnetting, dan manajemen jaringan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 hover-card">
                    <div class="card-body text-center">
                        <div class="mb-3 text-danger"><i class="bi bi-shield-lock-fill fs-1"></i></div>
                        <h5 class="fw-bold text-kampus-blue">Cyber Security</h5>
                        <p class="text-muted small">Penetration testing, analisis serangan, serta hardening server.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 hover-card">
                    <div class="card-body text-center">
                        <div class="mb-3 text-success"><i class="bi bi-trophy-fill fs-1"></i></div>
                        <h5 class="fw-bold text-kampus-blue">Riset & Kompetisi</h5>
                        <p class="text-muted small">Riset, CTF, workshop, dan pengembangan inovasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-5" id="struktur-lab">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-kampus-blue">Struktur Laboratorium</h3>
            <p class="text-muted">Tim dosen dan asisten Laboratorium NCS</p>
        </div>
        
        <?php if (!empty($daftar_pengurus)): ?>
            <div class="row g-4 justify-content-center mb-4">
                <?php foreach ($baris_pertama as $pengurus): ?>
                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                        <div class="card h-100 border-0 shadow-sm hover-card" onclick="window.location='detail_dosen.php?id=<?= $pengurus['id']; ?>'">
                            <div class="card-body p-4 d-flex flex-column align-items-center">
                                <?php $foto = !empty($pengurus['foto_path']) ? $pengurus['foto_path'] : 'https://placehold.co/130x130?text=No+Foto'; ?>
                                <img src="<?= $foto; ?>" alt="<?= htmlspecialchars($pengurus['nama']); ?>" class="rounded-circle shadow-sm mb-3 object-fit-cover" style="width:120px;height:120px;border:4px solid #f8f9fa;">
                                <h6 class="fw-bold text-kampus-blue mb-1 text-center"><?= htmlspecialchars($pengurus['nama']); ?></h6>
                                <div class="mt-auto pt-2"><span class="badge bg-light text-secondary border px-3 py-2 rounded-pill"><?= htmlspecialchars($pengurus['jabatan']); ?></span></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (!empty($baris_kedua)): ?>
            <div class="row g-4 justify-content-center">
                <?php foreach ($baris_kedua as $pengurus): ?>
                    <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                        <div class="card h-100 border-0 shadow-sm hover-card" onclick="window.location='detail_dosen.php?id=<?= $pengurus['id']; ?>'">
                            <div class="card-body p-4 d-flex flex-column align-items-center">
                                <?php $foto = !empty($pengurus['foto_path']) ? $pengurus['foto_path'] : 'https://placehold.co/130x130?text=No+Foto'; ?>
                                <img src="<?= $foto; ?>" alt="<?= htmlspecialchars($pengurus['nama']); ?>" class="rounded-circle shadow-sm mb-3 object-fit-cover" style="width:120px;height:120px;border:4px solid #f8f9fa;">
                                <h6 class="fw-bold text-kampus-blue mb-1 text-center"><?= htmlspecialchars($pengurus['nama']); ?></h6>
                                <div class="mt-auto pt-2"><span class="badge bg-light text-secondary border px-3 py-2 rounded-pill"><?= htmlspecialchars($pengurus['jabatan']); ?></span></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

        <?php else: ?>
            <div class="col-12 text-center py-5"><div class="bg-light p-4 rounded border border-dashed"><i class="bi bi-people fs-1 text-muted mb-3 d-block"></i><h5 class="text-muted">Belum ada data pengurus.</h5></div></div>
        <?php endif; ?>
    </div>
</div>

<style>
    .hover-card { transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer; }
    .hover-card:hover { transform: translateY(-5px); box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15)!important; }
    .text-kampus-blue { color: #003366; }
    .bg-kampus-blue { background-color: #003366; }
    .object-fit-cover { object-fit: cover; }
</style>

<?php include('footer.php'); ?>