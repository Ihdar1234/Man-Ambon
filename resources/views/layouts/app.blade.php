<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: false }" :class="{ 'dark': darkMode }">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title ?? 'MAN Ambon' }}</title>

  {{-- Vite untuk Tailwind & JS --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Plugins & Libraries --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="transition-colors duration-500 bg-base-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 font-sans">

  {{-- Navbar --}}
  <div class="sticky top-0 z-50 shadow-md">
    @include('layouts.navbar')
  </div>

  {{-- Konten Dinamis --}}
  <main class="flex-grow pt-8 md:pt-8">
    <div class="container mx-auto px-4 md:px-6 lg:px-8">
        @yield('content')
    </div>
  </main>

  {{-- Footer --}}
  <footer class="mt-12 bg-base-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300 py-6 shadow-inner">
    @include('layouts.footer')
  </footer>

  {{-- Scripts --}}
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

  <script>
    // AOS Init
    AOS.init({ duration: 1000, once: true });
    
    // Lightbox sederhana
    function openLightbox(img) {
      const box = document.createElement('div');
      box.className = "fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 p-4";
      box.innerHTML = `<img src="${img}" class="max-h-[90%] max-w-[90%] rounded-lg shadow-lg cursor-pointer" onclick="this.parentElement.remove()">`;
      document.body.appendChild(box);
    }

    // Swiper slider
    var swiper = new Swiper(".mySwiper2", {
      loop: true,
      autoplay: { delay: 4000, disableOnInteraction: false },
      pagination: { el: ".swiper-pagination", clickable: true },
      navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
      effect: "slide",
    });

    // Voting AJAX
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.vote-btn').forEach(btn => {
            btn.addEventListener('click', async function () {
                const container = this.closest('.vote-container');
                const slug = container.dataset.artikel;
                const voteType = this.dataset.type;

                const res = await fetch(`/artikel/${slug}/vote`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ vote_type: voteType })
                });

                const data = await res.json();

                if (data.status === 'ok') {
                    container.querySelector('.like-count').textContent = data.counts.like;
                    container.querySelector('.dislike-count').textContent = data.counts.dislike;
                    container.querySelector('.suka-count').textContent = data.counts.suka;
                }
            });
        });
    });
  </script>

  <style>
    /* Animations */
    @keyframes fade-in-down { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes fade-in-up { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .animate-fade-in-down { animation: fade-in-down 0.7s ease-out both; }
    .animate-fade-in-up { animation: fade-in-up 0.7s ease-out both; }

    /* Custom scrollbar */
    body::-webkit-scrollbar { width: 8px; }
    body::-webkit-scrollbar-thumb { background-color: rgba(34,197,94,0.5); border-radius: 4px; }
    body::-webkit-scrollbar-track { background: transparent; }
  </style>
</body>
</html>
