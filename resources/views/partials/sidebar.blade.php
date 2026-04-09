<aside class="w-64 bg-gradient-to-b from-blue-600 to-blue-700 text-white flex flex-col shadow-lg">
    <div class="p-6 border-b border-blue-500/30">
        <h1 class="text-2xl font-bold tracking-tight">Aneka Interior</h1>
        <p class="text-xs text-blue-100 mt-1">Interior Design Studio</p>
    </div>

    <nav class="flex-1 p-4">
        <ul class="space-y-2">
            <li>
                <a href="/dashboard" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-300 font-medium relative overflow-hidden group {{ request()->is('dashboard') ? 'bg-blue-500 text-white shadow-md' : 'text-blue-100 hover:text-white' }}">
                    <i class="fas fa-tachometer-alt w-5 h-5 text-lg text-center transition-all duration-300 {{ request()->is('dashboard') ? 'scale-110' : 'group-hover:scale-110' }}"></i>
                    <span class="transition-all duration-300 {{ request()->is('dashboard') ? 'font-semibold' : 'group-hover:font-semibold' }}">Dashboard</span>
                    @if(request()->is('dashboard'))
                        <div class="ml-auto w-1 h-6 bg-white rounded-full"></div>
                    @endif
                </a>
            </li>

            <li>
                <a href="/kategori" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-300 font-medium relative overflow-hidden group {{ request()->is('kategori') ? 'bg-blue-500 text-white shadow-md' : 'text-blue-100 hover:text-white' }}">
                    <i class="fas fa-tags w-5 h-5 text-lg text-center transition-all duration-300 {{ request()->is('kategori') ? 'scale-110' : 'group-hover:scale-110' }}"></i>
                    <span class="transition-all duration-300 {{ request()->is('kategori') ? 'font-semibold' : 'group-hover:font-semibold' }}">Kategori</span>
                    @if(request()->is('kategori'))
                        <div class="ml-auto w-1 h-6 bg-white rounded-full"></div>
                    @endif
                </a>
            </li>

                        <li>
                <a href="/produk" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-300 font-medium relative overflow-hidden group {{ request()->is('produk') ? 'bg-blue-500 text-white shadow-md' : 'text-blue-100 hover:text-white' }}">
                    <i class="fas fa-box-open w-5 h-5 text-lg text-center transition-all duration-300 {{ request()->is('produk') ? 'scale-110' : 'group-hover:scale-110' }}"></i>
                    <span class="transition-all duration-300 {{ request()->is('produk') ? 'font-semibold' : 'group-hover:font-semibold' }}">Produk</span>
                    @if(request()->is('produk'))
                        <div class="ml-auto w-1 h-6 bg-white rounded-full"></div>
                    @endif
                </a>
            </li>

            <li>
                <a href="#" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-300 font-medium relative overflow-hidden group {{ request()->is('pesanan') ? 'bg-blue-500 text-white shadow-md' : 'text-blue-100 hover:text-white' }}">
                    <i class="fas fa-box w-5 h-5 text-lg text-center transition-all duration-300 {{ request()->is('pesanan') ? 'scale-110' : 'group-hover:scale-110' }}"></i>
                    <span class="transition-all duration-300 {{ request()->is('pesanan') ? 'font-semibold' : 'group-hover:font-semibold' }}">Pesanan</span>
                    @if(request()->is('pesanan'))
                        <div class="ml-auto w-1 h-6 bg-white rounded-full"></div>
                    @endif
                </a>
            </li>
        </ul>
    </nav>
</aside>    