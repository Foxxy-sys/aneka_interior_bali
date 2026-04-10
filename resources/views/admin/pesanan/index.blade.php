@extends('layouts.app')

@section('konten')
<div class="max-w-7xl mx-auto">
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4 animate-in fade-in duration-500">
        <div>
            <h1 class="text-3xl font-bold mb-2 text-slate-900">Pesanan Masuk</h1>
            <p class="text-slate-600 font-medium">Pantau dan kelola semua pesanan dari pelanggan.</p>
        </div>
        
        <div class="flex gap-2">
            <button class="bg-white border border-slate-200 text-slate-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-50 shadow-sm">Semua</button>
            <button class="bg-amber-50 border border-amber-200 text-amber-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-amber-100 shadow-sm">Menunggu Harga</button>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden animate-in fade-in slide-in-from-bottom-4 duration-500">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-sm">
                        <th class="py-4 px-6 font-semibold">Tgl / Nomor PO</th>
                        <th class="py-4 px-6 font-semibold">Pelanggan</th>
                        <th class="py-4 px-6 font-semibold">Total Nilai</th>
                        <th class="py-4 px-6 font-semibold">Status Pesanan</th>
                        <th class="py-4 px-6 font-semibold">Status Bayar</th>
                        <th class="py-4 px-6 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse ($pesanan as $item)
                        <tr class="hover:bg-slate-50 transition-colors">
                            
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900">{{ $item->nomor_po }}</div>
                                <div class="text-xs text-slate-500 mt-1">{{ \Carbon\Carbon::parse($item->tanggal_pesan)->format('d M Y - H:i') }}</div>
                            </td>

                            <td class="py-4 px-6">
                                <div class="font-medium text-slate-800">{{ $item->user->name ?? 'User Tidak Dikenal' }}</div>
                                <div class="text-xs text-slate-500 mt-0.5">
                                    @if(isset($item->user->role) && $item->user->role == 'reseller')
                                        <span class="text-indigo-600 font-bold"><i class="fas fa-building mr-1"></i> Reseller</span>
                                    @else
                                        Reguler
                                    @endif
                                </div>
                            </td>

                            <td class="py-4 px-6">
                                @if($item->status_pesanan == 'menunggu_harga')
                                    <span class="text-sm font-semibold text-amber-500 italic">Menunggu Hitung</span>
                                @else
                                    <div class="font-bold text-emerald-600">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</div>
                                @endif
                            </td>

                            <td class="py-4 px-6">
                                @php
                                    $bg = 'bg-slate-100'; $text = 'text-slate-600'; $border = 'border-slate-200'; $icon = 'fa-clock';
                                    if($item->status_pesanan == 'menunggu_harga') { $bg = 'bg-amber-50'; $text = 'text-amber-600'; $border = 'border-amber-200'; $icon = 'fa-calculator'; }
                                    elseif($item->status_pesanan == 'pending') { $bg = 'bg-blue-50'; $text = 'text-blue-600'; $border = 'border-blue-200'; $icon = 'fa-hourglass-start'; }
                                    elseif($item->status_pesanan == 'proses_produksi') { $bg = 'bg-indigo-50'; $text = 'text-indigo-600'; $border = 'border-indigo-200'; $icon = 'fa-cut'; }
                                    elseif($item->status_pesanan == 'dikirim') { $bg = 'bg-teal-50'; $text = 'text-teal-600'; $border = 'border-teal-200'; $icon = 'fa-truck'; }
                                    elseif($item->status_pesanan == 'selesai') { $bg = 'bg-emerald-50'; $text = 'text-emerald-600'; $border = 'border-emerald-200'; $icon = 'fa-check-circle'; }
                                @endphp
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold {{ $bg }} {{ $text }} border {{ $border }}">
                                    <i class="fas {{ $icon }}"></i> {{ strtoupper(str_replace('_', ' ', $item->status_pesanan)) }}
                                </span>
                            </td>

                            <td class="py-4 px-6">
                                @php
                                    $payBg = 'bg-rose-50'; $payText = 'text-rose-600'; $payBorder = 'border-rose-200';
                                    if($item->status_pembayaran == 'dp') { $payBg = 'bg-amber-50'; $payText = 'text-amber-600'; $payBorder = 'border-amber-200'; }
                                    elseif($item->status_pembayaran == 'lunas') { $payBg = 'bg-emerald-50'; $payText = 'text-emerald-600'; $payBorder = 'border-emerald-200'; }
                                @endphp
                                <span class="inline-flex px-2.5 py-1 rounded-md text-[11px] font-bold {{ $payBg }} {{ $payText }} border {{ $payBorder }}">
                                    {{ strtoupper(str_replace('_', ' ', $item->status_pembayaran)) }}
                                </span>
                            </td>

                            <td class="py-4 px-6 text-right">
                                <a href="/admin/pesanan/{{ $item->id }}" class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white p-2.5 rounded-lg transition-colors shadow-sm" title="Lihat Detail Pesanan">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-500">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-clipboard-list text-5xl mb-4 text-slate-300"></i>
                                    <h3 class="text-lg font-bold text-slate-700 mb-1">Belum Ada Pesanan</h3>
                                    <p>Pesanan dari pelanggan akan muncul di sini.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection