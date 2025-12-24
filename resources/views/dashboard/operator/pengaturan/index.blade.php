@extends('dashboard.operator.app')

@section('content')
<div class="p-6 space-y-10">

    {{-- TITLE --}}
    <div>
        <h1 class="text-4xl font-extrabold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">
            Pengaturan
        </h1>
        <p class="text-gray-500 mt-1 text-sm tracking-wide">
            Sesuaikan preferensi tampilan & konfigurasi aplikasi.
        </p>
    </div>

    {{-- CARD --}}
    <div class="bg-white/60 dark:bg-white/10 backdrop-blur-2xl shadow-xl border border-gray-200/60 
                dark:border-white/5 rounded-3xl p-10 transition-all duration-300">

        <div class="grid md:grid-cols-2 gap-8">

            {{-- Tema --}}
            <div class="group flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-white/5 transition-all">
                <div class="w-12 h-12 flex items-center justify-center rounded-2xl 
                            bg-gradient-to-br from-purple-500 to-indigo-500 text-white
                            group-hover:scale-110 transition-all duration-200 shadow-lg">
                    <i data-lucide="palette" class="w-6 h-6"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">
                        Tema Aplikasi
                    </h2>
                    <p class="text-gray-500 dark:text-gray-400 leading-relaxed mt-1">
                        Atur preferensi tampilan, mode terang & gelap, serta gaya visual aplikasi.
                    </p>
                </div>
            </div>

            {{-- Notifikasi --}}
            <div class="group flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-white/5 transition-all">
                <div class="w-12 h-12 flex items-center justify-center rounded-2xl 
                            bg-gradient-to-br from-pink-500 to-rose-500 text-white
                            group-hover:scale-110 transition-all duration-200 shadow-lg">
                    <i data-lucide="bell" class="w-6 h-6"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">
                        Notifikasi
                    </h2>
                    <p class="text-gray-500 dark:text-gray-400 leading-relaxed mt-1">
                        Kelola pengaturan pemberitahuan untuk setiap aktivitas di aplikasi.
                    </p>
                </div>
            </div>

            {{-- Keamanan --}}
            <div class="group flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-white/5 transition-all">
                <div class="w-12 h-12 flex items-center justify-center rounded-2xl 
                            bg-gradient-to-br from-emerald-500 to-teal-500 text-white
                            group-hover:scale-110 transition-all duration-200 shadow-lg">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">
                        Keamanan
                    </h2>
                    <p class="text-gray-500 dark:text-gray-400 leading-relaxed mt-1">
                        Pengaturan keamanan akun dasar seperti kata sandi dan autentikasi.
                    </p>
                </div>
            </div>

            {{-- Sistem --}}
            <div class="group flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-white/5 transition-all">
                <div class="w-12 h-12 flex items-center justify-center rounded-2xl 
                            bg-gradient-to-br from-blue-500 to-cyan-500 text-white
                            group-hover:scale-110 transition-all duration-200 shadow-lg">
                    <i data-lucide="cpu" class="w-6 h-6"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">
                        Informasi Sistem
                    </h2>
                    <p class="text-gray-500 dark:text-gray-400 leading-relaxed mt-1">
                        Lihat informasi versi, konfigurasi server, dan status aplikasi.
                    </p>
                </div>
            </div>

        </div>

    </div>

</div>



@endsection
