<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produk->nama_produk }} - Aneka Interior</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body class="text-slate-800 antialiased">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="flex-shrink-0 flex items-center gap-2">
                    <div class="w-8 h-8 bg-blue-600 text-white rounded-lg flex items-center justify-center font-bold text-xl shadow-md">A</div>
                    <span class="font-bold text-xl tracking-tight text-slate-900">Aneka<span class="text-blue-600">Interior</span></span>
                </a>
                <a href="/" class="text-sm font-semibold text-slate-500 hover:text-blue-600"><i class="fas fa-arrow-left mr-1"></i> Kembali ke Katalog</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <nav class="text-sm font-medium text-slate-500">
            <a href="/" class="hover:text-blue-600">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-slate-400">{{ $produk->kategori->nama_kategori ?? 'Umum' }}</span>
            <span class="mx-2">/</span>
            <span class="text-slate-800">{{ $produk->nama_produk }}</span>
        </nav>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="flex flex-col md:flex-row">
                
                <div class="w-full md:w-1/2 bg-slate-50 p-8 flex items-center justify-center border-b md:border-b-0 md:border-r border-slate-200">
                    <div class="w-full aspect-square bg-white rounded-2xl shadow-sm border border-slate-100 flex items-center justify-center">
                        <i class="fas {{ $produk->kategori->nama_kategori == 'Handuk' ? 'fa-bath' : 'fa-bed' }} text-9xl text-slate-200"></i>
                    </div>
                </div>

                <div class="w-full md:w-1/2 p-8 lg:p-10">
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-600 border border-blue-200 mb-4">
                        {{ $produk->kategori->nama_kategori ?? 'Umum' }}
                    </div>
                    
                    <h1 class="text-3xl font-extrabold text-slate-900 mb-2">{{ $produk->nama_produk }}</h1>
                    <p class="text-slate-500 font-medium mb-6">Tipe: {{ $produk->tipe_barang ?? 'Kualitas Premium' }}</p>

                    <div class="h-px bg-slate-100 w-full mb-6"></div>

                    <form action="#" method="GET">
                        @if($produk->kategori->bisa_custom)
                            <div class="mb-6 bg-slate-50 p-1.5 rounded-lg inline-flex w-full">
                                <label class="flex-1 text-center cursor-pointer">
                                    <input type="radio" name="jenis_pesanan" value="standar" class="peer sr-only" checked onchange="togglePesanan()">
                                    <div class="py-2.5 rounded-md text-sm font-bold text-slate-500 peer-checked:bg-white peer-checked:text-blue-600 peer-checked:shadow-sm transition-all">
                                        Ukuran Standar
                                    </div>
                                </label>
                                <label class="flex-1 text-center cursor-pointer">
                                    <input type="radio" name="jenis_pesanan" value="custom" class="peer sr-only" onchange="togglePesanan()">
                                    <div class="py-2.5 rounded-md text-sm font-bold text-slate-500 peer-checked:bg-white peer-checked:text-blue-600 peer-checked:shadow-sm transition-all">
                                        Ukuran Custom
                                    </div>
                                </label>
                            </div>
                        @else
                            <input type="hidden" name="jenis_pesanan" value="standar" id="jenis_pesanan">
                        @endif

                        <div id="area_standar" class="space-y-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Pilih Ukuran yang Tersedia</label>
                                <select id="pilih_varian" name="varian_id" class="w-full px-4 py-3 bg-white border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition-all shadow-sm">
                                    <option value="" data-harga="0">-- Pilih Ukuran --</option>
                                    @foreach($produk->varian as $var)
                                        <option value="{{ $var->id }}" data-harga="{{ $var->harga_reguler }}">
                                            {{ $var->ukuran }} 
                                            @if($var->tinggi) - Tinggi {{ $var->tinggi }}cm @endif 
                                            @if($var->keterangan_bantal) ({{ $var->keterangan_bantal }}) @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="area_custom" class="hidden space-y-4">
                            <div class="bg-amber-50 border border-amber-200 text-amber-700 p-4 rounded-xl text-sm leading-relaxed">
                                <i class="fas fa-info-circle mr-1"></i> <strong>Pesanan Custom:</strong> Silakan tulis detail ukuran yang Anda inginkan. Harga akan dihitungkan oleh Admin setelah pesanan masuk.
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Detail Ukuran Custom</label>
                                <textarea name="catatan_custom" rows="3" placeholder="Contoh: Tolong buatkan ukuran L155 P200 dengan Tinggi Kasur 28cm..." class="w-full px-4 py-3 bg-white border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition-all shadow-sm"></textarea>
                            </div>
                        </div>

                        <div class="mt-8 bg-slate-50 rounded-xl p-6 border border-slate-100 flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-slate-500 mb-1">Total Harga</p>
                                <div id="display_harga" class="text-3xl font-extrabold text-emerald-600">Rp 0</div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1 text-center">Jumlah</label>
                                <input type="number" name="qty" value="1" min="1" class="w-20 px-3 py-2 text-center bg-white border border-slate-300 rounded-lg outline-none font-bold">
                            </div>
                        </div>

                        <button type="button" onclick="alert('Fitur keranjang dan login akan segera hadir!')" class="mt-6 w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl transition-all shadow-lg hover:shadow-xl flex justify-center items-center gap-2 text-lg">
                            <i class="fas fa-shopping-cart"></i> Masukkan Keranjang
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Script untuk mengubah harga saat dropdown dipilih
        const selectVarian = document.getElementById('pilih_varian');
        const displayHarga = document.getElementById('display_harga');

        if(selectVarian) {
            selectVarian.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const harga = selectedOption.getAttribute('data-harga');
                
                if(harga && harga > 0) {
                    displayHarga.innerText = 'Rp ' + parseInt(harga).toLocaleString('id-ID');
                } else {
                    displayHarga.innerText = 'Rp 0';
                }
            });
        }

        // Script untuk pindah tab Standar vs Custom
        function togglePesanan() {
            const isStandar = document.querySelector('input[name="jenis_pesanan"]:checked').value === 'standar';
            const areaStandar = document.getElementById('area_standar');
            const areaCustom = document.getElementById('area_custom');
            
            if (isStandar) {
                areaStandar.classList.remove('hidden');
                areaCustom.classList.add('hidden');
                
                // Kembalikan harga sesuai dropdown yang aktif
                const selectedOption = selectVarian.options[selectVarian.selectedIndex];
                const harga = selectedOption.getAttribute('data-harga');
                displayHarga.innerText = (harga && harga > 0) ? 'Rp ' + parseInt(harga).toLocaleString('id-ID') : 'Rp 0';
                displayHarga.classList.remove('text-amber-600', 'text-xl');
                displayHarga.classList.add('text-emerald-600', 'text-3xl');
            } else {
                areaStandar.classList.add('hidden');
                areaCustom.classList.remove('hidden');
                
                // Ubah text harga jadi Menunggu Admin
                displayHarga.innerText = 'Menunggu Perhitungan Admin';
                displayHarga.classList.remove('text-emerald-600', 'text-3xl');
                displayHarga.classList.add('text-amber-600', 'text-xl');
            }
        }
    </script>
</body>
</html>