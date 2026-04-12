<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aneka Interior - Kenyamanan Rumah Dimulai Dari Sini</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f9fafb; scroll-behavior: smooth; }
        
        /* Style untuk Tab "Mengapa Memilih Kami" (Bawah) */
        .tab-active { border-color: #0b1f3a !important; color: #0b1f3a !important; }
        .tab-inactive { border-color: #e5e7eb !important; color: #9ca3af !important; }
        
        /* Style untuk Hero Tabs (Atas) */
        .hero-tab-active { background-color: #0b1f3a !important; color: white !important; }
        .hero-tab-active .hero-icon { color: #fbbf24 !important; /* amber-400 */ }
        .hero-tab-active .hero-subtitle { color: #d1d5db !important; /* gray-300 */ }
        .hero-tab-active .tab-indicator { display: block !important; }
        
        .hero-tab-inactive { background-color: white !important; color: #9ca3af !important; }
        .hero-tab-inactive .hero-icon { color: #9ca3af !important; }
        .hero-tab-inactive .hero-subtitle { color: #9ca3af !important; }
        .hero-tab-inactive .tab-indicator { display: none !important; }
    </style>
</head>
<body class="text-slate-800 antialiased overflow-x-hidden">

    <header class="w-full relative z-50">
        <div class="bg-[#0b1f3a] text-white">
            <div class="max-w-7xl mx-auto px-6 py-2 flex items-center justify-between text-sm border-b border-white/10">
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-phone text-amber-400"></i>
                        <span class="text-gray-300">+62 812 3456 7890</span>
                        <span class="text-gray-500 ml-1 hidden sm:inline">Layanan 24 Jam</span>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <a href="/keranjang" class="flex items-center gap-2 cursor-pointer hover:text-amber-400 transition-colors">
                        <i class="fas fa-shopping-bag text-amber-400"></i>
                        <span class="hidden sm:inline">Keranjang (0)</span>
                    </a>
                    @auth
                        <a href="/dashboard" class="text-amber-400 font-bold hover:text-white transition-colors">Dashboard</a>
                    @else
                        <a href="/login" class="text-amber-400 font-bold hover:text-white transition-colors">Sign In</a>
                    @endauth
                </div>
            </div>
        </div>

        <div class="bg-white shadow-md sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#0b1f3a] rounded-full flex items-center justify-center">
                        <i class="fas fa-home text-amber-400 text-lg"></i>
                    </div>
                    <div>
                        <div class="font-bold text-[#0b1f3a] text-lg leading-tight">Aneka Interior</div>
                        <div class="text-[10px] text-amber-500 tracking-widest uppercase font-bold">Gorden & Sprei Premium</div>
                    </div>
                </div>

                <nav class="hidden lg:flex items-center gap-2">
                    <a href="#beranda" class="px-4 py-2 text-sm font-semibold text-[#0b1f3a]">Beranda</a>
                    <a href="#produk" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-[#0b1f3a] transition-colors">Katalog Produk</a>
                    <a href="#tentang" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-[#0b1f3a] transition-colors">Tentang Kami</a>
                    <a href="#layanan" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-[#0b1f3a] transition-colors">Layanan</a>
                </nav>

                <button id="mobile-menu-btn" class="lg:hidden text-[#0b1f3a] text-2xl">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 px-6 py-4">
                <a href="#beranda" class="block py-3 text-sm text-[#0b1f3a] font-bold border-b border-gray-50">Beranda</a>
                <a href="#produk" class="block py-3 text-sm text-gray-600 hover:text-[#0b1f3a] font-semibold border-b border-gray-50">Katalog Produk</a>
                <a href="#tentang" class="block py-3 text-sm text-gray-600 hover:text-[#0b1f3a] font-semibold border-b border-gray-50">Tentang Kami</a>
            </div>
        </div>
    </header>

    <section id="beranda" class="relative min-h-[600px] flex items-center justify-center overflow-hidden pb-32" 
        style="background-image: url('https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=1600'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0b1f3a]/90 via-[#0b1f3a]/70 to-transparent"></div>

        <div class="relative z-10 text-center text-white px-6 max-w-3xl mx-auto mt-10">
            <p class="text-amber-400 uppercase tracking-[0.3em] text-sm font-bold mb-4">Koleksi Terlengkap</p>
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6 drop-shadow-lg">
                PERCANTIK<br><span class="text-white">RUMAH ANDA</span>
            </h1>
            <p class="text-gray-200 text-lg mb-10 max-w-xl mx-auto">
                Gorden, sprei, dan perlengkapan rumah premium untuk menciptakan hunian impian Anda. Spesialis pesanan custom.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#produk" class="px-8 py-3.5 border-2 border-white text-white font-bold hover:bg-white hover:text-[#0b1f3a] transition-all duration-300 tracking-wide text-sm">
                    LIHAT KATALOG
                </a>
                <a href="#tentang" class="px-8 py-3.5 bg-amber-400 text-[#0b1f3a] font-bold hover:bg-amber-300 transition-all duration-300 tracking-wide text-sm">
                    HUBUNGI KAMI
                </a>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-6 relative z-20 -mt-32 mb-20">
        <div class="bg-white shadow-2xl rounded-sm overflow-hidden">
            
            <div class="flex overflow-x-auto border-b border-gray-100">
                <button onclick="switchHeroTab(0)" id="hero-btn-0" class="hero-tab-active flex-1 min-w-[120px] flex flex-col items-center justify-center gap-2 py-6 px-4 transition-all duration-300 border-b-2 border-transparent">
                    <i class="fas fa-layer-group text-2xl hero-icon"></i>
                    <div>
                        <div class="font-bold text-sm text-center">Gorden</div>
                        <div class="text-[10px] text-center uppercase tracking-wider hero-subtitle mt-0.5">Tirai & Vitrage</div>
                    </div>
                    <div class="w-2 h-2 rounded-full bg-amber-400 mt-1 tab-indicator"></div>
                </button>
                
                <button onclick="switchHeroTab(1)" id="hero-btn-1" class="hero-tab-inactive flex-1 min-w-[120px] flex flex-col items-center justify-center gap-2 py-6 px-4 transition-all duration-300 hover:bg-gray-50 border-b-2 border-transparent hover:text-[#0b1f3a]">
                    <i class="fas fa-bed text-2xl hero-icon group-hover:text-[#0b1f3a]"></i>
                    <div>
                        <div class="font-bold text-sm text-center">Sprei</div>
                        <div class="text-[10px] text-center uppercase tracking-wider hero-subtitle mt-0.5">Set Seprai Premium</div>
                    </div>
                    <div class="w-2 h-2 rounded-full bg-amber-400 mt-1 tab-indicator"></div>
                </button>

                <button onclick="switchHeroTab(2)" id="hero-btn-2" class="hero-tab-inactive flex-1 min-w-[120px] flex flex-col items-center justify-center gap-2 py-6 px-4 transition-all duration-300 hover:bg-gray-50 border-b-2 border-transparent hover:text-[#0b1f3a]">
                    <i class="fas fa-box text-2xl hero-icon"></i>
                    <div>
                        <div class="font-bold text-sm text-center">Bed Cover</div>
                        <div class="text-[10px] text-center uppercase tracking-wider hero-subtitle mt-0.5">Selimut & Duvet</div>
                    </div>
                    <div class="w-2 h-2 rounded-full bg-amber-400 mt-1 tab-indicator"></div>
                </button>

                <button onclick="switchHeroTab(3)" id="hero-btn-3" class="hero-tab-inactive flex-1 min-w-[120px] flex flex-col items-center justify-center gap-2 py-6 px-4 transition-all duration-300 hover:bg-gray-50 border-b-2 border-transparent hover:text-[#0b1f3a]">
                    <i class="fas fa-star text-2xl hero-icon"></i>
                    <div>
                        <div class="font-bold text-sm text-center">Bantal & Guling</div>
                        <div class="text-[10px] text-center uppercase tracking-wider hero-subtitle mt-0.5">Aksesori Tidur</div>
                    </div>
                    <div class="w-2 h-2 rounded-full bg-amber-400 mt-1 tab-indicator"></div>
                </button>

                <button onclick="switchHeroTab(4)" id="hero-btn-4" class="hero-tab-inactive flex-1 min-w-[120px] flex flex-col items-center justify-center gap-2 py-6 px-4 transition-all duration-300 hover:bg-gray-50 border-b-2 border-transparent hover:text-[#0b1f3a]">
                    <i class="fas fa-th-large text-2xl hero-icon"></i>
                    <div>
                        <div class="font-bold text-sm text-center">Karpet</div>
                        <div class="text-[10px] text-center uppercase tracking-wider hero-subtitle mt-0.5">Alas Lantai Premium</div>
                    </div>
                    <div class="w-2 h-2 rounded-full bg-amber-400 mt-1 tab-indicator"></div>
                </button>
            </div>

            <div class="p-8 md:p-12">
                <div id="hero-content-0" class="flex flex-col md:flex-row gap-8 items-center block">
                    <div class="flex-1">
                        <h3 class="text-3xl font-extrabold text-[#0b1f3a] mb-2">Gorden</h3>
                        <p class="text-amber-500 font-bold text-xs mb-4 uppercase tracking-widest">TIRAI & VITRAGE</p>
                        <p class="text-gray-600 leading-relaxed mb-8">Koleksi gorden eksklusif dari bahan berkualitas tinggi. Tersedia dalam berbagai motif, warna, dan ukuran untuk mempercantik setiap ruangan Anda.</p>
                        <a href="#produk" class="inline-flex items-center gap-2 px-6 py-3 bg-[#0b1f3a] text-white text-sm font-bold hover:bg-amber-400 hover:text-[#0b1f3a] transition-all duration-300">
                            Lihat Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="flex-1 w-full">
                        <img src="https://images.pexels.com/photos/271816/pexels-photo-271816.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Gorden" class="w-full h-64 object-cover rounded-sm shadow-md">
                    </div>
                </div>

                <div id="hero-content-1" class="flex flex-col md:flex-row gap-8 items-center hidden">
                    <div class="flex-1">
                        <h3 class="text-3xl font-extrabold text-[#0b1f3a] mb-2">Sprei</h3>
                        <p class="text-amber-500 font-bold text-xs mb-4 uppercase tracking-widest">SET SEPRAI PREMIUM</p>
                        <p class="text-gray-600 leading-relaxed mb-8">Sprei berbahan katun premium asli pabrik (Katun Jepang, TC 300). Nyaman, super lembut, dan bisa di-custom khusus menyesuaikan tinggi kasur Anda.</p>
                        <a href="#produk" class="inline-flex items-center gap-2 px-6 py-3 bg-[#0b1f3a] text-white text-sm font-bold hover:bg-amber-400 hover:text-[#0b1f3a] transition-all duration-300">
                            Pesan Ukuran Custom <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="flex-1 w-full">
                        <img src="https://images.pexels.com/photos/6186523/pexels-photo-6186523.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Sprei" class="w-full h-64 object-cover rounded-sm shadow-md">
                    </div>
                </div>

                <div id="hero-content-2" class="flex flex-col md:flex-row gap-8 items-center hidden">
                    <div class="flex-1">
                        <h3 class="text-3xl font-extrabold text-[#0b1f3a] mb-2">Bed Cover</h3>
                        <p class="text-amber-500 font-bold text-xs mb-4 uppercase tracking-widest">SELIMUT & DUVET</p>
                        <p class="text-gray-600 leading-relaxed mb-8">Bed cover tebal dan hangat dengan isian dakron berkualitas tinggi. Tersedia pilihan motif modern hotel berbintang untuk mempercantik kamar tidur Anda.</p>
                        <a href="#produk" class="inline-flex items-center gap-2 px-6 py-3 bg-[#0b1f3a] text-white text-sm font-bold hover:bg-amber-400 hover:text-[#0b1f3a] transition-all duration-300">
                            Lihat Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="flex-1 w-full">
                        <img src="https://images.pexels.com/photos/1743229/pexels-photo-1743229.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Bed Cover" class="w-full h-64 object-cover rounded-sm shadow-md">
                    </div>
                </div>

                <div id="hero-content-3" class="flex flex-col md:flex-row gap-8 items-center hidden">
                    <div class="flex-1">
                        <h3 class="text-3xl font-extrabold text-[#0b1f3a] mb-2">Bantal & Guling</h3>
                        <p class="text-amber-500 font-bold text-xs mb-4 uppercase tracking-widest">AKSESORI TIDUR</p>
                        <p class="text-gray-600 leading-relaxed mb-8">Pilihan bantal dan guling dengan bahan premium (dacron, microfiber). Dirancang anti-kempes untuk menopang leher dan memberikan kenyamanan maksimal.</p>
                        <a href="#produk" class="inline-flex items-center gap-2 px-6 py-3 bg-[#0b1f3a] text-white text-sm font-bold hover:bg-amber-400 hover:text-[#0b1f3a] transition-all duration-300">
                            Lihat Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="flex-1 w-full">
                        <img src="https://images.pexels.com/photos/5825574/pexels-photo-5825574.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Bantal" class="w-full h-64 object-cover rounded-sm shadow-md">
                    </div>
                </div>

                <div id="hero-content-4" class="flex flex-col md:flex-row gap-8 items-center hidden">
                    <div class="flex-1">
                        <h3 class="text-3xl font-extrabold text-[#0b1f3a] mb-2">Karpet</h3>
                        <p class="text-amber-500 font-bold text-xs mb-4 uppercase tracking-widest">ALAS LANTAI PREMIUM</p>
                        <p class="text-gray-600 leading-relaxed mb-8">Karpet dekoratif dengan tekstur tebal dan motif memukau. Tersedia dalam berbagai ukuran untuk menghangatkan suasana ruang tamu maupun kamar Anda.</p>
                        <a href="#produk" class="inline-flex items-center gap-2 px-6 py-3 bg-[#0b1f3a] text-white text-sm font-bold hover:bg-amber-400 hover:text-[#0b1f3a] transition-all duration-300">
                            Lihat Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="flex-1 w-full">
                        <img src="https://images.pexels.com/photos/1571468/pexels-photo-1571468.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Karpet" class="w-full h-64 object-cover rounded-sm shadow-md">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="produk" class="py-20 bg-gray-50 relative z-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <p class="text-amber-500 font-bold uppercase tracking-widest text-sm mb-2">Belanja Sekarang</p>
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#0b1f3a]">Katalog Produk</h2>
                <div class="w-16 h-1 bg-amber-400 mx-auto mt-6"></div>
            </div>

            <div class="flex flex-wrap justify-center gap-3 mb-10">
                <button class="px-6 py-2.5 bg-[#0b1f3a] text-white font-semibold text-sm border border-[#0b1f3a] hover:bg-opacity-90 transition-colors">Semua Produk</button>
                @foreach($kategori as $kat)
                    <button class="px-6 py-2.5 bg-white text-gray-600 border border-gray-200 font-semibold text-sm hover:border-amber-400 hover:text-[#0b1f3a] transition-colors">
                        {{ $kat->nama_kategori }}
                    </button>
                @endforeach
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($produk as $item)
                    <div class="bg-white border border-gray-100 shadow-md hover:shadow-xl transition-shadow duration-300 group flex flex-col h-full rounded-sm overflow-hidden">
                        
                        <div class="aspect-[4/3] bg-gray-100 relative overflow-hidden flex items-center justify-center">
                            <i class="fas {{ $item->kategori->nama_kategori == 'Handuk' ? 'fa-bath' : 'fa-bed' }} text-5xl text-gray-300 group-hover:scale-110 transition-transform duration-500"></i>
                            <span class="absolute top-4 left-4 px-3 py-1 bg-amber-400 text-[#0b1f3a] text-[10px] uppercase font-bold tracking-wider shadow-sm">
                                {{ $item->kategori->nama_kategori ?? 'Umum' }}
                            </span>
                        </div>
                        
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-lg font-bold text-[#0b1f3a] mb-1 line-clamp-2">
                                {{ $item->nama_produk }}
                            </h3>
                            <p class="text-sm text-gray-500 mb-6 line-clamp-1">{{ $item->tipe_barang ?? 'Kualitas Premium' }}</p>
                            
                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <p class="text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-1">Mulai Dari</p>
                                @php $hargaTermurah = $item->varian->min('harga_reguler'); @endphp
                                <p class="text-xl font-extrabold text-[#0b1f3a] mb-5">
                                    {{ $hargaTermurah ? 'Rp ' . number_format($hargaTermurah, 0, ',', '.') : 'Hubungi Admin' }}
                                </p>
                                <a href="/produk/{{ $item->id }}/detail" class="w-full flex items-center justify-center gap-2 bg-white border-2 border-[#0b1f3a] text-[#0b1f3a] hover:bg-[#0b1f3a] hover:text-white font-bold py-2.5 text-sm transition-colors">
                                    Pilih Varian <i class="fas fa-arrow-right text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <i class="fas fa-box-open text-5xl mb-4 text-gray-300"></i>
                        <p class="text-gray-500 font-medium">Maaf, saat ini belum ada produk.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="koleksi" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <div class="lg:w-5/12">
                    <p class="text-amber-500 font-bold uppercase tracking-widest text-sm mb-3">Toko Terpercaya</p>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-[#0b1f3a] leading-tight mb-6">
                        Kenyamanan Rumah<br>Dimulai Dari Sini.
                    </h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Aneka Interior adalah spesialis pembuat sprei dan gorden terpercaya sejak 2010. Kami melayani banyak pelanggan, hotel, dan villa di seluruh Indonesia dengan produk berkualitas premium.
                    </p>
                    <p class="text-gray-600 leading-relaxed mb-8">
                        Didukung oleh penjahit profesional, kami siap membuat ukuran custom sesuai dengan tinggi dan luas kasur Anda agar terpasang dengan presisi dan sempurna.
                    </p>
                    <p class="font-bold text-[#0b1f3a]">Iie Marcel</p>
                    <p class="text-sm text-gray-500">Pemilik Aneka Interior</p>
                </div>

                <div class="lg:w-7/12 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-gray-50 border border-gray-100 rounded-sm overflow-hidden group">
                        <div class="overflow-hidden">
                            <img src="https://images.pexels.com/photos/6186523/pexels-photo-6186523.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Sprei Motif" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <span class="text-xs font-bold text-amber-500 tracking-widest uppercase">KOLEKSI TERBARU</span>
                            <h3 class="font-bold text-[#0b1f3a] text-lg mt-2 mb-2">Sprei Katun Jepang</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-4">Tekstur sangat lembut, warna tahan lama, dan dingin saat digunakan. Pilihan utama untuk tidur pulas.</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 border border-gray-100 rounded-sm overflow-hidden group">
                        <div class="overflow-hidden">
                            <img src="https://images.pexels.com/photos/271816/pexels-photo-271816.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Gorden" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <span class="text-xs font-bold text-amber-500 tracking-widest uppercase">UNGGULAN</span>
                            <h3 class="font-bold text-[#0b1f3a] text-lg mt-2 mb-2">Gorden Blackout</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-4">Gorden kualitas hotel yang efektif menghalangi cahaya matahari untuk privasi maksimal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang" class="py-20 bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-[#0b1f3a]">Mengapa Memilih Kami?</h2>
                <div class="w-16 h-1 bg-amber-400 mx-auto mt-4"></div>
            </div>

            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="flex-1 relative">
                    <img src="https://images.pexels.com/photos/1457842/pexels-photo-1457842.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Ruang Elegan" class="w-full h-80 object-cover rounded-sm shadow-xl relative z-10">
                    <div class="absolute -bottom-6 -right-6 w-40 h-40 border-4 border-amber-400 rounded-sm z-0 hidden md:block"></div>
                </div>

                <div class="flex-1">
                    <div class="flex gap-4 mb-8">
                        <button onclick="switchTab(0)" id="btn-tab-0" class="tab-active flex-1 flex flex-col items-center gap-2 py-3 px-2 border-b-2 text-center transition-colors">
                            <i class="fas fa-award text-xl"></i>
                            <span class="text-xs font-bold leading-tight uppercase">Kualitas</span>
                        </button>
                        <button onclick="switchTab(1)" id="btn-tab-1" class="tab-inactive flex-1 flex flex-col items-center gap-2 py-3 px-2 border-b-2 text-center transition-colors">
                            <i class="fas fa-cut text-xl"></i>
                            <span class="text-xs font-bold leading-tight uppercase">Custom Size</span>
                        </button>
                        <button onclick="switchTab(2)" id="btn-tab-2" class="tab-inactive flex-1 flex flex-col items-center gap-2 py-3 px-2 border-b-2 text-center transition-colors">
                            <i class="fas fa-tag text-xl"></i>
                            <span class="text-xs font-bold leading-tight uppercase">Harga Pabrik</span>
                        </button>
                    </div>

                    <div id="content-tab-0" class="block">
                        <p class="text-gray-600 leading-relaxed text-base mb-6">
                            Setiap meter kain yang kami gunakan telah melewati standar kelayakan hotel berbintang. Kami menjamin keaslian bahan seperti Katun Jepang, TC 200, dan TC 300 langsung dari pabrik tekstil terbaik.
                        </p>
                    </div>
                    <div id="content-tab-1" class="hidden">
                        <p class="text-gray-600 leading-relaxed text-base mb-6">
                            Kasur Anda memiliki tinggi khusus atau ukuran yang tidak standar? Penjahit profesional kami siap membuatkan sprei dengan ukuran presisi 100% mengikuti permintaan Anda.
                        </p>
                    </div>
                    <div id="content-tab-2" class="hidden">
                        <p class="text-gray-600 leading-relaxed text-base mb-6">
                            Sebagai produsen langsung, kami menawarkan harga yang sangat bersaing. Anda mendapatkan kualitas butik atau hotel mewah dengan harga langsung dari meja produksi kami.
                        </p>
                    </div>

                    <div class="bg-white border-l-4 border-amber-400 p-5 shadow-sm">
                        <p class="text-sm text-gray-600 italic">"Kami tidak berkompromi soal bahan. Kenyamanan tidur pelanggan adalah prioritas utama Aneka Interior."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan" class="py-20 bg-[#0b1f3a] relative overflow-hidden">
        <div class="absolute inset-0 opacity-5" style="background-image: url('https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg'); background-size: cover;"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <div class="lg:w-1/3">
                    <h2 class="text-4xl font-extrabold text-white leading-tight mb-6">
                        Layanan<br>Terbaik.<br><span class="text-amber-400">Kualitas Terjamin.</span>
                    </h2>
                    <p class="text-gray-400 text-sm leading-relaxed mb-8">
                        Kami hadir untuk memenuhi semua kebutuhan dekorasi ruang tidur dan mandi Anda dengan produk pilihan dan layanan jahitan profesional.
                    </p>
                </div>

                <div class="lg:w-2/3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="p-6 border border-amber-400 bg-white/5 transition-all group">
                        <i class="fas fa-bed text-3xl text-amber-400 mb-4"></i>
                        <h3 class="font-bold text-white text-sm mb-2">Sprei Standar/Custom</h3>
                        <p class="text-gray-400 text-xs leading-relaxed">Pengerjaan sprei dengan berbagai jenis kain premium, karet keliling, dan jahitan kuat.</p>
                    </div>
                    <div class="p-6 border border-white/10 hover:border-amber-400/60 hover:bg-white/5 transition-all group">
                        <i class="fas fa-layer-group text-3xl text-gray-400 group-hover:text-amber-400 mb-4 transition-colors"></i>
                        <h3 class="font-bold text-white text-sm mb-2">Bed Cover Mewah</h3>
                        <p class="text-gray-400 text-xs leading-relaxed">Isian dakron berkualitas yang tebal, hangat, namun tidak membuat gerah saat dipakai.</p>
                    </div>
                    <div class="p-6 border border-white/10 hover:border-amber-400/60 hover:bg-white/5 transition-all group">
                        <i class="fas fa-bath text-3xl text-gray-400 group-hover:text-amber-400 mb-4 transition-colors"></i>
                        <h3 class="font-bold text-white text-sm mb-2">Handuk Hotel</h3>
                        <p class="text-gray-400 text-xs leading-relaxed">Penyediaan handuk Terry Cotton bergramasi tinggi dengan daya serap maksimal.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-extrabold text-[#0b1f3a]">15+</div>
                    <div class="text-xs font-bold text-gray-400 mt-2 uppercase tracking-widest">Tahun Berpengalaman</div>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-[#0b1f3a]">50+</div>
                    <div class="text-xs font-bold text-gray-400 mt-2 uppercase tracking-widest">Mitra Hotel & Villa</div>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-[#0b1f3a]">1000+</div>
                    <div class="text-xs font-bold text-gray-400 mt-2 uppercase tracking-widest">Pesanan Selesai</div>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-[#0b1f3a]">100%</div>
                    <div class="text-xs font-bold text-gray-400 mt-2 uppercase tracking-widest">Garansi Kualitas</div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="bg-[#071428] text-white py-16">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-amber-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-home text-[#0b1f3a] text-lg"></i>
                        </div>
                        <div>
                            <div class="font-bold text-white text-lg leading-tight">Aneka Interior</div>
                            <div class="text-[10px] text-amber-400 tracking-widest uppercase font-bold">Gorden & Sprei</div>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">
                        Menyediakan sprei, handuk, dan perlengkapan tidur berkualitas premium untuk menciptakan istirahat yang sempurna.
                    </p>
                    <div class="flex gap-3">
                        <a href="#" class="w-8 h-8 border border-gray-600 flex items-center justify-center hover:border-amber-400 hover:text-amber-400 transition-colors text-gray-400"><i class="fab fa-facebook-f text-sm"></i></a>
                        <a href="#" class="w-8 h-8 border border-gray-600 flex items-center justify-center hover:border-amber-400 hover:text-amber-400 transition-colors text-gray-400"><i class="fab fa-instagram text-sm"></i></a>
                        <a href="#" class="w-8 h-8 border border-gray-600 flex items-center justify-center hover:border-amber-400 hover:text-amber-400 transition-colors text-gray-400"><i class="fab fa-whatsapp text-sm"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-6 text-sm uppercase tracking-wider">Katalog Produk</h4>
                    <ul class="space-y-3">
                        <li><a href="#produk" class="text-gray-400 text-sm hover:text-amber-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-amber-400"></i> Sprei Katun Jepang</a></li>
                        <li><a href="#produk" class="text-gray-400 text-sm hover:text-amber-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-amber-400"></i> Sprei TC 200 / 300</a></li>
                        <li><a href="#produk" class="text-gray-400 text-sm hover:text-amber-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-amber-400"></i> Bed Cover Mewah</a></li>
                        <li><a href="#produk" class="text-gray-400 text-sm hover:text-amber-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-amber-400"></i> Handuk Terry Cotton</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-6 text-sm uppercase tracking-wider">Informasi</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 text-sm hover:text-amber-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-amber-400"></i> Lacak Pesanan</a></li>
                        <li><a href="#" class="text-gray-400 text-sm hover:text-amber-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-amber-400"></i> Minta Penawaran Harga</a></li>
                        <li><a href="#" class="text-gray-400 text-sm hover:text-amber-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-amber-400"></i> Hubungi Admin</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-6 text-sm uppercase tracking-wider">Buat Pesanan</h4>
                    <p class="text-gray-400 text-sm leading-relaxed mb-5">
                        Punya kasur ukuran khusus? Segera diskusikan dengan admin kami untuk mendapatkan harga terbaik.
                    </p>
                    <a href="#" class="inline-flex items-center gap-2 px-6 py-3 bg-amber-400 hover:bg-amber-300 text-[#0b1f3a] font-bold text-sm transition-colors">
                        <i class="fab fa-whatsapp text-lg"></i> Chat Admin Sekarang
                    </a>
                </div>

            </div>
        </div>

        <div class="bg-[#050e1c] py-5">
            <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex gap-6 text-xs text-gray-500 font-medium">
                    <a href="#" class="hover:text-gray-300 transition-colors">Syarat & Ketentuan</a>
                    <a href="#" class="hover:text-gray-300 transition-colors">Kebijakan Privasi</a>
                </div>
                <p class="text-xs text-gray-600 font-medium">
                    &copy; {{ date('Y') }} Aneka Interior. Didukung oleh Laravel.
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Toggle Mobile Menu
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Toggle Why Choose Us Tabs (Bawah)
        function switchTab(index) {
            for (let i = 0; i < 3; i++) {
                document.getElementById('btn-tab-' + i).classList.remove('tab-active');
                document.getElementById('btn-tab-' + i).classList.add('tab-inactive');
                document.getElementById('content-tab-' + i).classList.add('hidden');
            }
            document.getElementById('btn-tab-' + index).classList.remove('tab-inactive');
            document.getElementById('btn-tab-' + index).classList.add('tab-active');
            document.getElementById('content-tab-' + index).classList.remove('hidden');
        }

        // Toggle Hero Tabs Mengambang (Atas)
        function switchHeroTab(index) {
            // Jumlah total tab di atas ada 5 (0 sampai 4)
            for (let i = 0; i < 5; i++) {
                // Reset semua tab menjadi inactive
                document.getElementById('hero-btn-' + i).classList.remove('hero-tab-active');
                document.getElementById('hero-btn-' + i).classList.add('hero-tab-inactive');
                
                // Sembunyikan semua konten
                document.getElementById('hero-content-' + i).classList.remove('block');
                document.getElementById('hero-content-' + i).classList.add('hidden');
            }
            
            // Set tab yang diklik menjadi active
            document.getElementById('hero-btn-' + index).classList.remove('hero-tab-inactive');
            document.getElementById('hero-btn-' + index).classList.add('hero-tab-active');
            
            // Tampilkan konten yang sesuai
            document.getElementById('hero-content-' + index).classList.remove('hidden');
            document.getElementById('hero-content-' + index).classList.add('block');
        }
    </script>
</body>
</html>