<?php
  // index.php - Beranda (B + D style)
  $page_title = "Beranda";
  $active_page = "index";
  include('header.php'); // header.php harus ada di root (kamu sudah punya)
?>

<!-- ===== HERO ===== -->
<section class="hero">
    <div class="hero-bg" style="background-image: url('img/hero_background.jpg');"></div>

    <div class="hero-inner text-center">
        <h1>
            Laboratorium <br>
            <span style="color: #FFD966;">Network & Cyber Security</span>
        </h1>

        <p class="lead">
            Portal resmi Lab NCS — Pendidikan, penelitian, dan layanan di bidang jaringan & keamanan siber.
        </p>

        <div class="d-flex justify-content-center gap-2 mt-3">
            <a href="profil.php" class="btn btn-cta">Tentang Kami</a>
            <a href="layanan.php" class="btn btn-cta-outline">Layanan</a>
        </div>
    </div>
</section>

<!-- Garis kuning di bawah hero -->
<div class="divider-gold"></div>

<!-- ===== SECTION: Identitas Singkat & Bidang Fokus ===== -->
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

<!-- ===== SECTION: Layanan Preview ===== -->
<section class="section py-3">
  <div class="container">
    <div class="section-title mb-4 d-flex align-items-center">
      <div class="line"></div>
      <h3 class="ms-2">Layanan Utama</h3>
    </div>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="card card-hover">
          <img src="img/service1.jpg" alt="Peminjaman" class="img-cover">
          <div class="card-body">
            <h5 class="card-title">Peminjaman Alat</h5>
            <p class="text-muted small">Router, switch, access point, dan perangkat praktikum dapat dipinjam sesuai prosedur.</p>
            <a href="layanan.php" class="text-decoration-none fw-bold text-kampus-blue">Lihat layanan &rarr;</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card card-hover">
          <img src="img/service2.jpg" alt="Ruang Lab" class="img-cover">
          <div class="card-body">
            <h5 class="card-title">Penggunaan Ruang Lab</h5>
            <p class="text-muted small">Reservasi ruang untuk praktikum, riset, dan latihan tim kompetisi.</p>
            <a href="layanan.php" class="text-decoration-none fw-bold text-kampus-blue">Lihat layanan &rarr;</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card card-hover">
          <img src="img/service3.jpg" alt="Konsultasi" class="img-cover">
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

<!-- ===== SECTION: Dokumentasi Terbaru (Galeri preview) ===== -->
<section class="section">
  <div class="container">
    <div class="section-title mb-4 d-flex align-items-center">
      <div class="line"></div>
      <h3 class="ms-2">Dokumentasi Terbaru</h3>
    </div>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="card">
          <img src="img/galeri1.jpg" alt="Kegiatan 1" class="img-cover">
          <div class="card-body">
            <h6 class="card-title">Workshop Cyber Security</h6>
            <p class="text-muted small mb-0">15 Oktober 2025</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <img src="img/galeri2.jpg" alt="Kegiatan 2" class="img-cover">
          <div class="card-body">
            <h6 class="card-title">Kunjungan Industri</h6>
            <p class="text-muted small mb-0">01 November 2025</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <img src="img/galeri3.jpg" alt="Kegiatan 3" class="img-cover">
          <div class="card-body">
            <h6 class="card-title">Lomba CTF Internal</h6>
            <p class="text-muted small mb-0">10 November 2025</p>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-4">
      <a href="galeri.php" class="btn btn-outline-secondary">Lihat Semua Galeri</a>
    </div>
  </div>
</section>

<!-- ===== SECTION: Arsip Terbaru ===== -->
<section class="section">
  <div class="container">
    <div class="section-title mb-4 d-flex align-items-center">
      <div class="line"></div>
      <h3 class="ms-2">Arsip Terbaru</h3>
    </div>

    <div class="row g-3">
      <div class="col-md-4">
        <div class="archive-item">
          <div class="pdf-icon"><i class="bi bi-file-earmark-pdf" style="font-size:20px;"></i></div>
          <div>
            <div class="fw-bold">Panduan Praktikum Jaringan</div>
            <div class="text-muted small">Penelitian — 18 Nov 2025</div>
          </div>
          <div class="ms-auto">
            <a href="assets/panduan_jaringan.pdf" class="btn btn-sm btn-primary">Lihat</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="archive-item">
          <div class="pdf-icon"><i class="bi bi-file-earmark-pdf" style="font-size:20px;"></i></div>
          <div>
            <div class="fw-bold">Laporan Penelitian IoT</div>
            <div class="text-muted small">Penelitian — 20 Okt 2025</div>
          </div>
          <div class="ms-auto">
            <a href="assets/laporan_iot.pdf" class="btn btn-sm btn-primary">Lihat</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="archive-item">
          <div class="pdf-icon"><i class="bi bi-file-earmark-pdf" style="font-size:20px;"></i></div>
          <div>
            <div class="fw-bold">Modul Praktikum Keamanan</div>
            <div class="text-muted small">Modul — 01 Sep 2025</div>
          </div>
          <div class="ms-auto">
            <a href="assets/modul_keamanan.pdf" class="btn btn-sm btn-primary">Lihat</a>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-4">
      <a href="arsip.php" class="btn btn-outline-secondary">Lihat Semua Arsip</a>
    </div>
  </div>
</section>

<!-- ===== SECTION: Struktur Organisasi (preview) ===== -->
<section class="section">
  <div class="container">
    <div class="section-title mb-4 d-flex align-items-center">
      <div class="line"></div>
      <h3 class="ms-2">Struktur Laboratorium</h3>
    </div>

    <div class="row g-4 align-items-center">
      <div class="col-md-3 text-center">
        <div class="card p-3">
          <img src="img/head_lab.jpg" alt="Kepala Lab" class="team-photo mb-3">
          <div><strong>Kepala Laboratorium</strong></div>
          <div class="text-muted small">Dr. Nama Dosen</div>
        </div>
      </div>

      <div class="col-md-3 text-center">
        <div class="card p-3">
          <img src="img/coordinator.jpg" alt="Koordinator" class="team-photo mb-3">
          <div><strong>Koordinator Praktikum</strong></div>
          <div class="text-muted small">Nama Koordinator</div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card p-3">
          <div class="card-body">
            <h6 class="fw-bold">Preview Organisasi</h6>
            <p class="text-muted small mb-0">Ringkasan: Laboratorium dikelola oleh dosen & tim asisten. Untuk detail struktur lengkap, klik tombol di bawah.</p>
            <div class="mt-3">
              <a href="profil.php" class="btn btn-sm btn-outline-primary">Lihat Struktur Lengkap</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ===== SECTION: Kontak Singkat ===== -->
<section class="section">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-md-8">
        <div class="contact-card">
          <h5 class="fw-bold">Kontak Lab NCS</h5>
          <p class="mb-1 text-muted">Hubungi kami untuk reservasi lab, peminjaman alat, atau konsultasi.</p>
          <p class="mb-0"><strong>WA:</strong> +62 812-3456-7890 &nbsp; | &nbsp; <strong>Email:</strong> ncs@polinema.ac.id</p>
        </div>
      </div>

      <div class="col-md-4 text-md-end">
        <a href="kontak.php" class="btn btn-cta">Hubungi Kami</a>
      </div>
    </div>
  </div>
</section>

<?php
  // include footer
  include('footer.php');
?>
