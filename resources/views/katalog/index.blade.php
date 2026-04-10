<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aneka Interior - Katalog Produk</title>
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
                <div class="flex-shrink-0 flex items-center gap-2">
                    <div class="w-8 h-8 bg-blue-600 text-white rounded-lg flex items-center justify-center font-bold text-xl shadow-md">
                        A
                    </div>
                    <span class="font-bold text-xl tracking-tight text-slate-900">Aneka<span class="text-blue-600"> Interior</span></span>
                </div>

                <div class="flex items-center gap-4">
                    <a href="#" class="relative p-2 text-slate-500 hover:text-blue-600 transition-colors">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/4 -translate-y-1/4 bg-rose-500 rounded-full">0</span>
                    </a>
                    @auth
                        <a href="/dashboard" class="text-sm font-semibold text-slate-600 hover:text-blue-600">Dashboard</a>
                    @else
                        <a href="/login" class="text-sm font-semibold text-white bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors shadow-sm">Masuk</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="bg-gradient-to-br from-blue-900 to-slate-900 py-16 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">Kenyamanan Hotel di Rumah Anda</h1>
            <p class="text-lg text-blue-100 max-w-2xl mx-auto mb-8 leading-relaxed">Spesialis penyedia Sprei, Bedcover, dan Handuk berkualitas standar hotel berbintang. Tersedia ukuran standar dan custom.</p>
            
            <div class="max-w-md mx-auto relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-search text-slate-400"></i>
                </div>
                <input type="text" placeholder="Cari produk (misal: Katun Jepang)..." class="w-full pl-11 pr-4 py-3 bg-white rounded-full shadow-lg outline-none focus:ring-4 focus:ring-blue-500/30 transition-all text-slate-700">
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <div class="flex flex-wrap justify-center gap-3 mb-10">
            <button class="px-5 py-2 bg-blue-600 text-white font-medium rounded-full shadow-sm hover:bg-blue-700 transition-colors">Semua Produk</button>
            @foreach($kategori as $kat)
                <button class="px-5 py-2 bg-white text-slate-600 border border-slate-200 font-medium rounded-full shadow-sm hover:border-blue-300 hover:text-blue-600 transition-all">
                    {{ $kat->nama_kategori }}
                </button>
            @endforeach
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($produk as $item)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group flex flex-col h-full">
                    
                    <div class="aspect-[4/3] bg-slate-100 relative overflow-hidden flex items-center justify-center border-b border-slate-100">
                        <i class="fas {{ $item->kategori->nama_kategori == 'Handuk' ? 'fa-bath' : 'fa-bed' }} text-5xl text-slate-300 group-hover:scale-110 transition-transform duration-500"></i>
                        <span class="absolute top-3 left-3 px-2.5 py-1 bg-white/90 backdrop-blur-sm text-xs font-bold text-slate-700 rounded-md shadow-sm border border-slate-100">
                            {{ $item->kategori->nama_kategori ?? 'Umum' }}
                        </span>
                    </div>
                    
                    <div class="p-5 flex flex-col flex-grow">
                        <h3 class="text-lg font-bold text-slate-800 mb-1 group-hover:text-blue-600 transition-colors line-clamp-2">
                            {{ $item->nama_produk }}
                        </h3>
                        <p class="text-sm text-slate-500 mb-4 line-clamp-1">{{ $item->tipe_barang ?? 'Kualitas Premium' }}</p>
                        
                        <div class="mt-auto pt-4 border-t border-slate-100 flex items-end justify-between">
                            <div>
                                <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold mb-0.5">Mulai Dari</p>
                                @php
                                    $hargaTermurah = $item->varian->min('harga_reguler');
                                @endphp
                                <p class="text-lg font-extrabold text-emerald-600">
                                    {{ $hargaTermurah ? 'Rp ' . number_format($hargaTermurah, 0, ',', '.') : 'Harga belum tersedia' }}
                                </p>
                            </div>
                        </div>

                        <a href="/produk/{{ $item->id }}/detail" class="mt-4 w-full block text-center bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white font-semibold py-2.5 rounded-lg transition-colors border border-blue-100 hover:border-blue-600">
                            Lihat Varian
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center text-slate-500">
                    <i class="fas fa-box-open text-5xl mb-4 text-slate-300"></i>
                    <h3 class="text-xl font-bold text-slate-700 mb-1">Katalog Kosong</h3>
                    <p>Maaf, saat ini belum ada produk yang tersedia.</p>
                </div>
            @endforelse
        </div>

    </div>
</body>
</html>