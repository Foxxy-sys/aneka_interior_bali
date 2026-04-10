<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Aneka Interior</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body class="text-slate-800 antialiased flex flex-col min-h-screen">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="flex-shrink-0 flex items-center gap-2">
                    <div class="w-8 h-8 bg-blue-600 text-white rounded-lg flex items-center justify-center font-bold text-xl shadow-md">A</div>
                    <span class="font-bold text-xl tracking-tight text-slate-900">Aneka<span class="text-blue-600">Interior</span></span>
                </a>
                <a href="/" class="text-sm font-semibold text-slate-500 hover:text-blue-600"><i class="fas fa-arrow-left mr-1"></i> Lanjut Belanja</a>
            </div>
        </div>
    </nav>

    <div class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
        <h1 class="text-3xl font-extrabold text-slate-900 mb-8">Keranjang Belanja</h1>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <div class="w-full lg:w-2/3 space-y-4">
                
                <div class="bg-white rounded-2xl border border-slate-200 p-5 flex flex-col sm:flex-row gap-5 items-start sm:items-center shadow-sm">
                    <div class="w-24 h-24 bg-slate-100 rounded-xl flex items-center justify-center border border-slate-200 flex-shrink-0">
                        <i class="fas fa-bed text-3xl text-slate-300"></i>
                    </div>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-lg text-slate-800">Sprei Cotton Japan</h3>
                                <p class="text-sm text-slate-500 mb-2">Ukuran: L160 P200 - Tinggi 30cm (2B/2G)</p>
                            </div>
                            <button class="text-slate-400 hover:text-rose-500 transition-colors" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                        </div>
                        <div class="flex justify-between items-end mt-2">
                            <div class="flex items-center border border-slate-200 rounded-lg">
                                <button class="px-3 py-1 text-slate-500 hover:bg-slate-50 rounded-l-lg">-</button>
                                <input type="text" value="1" class="w-10 text-center font-semibold text-sm outline-none border-x border-slate-200" readonly>
                                <button class="px-3 py-1 text-slate-500 hover:bg-slate-50 rounded-r-lg">+</button>
                            </div>
                            <p class="font-extrabold text-slate-800 text-lg">Rp 290.000</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 p-5 flex flex-col sm:flex-row gap-5 items-start sm:items-center shadow-sm relative overflow-hidden">
                    <div class="absolute top-3 left-0 bg-amber-500 text-white text-[10px] font-bold px-3 py-0.5 rounded-r-full shadow-sm">CUSTOM PESANAN</div>
                    
                    <div class="w-24 h-24 bg-slate-100 rounded-xl flex items-center justify-center border border-slate-200 flex-shrink-0 mt-2">
                        <i class="fas fa-cut text-3xl text-slate-300"></i>
                    </div>
                    <div class="flex-grow mt-2 sm:mt-0">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-lg text-slate-800">Sprei TC 300</h3>
                                <p class="text-sm text-slate-500 mb-1">Ukuran Custom: L155 P200 Tinggi 28cm (Motif Stripe)</p>
                            </div>
                            <button class="text-slate-400 hover:text-rose-500 transition-colors" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                        </div>
                        <div class="flex justify-between items-end mt-2">
                            <div class="flex items-center border border-slate-200 rounded-lg">
                                <button class="px-3 py-1 text-slate-500 hover:bg-slate-50 rounded-l-lg" disabled>-</button>
                                <input type="text" value="1" class="w-10 text-center font-semibold text-sm outline-none border-x border-slate-200 bg-slate-50" readonly>
                                <button class="px-3 py-1 text-slate-500 hover:bg-slate-50 rounded-r-lg" disabled>+</button>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-amber-600 text-sm">Menunggu Harga</p>
                                <p class="text-xs text-slate-400">Dihitung oleh Admin</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm sticky top-24">
                    <h3 class="font-bold text-lg text-slate-800 mb-4 border-b border-slate-100 pb-3">Ringkasan Belanja</h3>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-sm text-slate-600">
                            <span>Total Harga (1 Barang)</span>
                            <span class="font-medium text-slate-800">Rp 290.000</span>
                        </div>
                        <div class="flex justify-between text-sm text-amber-600 bg-amber-50 p-2 rounded-lg border border-amber-100">
                            <span>Barang Custom (1 Barang)</span>
                            <span class="font-medium">Menunggu Admin</span>
                        </div>
                    </div>

                    <div class="border-t border-slate-200 pt-4 mb-6">
                        <div class="flex justify-between items-end">
                            <span class="font-bold text-slate-800">Total Sementara</span>
                            <span class="font-extrabold text-2xl text-emerald-600">Rp 290.000</span>
                        </div>
                        <p class="text-xs text-slate-500 mt-2">*Total akhir akan diupdate setelah admin menghitung pesanan custom Anda.</p>
                    </div>

                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-xl transition-all shadow-lg hover:shadow-xl flex justify-center items-center gap-2">
                        Checkout Sekarang <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>

</body>
</html>