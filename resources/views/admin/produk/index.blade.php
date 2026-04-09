@extends('layouts.app')

@section('konten')
<div class="max-w-7xl mx-auto relative">
    <div class="mb-8 animate-in fade-in duration-500">
        <h1 class="text-3xl font-bold mb-2 text-slate-900">Manajemen Produk</h1>
        <p class="text-slate-600 font-medium">Kelola daftar produk yang ada di setiap kategori.</p>
    </div>

    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-600 p-4 rounded-xl mb-6 text-sm flex items-start gap-3 animate-in fade-in slide-in-from-top-2">
            <i class="fas fa-check-circle mt-0.5"></i>
            <p class="font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <div class="flex flex-col lg:flex-row gap-6">
        
        <div class="w-full lg:w-1/3">
            <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm sticky top-6">
                <h2 class="text-lg font-bold text-slate-800 mb-4 border-b border-slate-100 pb-2">Tambah Produk Baru</h2>
                
                <form action="/produk" method="POST" class="space-y-4">
                    @csrf
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Pilih Kategori</label>
                        <select name="kategori_id" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $kat)
                                <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Nama Produk</label>
                        <input type="text" name="nama_produk" required placeholder="Contoh: Sprei Katun Jepang"
                            class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Tipe / Merk (Opsional)</label>
                        <input type="text" name="tipe_barang" placeholder="Contoh: Motif Bunga / Polos"
                            class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                    </div>

                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition-colors shadow-sm flex justify-center items-center gap-2 mt-4">
                        <i class="fas fa-plus text-sm"></i> Simpan Produk
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
                                <th class="py-4 px-6 font-semibold">Nama Produk</th>
                                <th class="py-4 px-6 font-semibold">Kategori</th>
                                <th class="py-4 px-6 font-semibold">Tipe</th>
                                <th class="py-4 px-6 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @forelse ($produk as $item)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-3 px-6 font-medium text-slate-900">{{ $item->nama_produk }}</td>
                                    <td class="py-3 px-6">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-600 border border-blue-200">
                                            {{ $item->kategori->nama_kategori ?? 'Tidak Ada' }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-6 text-sm text-slate-500">{{ $item->tipe_barang ?? '-' }}</td>
                                    <td class="py-3 px-6 text-right flex justify-end gap-2 items-center">
                                        
                                        <a href="/produk/{{ $item->id }}/varian" class="bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white px-3 py-2 rounded-lg transition-colors shadow-sm flex items-center gap-2 text-sm font-medium" title="Kelola Ukuran">
                                            <i class="fas fa-ruler-combined"></i> Ukuran
                                        </a>

                                        <button type="button" onclick="openEditModalProduk({{ $item->id }}, {{ $item->kategori_id }}, '{{ addslashes($item->nama_produk) }}', '{{ addslashes($item->tipe_barang) }}')" class="text-amber-500 hover:text-amber-700 hover:bg-amber-50 p-2 rounded-lg transition-colors" title="Edit Produk">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <form action="/produk/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini beserta semua ukurannya?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-rose-500 hover:text-rose-700 hover:bg-rose-50 p-2 rounded-lg transition-colors" title="Hapus Produk">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-8 text-center text-slate-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <i class="fas fa-box-open text-4xl mb-3 text-slate-300"></i>
                                            <p>Belum ada data produk.</p>
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

<div id="editModalProduk" class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-sm flex items-center justify-center overflow-y-auto overflow-x-hidden p-4 md:p-0">
    <div class="relative bg-white rounded-xl shadow-lg w-full max-w-md p-6 animate-in zoom-in duration-200">
        
        <div class="flex justify-between items-center mb-5 border-b border-slate-100 pb-3">
            <h3 class="text-lg font-bold text-slate-800">Edit Data Produk</h3>
            <button onclick="closeEditModalProduk()" class="text-slate-400 hover:text-slate-600 p-1">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <form id="editFormProduk" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Pilih Kategori</label>
                <select id="edit_kategori_id" name="kategori_id" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Nama Produk</label>
                <input type="text" id="edit_nama_produk" name="nama_produk" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Tipe / Merk</label>
                <input type="text" id="edit_tipe_barang" name="tipe_barang" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
            </div>

            <div class="flex gap-3 pt-4 border-t border-slate-100 mt-6">
                <button type="button" onclick="closeEditModalProduk()" class="w-1/2 px-4 py-2 text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg font-medium transition-colors">Batal</button>
                <button type="submit" class="w-1/2 px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg font-medium transition-colors">Simpan Perubahan</button>
            </div>
        </form>

    </div>
</div>

<script>
    function openEditModalProduk(id, kategori_id, nama_produk, tipe_barang) {
        // Tampilkan Modal
        document.getElementById('editModalProduk').classList.remove('hidden');
        
        // Atur URL action form
        document.getElementById('editFormProduk').action = '/produk/' + id;
        
        // Isi data ke form edit
        document.getElementById('edit_kategori_id').value = kategori_id;
        document.getElementById('edit_nama_produk').value = nama_produk;
        // Kalau tipe barang aslinya null/kosong tapi tersimpan '-', kita tampilkan apa adanya
        document.getElementById('edit_tipe_barang').value = tipe_barang === '-' ? '' : tipe_barang;
    }

    function closeEditModalProduk() {
        // Sembunyikan Modal
        document.getElementById('editModalProduk').classList.add('hidden');
    }
</script>
@endsection