@extends('layouts.app')

@section('konten')
<div class="max-w-7xl mx-auto relative">
    
    <a href="/produk" class="inline-flex items-center gap-2 text-slate-500 hover:text-blue-600 transition-colors font-medium mb-6">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Produk
    </a>

    <div class="mb-8 animate-in fade-in duration-500">
        <h1 class="text-3xl font-bold mb-2 text-slate-900">Kelola Ukuran: <span class="text-blue-600">{{ $produk->nama_produk }}</span></h1>
        <p class="text-slate-600 font-medium">Kategori: {{ $produk->kategori->nama_kategori ?? '-' }} | Tipe: {{ $produk->tipe_barang ?? '-' }}</p>
    </div>

    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-600 p-4 rounded-xl mb-6 text-sm flex items-start gap-3">
            <i class="fas fa-check-circle mt-0.5"></i>
            <p class="font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <div class="flex flex-col lg:flex-row gap-6">
        
        <div class="w-full lg:w-1/3">
            <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm sticky top-6">
                <h2 class="text-lg font-bold text-slate-800 mb-4 border-b border-slate-100 pb-2">Tambah Varian Baru</h2>
                
                <form action="/produk/{{ $produk->id }}/varian" method="POST" class="space-y-4">
                    @csrf
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Ukuran</label>
                        <input type="text" name="ukuran" required placeholder="Contoh: 180x200 / Super King"
                            class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Tinggi Kasur (cm) - <span class="text-slate-400 font-normal">Opsional</span></label>
                        <select name="tinggi" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                            <option value="">-- Tidak ada tinggi --</option>
                            <option value="24">24 cm</option>
                            <option value="30">30 cm</option>
                            <option value="35">35 cm</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Keterangan Bantal/Guling (Opsional)</label>
                        <input type="text" name="keterangan_bantal" placeholder="Contoh: 2 Bantal 2 Guling"
                            class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Harga Reguler</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-slate-500 font-medium text-sm">Rp</span>
                                </div>
                                <input type="number" name="harga_reguler" required min="0" placeholder="0"
                                    class="w-full pl-9 pr-3 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all text-sm">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Harga Reseller</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-slate-500 font-medium text-sm">Rp</span>
                                </div>
                                <input type="number" name="harga_reseller" required min="0" placeholder="0"
                                    class="w-full pl-9 pr-3 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all text-sm">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition-colors shadow-sm flex justify-center items-center gap-2 mt-4">
                        <i class="fas fa-save text-sm"></i> Simpan Ukuran
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
                                <th class="py-4 px-6 font-semibold">Ukuran</th>
                                <th class="py-4 px-6 font-semibold">Tinggi</th>
                                <th class="py-4 px-6 font-semibold">Detail</th>
                                <th class="py-4 px-6 font-semibold">Harga</th>
                                <th class="py-4 px-6 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @forelse ($produk->varian as $item)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-3 px-6 font-bold text-slate-900">{{ $item->ukuran }}</td>
                                    <td class="py-3 px-6 font-medium text-slate-700">{{ $item->tinggi ? $item->tinggi . ' cm' : '-' }}</td>
                                    <td class="py-3 px-6 text-sm text-slate-500">{{ $item->keterangan_bantal ?? '-' }}</td>
                                    <td class="py-3 px-6">
                                        <div class="font-medium text-emerald-600">Rp {{ number_format($item->harga_reguler, 0, ',', '.') }}</div>
                                        <div class="text-xs text-slate-500 mt-0.5">Reseller: Rp {{ number_format($item->harga_reseller, 0, ',', '.') }}</div>
                                    </td>
                                    <td class="py-3 px-6 text-right flex justify-end gap-2">
                                        
                                        <button type="button" onclick="openEditModal({{ $item->id }}, '{{ $item->ukuran }}', '{{ $item->tinggi }}', '{{ $item->keterangan_bantal }}', {{ $item->harga_reguler }}, {{ $item->harga_reseller }})" class="text-blue-500 hover:text-blue-700 hover:bg-blue-50 p-2 rounded-lg transition-colors" title="Edit Ukuran">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <form action="/varian/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus ukuran ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-rose-500 hover:text-rose-700 hover:bg-rose-50 p-2 rounded-lg transition-colors" title="Hapus Ukuran">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-slate-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <i class="fas fa-ruler-combined text-4xl mb-3 text-slate-300"></i>
                                            <p>Belum ada ukuran yang ditambahkan untuk produk ini.</p>
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

<div id="editModal" class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-sm flex items-center justify-center overflow-y-auto overflow-x-hidden p-4 md:p-0">
    <div class="relative bg-white rounded-xl shadow-lg w-full max-w-md p-6 animate-in zoom-in duration-200">
        
        <div class="flex justify-between items-center mb-5 border-b border-slate-100 pb-3">
            <h3 class="text-lg font-bold text-slate-800">Edit Data Ukuran</h3>
            <button onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600 p-1">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <form id="editForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Ukuran</label>
                <input type="text" id="edit_ukuran" name="ukuran" required class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Tinggi Kasur (cm)</label>
                <select id="edit_tinggi" name="tinggi" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                    <option value="">-- Tidak ada tinggi --</option>
                    <option value="24">24 cm</option>
                    <option value="30">30 cm</option>
                    <option value="35">35 cm</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Keterangan Bantal/Guling</label>
                <input type="text" id="edit_detail" name="keterangan_bantal" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Harga Reguler</label>
                    <input type="number" id="edit_reguler" name="harga_reguler" required min="0" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Harga Reseller</label>
                    <input type="number" id="edit_reseller" name="harga_reseller" required min="0" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition-all text-sm">
                </div>
            </div>

            <div class="flex gap-3 pt-4 border-t border-slate-100 mt-6">
                <button type="button" onclick="closeEditModal()" class="w-1/2 px-4 py-2 text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg font-medium transition-colors">Batal</button>
                <button type="submit" class="w-1/2 px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg font-medium transition-colors">Simpan Perubahan</button>
            </div>
        </form>

    </div>
</div>

<script>
    function openEditModal(id, ukuran, tinggi, detail, reguler, reseller) {
        // Tampilkan Modal
        document.getElementById('editModal').classList.remove('hidden');
        
        // Atur URL action form supaya mengarah ke ID yang benar
        document.getElementById('editForm').action = '/varian/' + id;
        
        // Isi data lama ke dalam input form
        document.getElementById('edit_ukuran').value = ukuran;
        document.getElementById('edit_tinggi').value = tinggi;
        document.getElementById('edit_detail').value = detail;
        document.getElementById('edit_reguler').value = reguler;
        document.getElementById('edit_reseller').value = reseller;
    }

    function closeEditModal() {
        // Sembunyikan Modal
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
@endsection