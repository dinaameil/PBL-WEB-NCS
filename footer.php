<script>
document.addEventListener("click", (e) => {
    const el = e.target.closest(".ripple");
    if (!el) return;
    const rect = el.getBoundingClientRect();
    el.style.setProperty("--x", e.clientX - rect.left + "px");
    el.style.setProperty("--y", e.clientY - rect.top + "px");
});
</script>

<footer class="bg-kampus-blue text-white mt-5 pt-5 pb-3">
    <div class="container">
        <div class="row">

            <!-- Kolom 1 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="fw-bold text-uppercase mb-3">Lab NCS</h5>
                <p class="small text-white-50">
                    Laboratorium Network & Cyber Security <br>
                    Gedung Teknik Sipil Lantai 8 <br>
                    Politeknik Negeri Malang
                </p>
                <p class="small text-white-50">
                    <i class="bi bi-whatsapp me-2"></i> +62 812-3456-7890
                </p>
            </div>

            <!-- Kolom 2 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="fw-bold text-uppercase mb-3">Navigasi</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="profil.php" class="text-white-50 text-decoration-none">Profil</a></li>
                    <li class="mb-2"><a href="galeri.php" class="text-white-50 text-decoration-none">Galeri</a></li>
                    <li class="mb-2"><a href="arsip.php" class="text-white-50 text-decoration-none">Arsip</a></li>
                    <li class="mb-2"><a href="layanan.php" class="text-white-50 text-decoration-none">Layanan</a></li>
                </ul>
            </div>

            <!-- Kolom 3 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="fw-bold text-uppercase mb-3">Link Terkait</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="https://www.polinema.ac.id/" target="_blank" class="text-white-50 text-decoration-none">
                            <i class="bi bi-building me-2"></i>Website Polinema
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="http://jti.polinema.ac.id/" target="_blank" class="text-white-50 text-decoration-none">
                            <i class="bi bi-laptop me-2"></i>Website JTI
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="https://sinta.kemdiktisaintek.go.id/" target="_blank" class="text-white-50 text-decoration-none">
                            <i class="bi bi-journal-text me-2"></i>SINTA
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kolom 4 -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="fw-bold text-uppercase mb-3">Kredit Tim</h5>
                <p class="small text-white-50 mb-2">Website ini dibuat dan dikelola oleh:</p>
                <p class="fw-bold small text-white">Kelompok 3 PBL NCS – 2025</p>
            </div>

        </div>

        <!-- Copyright -->
        <div class="border-top border-secondary mt-3 pt-3 text-center">
            <p class="small text-white-50 mb-0">
                © 2025 Laboratorium Network & Cyber Security. All rights reserved.
            </p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
