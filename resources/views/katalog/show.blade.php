<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produk->nama_produk }} - Aneka Interior</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f9fafb; scroll-behavior: smooth; }
        
        /* Menyembunyikan panah atas-bawah (spinners) pada input number */
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }
        input[type=number] {
            -moz-appearance: textfield; /* Firefox */
        }
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
                    <a href="/#produk" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-[#0b1f3a] transition-colors"><i class="fas fa-arrow-left mr-1"></i> Kembali ke Katalog</a>
                </nav>

                <button id="mobile-menu-btn" class="lg:hidden text-[#0b1f3a] text-2xl">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 px-6 py-4">
                <a href="/#produk" class="block py-3 text-sm text-gray-600 hover:text-[#0b1f3a] font-semibold border-b border-gray-50"><i class="fas fa-arrow-left mr-1"></i> Kembali ke Katalog</a>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-6 py-6 w-full">
        <nav class="text-xs font-semibold text-gray-500 tracking-wider uppercase">
            <a href="/" class="hover:text-[#0b1f3a] transition-colors">Beranda</a>
            <span class="mx-2 text-gray-300">/</span>
            <span class="text-gray-400">{{ $produk->kategori->nama_kategori ?? 'Umum' }}</span>
            <span class="mx-2 text-gray-300">/</span>
            <span class="text-[#0b1f3a] font-bold">{{ $produk->nama_produk }}</span>
        </nav>
    </div>

    <main class="flex-grow max-w-7xl mx-auto px-6 pb-16 w-full">
        <div class="bg-white rounded-sm shadow-md border border-gray-200 overflow-hidden">
            <div class="flex flex-col lg:flex-row">
                
                <div class="w-full lg:w-5/12 bg-gray-50 p-8 flex flex-col items-center justify-center border-b lg:border-b-0 lg:border-r border-gray-200 relative">
                    <div class="absolute top-6 left-6 px-3 py-1 bg-amber-400 text-[#0b1f3a] text-[10px] uppercase font-bold tracking-wider shadow-sm rounded-sm">
                        {{ $produk->kategori->nama_kategori ?? 'Umum' }}
                    </div>
                    
                    <div class="w-full aspect-square bg-white rounded-sm shadow-sm border border-gray-100 flex items-center justify-center mt-4">
                        <i class="fas {{ $produk->kategori->nama_kategori == 'Handuk' ? 'fa-bath' : 'fa-bed' }} text-9xl text-gray-200"></i>
                    </div>
                    <p class="text-xs text-gray-400 mt-6 text-center italic">*Gambar hanya ilustrasi. Silakan hubungi admin untuk melihat motif yang tersedia.</p>
                </div>

                <div class="w-full lg:w-7/12 p-8 lg:p-12">
                    
                    <h1 class="text-3xl lg:text-4xl font-extrabold text-[#0b1f3a] mb-2 leading-tight">{{ $produk->nama_produk }}</h1>
                    <p class="text-amber-600 font-bold text-sm tracking-wide uppercase mb-6">{{ $produk->tipe_barang ?? 'Kualitas Premium' }}</p>

                    <div class="h-px bg-gray-200 w-full mb-8"></div>

                    <form action="/keranjang/tambah/{{ $produk->id }}" method="POST">
                        @csrf
                        
                        @if($produk->kategori->bisa_custom)
                            <div class="mb-8 bg-gray-50 p-1.5 rounded-sm inline-flex w-full border border-gray-200">
                                <label class="flex-1 text-center cursor-pointer relative">
                                    <input type="radio" name="jenis_pesanan" value="standar" class="peer sr-only" checked onchange="togglePesanan()">
                                    <div class="py-3 rounded-sm text-sm font-bold text-gray-500 peer-checked:bg-[#0b1f3a] peer-checked:text-white peer-checked:shadow-md transition-all duration-300">
                                        <i class="fas fa-layer-group mr-2"></i> Ukuran Standar
                                    </div>
                                </label>
                                <label class="flex-1 text-center cursor-pointer relative">
                                    <input type="radio" name="jenis_pesanan" value="custom" class="peer sr-only" onchange="togglePesanan()">
                                    <div class="py-3 rounded-sm text-sm font-bold text-gray-500 peer-checked:bg-[#0b1f3a] peer-checked:text-white peer-checked:shadow-md transition-all duration-300">
                                        <i class="fas fa-cut mr-2"></i> Ukuran Custom
                                    </div>
                                </label>
                            </div>
                        @else
                            <input type="hidden" name="jenis_pesanan" value="standar" id="jenis_pesanan">
                        @endif

                        <div id="area_standar" class="space-y-6 block animate-in fade-in duration-500">
                            <div>
                                <label class="block text-sm font-bold text-[#0b1f3a] mb-3 uppercase tracking-wider">Pilih Ukuran yang Tersedia</label>
                                <div class="relative">
                                    <select id="pilih_varian" name="varian_id" class="appearance-none w-full pl-5 pr-10 py-4 bg-white border-2 border-gray-200 rounded-sm focus:border-[#0b1f3a] focus:ring-0 outline-none transition-colors text-gray-700 font-medium cursor-pointer shadow-sm">
                                        <option value="" data-harga="0">-- Klik untuk Memilih Ukuran --</option>
                                        @foreach($produk->varian as $var)
                                            <option value="{{ $var->id }}" data-harga="{{ $var->harga_reguler }}">
                                                {{ $var->ukuran }} 
                                                @if($var->tinggi) | Tinggi {{ $var->tinggi }}cm @endif 
                                                @if($var->keterangan_bantal) | {{ $var->keterangan_bantal }} @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="area_custom" class="space-y-6 hidden animate-in fade-in duration-500">
                            <div class="bg-amber-50 border-l-4 border-amber-400 text-amber-800 p-4 shadow-sm text-sm leading-relaxed">
                                <strong><i class="fas fa-info-circle mr-1"></i> Info Custom:</strong> Silakan masukkan ukuran presisi kasur Anda. Admin kami akan menghitung harga spesial setelah pesanan masuk.
                            </div>
                            
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-[#0b1f3a] mb-2 uppercase tracking-wider">Lebar Kasur</label>
                                    <div class="relative">
                                        <input type="number" name="custom_lebar" placeholder="Misal: 160" min="1" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-sm focus:border-amber-400 focus:ring-0 outline-none transition-colors text-gray-700 font-bold shadow-sm pr-12">
                                        <div class="absolute inset-y-0 right-0 flex items-center px-3 bg-gray-100 border-l-2 border-gray-200 rounded-r-sm text-xs font-bold text-gray-500">
                                            cm
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-xs font-bold text-[#0b1f3a] mb-2 uppercase tracking-wider">Panjang Kasur</label>
                                    <div class="relative">
                                        <input type="number" name="custom_panjang" placeholder="Misal: 200" min="1" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-sm focus:border-amber-400 focus:ring-0 outline-none transition-colors text-gray-700 font-bold shadow-sm pr-12">
                                        <div class="absolute inset-y-0 right-0 flex items-center px-3 bg-gray-100 border-l-2 border-gray-200 rounded-r-sm text-xs font-bold text-gray-500">
                                            cm
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-[#0b1f3a] mb-2 uppercase tracking-wider">Tinggi Kasur</label>
                                    <div class="relative">
                                        <input type="number" name="custom_tinggi" placeholder="Misal: 30" min="1" class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-sm focus:border-amber-400 focus:ring-0 outline-none transition-colors text-gray-700 font-bold shadow-sm pr-12">
                                        <div class="absolute inset-y-0 right-0 flex items-center px-3 bg-gray-100 border-l-2 border-gray-200 rounded-r-sm text-xs font-bold text-gray-500">
                                            cm
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-xs font-bold text-[#0b1f3a] mb-2 uppercase tracking-wider">Catatan Tambahan (Opsional)</label>
                                <input type="text" name="catatan_tambahan" placeholder="Contoh: Tolong buatkan karet keliling, motif kotak-kotak..." class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-sm focus:border-amber-400 focus:ring-0 outline-none transition-colors text-gray-700 shadow-sm">
                            </div>
                        </div>

                        <div class="mt-10 bg-gray-50 p-6 border border-gray-200 rounded-sm flex flex-col sm:flex-row items-center justify-between gap-6 shadow-inner">
                            <div class="w-full sm:w-auto text-center sm:text-left">
                                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Total Harga</p>
                                <div id="display_harga" class="text-3xl font-extrabold text-[#0b1f3a]">Rp 0</div>
                            </div>
                            <div class="w-full sm:w-auto flex items-center justify-center sm:justify-end gap-4 border-t sm:border-t-0 sm:border-l border-gray-200 pt-6 sm:pt-0 sm:pl-6">
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest">Jumlah</label>
                                <div class="flex items-center border border-gray-300 rounded-sm overflow-hidden bg-white shadow-sm">
                                    <button type="button" onclick="ubahQty(-1)" class="px-4 py-2 text-gray-600 hover:bg-gray-100 transition-colors font-bold">-</button>
                                    <input type="number" id="input_qty" name="qty" value="1" min="1" class="w-12 text-center font-bold text-[#0b1f3a] outline-none border-x border-gray-300 py-2">
                                    <button type="button" onclick="ubahQty(1)" class="px-4 py-2 text-gray-600 hover:bg-gray-100 transition-colors font-bold">+</button>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="mt-8 w-full bg-[#0b1f3a] hover:bg-amber-400 text-white hover:text-[#0b1f3a] font-bold py-4 rounded-sm transition-all duration-300 shadow-lg flex justify-center items-center gap-3 text-lg uppercase tracking-wide">
                            <i class="fas fa-shopping-cart"></i> Tambahkan ke Keranjang
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <footer class="mt-auto">
        <div class="bg-[#071428] text-white py-12">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <div class="w-12 h-12 bg-amber-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-home text-[#0b1f3a] text-xl"></i>
                </div>
                <div class="font-bold text-white text-xl leading-tight mb-1">Aneka Interior</div>
                <div class="text-xs text-amber-400 tracking-widest uppercase font-bold mb-6">Gorden & Sprei Premium</div>
                <div class="flex justify-center gap-4">
                    <a href="#" class="w-10 h-10 border border-gray-600 flex items-center justify-center hover:border-amber-400 hover:text-amber-400 transition-colors text-gray-400 rounded-full"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-10 h-10 border border-gray-600 flex items-center justify-center hover:border-amber-400 hover:text-amber-400 transition-colors text-gray-400 rounded-full"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="w-10 h-10 border border-gray-600 flex items-center justify-center hover:border-amber-400 hover:text-amber-400 transition-colors text-gray-400 rounded-full"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <div class="bg-[#050e1c] py-4">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <p class="text-xs text-gray-600 font-medium">&copy; {{ date('Y') }} Aneka Interior. Didukung oleh Laravel.</p>
            </div>
        </div>
    </footer>

    <script>
        // Toggle Mobile Menu
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if(menuBtn) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Variabel global untuk simpan harga satuan
        let hargaSatuan = 0;

        // Script untuk mengubah harga saat dropdown dipilih
        const selectVarian = document.getElementById('pilih_varian');
        const displayHarga = document.getElementById('display_harga');
        const inputQty = document.getElementById('input_qty');

        function updateHargaDisplay() {
            const isStandar = document.querySelector('input[name="jenis_pesanan"]:checked')?.value === 'standar' || true;
            
            if (isStandar) {
                const qty = parseInt(inputQty.value) || 1;
                const total = hargaSatuan * qty;
                
                if(total > 0) {
                    displayHarga.innerText = 'Rp ' + total.toLocaleString('id-ID');
                } else {
                    displayHarga.innerText = 'Rp 0';
                }
            }
        }

        if(selectVarian) {
            selectVarian.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                hargaSatuan = parseInt(selectedOption.getAttribute('data-harga')) || 0;
                updateHargaDisplay();
            });
        }

        // Fungsi tombol Plus/Minus Qty
        function ubahQty(nilai) {
            let currentQty = parseInt(inputQty.value) || 1;
            let newQty = currentQty + nilai;
            if (newQty < 1) newQty = 1;
            inputQty.value = newQty;
            updateHargaDisplay();
        }

        // Cegah user ketik angka minus di qty
        inputQty.addEventListener('change', function() {
            if(this.value < 1) this.value = 1;
            updateHargaDisplay();
        });

        // Script untuk pindah tab Standar vs Custom
        function togglePesanan() {
            const isStandar = document.querySelector('input[name="jenis_pesanan"]:checked').value === 'standar';
            const areaStandar = document.getElementById('area_standar');
            const areaCustom = document.getElementById('area_custom');
            
            if (isStandar) {
                areaStandar.classList.remove('hidden');
                areaStandar.classList.add('block');
                areaCustom.classList.remove('block');
                areaCustom.classList.add('hidden');
                
                // Kembalikan harga
                updateHargaDisplay();
                displayHarga.classList.remove('text-amber-500', 'text-xl');
                displayHarga.classList.add('text-[#0b1f3a]', 'text-3xl');
                
                // Aktifkan kembali input Qty
                document.querySelectorAll('button[onclick^="ubahQty"]').forEach(btn => btn.disabled = false);
            } else {
                areaStandar.classList.remove('block');
                areaStandar.classList.add('hidden');
                areaCustom.classList.remove('hidden');
                areaCustom.classList.add('block');
                
                // Ubah text harga jadi Menunggu Admin
                displayHarga.innerText = 'Menunggu Admin';
                displayHarga.classList.remove('text-[#0b1f3a]', 'text-3xl');
                displayHarga.classList.add('text-amber-500', 'text-xl');
            }
        }
    </script>
</body>
</html>