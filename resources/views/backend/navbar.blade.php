<header :class="[
          'fixed top-0 right-0 left-0 flex items-center justify-between px-4 py-3 transition-all duration-300 z-40',
          sidebarOpen ? 'lg:left-64' : 'lg:left-0',
          scrolled 
            ? 'bg-gradient-to-r from-indigo-700 via-purple-700 to-pink-700 shadow-lg ring-1 ring-white/10' 
            : 'bg-gradient-to-r from-indigo-600/80 via-purple-600/80 to-pink-600/80 backdrop-blur-md shadow-md shadow-black/20 ring-1 ring-white/10'
        ]">

  <div class="flex items-center gap-2">
    <!-- Tombol Toggle -->
    <button class="p-2 rounded-md text-white hover:bg-white/10" 
            @click="sidebarOpen = !sidebarOpen">
      <!-- Ikon Hamburger -->
      <svg x-show="!sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
           fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
      <!-- Ikon Close -->
      <svg x-show="sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
           fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>

    <!-- Navbar Menu -->
    <nav class="hidden md:flex gap-4">
      <a href="#"
         :class="activeNav === 'home'
                  ? 'relative px-2 py-1 font-semibold text-white border-b-2 border-yellow-400'
                  : 'px-2 py-1 text-white/80 hover:text-white border-b border-white/10 transition-all duration-300 ease-in-out'"
         @click="activeNav = 'home'">
         Home
      </a>
      <a href="#"
         :class="activeNav === 'about'
                  ? 'relative px-2 py-1 font-semibold text-white border-b-2 border-green-400'
                  : 'px-2 py-1 text-white/80 hover:text-white border-b border-white/10 transition-all duration-300 ease-in-out'"
         @click="activeNav = 'about'">
         About
      </a>
    </nav>
  </div>
  <div class="flex items-center gap-4">
    <!-- Toggle Dark Mode -->
    <button @click="toggleTheme()" class="p-2 rounded-md text-white hover:bg-white/10">
      <template x-if="!darkMode">
        <!-- Ikon Sun -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 3v2m6.364 1.636l-1.414 1.414M21 12h-2m-1.636 
                   6.364l-1.414-1.414M12 21v-2m-6.364-1.636l1.414-1.414M3 
                   12h2m1.636-6.364l1.414 1.414" />
        </svg>
      </template>
      <template x-if="darkMode">
        <!-- Ikon Moon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
             viewBox="0 0 24 24">
          <path fill-rule="evenodd"
                d="M17.293 14.293a8 8 0 11-7.586-7.586 6 6 0 107.586 7.586z"
                clip-rule="evenodd"/>
        </svg>
      </template>
    </button>

    <input type="text" placeholder="Search..."
           class="px-3 py-1 border rounded-lg hidden md:block
                  bg-white/10 border-white/20 text-white placeholder-white/60 focus:outline-none">
    <img src="https://via.placeholder.com/32" alt="User" class="w-8 h-8 rounded-full border border-white/20">
  </div>
</header>
