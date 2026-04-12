<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Aneka Interior</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f9fafb; scroll-behavior: smooth; }
    </style>
</head>
<body class="text-slate-800 antialiased flex flex-col min-h-screen">

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
                        <span class="hidden sm:inline text-amber-400 font-bold">Keranjang ({{ count($keranjang ?? []) }})</span>
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
                <a href="/" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#0b1f3a] rounded-full flex items-center justify-center">
                        <i class="fas fa-home text-amber-400 text-lg"></i>
                    </div>
                    <div>
                        <div class="font-bold text-[#0b1f3a] text-lg leading-tight">Aneka Interior</div>
                        <div class="text-[10px] text-amber-500 tracking-widest uppercase font-bold">Gorden & Sprei Premium</div>
                    </div>
                </a>

                <nav class="hidden lg:flex items-center gap-2">
                    <a href="/" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-[#0b1f3a] transition-colors"><i class="fas fa-arrow-left mr-1"></i> Lanjut Belanja</a>
                </nav>

                <button id="mobile-menu-btn" class="lg:hidden text-[#0b1f3a] text-2xl">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 px-6 py-4">
                <a href="/" class="block py-3 text-sm text-gray-600 hover:text-[#0b1f3a] font-semibold border-b border-gray-50"><i class="fas fa-arrow-left mr-1"></i> Lanjut Belanja</a>
            </div>
        </div>
    </header>

    <main class="flex-grow max-w-7xl mx-auto px-6 py-12 w-full">
        <div class="flex items-center gap-3 mb-8">
            <h1 class="text-3xl font-extrabold text-[#0b1f3a]">Keranjang Belanja</h1>
            <span class="bg-[#0b1f3a] text-white text-sm font-bold px-3 py-1 rounded-full shadow-sm">{{ count($keranjang ?? []) }} Barang</span>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <div class="w-full lg:w-2/3 space-y-5">
                
                @forelse ($keranjang as $item)
                    @if($item->jenis_pesanan == 'custom')
                        <div class="bg-white rounded-sm border border-amber-300 p-5 flex flex-col sm:flex-row gap-5 items-start sm:items-center shadow-sm relative overflow-hidden hover:shadow-md transition-shadow">
                            <div class="absolute top-3 left-0 bg-amber-400 text-[#0b1f3a] text-[10px] font-bold px-3 py-1 rounded-r-sm shadow-sm tracking-widest uppercase">
                                PESANAN CUSTOM
                            </div>
                            
                            <div class="w-24 h-24 bg-gray-50 rounded-sm flex items-center justify-center border border-gray-100 flex-shrink-0 mt-6 sm:mt-0">
                                <i class="fas fa-cut text-3xl text-amber-400/50"></i>
                            </div>
                            <div class="flex-grow w-full mt-2 sm:mt-0">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-lg text-[#0b1f3a]">{{ $item->produk->nama_produk }}</h3>
                                        <p class="text-sm text-gray-500 mb-1 leading-relaxed">
                                            Custom: {{ $item->catatan_custom }}
                                        </p>
                                    </div>
                                    
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors p-2" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                                <div class="flex justify-between items-end mt-2">
                                    <div class="flex items-center border border-gray-200 rounded-sm overflow-hidden bg-gray-50">
                                        <button class="px-3 py-1 text-gray-400 cursor-not-allowed" disabled>-</button>
                                        <input type="text" value="{{ $item->qty }}" class="w-10 text-center font-bold text-sm outline-none border-x border-gray-200 bg-transparent text-gray-500" readonly>
                                        <button class="px-3 py-1 text-gray-400 cursor-not-allowed" disabled>+</button>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-amber-500 text-sm"><i class="fas fa-clock mr-1"></i> Menunggu Harga</p>
                                        <p class="text-[10px] text-gray-400 uppercase tracking-wider mt-0.5">Dihitung oleh Admin</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="bg-white rounded-sm border border-gray-200 p-5 flex flex-col sm:flex-row gap-5 items-start sm:items-center shadow-sm hover:shadow-md transition-shadow">
                            <div class="w-24 h-24 bg-gray-50 rounded-sm flex items-center justify-center border border-gray-100 flex-shrink-0">
                                <i class="fas {{ $item->produk->kategori->nama_kategori == 'Handuk' ? 'fa-bath' : 'fa-bed' }} text-3xl text-gray-300"></i>
                            </div>
                            <div class="flex-grow w-full">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-bold text-lg text-[#0b1f3a]">{{ $item->produk->nama_produk }}</h3>
                                        <p class="text-sm text-gray-500 mb-2">
                                            Ukuran: {{ $item->varian->ukuran ?? 'Standar' }} 
                                            @if($item->varian && $item->varian->tinggi) - Tinggi {{ $item->varian->tinggi }}cm @endif
                                        </p>
                                    </div>
                                    
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors p-2" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                                <div class="flex justify-between items-end mt-2">
                                    <div class="flex items-center border border-gray-300 rounded-sm overflow-hidden">
                                        <button type="button" class="px-3 py-1 text-gray-600 hover:bg-gray-100 transition-colors">-</button>
                                        <input type="text" value="{{ $item->qty }}" class="w-10 text-center font-bold text-sm outline-none border-x border-gray-300" readonly>
                                        <button type="button" class="px-3 py-1 text-gray-600 hover:bg-gray-100 transition-colors">+</button>
                                    </div>
                                    <p class="font-extrabold text-[#0b1f3a] text-lg">Rp {{ number_format($item->subtotal ?? 0, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="bg-white rounded-sm border border-gray-200 p-12 text-center shadow-sm">
                        <i class="fas fa-shopping-basket text-6xl text-gray-200 mb-4"></i>
                        <h3 class="text-xl font-bold text-[#0b1f3a] mb-2">Keranjang Anda Kosong</h3>
                        <p class="text-gray-500 mb-6">Belum ada sprei atau gorden impian yang Anda tambahkan.</p>
                        <a href="/#produk" class="inline-block bg-[#0b1f3a] text-white hover:bg-amber-400 hover:text-[#0b1f3a] font-bold py-3 px-8 rounded-sm transition-colors duration-300 shadow-md">
                            Mulai Belanja
                        </a>
                    </div>
                @endforelse

            </div>

            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-sm border border-gray-200 p-6 shadow-sm sticky top-28">
                    <h3 class="font-bold text-lg text-[#0b1f3a] mb-4 border-b border-gray-100 pb-3">Ringkasan Belanja</h3>
                    
                    @php
                        // Memastikan data diubah menjadi Collection Laravel agar tidak error
                        $koleksiKeranjang = collect($keranjang ?? []);
                        
                        $totalReguler = $koleksiKeranjang->where('jenis_pesanan', 'standar')->sum('subtotal');
                        $qtyReguler = $koleksiKeranjang->where('jenis_pesanan', 'standar')->sum('qty');
                        $qtyCustom = $koleksiKeranjang->where('jenis_pesanan', 'custom')->sum('qty');
                    @endphp

                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between text-sm text-gray-600">
                            <span>Total Barang Reguler ({{ $qtyReguler }})</span>
                            <span class="font-bold text-[#0b1f3a]">Rp {{ number_format($totalReguler, 0, ',', '.') }}</span>
                        </div>
                        
                        @if($qtyCustom > 0)
                        <div class="flex justify-between items-center text-sm bg-amber-50 p-3 rounded-sm border border-amber-100">
                            <span class="text-amber-700 font-medium">Barang Custom ({{ $qtyCustom }})</span>
                            <span class="font-bold text-amber-600 text-xs uppercase">Menunggu Admin</span>
                        </div>
                        @endif
                    </div>

                    <div class="border-t border-gray-200 pt-4 mb-6">
                        <div class="flex justify-between items-end">
                            <span class="font-bold text-gray-800">Total Sementara</span>
                            <span class="font-extrabold text-2xl text-[#0b1f3a]">Rp {{ number_format($totalReguler, 0, ',', '.') }}</span>
                        </div>
                        @if($qtyCustom > 0)
                        <p class="text-xs text-gray-500 mt-3 leading-relaxed">
                            *Total akhir akan diupdate dan dapat dibayarkan setelah Admin selesai menghitung pesanan custom Anda.
                        </p>
                        @endif
                    </div>

                    <form action="/checkout" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-[#0b1f3a] text-white hover:bg-amber-400 hover:text-[#0b1f3a] font-bold py-3.5 rounded-sm transition-colors duration-300 shadow-md flex justify-center items-center gap-2 disabled:bg-gray-300 disabled:text-gray-500 disabled:cursor-not-allowed" {{ count($keranjang ?? []) == 0 ? 'disabled' : '' }}>
                            Checkout Sekarang <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>
                    
                    <a href="/#produk" class="block text-center w-full mt-4 text-sm font-semibold text-gray-500 hover:text-[#0b1f3a] transition-colors">
                        Kembali Belanja
                    </a>
                </div>
            </div>

        </div>
    </main>

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
                        <li><a href="/#produk" class="text-gray-400 text-sm hover:text-amber-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-amber-400"></i> Sprei Katun Jepang</a></li>
                        <li><a href="/#produk" class="text-gray-400 text-sm hover:text-amber-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-amber-400"></i> Sprei TC 200 / 300</a></li>
                        <li><a href="/#produk" class="text-gray-400 text-sm hover:text-amber-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-amber-400"></i> Bed Cover Mewah</a></li>
                        <li><a href="/#produk" class="text-gray-400 text-sm hover:text-amber-400 transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-[10px] text-amber-400"></i> Handuk Terry Cotton</a></li>
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
                    <a href="#" class="inline-flex items-center gap-2 px-6 py-3 bg-amber-400 hover:bg-amber-300 text-[#0b1f3a] font-bold text-sm transition-colors rounded-sm">
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
    </script>
</body>
</html>