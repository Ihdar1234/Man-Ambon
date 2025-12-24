@extends('layanan.app')

@section('content')

@if(session('success'))
<div class="fixed top-5 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-lg px-4">
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
         class="flex justify-between items-center p-4 rounded-2xl shadow-xl bg-gradient-to-r from-green-500 to-emerald-500 text-white transition-all duration-300">
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 13l4 4L19 7"/>
            </svg>
            <span class="text-sm md:text-base">{{ session('success') }}</span>
        </div>
        <button @click="show = false" class="btn btn-sm btn-ghost btn-circle text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
</div>
@endif

<section class="mt-12 max-w-7xl mx-auto px-4">
    <h2 class="text-5xl font-extrabold text-center mb-12
               bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500
               drop-shadow-xl animate-gradient">
        Layanan PTSP
    </h2>

    <!-- Search & Filter -->
    <div class="flex flex-col sm:flex-row sm:justify-between gap-4 mb-6">
        <input id="serviceSearch" type="search" placeholder="Cari layanan..."
               class="input input-bordered w-full sm:w-64 shadow-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 rounded-2xl"/>
        <select id="filterCategory" class="select select-bordered w-full sm:w-56 shadow-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 rounded-2xl">
            <option value="">Semua Kategori</option>
            @php
                $categories = $layanans->pluck('kategori')->unique()->sort();
                $categoryColors = [
                    'akademik'     => 'bg-gradient-to-r from-green-400 to-green-200',
                    'izin'         => 'bg-gradient-to-r from-yellow-400 to-yellow-200',
                    'pengaduan'    => 'bg-gradient-to-r from-red-400 to-red-200',
                    'informasi'    => 'bg-gradient-to-r from-blue-400 to-blue-200',
                    'umum'         => 'bg-gradient-to-r from-indigo-400 to-indigo-200',
                    'kesiswaan'    => 'bg-gradient-to-r from-teal-400 to-teal-200',
                    'kepegawaian'  => 'bg-gradient-to-r from-orange-400 to-orange-200',
                    'masyarakat'   => 'bg-gradient-to-r from-pink-400 to-pink-200',
                    'keuangan'     => 'bg-gradient-to-r from-lime-400 to-lime-200',
                    'lainnya'      => 'bg-gradient-to-r from-purple-400 to-pink-300',
                ];
            @endphp
            @foreach($categories as $cat)
                <option value="{{ strtolower(trim($cat)) }}">{{ ucfirst($cat) }}</option>
            @endforeach
        </select>
    </div>

    <!-- Legend -->
    <div class="sticky top-24 bg-white/90 backdrop-blur-md z-50 py-2 px-4 mb-6 border-b border-gray-200 overflow-x-auto whitespace-nowrap flex justify-center gap-3 shadow-inner">
        @foreach($categories as $cat)
            @php
                $catKey = strtolower(trim($cat));
                $bgGradient = $categoryColors[$catKey] ?? $categoryColors['lainnya'];
            @endphp
            <button class="px-4 py-2 rounded-full text-white font-semibold transition transform hover:scale-105 hover:shadow-lg filter-btn flex-shrink-0 {{ $bgGradient }}"
                    data-category="{{ $catKey }}">
                {{ ucfirst($cat) }}
            </button>
        @endforeach
        <button class="px-4 py-2 rounded-full text-gray-800 font-semibold bg-gray-200 transition transform hover:scale-105 hover:shadow-lg flex-shrink-0" id="resetFilter">
            Semua
        </button>
    </div>

    <!-- Layanan Grid -->
    <div id="servicesGrid" class="grid gap-6"
         style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">
        @php
            $categoryIcons = [
                'akademik'     => '🎓',
                'izin'         => '📝',
                'pengaduan'    => '📢',
                'informasi'    => 'ℹ️',
                'umum'         => '🏛️',
                'kesiswaan'    => '🧑‍🎓',
                'kepegawaian'  => '💼',
                'masyarakat'   => '👥',
                'keuangan'     => '💰',
                'lainnya'      => '✨',
            ];
        @endphp
        @foreach($layanans as $l)
            @php
                $catKey = strtolower(trim($l->kategori));
                $bgGradient = $categoryColors[$catKey] ?? $categoryColors['lainnya'];
                $icon = $categoryIcons[$catKey] ?? '✨';
            @endphp

            <div class="card relative rounded-3xl overflow-hidden cursor-pointer transform transition-all duration-500 hover:scale-105 hover:-translate-y-2 shadow-2xl hover:shadow-4xl backdrop-blur-xl border border-white/20 group"
                 data-title="{{ strtolower(trim($l->nama)) }}"
                 data-category="{{ $catKey }}"
                 data-fields='@json($l->fields)'
                 onclick="openForm({{ $l->id }}, this.dataset.fields)">

                <!-- Gradient Animated Background -->
                <div class="absolute inset-0 {{ $bgGradient }} animate-gradient opacity-80 group-hover:opacity-100 transition-opacity duration-500"></div>

                <!-- Overlay gelap -->
                <div class="absolute inset-0 bg-black/30"></div>

                <!-- Konten Card -->
                <div class="relative z-10 p-6 text-center flex flex-col items-center justify-center min-h-[220px]">
                    <div class="text-6xl mb-4 animate-bounce text-white drop-shadow-xl">{{ $icon }}</div>
                    <h3 class="font-extrabold text-2xl mb-2 text-transparent bg-clip-text {{ $bgGradient }} drop-shadow-lg transition-all duration-500">
                        {{ $l->nama }}
                    </h3>
                    <p class="text-sm mb-1 text-transparent bg-clip-text {{ $bgGradient }} drop-shadow-sm">
                        Kategori: {{ ucfirst($l->kategori) }}
                    </p>
                    <p class="text-sm text-white/80 drop-shadow-sm mt-1">Klik untuk mengajukan layanan</p>
                </div>

                <!-- Glow border hover -->
                <div class="absolute inset-0 rounded-3xl border-2 border-transparent group-hover:border-white/30 pointer-events-none transition-all duration-500"></div>
            </div>
        @endforeach
    </div>

    <!-- Form Dinamis -->
<div id="dynamicForm" class="mt-12 hidden">


    <form id="formPTSP" action="{{ route('ptsp.store') }}" method="POST" enctype="multipart/form-data"
          class="space-y-6 bg-white/90 backdrop-blur-xl p-8 rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-500">
        @csrf
            <h2 id="formTitle" class="text-2xl md:text-3xl font-bold text-green-800 drop-shadow-md">
        Formulir Pengajuan
    </h2>
    <p id="formCategory" class="text-green-700 font-medium mb-2 text-lg">
        Jenis Layanan:
    </p>
    <p class="text-gray-600 text-sm mt-2">
        Silakan isi formulir di bawah ini sesuai persyaratan layanan
    </p>
        <input type="hidden" id="layanan_id" name="layanan_id" value="">
        <div class="mb-4">
            <label class="font-semibold block mb-1">Nama Lengkap</label>
            <input type="text" name="data[nama]" class="input input-bordered w-full rounded-2xl" required/>
        </div>
        <div class="mb-4">
            <label class="font-semibold block mb-1">Email</label>
            <input type="email" name="data[email]" class="input input-bordered w-full rounded-2xl" required/>
        </div>
        <div id="dynamicFields" class="space-y-4"></div>
        <button type="submit" class="w-full py-3 px-6 rounded-3xl text-white font-semibold text-lg
                       bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500
                       shadow-xl hover:shadow-2xl transform hover:scale-105 glow-btn">
            Kirim Pengajuan
        </button>
    </form>
</div>

    </div>
</section>

<style>
.animate-gradient {
  background-size: 200% 200%;
  animation: gradientMove 6s ease infinite;
}
@keyframes gradientMove {
  0% { background-position:0% 50% } 
  50% { background-position:100% 50% } 
  100% { background-position:0% 50% }
}
.card:hover {
  transform: translateY(-8px) scale(1.05);
  box-shadow: 0 25px 50px rgba(99,102,241,0.35),0 15px 35px rgba(0,0,0,0.15);
  border:1px solid rgba(255,255,255,0.3);
  backdrop-filter: blur(20px);
}
.animate-bounce { animation: bounceIcon 2s infinite ease-in-out; }
@keyframes bounceIcon {0%,100%{transform:translateY(0);}50%{transform:translateY(-6px);}}
#servicesGrid .card{min-height:220px;border:1px solid rgba(255,255,255,0.15);border-radius:1.5rem;}
.glow-btn{box-shadow:0 0 12px rgba(139,92,246,0.6),0 0 24px rgba(139,92,246,0.4);transition:all 0.3s ease-in-out;}
.glow-btn:hover{box-shadow:0 0 20px rgba(139,92,246,0.8),0 0 40px rgba(139,92,246,0.6);}
input:focus,textarea:focus{outline:none;box-shadow:0 0 12px rgba(99,102,241,0.5);}
.filter-btn.active{transform:scale(1.05);box-shadow:0 5px 15px rgba(0,0,0,0.2);opacity:1;}
.filter-btn{opacity:0.95;transition:all 0.3s;}
.card{transition:all 0.4s ease-in-out,opacity 0.4s ease-in-out;opacity:1;}
.card.hidden{opacity:0;transform:translateY(20px) scale(0.95);pointer-events:none;}
</style>

<script src="//unpkg.com/alpinejs" defer></script>
<script>
function normalize(str){return(str||'').toLowerCase().trim();}

function openForm(id, fieldsJson){
    const container = document.getElementById('dynamicFields');
    const formDiv = document.getElementById('dynamicForm');
    const titleEl = document.getElementById('formTitle');
    const categoryEl = document.getElementById('formCategory');

    const card = event.currentTarget;
    const layananNama = card.querySelector('h3').innerText;
    const layananKategori = card.querySelector('p').innerText.replace('Kategori: ', '');

    document.getElementById('layanan_id').value = id;
    titleEl.innerText = 'Formulir Pengajuan ' + layananNama;
    categoryEl.innerText = 'Jenis Layanan: ' + layananKategori;

    container.innerHTML = "";
    let fields = [];
    try { fields = JSON.parse(fieldsJson); } catch(e){ console.error("JSON parse error:", e, fieldsJson); return; }

    fields.forEach(f => {
        const req = f.required ? 'required' : '';
        let html = '';
        if(['text','number','date'].includes(f.type)){
            html = `<div class="mb-4">
                        <label class="font-semibold block mb-1">${f.label}</label>
                        <input type="${f.type}" name="data[${f.name}]" class="input input-bordered w-full rounded-lg" ${req}/>
                    </div>`;
        } else if(f.type === 'textarea'){
            html = `<div class="mb-4">
                        <label class="font-semibold block mb-1">${f.label}</label>
                        <textarea name="data[${f.name}]" class="textarea textarea-bordered w-full rounded-lg" ${req}></textarea>
                    </div>`;
        } else if(f.type === 'file'){
            html = `<div class="mb-4">
                        <label class="font-semibold block mb-1">${f.label}</label>
                        <input type="file" name="data[${f.name}]" class="file-input file-input-bordered w-full" ${req}/>
                    </div>`;
        }
        container.innerHTML += html;
    });

    formDiv.classList.remove('hidden');
    formDiv.scrollIntoView({behavior:"smooth"});
}

document.addEventListener('DOMContentLoaded',()=>{
    const searchInput=document.getElementById('serviceSearch');
    const filterSelect=document.getElementById('filterCategory');
    const servicesGrid=document.getElementById('servicesGrid');
    const legendBtns=document.querySelectorAll('.filter-btn');

    function filterServices(){
        const query=normalize(searchInput.value);
        const category=normalize(filterSelect.value);
        servicesGrid.querySelectorAll('.card').forEach(card=>{
            const title=normalize(card.dataset.title);
            const cat=normalize(card.dataset.category);
            const show=title.includes(query)&&(category===''||cat===category);
            if(show){card.classList.remove('hidden');}else{card.classList.add('hidden');}
        });
        legendBtns.forEach(b=>b.classList.remove('active'));
        if(category)document.querySelector(`.filter-btn[data-category="${category}"]`)?.classList.add('active');
    }

    searchInput.addEventListener('input',filterServices);
    filterSelect.addEventListener('change',filterServices);
    legendBtns.forEach(btn=>btn.addEventListener('click',()=>{
        const cat=normalize(btn.dataset.category);
        filterSelect.value=cat;
        filterServices();
    }));
    document.getElementById('resetFilter').addEventListener('click',()=>{
        searchInput.value="";
        filterSelect.value="";
        filterServices();
    });
    filterServices();
    window.addEventListener('resize',filterServices);
});
</script>

@endsection
