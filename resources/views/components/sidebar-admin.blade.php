<aside class="fixed inset-y-0 left-0 w-64 z-50 transform transition-transform duration-300 ease-in-out
             bg-gradient-to-b from-indigo-600/80 via-purple-600/80 to-pink-600/80 
             backdrop-blur-md shadow-lg shadow-black/30 ring-1 ring-white/10"
      :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:-ml-64'"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="-translate-x-full"
      x-transition:enter-end="translate-x-0"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="translate-x-0"
      x-transition:leave-end="-translate-x-full">

  <div class="flex items-center justify-between p-4 border-b border-white/10">
    <h2 class="text-xl font-bold text-white">My App</h2>
    <!-- Tombol Close -->
    <button class="p-2 rounded-md text-white/80 hover:bg-white/10 lg:hidden"
            @click="sidebarOpen = false">
      ✖
    </button>
  </div>

  <nav class="p-4 space-y-2">
    <!-- Dashboard -->
    <a href="#"
       :class="activeMenu === 'dashboard'
                ? 'relative block px-4 py-2 font-semibold text-white rounded-lg border border-white/30 overflow-hidden'
                : 'block px-4 py-2 text-white/80 hover:bg-white/10 border border-white/10 rounded-lg transition-all duration-300 ease-in-out'"
       @click="activeMenu = 'dashboard'">
       <span :class="activeMenu === 'dashboard'
                    ? 'absolute inset-0 bg-gradient-to-r from-yellow-400 via-orange-400 to-pink-500 animate-gradient opacity-20 rounded-lg'
                    : ''"></span>
       <span class="relative z-10">Dashboard</span>
    </a>

    <!-- Users -->
    <a href="#"
       :class="activeMenu === 'users'
                ? 'relative block px-4 py-2 font-semibold text-white rounded-lg border border-white/30 overflow-hidden'
                : 'block px-4 py-2 text-white/80 hover:bg-white/10 border border-white/10 rounded-lg transition-all duration-300 ease-in-out'"
       @click="activeMenu = 'users'">
       <span :class="activeMenu === 'users'
                    ? 'absolute inset-0 bg-gradient-to-r from-green-400 via-blue-400 to-purple-500 animate-gradient opacity-20 rounded-lg'
                    : ''"></span>
       <span class="relative z-10">Users</span>
    </a>

    <!-- Settings -->
    <a href="#"
       :class="activeMenu === 'settings'
                ? 'relative block px-4 py-2 font-semibold text-white rounded-lg border border-white/30 overflow-hidden'
                : 'block px-4 py-2 text-white/80 hover:bg-white/10 border border-white/10 rounded-lg transition-all duration-300 ease-in-out'"
       @click="activeMenu = 'settings'">
       <span :class="activeMenu === 'settings'
                    ? 'absolute inset-0 bg-gradient-to-r from-pink-400 via-red-400 to-yellow-500 animate-gradient opacity-20 rounded-lg'
                    : ''"></span>
       <span class="relative z-10">Settings</span>
    </a>
  </nav>
</aside>
