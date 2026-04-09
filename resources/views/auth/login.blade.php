<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aneka Interior</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen font-sans">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 border border-slate-200 transition-all hover:shadow-2xl">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                <i class="fas fa-couch text-2xl text-white"></i>
            </div>
            <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Aneka Interior</h2>
            <p class="text-slate-500 mt-2 text-sm font-medium">Silakan masuk ke akun Anda</p>
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

        @if (session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-600 p-4 rounded-xl mb-6 text-sm flex items-start gap-3">
                <i class="fas fa-check-circle mt-0.5"></i>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <form action="/login" method="POST" class="space-y-5">
            @csrf
            
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
                        placeholder="••••••••">
                </div>
                <div class="flex items-center justify-between pt-1">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" 
                            class="w-4 h-4 text-blue-600 bg-slate-50 border-slate-300 rounded focus:ring-blue-500 cursor-pointer transition-colors">
                        <label for="remember" class="ml-2 text-sm text-slate-600 font-medium cursor-pointer select-none">
                            Ingat Saya
                        </label>
                    </div>
                    
                    <a href="#" class="text-sm text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                        Lupa password?
                    </a>
                </div>
            </div>

            <button type="submit" 
                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg flex justify-center items-center gap-2 group">
                <span>Masuk</span>
                <i class="fas fa-arrow-right text-sm transition-transform group-hover:translate-x-1"></i>
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-slate-100 text-center">
            <p class="text-sm text-slate-500">
                Belum punya akun? 
                <a href="/register" class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">Daftar sekarang</a>
            </p>
        </div>
    </div>

</body>
</html>