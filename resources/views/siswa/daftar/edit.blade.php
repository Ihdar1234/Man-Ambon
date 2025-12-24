@extends('siswa.layouts.siswa')

@section('content')
   {{-- Notifikasi --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
@if ($errors->any())
    <div class="alert alert-error mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Edit Siswa</h1>

    <form action="{{ route('siswa.daftar.update', $daftar->id) }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="space-y-4">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            {{-- NISN --}}
            <div class="form-control">
                <label class="label">NISN</label>
                <input type="text" name="nisn"
                       value="{{ old('nisn', $daftar->nisn) }}"
                       class="input input-bordered" required>
            </div>

            {{-- NIK --}}
            <div class="form-control">
                <label class="label">NIK</label>
                <input type="text" name="nik"
                       value="{{ old('nik', $daftar->nik) }}"
                       class="input input-bordered">
            </div>

            {{-- Nama --}}
            <div class="form-control">
                <label class="label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap"
                       value="{{ old('nama_lengkap', $daftar->nama_lengkap) }}"
                       class="input input-bordered" required>
            </div>

            {{-- Tempat Lahir --}}
            <div class="form-control">
                <label class="label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir"
                       value="{{ old('tempat_lahir', $daftar->tempat_lahir) }}"
                       class="input input-bordered" required>
            </div>

            {{-- Tanggal Lahir --}}
            <div class="form-control">
                <label class="label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir"
                       value="{{ old('tanggal_lahir', optional($daftar->tanggal_lahir)->format('Y-m-d')) }}"
                       class="input input-bordered" required>
            </div>

            {{-- Jenis Kelamin --}}
            <div class="form-control">
                <label class="label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="select select-bordered">
                    <option value="L" {{ $daftar->jenis_kelamin=='L'?'selected':'' }}>Laki-laki</option>
                    <option value="P" {{ $daftar->jenis_kelamin=='P'?'selected':'' }}>Perempuan</option>
                </select>
            </div>

            {{-- Alamat (SESUI DB) --}}
<div class="form-control">
    <label class="label">Provinsi</label>
    <select id="province" name="province_id" class="select select-bordered">
        <option value="">-- Pilih Provinsi --</option>
        @foreach($provinces as $prov)
            <option value="{{ $prov->code }}"
                {{ old('province_id', $daftar->province_id) == $prov->code ? 'selected' : '' }}>
                {{ $prov->name }}
            </option>
        @endforeach
    </select>
</div>


   <div class="form-control">
    <label class="label">Kabupaten / Kota</label>
    <select id="city" name="city_id" class="select select-bordered">
        <option value="">-- Pilih Kabupaten/Kota --</option>
    </select>
</div>



     <div class="form-control">
    <label class="label">Kecamatan</label>
    <select id="district" name="district_id" class="select select-bordered">
        <option value="">-- Pilih Kecamatan --</option>
    </select>
</div>



    <div class="form-control">
    <label class="label">Desa</label>
    <select id="village" name="village_id" class="select select-bordered">
        <option value="">-- Pilih Desa --</option>
    </select>
</div>



            <div class="form-control">
                <label class="label">RT</label>
                <input type="text" name="rt"
                       value="{{ old('rt', $daftar->rt) }}"
                       class="input input-bordered">
            </div>

            <div class="form-control">
                <label class="label">RW</label>
                <input type="text" name="rw"
                       value="{{ old('rw', $daftar->rw) }}"
                       class="input input-bordered">
            </div>

            <div class="form-control md:col-span-2">
                <label class="label">Detail Alamat</label>
                <textarea name="detail_alamat"
                          class="textarea textarea-bordered">{{ old('detail_alamat', $daftar->detail_alamat) }}</textarea>
            </div>


<div class="form-control md:col-span-2">
    <label class="label">Foto</label>

    <input 
        type="file" 
        name="foto" 
        id="fotoInput"
        accept="image/*"
        class="file-input file-input-bordered">

    <div class="mt-3">
        <img 
            id="fotoPreview"
            src="{{ $daftar->foto ? asset('storage/'.$daftar->foto) : '' }}"
            class="w-32 rounded-lg"
            style="{{ $daftar->foto ? '' : 'display:none' }}"
        >
    </div>
</div>


        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('siswa.daftar.index') }}" class="btn btn-ghost">Kembali</a>
        </div>
    </form>
</div>


<script>
const selectedProvince = "{{ old('province_id', $daftar->province_id) }}";
const selectedCity     = "{{ old('city_id', $daftar->city_id) }}";
const selectedDistrict = "{{ old('district_id', $daftar->district_id) }}";
const selectedVillage  = "{{ old('village_id', $daftar->village_id) }}";

document.addEventListener('DOMContentLoaded', function () {

    const province = document.getElementById('province');
    const city     = document.getElementById('city');
    const district = document.getElementById('district');
    const village  = document.getElementById('village');

    function loadCities(provinceCode) {
        fetch(`/ajax/cities/${provinceCode}`)
            .then(res => res.json())
            .then(data => {
                city.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
                district.innerHTML = '<option value="">Pilih Kecamatan</option>';
                village.innerHTML = '<option value="">Pilih Desa</option>';

                data.forEach(item => {
                    city.innerHTML += `
                        <option value="${item.code}"
                            ${item.code == selectedCity ? 'selected' : ''}>
                            ${item.name}
                        </option>`;
                });

                if (selectedCity) {
                    loadDistricts(selectedCity);
                }
            });
    }

    function loadDistricts(cityCode) {
        fetch(`/ajax/districts/${cityCode}`)
            .then(res => res.json())
            .then(data => {
                district.innerHTML = '<option value="">Pilih Kecamatan</option>';
                village.innerHTML = '<option value="">Pilih Desa</option>';

                data.forEach(item => {
                    district.innerHTML += `
                        <option value="${item.code}"
                            ${item.code == selectedDistrict ? 'selected' : ''}>
                            ${item.name}
                        </option>`;
                });

                if (selectedDistrict) {
                    loadVillages(selectedDistrict);
                }
            });
    }

    function loadVillages(districtCode) {
        fetch(`/ajax/villages/${districtCode}`)
            .then(res => res.json())
            .then(data => {
                village.innerHTML = '<option value="">Pilih Desa</option>';

                data.forEach(item => {
                    village.innerHTML += `
                        <option value="${item.code}"
                            ${item.code == selectedVillage ? 'selected' : ''}>
                            ${item.name}
                        </option>`;
                });
            });
    }

    // EVENT MANUAL
    province.addEventListener('change', e => {
        if (e.target.value) loadCities(e.target.value);
    });

    city.addEventListener('change', e => {
        if (e.target.value) loadDistricts(e.target.value);
    });

    district.addEventListener('change', e => {
        if (e.target.value) loadVillages(e.target.value);
    });

    // 🚀 AUTO LOAD SAAT EDIT
    if (selectedProvince) {
        loadCities(selectedProvince);
    }
});
document.addEventListener('DOMContentLoaded', function () {
    const fotoInput = document.getElementById('fotoInput');
    const fotoPreview = document.getElementById('fotoPreview');

    if (fotoInput) {
        fotoInput.addEventListener('change', function (e) {
            const file = e.target.files[0];

            if (!file) return;

            // Validasi image
            if (!file.type.startsWith('image/')) {
                alert('File harus berupa gambar');
                fotoInput.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function (event) {
                fotoPreview.src = event.target.result;
                fotoPreview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        });
    }
});
</script>



@endsection
