<?php
  // 1. Setup Halaman
  $page_title = "Beranda";
  $active_page = "index";
  include('header.php'); 
  
  // 2. Hubungkan ke Database
  include('config/db_config.php');

  // 3. Ambil 3 Data Galeri Terbaru
  $sql_galeri = "SELECT * FROM galeri ORDER BY tanggal DESC LIMIT 3";
  $res_galeri = pg_query($conn, $sql_galeri);
  // Cek jika ada data, simpan di array. Jika tidak, array kosong.
  $list_galeri = ($res_galeri) ? pg_fetch_all($res_galeri, PGSQL_ASSOC) : [];

  // 4. Ambil 3 Arsip Terbaru
  $sql_arsip = "SELECT * FROM arsip ORDER BY tanggal DESC LIMIT 3";
  $res_arsip = pg_query($conn, $sql_arsip);
  $list_arsip = ($res_arsip) ? pg_fetch_all($res_arsip, PGSQL_ASSOC) : [];
?>

<!-- ===== HERO ===== -->

<section class="hero">
    <div class="hero-bg"></div>
    
    <div class="hero-overlay"></div>

    <div class="hero-inner text-center">
        <h1 class="hero-title">
            <span class="hero-title-light">Laboratorium</span><br>
            <span class="hero-title-bold">Network & Cyber Security</span>
        </h1>

        <p class="lead">
            LAB NCS — Pendidikan, Penelitian, dan Layanan di Bidang Jaringan & Keamanan Siber
        </p>
    </div>
</section>
<div class="divider-gold"></div>

<section class="section container">
  <div class="row align-items-center">
    <!-- IDENTITAS -->
    <div class="col-lg-6 mb-4">
      <div class="card p-3">
        <div class="card-body">
          <h4 class="card-title">Tentang Lab NCS</h4>
          <p class="mb-2 text-muted">
            Laboratorium Network & Cyber Security (NCS) adalah fasilitas pembelajaran dan riset pada Program Studi Teknologi Informasi.
            Fokus pada jaringan, keamanan siber, digital forensics, dan pengembangan solusi infrastruktur.
          </p>
          <a href="profil.php" class="text-decoration-none fw-bold text-kampus-blue">Selengkapnya &rarr;</a>
        </div>
      </div>
    </div>



    <!-- BIDANG FOKUS (4 card) -->
    <div class="col-lg-6">
      <div class="section-title mb-3 d-flex align-items-center">
        <div class="line"></div>
        <h3 class="ms-2">Bidang Fokus</h3>
      </div>

      <div class="row row-gap">
        <div class="col-md-6">
          <div class="card card-hover p-3">
            <div class="card-body d-flex gap-3 align-items-start">
              <div style="font-size:28px; color:var(--kampus-blue)"><i class="bi bi-hdd-network"></i></div>
              <div>
                <h5 class="card-title mb-1">Network Engineering</h5>
                <p class="text-muted small mb-0">Desain, konfigurasi, dan manajemen jaringan kampus & lab.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card card-hover p-3">
            <div class="card-body d-flex gap-3 align-items-start">
              <div style="font-size:28px; color:var(--kampus-blue)"><i class="bi bi-shield-lock"></i></div>
              <div>
                <h5 class="card-title mb-1">Cyber Security</h5>
                <p class="text-muted small mb-0">Penelitian dan praktik keamanan sistem & aplikasi.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 mt-3">
          <div class="card card-hover p-3">
            <div class="card-body d-flex gap-3 align-items-start">
              <div style="font-size:28px; color:var(--kampus-blue)"><i class="bi bi-file-earmark-text"></i></div>
              <div>
                <h5 class="card-title mb-1">Digital Forensics</h5>
                <p class="text-muted small mb-0">Investigasi digital dan pemulihan bukti elektronik.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 mt-3">
          <div class="card card-hover p-3">
            <div class="card-body d-flex gap-3 align-items-start">
              <div style="font-size:28px; color:var(--kampus-blue)"><i class="bi bi-cloud-fill"></i></div>
              <div>
                <h5 class="card-title mb-1">Cloud & Virtualization</h5>
                <p class="text-muted small mb-0">Virtualisasi layanan & infrastruktur untuk penelitian.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section py-3">
  <div class="container">
    <div class="section-title mb-4 d-flex align-items-center">
      <div class="line"></div>
      <h3 class="ms-2">Layanan Utama</h3>
    </div>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="card card-hover h-100">
          <img src="img/service1.jpg" onerror="this.src='https://placehold.co/400x250?text=Layanan+1'" alt="Peminjaman" class="img-cover" style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Peminjaman Alat</h5>
            <p class="text-muted small">Router, switch, access point, dan perangkat praktikum dapat dipinjam sesuai prosedur.</p>
            <a href="layanan.php" class="text-decoration-none fw-bold text-kampus-blue">Lihat layanan &rarr;</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card card-hover h-100">
          <img src="img/service2.jpg" onerror="this.src='https://placehold.co/400x250?text=Layanan+2'" alt="Ruang Lab" class="img-cover" style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Penggunaan Ruang Lab</h5>
            <p class="text-muted small">Reservasi ruang untuk praktikum, riset, dan latihan tim kompetisi.</p>
            <a href="layanan.php" class="text-decoration-none fw-bold text-kampus-blue">Lihat layanan &rarr;</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card card-hover h-100">
          <img src="img/service3.jpg" onerror="this.src='https://placehold.co/400x250?text=Layanan+3'" alt="Konsultasi" class="img-cover" style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Konsultasi & Pendampingan</h5>
            <p class="text-muted small">Pendampingan tugas, riset, dan audit keamanan oleh asisten lab.</p>
            <a href="layanan.php" class="text-decoration-none fw-bold text-kampus-blue">Lihat layanan &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-title mb-4 d-flex align-items-center">
      <div class="line"></div>
      <h3 class="ms-2">Dokumentasi Terbaru</h3>
    </div>

    <div class="row g-4">
      <?php if (!empty($list_galeri)): ?>
          <?php foreach ($list_galeri as $item): ?>
          <div class="col-md-4">
            <div class="card card-hover h-100">
              <img src="<?php echo $item['foto_path']; ?>" alt="<?php echo htmlspecialchars($item['judul']); ?>" class="img-cover" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h6 class="card-title fw-bold"><?php echo htmlspecialchars($item['judul']); ?></h6>
                <p class="text-muted small mb-0">
                    <i class="bi bi-calendar3 me-1"></i> <?php echo date('d M Y', strtotime($item['tanggal'])); ?>
                </p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
      <?php else: ?>
          <div class="col-12 text-center py-5">
              <p class="text-muted">Belum ada dokumentasi terbaru.</p>
          </div>
      <?php endif; ?>
    </div>

    <div class="text-center mt-4">
      <a href="galeri.php" class="btn btn-outline-secondary rounded-pill px-4">Lihat Semua Galeri</a>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-title mb-4 d-flex align-items-center">
      <div class="line"></div>
      <h3 class="ms-2">Arsip Terbaru</h3>
    </div>

    <div class="row g-3">
      <?php if (!empty($list_arsip)): ?>
          <?php foreach ($list_arsip as $doc): ?>
          <div class="col-md-4">
            <div class="archive-item p-3 border rounded d-flex align-items-center bg-white h-100 card-hover">
              <div class="pdf-icon me-3"><i class="bi bi-file-earmark-pdf text-danger" style="font-size:24px;"></i></div>
              <div class="flex-grow-1">
                <div class="fw-bold text-dark text-truncate" style="max-width: 180px;">
                    <?php echo htmlspecialchars($doc['judul']); ?>
                </div>
                <div class="text-muted small">
                    <?php echo $doc['kategori']; ?> — <?php echo date('d/m/Y', strtotime($doc['tanggal'])); ?>
                </div>
              </div>
              <div class="ms-auto">
                <a href="<?php echo $doc['file_path']; ?>" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill">Lihat</a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
      <?php else: ?>
          <div class="col-12 text-center py-4">
              <p class="text-muted">Belum ada arsip terbaru.</p>
          </div>
      <?php endif; ?>
    </div>

    <div class="text-center mt-4">
      <a href="arsip.php" class="btn btn-outline-secondary rounded-pill px-4">Lihat Semua Arsip</a>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-title mb-4 d-flex align-items-center">
      <div class="line"></div>
      <h3 class="ms-2">Struktur Laboratorium</h3>
    </div>

    <div class="row g-4 align-items-center">
      <div class="col-md-3 text-center">
        <div class="card p-3 h-100 border-0 shadow-sm">
           <img src="https://placehold.co/150x150?text=Kepala+Lab" alt="Kepala Lab" class="rounded-circle mb-3 mx-auto" style="width: 100px; height: 100px; object-fit: cover;">
          <div><strong>Kepala Laboratorium</strong></div>
          <div class="text-muted small">Erfan Rohadi, Ph.D.</div>
        </div>
      </div>

      <div class="col-md-3 text-center">
        <div class="card p-3 h-100 border-0 shadow-sm">
           <img src="https://placehold.co/150x150?text=Koordinator" alt="Koordinator" class="rounded-circle mb-3 mx-auto" style="width: 100px; height: 100px; object-fit: cover;">
          <div><strong>Koordinator Praktikum</strong></div>
          <div class="text-muted small">Ade Ismail, M.TI</div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card p-4 h-100 border-0 bg-light">
          <div class="card-body">
            <h6 class="fw-bold text-kampus-blue">Preview Organisasi</h6>
            <p class="text-muted small mb-0">Laboratorium dikelola oleh dosen ahli & tim asisten yang berdedikasi. Klik tombol di bawah untuk melihat struktur lengkap.</p>
            <div class="mt-3">
              <a href="profil.php" class="btn btn-sm btn-primary">Lihat Struktur Lengkap</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== 4. CALL TO ACTION (Kontak) ===== -->
    <section class="py-5 bg-kampus-blue text-white mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h3 class="fw-bold mb-2">Tertarik Bekerja Sama?</h3>
                    <p class="mb-0 text-white-50">Kami terbuka untuk kolaborasi riset, pelatihan, dan pengabdian masyarakat.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-warning fw-bold px-4 py-3 rounded-pill shadow">
                        <i class="bi bi-whatsapp me-2"></i> Hubungi via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Style Tambahan untuk Animasi Halus -->
    <style>
        .ls-2 { letter-spacing: 2px; }
        .hover-top { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .hover-top:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
    </style>


<style>
    /* Styling Hero */
    .hero { position: relative; min-height: 80vh; display: flex; align-items: center; justify-content: center; color: white; overflow: hidden; }
    .hero-bg { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: cover; background-position: center; z-index: -2; }
    /* Overlay Gelap */
    .hero::before { content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 51, 102, 0.85); z-index: -1; }
    .hero-inner { position: relative; z-index: 1; }
    .hero-title-light { font-weight: 300; font-size: 2.5rem; }
    .hero-title-bold { font-weight: 700; font-size: 3.5rem; }

    /* Divider */
    .divider-gold { height: 5px; background-color: #FFCC00; width: 100%; }

    /* Section Title Style */
    .section-title .line { width: 5px; height: 30px; background-color: #FFCC00; border-radius: 2px; }
    
    /* Buttons */
    .btn-cta { background-color: #FFCC00; color: #003366; font-weight: bold; padding: 10px 25px; border-radius: 50px; border: none; }
    .btn-cta:hover { background-color: #e6b800; color: #003366; }
    .btn-cta-outline { background-color: transparent; color: white; border: 2px solid white; font-weight: bold; padding: 8px 23px; border-radius: 50px; }
    .btn-cta-outline:hover { background-color: white; color: #003366; }

    /* Cards */
    .card-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .card-hover:hover { transform: translateY(-5px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .text-kampus-blue { color: #003366; }
</style>

<?php
  include('footer.php');
?>