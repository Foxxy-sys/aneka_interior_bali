<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Aneka Interior</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50">

    <div class="flex min-h-screen">
        @include('partials.sidebar')

        <div class="flex-1 flex flex-col">
            @include('partials.navbar')

            <main class="flex-1 p-8">
                @yield('konten')
            </main>
        </div>
    </div>
    
</body>
</html>