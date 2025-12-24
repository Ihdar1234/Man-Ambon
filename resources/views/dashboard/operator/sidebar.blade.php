<aside class="fixed lg:static inset-y-0 z-50 sidebar-premium text-white flex flex-col
              bg-gradient-to-b from-indigo-800 to-purple-900 shadow-xl transition-all duration-300
              h-screen"
       :class="sidebar ? 'w-80' : 'w-0 lg:w-28'" 
       x-data="dashboard">

    <!-- LOGO -->
    <template x-if="sidebar">
        <div class="flex items-center gap-3 p-5 border-b border-white/20 bg-white/5 backdrop-blur-md flex-shrink-0">
            <div class="w-12 h-12 rounded-2xl overflow-hidden bg-white/20 backdrop-blur-lg
                        flex items-center justify-center shadow-xl transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('storage/image/sejarah.jpg') }}" 
                     alt="Man Ambon" 
                     class="w-full h-full object-cover">
            </div>
            <span class="text-lg md:text-xl font-semibold tracking-wide text-white transition-opacity duration-300">
                Operator
            </span>
        </div>
    </template>

    <!-- MENU -->
    <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1 transition-all duration-300">
        <template x-for="menu in menus" :key="menu.name">
            <div>
                <!-- Menu Utama -->
                <a href="javascript:void(0)" 
                   @click="menu.submenus ? menu.open = !menu.open : window.location.href = menu.route"
                   :class="{'menu-active': window.location.pathname === menu.route}"
                   class="flex items-center gap-3 p-3 rounded-xl transition cursor-pointer">
                    <i :data-lucide="menu.icon" class="w-5 h-5"></i>
                    <span x-show="sidebar" x-transition class="text-sm font-medium" x-text="menu.name"></span>
                    <template x-if="menu.submenus && sidebar">
                        <i data-lucide="chevron-down" class="ml-auto w-4 h-4"
                           :class="{'rotate-180': menu.open, 'transition-transform': true}"></i>
                    </template>
                </a>

                <!-- Submenu -->
                <div x-show="menu.submenus && menu.open" 
                     x-collapse
                     class="ml-8 mt-1 space-y-1">
                    <template x-for="sub in menu.submenus" :key="sub.name">
                        <a :href="sub.route"
                           @click="if(!isDesktop) sidebar=false"
                           class="block px-3 py-2 rounded-xl text-sm font-medium hover:bg-white/10 transition">
                            <span x-text="sub.name"></span>
                        </a>
                    </template>
                </div>
            </div>
        </template>
    </nav>
</aside>



<script>
function dashboard() {
    return {
        sidebar: false,
        isDesktop: window.innerWidth >= 1024,
        avatarOpen: false,
        menus: [
            { name: 'Dashboard', route: '/dashboard/operator/home', icon: 'home' },
            { name: 'Pengajuan', route: '/dashboard/operator/pengajuan', icon: 'file-text' },
            {
                name: 'Layanan', icon: 'grid', open: false,
                submenus: [
                    { name: 'Surat Keterangan Aktif', route: '/operator/layanan/surat-keterangan-aktif' },
                    { name: 'Legalisir Ijazah', route: '/operator/layanan/legalisir-ijazah' },
                    { name: 'Surat Keterangan Lulus', route: '/operator/layanan/surat-keterangan-lulus' },
                    { name: 'Surat Izin Tidak Masuk', route: '/operator/layanan/surat-izin-tidak-masuk' },
                    { name: 'Pindah Masuk / Keluar', route: '/operator/layanan/pindah-masuk-keluar' },
                    { name: 'Beasiswa', route: '/operator/layanan/beasiswa' },
                    { name: 'Peminjaman Ruangan', route: '/operator/layanan/peminjaman-ruangan' },
                    { name: 'Proposal Kegiatan', route: '/operator/layanan/proposal-kegiatan' },
                    { name: 'Surat Tugas', route: '/operator/layanan/surat-tugas' },
                    { name: 'Cuti Guru', route: '/operator/layanan/cuti-guru' },
                    { name: 'Pengaduan Masyarakat', route: '/operator/layanan/pengaduan-masyarakat' },
                    { name: 'Surat Keterangan Anak Bersekolah', route: '/operator/layanan/surat-keterangan-anak-bersekolah' },
                    { name: 'Slip Pembayaran SPP', route: '/operator/layanan/slip-pembayaran-spp' },
                    { name: 'Keringanan Pembayaran', route: '/operator/layanan/keringanan-pembayaran' },
                    { name: 'Tunggakan SPP', route: '/operator/layanan/tunggakan-spp' },
                ]
            },
            { name: 'Settings', route: '/dashboard/operator/pengaturan', icon: 'settings' },
            { name: 'Users', route: '/dashboard/operator/users', icon: 'users' },
        ],
        init() {
            const updateView = () => {
                this.isDesktop = window.innerWidth >= 1024;
                this.sidebar = this.isDesktop;
            };
            updateView();
            window.addEventListener('resize', updateView);
            this.$nextTick(() => lucide.createIcons());
        }
    }
}
document.addEventListener('alpine:init', () => {
    Alpine.data('dashboard', dashboard);
});
</script>
