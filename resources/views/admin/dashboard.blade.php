@extends('layouts.app')

@section('konten')
<div class="max-w-7xl mx-auto">
    <div class="mb-8 animate-in fade-in duration-500">
        <h1 class="text-4xl font-bold mb-2 text-slate-900 hover:text-blue-600 transition-colors duration-300">
            Halo, {{ Auth::user()->name ?? 'Admin' }}
        </h1>
        <p class="text-slate-600 font-medium">Ringkasan bisnis Anda hari ini</p>
    </div>

    @php
        $stats = [
            ['label' => 'Pendapatan', 'value' => 'Rp 0', 'icon' => 'fa-arrow-trend-up', 'gradient' => 'emerald', 'valueColor' => 'text-emerald-600'],
            ['label' => 'Pengeluaran', 'value' => 'Rp 0', 'icon' => 'fa-arrow-trend-down', 'gradient' => 'rose', 'valueColor' => 'text-rose-600'],
            ['label' => 'Laba', 'value' => 'Rp 0', 'icon' => 'fa-dollar-sign', 'gradient' => 'blue', 'valueColor' => 'text-blue-600'],
            ['label' => 'Pesanan Aktif', 'value' => '0', 'icon' => 'fa-shopping-cart', 'gradient' => 'amber', 'valueColor' => 'text-amber-600'],
        ];

        $gradientColors = [
            'emerald' => 'from-emerald-50 to-emerald-100 group-hover:from-emerald-100 group-hover:to-emerald-200 border-emerald-200 group-hover:border-emerald-400 text-emerald-600 bg-emerald-100 text-emerald-600',
            'rose' => 'from-rose-50 to-rose-100 group-hover:from-rose-100 group-hover:to-rose-200 border-rose-200 group-hover:border-rose-400 text-rose-600 bg-rose-100 text-rose-600',
            'blue' => 'from-blue-50 to-blue-100 group-hover:from-blue-100 group-hover:to-blue-200 border-blue-200 group-hover:border-blue-400 text-blue-600 bg-blue-100 text-blue-600',
            'amber' => 'from-amber-50 to-amber-100 group-hover:from-amber-100 group-hover:to-amber-200 border-amber-200 group-hover:border-amber-400 text-amber-600 bg-amber-100 text-amber-600',
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @foreach ($stats as $index => $stat)
            @php 
                $colors = explode(' ', $gradientColors[$stat['gradient']]);
                $bgGradient = implode(' ', array_slice($colors, 0, 8));
                $iconColor = implode(' ', array_slice($colors, 8));
            @endphp
            
            <div class="group relative bg-white rounded-xl border border-slate-200 p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-2 cursor-pointer overflow-hidden animate-in fade-in duration-500">
                <div class="absolute inset-0 bg-gradient-to-r opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>

                <div class="relative flex items-start justify-between mb-4">
                    <p class="text-sm text-slate-600 font-semibold group-hover:text-slate-900 transition-colors duration-300">{{ $stat['label'] }}</p>
                    <div class="w-12 h-12 bg-gradient-to-br {{ $bgGradient }} rounded-xl flex items-center justify-center transition-all duration-300 group-hover:scale-110 group-hover:shadow-md">
                        <i class="fas {{ $stat['icon'] }} text-xl {{ $iconColor }} transition-transform duration-300 group-hover:rotate-12"></i>
                    </div>
                </div>

                <p class="text-3xl font-bold {{ $stat['valueColor'] }} transition-all duration-300 group-hover:text-4xl">{{ $stat['value'] }}</p>

                <div class="mt-4 h-1 bg-slate-100 rounded-full overflow-hidden opacity-0 group-hover:opacity-100 transition-all duration-300">
                    <div class="h-full bg-gradient-to-r from-blue-500 to-emerald-500 animate-pulse"></div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-8 shadow-md hover:shadow-xl transition-all duration-300 group animate-in fade-in duration-700">
        <h2 class="text-xl font-bold text-slate-900 mb-6 group-hover:text-blue-600 transition-colors duration-300">
            Pesanan Terbaru
        </h2>
        <div class="flex flex-col items-center justify-center py-12">
            <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all duration-300">
                <i class="fas fa-cart-shopping text-3xl text-white animate-bounce"></i>
            </div>
            <p class="text-slate-500 font-semibold group-hover:text-slate-700 transition-colors duration-300">Belum ada pesanan</p>
            <p class="text-slate-400 text-sm mt-1">Pesanan Anda akan muncul di sini</p>
        </div>
    </div>
</div>
@endsection