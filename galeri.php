<?php
    // Set variabel untuk halaman ini
    $page_title = "Galeri";
    $active_page = "galeri"; // Untuk menandai navigasi
    
    // Panggil header
    include('header.php');
?>

    <!-- ===== KONTEN UTAMA (GALERI 2 TAB) ===== -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <h1 class="text-4xl font-bold text-kampus-blue mb-8">Galeri Kegiatan</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            
            <!-- Tombol Tab untuk Pindah Konten -->
            <div class="flex space-x-4 border-b border-gray-200 mb-6">
                <!-- Tombol 1: Kegiatan -->
                <button 
                    class="gallery-tab-btn px-6 py-3 font-medium text-lg border-b-2 border-kampus-blue text-kampus-blue"
                    data-tab="kegiatan"
                >
                    Kegiatan (Sudah Lewat)
                </button>
                
                <!-- Tombol 2: Akan Datang -->
                <button 
                    class="gallery-tab-btn px-6 py-3 font-medium text-lg text-gray-500 hover:text-gray-700 border-b-2 border-transparent"
                    data-tab="agenda"
                >
                    Agenda (Akan Datang)
                </button>
            </div>

            <!-- Konten Tab -->
            <div class="w-full">
                
                <!-- Konten 1: Tab Kegiatan (Aktif by default) -->
                <div id="tab-kegiatan" class="gallery-tab-pane">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Dokumentasi Kegiatan</h2>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <!-- (Placeholder Foto 1) -->
                        <div class="bg-gray-100 rounded-lg overflow-hidden shadow">
                            <img src="https://placehold.co/600x400/eeeeee/999999?text=Foto+Kegiatan+1" alt="Foto Kegiatan 1" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="font-semibold text-lg">Workshop Cyber Security</h3>
                                <p class="text-sm text-gray-600">15 Oktober 2025</p>
                            </div>
                        </div>
                        
                        <!-- (Placeholder Foto 2) -->
                        <div class="bg-gray-100 rounded-lg overflow-hidden shadow">
                            <img src="https://placehold.co/600x400/eeeeee/999999?text=Foto+Kegiatan+2" alt="Foto Kegiatan 2" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="font-semibold text-lg">Kunjungan Industri</h3>
                                <p class="text-sm text-gray-600">01 November 2025</p>
                            </div>
                        </div>

                        <!-- (Placeholder Foto 3) -->
                        <div class="bg-gray-100 rounded-lg overflow-hidden shadow">
                            <img src="https://placehold.co/600x400/eeeeee/999999?text=Foto+Kegiatan+3" alt="Foto Kegiatan 3" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="font-semibold text-lg">Lomba CTF</h3>
                                <p class="text-sm text-gray-600">10 November 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Konten 2: Tab Agenda (Terkunci by default) -->
                <div id="tab-agenda" class="gallery-tab-pane hidden">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Agenda Mendatang</h2>
                    
                    <div class="space-y-6">
                        <!-- (Placeholder Agenda 1) -->
                        <div class="flex items-center bg-gray-100 p-4 rounded-lg shadow">
                            <div class="bg-kampus-blue text-white rounded-lg p-3 text-center w-20">
                                <span class="block text-3xl font-bold">25</span>
                                <span class="block text-sm">NOV</span>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-semibold text-lg text-kampus-blue">Seminar Nasional AI & Security</h3>
                                <p class="text-gray-600">Pendaftaran akan segera dibuka.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <!-- ===== AKHIR KONTEN UTAMA ===== -->

    <!-- SCRIPT KHUSUS UNTUK HALAMAN INI -->
    <script>
        const tabButtons = document.querySelectorAll('.gallery-tab-btn');
        const tabPanes = document.querySelectorAll('.gallery-tab-pane');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tabId = button.getAttribute('data-tab');
                
                tabPanes.forEach(pane => {
                    pane.classList.add('hidden');
                });
                
                const activePane = document.getElementById('tab-' + tabId);
                activePane.classList.remove('hidden');
                
                tabButtons.forEach(btn => {
                    btn.classList.remove('border-kampus-blue', 'text-kampus-blue');
                    btn.classList.add('text-gray-500', 'hover:text-gray-700', 'border-transparent');
                });
                button.classList.add('border-kampus-blue', 'text-kampus-blue');
                button.classList.remove('text-gray-500', 'hover:text-gray-700', 'border-transparent');
            });
        });
    </script>

<?php
    // Panggil footer
    include('footer.php');
?>