<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Aneka Interior</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen font-sans py-10">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 border border-slate-200 transition-all hover:shadow-2xl">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                <i class="fas fa-user-plus text-2xl text-white"></i>
            </div>
            <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Buat Akun</h2>
            <p class="text-slate-500 mt-2 text-sm font-medium">Daftar untuk mulai memesan</p>
        </div>

        @if ($errors->any())
            <div class="bg-rose-50 border border-rose-200 text-rose-600 p-4 rounded-xl mb-6 text-sm flex items-start gap-3">
                <i class="fas fa-exclamation-circle mt-0.5"></i>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/register" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <i class="fas fa-user text-slate-400"></i>
                    </div>
                    <input type="text" name="name" value="{{ old('name') }}" required 
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-slate-700"
                        placeholder="John Doe">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-slate-400"></i>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" required 
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-slate-700"
                        placeholder="nama@email.com">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-slate-400"></i>
                    </div>
                    <input type="password" name="password" required 
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-slate-700"
                        placeholder="Minimal 8 karakter">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Konfirmasi Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <i class="fas fa-check-circle text-slate-400"></i>
                    </div>
                    <input type="password" name="password_confirmation" required 
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-slate-700"
                        placeholder="Ulangi password">
                </div>
            </div>

            <button type="submit" 
                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg flex justify-center items-center gap-2 group mt-6">
                <span>Daftar Sekarang</span>
                <i class="fas fa-paper-plane text-sm transition-transform group-hover:translate-x-1 group-hover:-translate-y-1"></i>
            </button>
        </form>

        <div class="mt-6 pt-6 border-t border-slate-100 text-center">
            <p class="text-sm text-slate-500">
                Sudah punya akun? 
                <a href="/login" class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">Masuk di sini</a>
            </p>
        </div>
    </div>

</body>
</html>