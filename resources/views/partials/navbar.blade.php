<header class="bg-white border-b border-slate-200 shadow-sm">
    <div class="px-8 py-4 flex items-center justify-between">
        <div>
            <p class="text-sm text-slate-500 font-medium">Selamat datang kembali</p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center gap-2 px-4 py-2 text-slate-600 hover:bg-red-50 hover:text-red-600 rounded-lg transition-all duration-200 font-medium group hover:shadow-md active:scale-95">
                <span>Logout</span>
                <i data-lucide="log-out" class="w-4 h-4 transition-all group-hover:rotate-12 group-active:scale-90"></i>
            </button>
        </form>
    </div>
</header>