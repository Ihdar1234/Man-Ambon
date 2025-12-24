<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'PPDB MAN Ambon')</title>

  {{-- Vite untuk Tailwind CSS & JS --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="font-sans bg-base-100 text-gray-800 scroll-smooth">

  {{-- Navbar --}}
  @include('dashboard.partials.navbar')

  {{-- Konten halaman --}}
  <main>
    @yield('content')

    {{-- Konten khusus siswa --}}

        @include('dashboard.partials.hero')
        @include('dashboard.partials.alur')
        @include('dashboard.partials.informasi')
        @include('dashboard.partials.syarat')
        @include('dashboard.partials.kontak')
   
  </main>

  {{-- Footer --}}
  @include('dashboard.partials.footer')

  {{-- Script AOS dan efek interaktif --}}
 
  <script>
    AOS.init({ duration: 800 });

    window.addEventListener('scroll', () => {
      const nav = document.getElementById('navbar');
      if (window.scrollY > 50) {
        nav?.classList.add('shadow-md', 'bg-white/95');
      } else {
        nav?.classList.remove('shadow-md', 'bg-white/95');
      }
    });
  </script>
</body>
</html>
