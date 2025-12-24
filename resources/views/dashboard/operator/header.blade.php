<header class="h-20 px-6 flex items-center justify-between header-premium sticky top-0 z-40"
        x-data="{ sidebar: false, avatarOpen: false, notifOpen: false, unreadCount: 3, notifications: [
            {id:1,message:'Notifikasi pertama'}, 
            {id:2,message:'Notifikasi kedua'}
        ] }">
    
    <button class="btn btn-ghost btn-circle lg:hidden" @click="sidebar = !sidebar">
        <i data-lucide="menu"></i>
    </button>

    <h1 class="text-xl font-semibold ml-2" x-text="activeMenu"></h1>

    <div class="flex items-center gap-4">
        <!-- NOTIFIKASI PREMIUM -->
        <div class="relative" @click.away="notifOpen = false">
            <button class="btn btn-ghost btn-circle relative" @click="notifOpen = !notifOpen">
                <i data-lucide="bell" class="w-6 h-6"></i>
                
                <!-- BADGE MERAH ANIMASI -->
                <span x-show="unreadCount > 0" 
                      class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-red-500 rounded-full animate-ping">
                </span>
                <span x-show="unreadCount > 0"
                      class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-red-500 rounded-full"
                      x-text="unreadCount">
                </span>
            </button>

            <ul x-show="notifOpen" x-transition
                class="absolute right-0 mt-3 w-64 bg-white shadow-xl rounded-xl border border-gray-100 z-50">
                <template x-for="notif in notifications" :key="notif.id">
                    <li class="p-3 border-b last:border-b-0 hover:bg-gray-100 rounded-lg cursor-pointer">
                        <span x-text="notif.message"></span>
                    </li>
                </template>
                <li x-show="notifications.length === 0" class="p-3 text-gray-500">Tidak ada notifikasi</li>
            </ul>
        </div>

        <!-- AVATAR -->
        <div class="relative" @click.away="avatarOpen = false">
            <div class="w-12 h-12 rounded-full avatar-premium font-bold shadow cursor-pointer hover:scale-105 transition
                        flex items-center justify-center overflow-hidden"
                 @click="avatarOpen = !avatarOpen">

                @if(auth()->user()->avatar_url)
                    <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="w-full h-full object-cover">
                @else
                    {{ strtoupper(substr(auth()->user()->name,0,2)) }}
                @endif

            </div>

            <ul x-show="avatarOpen" x-transition
                class="absolute right-0 mt-3 w-48 bg-white shadow-xl rounded-xl border border-gray-100 z-50">
                <li><a href="/dashboard/operator/profile" class="p-3 block hover:bg-gray-100 rounded-lg">Profil</a></li>
                <li><a href="/dashboard/operator/pengaturan" class="p-3 block hover:bg-gray-100 rounded-lg">Pengaturan</a></li>
                <li><a href="{{ route('logout') }}" class="p-3 block hover:bg-gray-100 rounded-lg text-red-500"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
            </ul>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</header>
