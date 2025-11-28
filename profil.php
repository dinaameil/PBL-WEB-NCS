<?php
    $page_title = "Profil";
    $active_page = "profil"; 
    include('header.php');
    
    // Panggil koneksi database
    include('config/db_config.php');

    // --- AMBIL DATA DARI DATABASE ---
    // Mengambil data Visi & Misi (Asumsi tersimpan di tabel konten_teks)
    // Jika belum ada tabel konten_teks, kamu bisa hapus bagian PHP ini dan pakai teks manual
    /* $sql_konten = "SELECT kunci, isi FROM konten_teks";
    $result_konten = pg_query($conn, $sql_konten);
    // ... logika fetch ...
    */

    // Mengambil data PENGURUS dari Database (Supaya nyambung dengan Admin)
    $sql_pengurus = "SELECT * FROM pengurus ORDER BY id ASC";
    $result_pengurus = pg_query($conn, $sql_pengurus);
    $daftar_pengurus = pg_fetch_all($result_pengurus, PGSQL_ASSOC);
?>

    <main class="container py-5">
        
        <h1 class="text-center fw-bold text-kampus-blue mb-5">Profil Laboratorium</h1>

        <div class="card shadow-sm mb-5 border-0">
            <div class="card-body p-4 p-md-5">
                <div class="row g-5">
                    <div class="col-md-6 border-end-md">
                        <h3 class="fw-bold text-kampus-blue border-bottom pb-2 mb-3">VISI</h3>
                        <p class="lead text-secondary">
                            Menjadi laboratorium unggulan dalam bidang jaringan dan keamanan siber yang inovatif, adaptif, dan berdaya saing global.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h3 class="fw-bold text-kampus-blue border-bottom pb-2 mb-3">MISI</h3>
                        <ul class="list-group list-group-flush text-secondary">
                            <li class="list-group-item bg-transparent px-0"><i class="bi bi-check-circle me-2"></i>Menyelenggarakan praktikum berkualitas.</li>
                            <li class="list-group-item bg-transparent px-0"><i class="bi bi-check-circle me-2"></i>Mengembangkan penelitian Cyber Security & IoT.</li>
                            <li class="list-group-item bg-transparent px-0"><i class="bi bi-check-circle me-2"></i>Menyediakan layanan uji keamanan.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-5">
                <h3 class="fw-bold text-kampus-blue text-center mb-5">Pengurus Lab</h3>
                
                <div class="row g-4 justify-content-center">
                    
                    <?php if ($daftar_pengurus): ?>
                        <?php foreach ($daftar_pengurus as $pengurus): ?>
                        <div class="col-6 col-md-4 col-lg-2 text-center">
                            <?php 
                                $foto = !empty($pengurus['foto_path']) ? $pengurus['foto_path'] : 'https://placehold.co/150x150?text=No+Image'; 
                            ?>
                            <img src="<?php echo $foto; ?>" alt="<?php echo htmlspecialchars($pengurus['nama']); ?>" 
                                 class="rounded-circle shadow mb-3 img-fluid object-fit-cover" 
                                 style="width: 150px; height: 150px;">
                            
                            <h6 class="fw-bold text-kampus-blue mb-1">
                                <?php echo htmlspecialchars($pengurus['nama']); ?>
                            </h6>
                            <span class="badge bg-light text-dark border">
                                <?php echo htmlspecialchars($pengurus['jabatan']); ?>
                            </span>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center text-muted">Belum ada data pengurus.</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </main>

<?php include('footer.php'); ?>