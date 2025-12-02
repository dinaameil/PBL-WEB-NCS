<?php
    $page_title = "Galeri";
    $active_page = "galeri";
    include('header.php');
    include('config/db_config.php');

    // Ambil data
    $sql = "SELECT * FROM galeri ORDER BY tanggal DESC";
    $result = pg_query($conn, $sql);
    $data_galeri = pg_fetch_all($result, PGSQL_ASSOC);
    if (!$data_galeri) $data_galeri = [];
?>

    <main class="container py-5">
        <h1 class="fw-bold text-kampus-blue mb-4">Galeri Kegiatan</h1>

        <ul class="nav nav-tabs mb-4" id="galeriTab" role="tablist">
            <li class="nav-item">
                <button class="nav-link active fw-bold" id="kegiatan-tab" data-bs-toggle="tab" data-bs-target="#kegiatan" type="button">
                    Kegiatan (Sudah Lewat)
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link fw-bold text-secondary" id="agenda-tab" data-bs-toggle="tab" data-bs-target="#agenda" type="button">
                    Agenda (Akan Datang)
                </button>
            </li>
        </ul>

        <div class="tab-content" id="galeriTabContent">
            
            <div class="tab-pane fade show active" id="kegiatan" role="tabpanel">
                <div class="row g-4">
                    <?php 
                    $ada_kegiatan = false;
                    foreach ($data_galeri as $item) {
                        if ($item['kategori'] == 'Kegiatan') {
                            $ada_kegiatan = true;
                    ?>
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm border-0 hover-card">
                                <img src="<?php echo $item['foto_path']; ?>" class="card-img-top object-fit-cover" alt="Foto" style="height: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold text-kampus-blue"><?php echo htmlspecialchars($item['judul']); ?></h5>
                                    <p class="card-text text-muted small"><i class="bi bi-calendar-event me-2"></i><?php echo date('d F Y', strtotime($item['tanggal'])); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php 
                        } 
                    } 
                    if (!$ada_kegiatan) echo '<div class="alert alert-light border text-center">Belum ada foto kegiatan.</div>';
                    ?>
                </div>
            </div>

            <div class="tab-pane fade" id="agenda" role="tabpanel">
                <div class="row g-4">
                    <?php 
                    $ada_agenda = false;
                    foreach ($data_galeri as $item) {
                        if ($item['kategori'] == 'Agenda') {
                            $ada_agenda = true;
                    ?>
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm border-0 hover-card">
                                <div class="position-relative">
                                    <img src="<?php echo $item['foto_path']; ?>" class="card-img-top object-fit-cover" alt="Foto" style="height: 200px;">
                                    <div class="position-absolute top-0 end-0 m-2 badge bg-warning text-dark shadow">Akan Datang</div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold text-kampus-blue"><?php echo htmlspecialchars($item['judul']); ?></h5>
                                    <p class="card-text text-muted small"><i class="bi bi-calendar-event me-2"></i><?php echo date('d F Y', strtotime($item['tanggal'])); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php 
                        } 
                    } 
                    if (!$ada_agenda) echo '<div class="alert alert-light border text-center">Belum ada agenda mendatang.</div>';
                    ?>
                </div>
            </div>

        </div>
    </main>
    
    <style>
        .hover-card { transition: transform 0.2s; }
        .hover-card:hover { transform: translateY(-5px); }
    </style>

<?php include('footer.php'); ?>