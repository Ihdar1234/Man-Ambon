@extends('siswa.layouts.siswa')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">

    <div class="card bg-base-100 shadow-xl">
        <div class="card-body space-y-6">

            <h2 class="text-2xl font-bold text-center">
                Form Pendaftaran Siswa
            </h2>

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
            <form 
    action="{{ isset($siswa)
        ? route('siswa.daftar.update', $siswa)
        : route('siswa.daftar.store') }}"
    method="POST"
    enctype="multipart/form-data">


                @csrf
                @isset($siswa)
                    @method('PUT')
                @endisset

                {{-- ================= DATA SISWA ================= --}}
                <div class="divider">Data Siswa</div>

                <div class="grid md:grid-cols-2 gap-4">

                    <div>
                        <label class="label">NISN</label>
                        <input type="text" name="nisn"
                            value="{{ old('nisn', $siswa->nisn ?? '') }}"
                            class="input input-bordered w-full" />
                        @error('nisn') <span class="text-error">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="label">NIK</label>
                        <input type="text" name="nik"
                            value="{{ old('nik', $siswa->nik ?? '') }}"
                            class="input input-bordered w-full" />
                    </div>

                    <div>
                        <label class="label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap"
                            value="{{ old('nama_lengkap', $siswa->nama_lengkap ?? '') }}"
                            class="input input-bordered w-full" />
                    </div>

                    <div>
                        <label class="label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="select select-bordered w-full">
                            <option value="">Pilih</option>
                            <option value="L" @selected(old('jenis_kelamin', $siswa->jenis_kelamin ?? '')=='L')>Laki-laki</option>
                            <option value="P" @selected(old('jenis_kelamin', $siswa->jenis_kelamin ?? '')=='P')>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir"
                            value="{{ old('tempat_lahir', $siswa->tempat_lahir ?? '') }}"
                            class="input input-bordered w-full" />
                    </div>

                    <div>
                        <label class="label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $siswa->tanggal_lahir ?? '') }}"
                            class="input input-bordered w-full" />
                    </div>

                </div>

                {{-- ================= DATA TAMBAHAN ================= --}}
<div class="divider">Data Tambahan</div>

<div class="grid md:grid-cols-2 gap-4">

    <div>
        <label class="label">Agama</label>
        <input type="text" name="agama"
            value="{{ old('agama', $siswa->agama ?? '') }}"
            class="input input-bordered w-full">
    </div>

    <div>
        <label class="label">Asal Sekolah</label>
        <input type="text" name="asal_sekolah"
            value="{{ old('asal_sekolah', $siswa->asal_sekolah ?? '') }}"
            class="input input-bordered w-full">
    </div>

    <div>
        <label class="label">No HP</label>
        <input type="text" name="no_hp"
            value="{{ old('no_hp', $siswa->no_hp ?? '') }}"
            class="input input-bordered w-full">
    </div>

</div>


                {{-- ================= ALAMAT ================= --}}
                <div class="divider">Alamat</div>

                <div class="grid md:grid-cols-2 gap-4">

                    <select name="province_id" id="province" class="select select-bordered w-full">
                        <option value="">Pilih Provinsi</option>
                    </select>

                    <select name="city_id" id="city" class="select select-bordered w-full">
                        <option value="">Pilih Kabupaten/Kota</option>
                    </select>

                    <select name="district_id" id="district" class="select select-bordered w-full">
                        <option value="">Pilih Kecamatan</option>
                    </select>

                    <select name="village_id" id="village" class="select select-bordered w-full">
                        <option value="">Pilih Desa/Kelurahan</option>
                    </select>

                    <input type="text" name="rt" placeholder="RT"
                        value="{{ old('rt', $siswa->rt ?? '') }}"
                        class="input input-bordered w-full">

                    <input type="text" name="rw" placeholder="RW"
                        value="{{ old('rw', $siswa->rw ?? '') }}"
                        class="input input-bordered w-full">

                    <textarea name="detail_alamat"
                        class="textarea textarea-bordered md:col-span-2"
                        placeholder="Alamat lengkap">{{ old('detail_alamat', $siswa->detail_alamat ?? '') }}</textarea>

                </div>

                   {{-- ================= DATA ORANG TUA ================= --}}
<div class="divider">Data Orang Tua</div>

<div class="grid md:grid-cols-2 gap-4">

    <div>
        <label class="label">Nama Ayah</label>
        <input type="text" name="nama_ayah"
            value="{{ old('nama_ayah', $siswa->nama_ayah ?? '') }}"
            class="input input-bordered w-full">
    </div>

    <div>
        <label class="label">Pekerjaan Ayah</label>
        <input type="text" name="pekerjaan_ayah"
            value="{{ old('pekerjaan_ayah', $siswa->pekerjaan_ayah ?? '') }}"
            class="input input-bordered w-full">
    </div>

    <div>
        <label class="label">Nama Ibu</label>
        <input type="text" name="nama_ibu"
            value="{{ old('nama_ibu', $siswa->nama_ibu ?? '') }}"
            class="input input-bordered w-full">
    </div>

    <div>
        <label class="label">Pekerjaan Ibu</label>
        <input type="text" name="pekerjaan_ibu"
            value="{{ old('pekerjaan_ibu', $siswa->pekerjaan_ibu ?? '') }}"
            class="input input-bordered w-full">
    </div>

    <div class="md:col-span-2">
        <label class="label">Penghasilan Orang Tua</label>
        <input type="text" name="penghasilan_ortu"
            value="{{ old('penghasilan_ortu', $siswa->penghasilan_ortu ?? '') }}"
            class="input input-bordered w-full"
            placeholder="Contoh: < 1.000.000 / 1.000.000 - 3.000.000">
    </div>

</div>


              {{-- ================= FOTO ================= --}}
<div class="divider">Foto</div>

<input type="file"
       name="foto"
       id="fotoInput"
       accept="image/*"
       class="file-input file-input-bordered w-full" />

{{-- PREVIEW BARU --}}
<img id="fotoPreview"
     class="w-32 rounded-lg mt-3 hidden"
     alt="Preview Foto">

{{-- FOTO LAMA (EDIT) --}}
@isset($siswa->foto)
    <img src="{{ asset('storage/'.$siswa->foto) }}"
         class="w-32 rounded-lg mt-3"
         id="fotoLama">
@endisset

                
                {{-- ================= TOMBOL ================= --}}
                <div class="flex justify-end gap-3 mt-2">
                    <button class="btn btn-primary">
                        {{ isset($siswa) ? 'Update Data' : 'Simpan Pendaftaran' }}
                    </button>
                </div>

             

            </form>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', async function () {

    const province = document.getElementById('province');
    const city = document.getElementById('city');
    const district = document.getElementById('district');
    const village = document.getElementById('village');

    const selected = {
        province: "{{ old('province_id', $siswa->province_id ?? '') }}",
        city: "{{ old('city_id', $siswa->city_id ?? '') }}",
        district: "{{ old('district_id', $siswa->district_id ?? '') }}",
        village: "{{ old('village_id', $siswa->village_id ?? '') }}",
    };

    async function fetchData(url) {
        const res = await fetch(url);
        return await res.json();
    }

    async function loadProvinces() {
        const data = await fetchData('/ajax/provinces');
        province.innerHTML = `<option value="">Pilih Provinsi</option>`;
        data.forEach(item => {
            province.innerHTML += `
                <option value="${item.code}" ${item.code == selected.province ? 'selected' : ''}>
                    ${item.name}
                </option>`;
        });
        if (selected.province) loadCities(selected.province);
    }

    async function loadCities(provinceCode) {
        city.innerHTML = `<option value="">Loading...</option>`;
        district.innerHTML = `<option value="">Pilih Kecamatan</option>`;
        village.innerHTML = `<option value="">Pilih Desa</option>`;

        const data = await fetchData(`/ajax/cities/${provinceCode}`);
        city.innerHTML = `<option value="">Pilih Kota/Kabupaten</option>`;
        data.forEach(item => {
            city.innerHTML += `
                <option value="${item.code}" ${item.code == selected.city ? 'selected' : ''}>
                    ${item.name}
                </option>`;
        });
        if (selected.city) loadDistricts(selected.city);
    }

    async function loadDistricts(cityCode) {
        district.innerHTML = `<option value="">Loading...</option>`;
        village.innerHTML = `<option value="">Pilih Desa</option>`;

        const data = await fetchData(`/ajax/districts/${cityCode}`);
        district.innerHTML = `<option value="">Pilih Kecamatan</option>`;
        data.forEach(item => {
            district.innerHTML += `
                <option value="${item.code}" ${item.code == selected.district ? 'selected' : ''}>
                    ${item.name}
                </option>`;
        });
        if (selected.district) loadVillages(selected.district);
    }

    async function loadVillages(districtCode) {
        village.innerHTML = `<option value="">Loading...</option>`;

        const data = await fetchData(`/ajax/villages/${districtCode}`);
        village.innerHTML = `<option value="">Pilih Desa/Kelurahan</option>`;
        data.forEach(item => {
            village.innerHTML += `
                <option value="${item.code}" ${item.code == selected.village ? 'selected' : ''}>
                    ${item.name}
                </option>`;
        });
    }

    province.addEventListener('change', e => loadCities(e.target.value));
    city.addEventListener('change', e => loadDistricts(e.target.value));
    district.addEventListener('change', e => loadVillages(e.target.value));

    loadProvinces();
});

document.getElementById('fotoInput')?.addEventListener('change', function (e) {
    const file = e.target.files[0];
    const preview = document.getElementById('fotoPreview');
    const fotoLama = document.getElementById('fotoLama');

    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (event) {
        preview.src = event.target.result;
        preview.classList.remove('hidden');

        // sembunyikan foto lama jika ada
        if (fotoLama) {
            fotoLama.classList.add('hidden');
        }
    };

    reader.readAsDataURL(file);
});
</script>

@endsection
