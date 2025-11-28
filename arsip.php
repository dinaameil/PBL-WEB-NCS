<?php
    // Set variabel untuk halaman ini
    $page_title = "Arsip";
    $active_page = "arsip"; // Untuk menandai navigasi
    
    // Panggil header
    include('header.php');
?>

    <!-- ===== KONTEN UTAMA (DAFTAR 5 DOKUMEN - LENGKAP) ===== -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <h1 class="text-4xl font-bold text-kampus-blue mb-4 text-center">Arsip Dokumen</h1>
        <p class="text-xl text-gray-600 text-center mb-12">Menampilkan 5 dokumen terbaru yang dipublikasikan.</p>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="space-y-6">
                
                <!-- Item Arsip 1 (Template) -->
                <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 p-4 border border-gray-200 rounded-lg">
                    <!-- Ikon PDF -->
                    <div class="flex-shrink-0">
                        <svg class="h-12 w-12 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 01-1 1h-2a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V4zm12 12V4L10 14h6zM9 8a1 1 0 00-1 1v2a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <!-- Info Dokumen -->
                    <div class="flex-grow text-center sm:text-left">
                        <h3 class="font-semibold text-lg text-kampus-blue">Judul Dokumen Arsip 1 (Terbaru)</h3>
                        <p class="text-sm text-gray-500">Kategori: Penelitian | Dipublikasikan: 18 Nov 2025</p>
                    </div>
                    <!-- Tombol Download/Lihat -->
                    <div class="flex-shrink-0">
                        <a href="assets/dokumen_arsip_1.pdf" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-kampus-blue hover:bg-blue-800">
                            Lihat PDF
                        </a>
                    </div>
                </div>

                <!-- Item Arsip 2 (Template) -->
                <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 p-4 border border-gray-200 rounded-lg">
                    <div class="flex-shrink-0">
                        <svg class="h-12 w-12 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 01-1 1h-2a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V4zm12 12V4L10 14h6zM9 8a1 1 0 00-1 1v2a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-grow text-center sm:text-left">
                        <h3 class="font-semibold text-lg text-kampus-blue">Judul Dokumen Arsip 2</h3>
                        <p class="text-sm text-gray-500">Kategori: Pengabdian | Dipublikasikan: 15 Nov 2025</p>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="assets/dokumen_arsip_2.pdf" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-kampus-blue hover:bg-blue-800">
                            Lihat PDF
                        </a>
                    </div>
                </div>

                <!-- Item Arsip 3 (Template) -->
                <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 p-4 border border-gray-200 rounded-lg">
                    <div class="flex-shrink-0">
                        <svg class="h-12 w-12 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 01-1 1h-2a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V4zm12 12V4L10 14h6zM9 8a1 1 0 00-1 1v2a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-grow text-center sm:text-left">
                        <h3 class="font-semibold text-lg text-kampus-blue">Judul Dokumen Arsip 3</h3>
                        <p class="text-sm text-gray-500">Kategori: Dokumen Lab | Dipublikasikan: 10 Nov 2025</p>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="assets/dokumen_arsip_3.pdf" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-kampus-blue hover:bg-blue-800">
                            Lihat PDF
                        </a>
                    </div>
                </div>

                <!-- Item Arsip 4 (Template) -->
                <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 p-4 border border-gray-200 rounded-lg">
                    <div class="flex-shrink-0">
                        <svg class="h-12 w-12 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 01-1 1h-2a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V4zm12 12V4L10 14h6zM9 8a1 1 0 00-1 1v2a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-grow text-center sm:text-left">
                        <h3 class="font-semibold text-lg text-kampus-blue">Judul Dokumen Arsip 4</h3>
                        <p class="text-sm text-gray-500">Kategori: Penelitian | Dipublikasikan: 05 Nov 2025</p>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="assets/dokumen_arsip_4.pdf" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-kampus-blue hover:bg-blue-800">
                            Lihat PDF
                        </a>
                    </div>
                </div>

                <!-- Item Arsip 5 (Template) -->
                <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 p-4 border border-gray-200 rounded-lg">
                    <div class="flex-shrink-0">
                        <svg class="h-12 w-12 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 01-1 1h-2a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V4zm12 12V4L10 14h6zM9 8a1 1 0 00-1 1v2a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-grow text-center sm:text-left">
                        <h3 class="font-semibold text-lg text-kampus-blue">Judul Dokumen Arsip 5</h3>
                        <p class="text-sm text-gray-500">Kategori: Manual | Dipublikasikan: 01 Nov 2025</p>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="assets/dokumen_arsip_5.pdf" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-kampus-blue hover:bg-blue-800">
                            Lihat PDF
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <!-- ===== AKHIR KONTEN UTAMA ===== -->

<?php
    // Panggil footer
    include('footer.php');
?>