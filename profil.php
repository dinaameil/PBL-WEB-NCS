<?php
    $page_title = "Profil";
    $active_page = "profil";
    include('header.php');
?>

<div class="container py-5">

    <!-- Judul Halaman -->
    <h1 class="text-center fw-bold text-kampus-blue mb-4">Profil Laboratorium NCS</h1>

    <p class="text-center text-muted mb-5">
        Laboratorium Network & Cyber Security (NCS) merupakan fasilitas pembelajaran dan riset
        yang berfokus pada jaringan komputer, keamanan siber, dan teknologi informasi modern.
    </p>

    <!-- SECTION 1 — SAMBUTAN -->
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="https://placehold.co/600x400/eeeeee/999999?text=Laboratorium+NCS"
                 class="img-fluid rounded shadow-sm" alt="Foto Laboratorium NCS">
        </div>
        <div class="col-lg-6">
            <h3 class="fw-bold text-kampus-blue">Tentang Laboratorium</h3>
            <p class="text-muted">
                Laboratorium NCS digunakan sebagai sarana praktik mahasiswa Program Studi Teknologi Informasi
                dalam mempelajari jaringan komputer, keamanan jaringan, penetration testing, digital forensics, dan topik terkait lainnya.
            </p>
            <p class="text-muted">
                Selain praktikum, laboratorium ini juga menjadi pusat kegiatan riset, kompetisi CTF,
                workshop keamanan siber, serta pengembangan inovasi di bidang jaringan dan keamanan informasi.
            </p>
        </div>
    </div>

    <!-- SECTION 2 — VISI MISI -->
    <div class="mb-5">
        <h3 class="fw-bold text-kampus-blue mb-3">Visi dan Misi</h3>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="fw-bold">Visi</h5>
                <p class="text-muted mb-0">
                    Menjadi laboratorium unggul dalam pendidikan dan riset di bidang jaringan dan keamanan siber.
                </p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="fw-bold">Misi</h5>
                <ul class="text-muted mb-0">
                    <li>Menyelenggarakan praktikum berkualitas berbasis teknologi terbaru.</li>
                    <li>Mendukung riset dan inovasi dalam bidang jaringan dan cyber security.</li>
                    <li>Menjadi pusat kegiatan kompetisi dan workshop keamanan informasi.</li>
                    <li>Memfasilitasi mahasiswa dalam pengembangan skill profesional.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- SECTION 3 — FOKUS KEGIATAN -->
    <div class="mb-5">
        <h3 class="fw-bold text-kampus-blue mb-4">Fokus Kegiatan Laboratorium</h3>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold text-kampus-blue">Praktikum Jaringan</h5>
                        <p class="text-muted">
                            Kegiatan praktikum seperti konfigurasi router, switch, VLAN, routing, subnetting, dan manajemen jaringan.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold text-kampus-blue">Cyber Security</h5>
                        <p class="text-muted">
                            Pembelajaran dan latihan penetration testing, keamanan sistem, analisis serangan, serta hardening server.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold text-kampus-blue">Riset & Kompetisi</h5>
                        <p class="text-muted">
                            Pusat riset, kegiatan kompetisi CTF, workshop, seminar, dan pengembangan inovasi bidang jaringan serta siber.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- SECTION 4 — FASILITAS -->
    <div class="mb-5">
        <h3 class="fw-bold text-kampus-blue mb-4">Fasilitas Laboratorium</h3>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold text-kampus-blue">Perangkat Jaringan</h5>
                        <p class="text-muted">
                            Router, switch, access point, server mini, dan perangkat jaringan lainnya untuk kebutuhan praktikum.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold text-kampus-blue">Ruang Belajar & Riset</h5>
                        <p class="text-muted">
                            Ruang laboratorium yang nyaman untuk aktivitas belajar mandiri, riset, dan kegiatan kelompok.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold text-kampus-blue">Komputer Praktikum</h5>
                        <p class="text-muted">
                            Komputer dengan spesifikasi yang mendukung simulasi jaringan, virtualisasi, dan tool keamanan siber.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- SECTION 5 — STRUKTUR LAB -->
    <div class="mb-5">
        <h3 class="fw-bold text-kampus-blue mb-3">Struktur Laboratorium</h3>

        <div class="card shadow-sm p-4">
            <ul class="text-muted">
                <li><strong>Kepala Laboratorium:</strong> —</li>
                <li><strong>Koordinator Praktikum:</strong> —</li>
                <li><strong>Asisten Laboratorium:</strong> Mahasiswa terpilih dari Prodi Teknologi Informasi</li>
            </ul>
        </div>
    </div>

</div>

<?php include('footer.php'); ?>
