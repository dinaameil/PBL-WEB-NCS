<?php
    $page_title = "Arsip";
    $active_page = "arsip";
    include('header.php');
    include('config/db_config.php');

    // AMBIL DATA DARI DATABASE
    $sql = "SELECT * FROM arsip ORDER BY tanggal DESC";
    $result = pg_query($conn, $sql);
    
    // Siapkan array data
    $data_arsip = [];
    if ($result) {
        $data_arsip = pg_fetch_all($result, PGSQL_ASSOC);
    }
?>

<main class="container py-5">

    <h1 class="text-center fw-bold text-kampus-blue mb-3">Arsip Dokumen</h1>
    <p class="text-center text-secondary mb-5">
        Kumpulan dokumen, modul, dan hasil penelitian laboratorium.
    </p>

    <div class="card shadow-sm border-0 p-4">

        <?php if (!empty($data_arsip)): ?>
            
            <?php foreach ($data_arsip as $doc): ?>
            <div class="d-flex flex-column flex-md-row align-items-center p-3 border rounded mb-3 hover-effect">
                
                <i class="bi bi-filetype-pdf text-danger display-5 me-md-4 mb-3 mb-md-0"></i>

                <div class="flex-grow-1 text-center text-md-start">
                    <h5 class="fw-bold text-kampus-blue mb-1">
                        <?php echo htmlspecialchars($doc['judul']); ?>
                    </h5>
                    <small class="text-muted">
                        <i class="bi bi-tag-fill me-1"></i> <?php echo htmlspecialchars($doc['kategori']); ?> 
                        <span class="mx-2">|</span> 
                        <i class="bi bi-calendar-event me-1"></i> <?php echo date('d M Y', strtotime($doc['tanggal'])); ?>
                    </small>
                </div>

                <a href="<?php echo htmlspecialchars($doc['file_path']); ?>" 
                   target="_blank" 
                   class="btn btn-primary ms-md-4 mt-3 mt-md-0 px-4">
                   <i class="bi bi-eye me-2"></i> Lihat PDF
                </a>
            </div>
            <?php endforeach; ?>

        <?php else: ?>
            
            <div class="text-center py-5">
                <div class="mb-3">
                    <i class="bi bi-folder2-open display-1 text-muted"></i>
                </div>
                <h5 class="text-muted">Belum ada dokumen arsip.</h5>
                <p class="small text-muted">Silakan login admin untuk mengupload dokumen.</p>
            </div>

        <?php endif; ?>

    </div>

</main>

<style>
    /* Sedikit efek hover biar makin cantik */
    .hover-effect { transition: background-color 0.2s, transform 0.2s; }
    .hover-effect:hover { background-color: #f8f9fa; transform: translateY(-3px); box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
</style>

<?php include('footer.php'); ?>