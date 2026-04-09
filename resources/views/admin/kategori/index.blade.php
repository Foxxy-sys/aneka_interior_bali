@extends('layouts.app')

@section('konten')
<div class="max-w-7xl mx-auto">
    <div class="mb-8 animate-in fade-in duration-500">
        <h1 class="text-3xl font-bold mb-2 text-slate-900">Manajemen Kategori</h1>
        <p class="text-slate-600 font-medium">Kelola jenis barang (Sprei, Handuk, dll) di toko Anda.</p>
    </div>

    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-600 p-4 rounded-xl mb-6 text-sm flex items-start gap-3 animate-in fade-in slide-in-from-top-2">
            <i class="fas fa-check-circle mt-0.5"></i>
            <p class="font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <div class="flex flex-col lg:flex-row gap-6">
        
        <div class="w-full lg:w-1/3">
            <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
                <h2 class="text-lg font-bold text-slate-800 mb-4 border-b border-slate-100 pb-2">Tambah Kategori Baru</h2>
                
                <form action="/kategori" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Nama Kategori</label>
                        <input type="text" name="nama_kategori" required placeholder="Contoh: Sprei, Bedcover..."
                            class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Apakah Bisa Custom Ukuran?</label>
                        <select name="bisa_custom" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                            <option value="1">Ya, bisa di-custom</option>
                            <option value="0">Tidak (Barang Jadi)</option>
                        </select>
                        <p class="text-xs text-slate-500 mt-1">*Pilih Ya jika barang perlu diproduksi/dijahit seperti Sprei.</p>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition-colors shadow-sm flex justify-center items-center gap-2">
                        <i class="fas fa-plus text-sm"></i> Simpan Kategori
                    </button>
                </form>
            </div>
        </div>

        <div class="w-full lg:w-2/3">
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-sm">
                                <th class="py-4 px-6 font-semibold">Nama Kategori</th>
                                <th class="py-4 px-6 font-semibold">Tipe Custom</th>
                                <th class="py-4 px-6 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @forelse ($kategori as $item)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-3 px-6 font-medium">{{ $item->nama_kategori }}</td>
                                    <td class="py-3 px-6">
                                        @if($item->bisa_custom)
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-emerald-50 text-emerald-600 border border-emerald-200">
                                                <i class="fas fa-cut"></i> Bisa Custom
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">
                                                <i class="fas fa-box"></i> Barang Jadi
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-6 text-right">
                                        <form action="/kategori/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini? Semua produk di dalamnya bisa ikut terhapus!');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-rose-500 hover:text-rose-700 hover:bg-rose-50 p-2 rounded-lg transition-colors" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-8 text-center text-slate-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <i class="fas fa-folder-open text-4xl mb-3 text-slate-300"></i>
                                            <p>Belum ada data kategori.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection