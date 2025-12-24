@extends('siswa.layouts.siswa')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Tambah Siswa</h1>

    <form action="{{ route('siswa.daftar.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- NISN --}}
            <div class="form-control">
                <label class="label">NISN</label>
                <input type="text" name="nisn" value="{{ old('nisn') }}" class="input input-bordered" required>
                @error('nisn') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            {{-- Nama Lengkap --}}
            <div class="form-control">
                <label class="label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="input input-bordered" required>
                @error('nama_lengkap') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            {{-- Tempat Lahir --}}
            <div class="form-control">
                <label class="label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="input input-bordered" required>
                @error('tempat_lahir') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            {{-- Tanggal Lahir --}}
            <div class="form-control">
                <label class="label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="input input-bordered" required>
                @error('tanggal_lahir') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            {{-- Jenis Kelamin --}}
            <div class="form-control">
                <label class="label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="select select-bordered" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="L" {{ old('jenis_kelamin')=='L'?'selected':'' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin')=='P'?'selected':'' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            {{-- Alamat Berantai --}}
            <div class="form-control">
                <label class="label">Provinsi</label>
                <select name="province_id" id="province" class="select select-bordered" required>
                    <option value="">-- Pilih Provinsi --</option>
                    @foreach ($provinces as $prov)
                        <option value="{{ $prov->id }}" {{ old('province_id')==$prov->id?'selected':'' }}>{{ $prov->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-control">
                <label class="label">Kabupaten/Kota</label>
                <select name="city_id" id="city" class="select select-bordered" required>
                    <option value="">-- Pilih Kabupaten --</option>
                </select>
            </div>

            <div class="form-control">
                <label class="label">Kecamatan</label>
                <select name="district_id" id="district" class="select select-bordered" required>
                    <option value="">-- Pilih Kecamatan --</option>
                </select>
            </div>

            <div class="form-control">
                <label class="label">Desa/Kelurahan</label>
                <select name="village_id" id="village" class="select select-bordered" required>
                    <option value="">-- Pilih Desa --</option>
                </select>
            </div>

            {{-- RT/RW --}}
            <div class="form-control">
                <label class="label">RT</label>
                <input type="text" name="rt" value="{{ old('rt') }}" class="input input-bordered">
            </div>

            <div class="form-control">
                <label class="label">RW</label>
                <input type="text" name="rw" value="{{ old('rw') }}" class="input input-bordered">
            </div>

            {{-- Detail Alamat --}}
            <div class="form-control col-span-2">
                <label class="label">Detail Alamat</label>
                <input type="text" name="detail_alamat" value="{{ old('detail_alamat') }}" class="input input-bordered">
            </div>
        </div>

        <div class="flex gap-2 mt-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('siswa.daftar.index') }}" class="btn btn-ghost">Kembali</a>
        </div>
    </form>
</div>

{{-- AJAX Dropdown Berantai --}}
<script>
const prefix = '/ajax';

function fetchOptions(url, targetSelect, placeholder) {
    fetch(url)
        .then(res => res.json())
        .then(data => {
            targetSelect.innerHTML = `<option value="">${placeholder}</option>`;
            data.forEach(item => {
                const selected = item.id == targetSelect.dataset.selected ? 'selected' : '';
                targetSelect.innerHTML += `<option value="${item.id}" ${selected}>${item.name}</option>`;
            });
        })
        .catch(err => console.error('Fetch error:', err));
}

document.addEventListener('DOMContentLoaded', function() {
    const province = document.getElementById('province');
    const city = document.getElementById('city');
    const district = document.getElementById('district');
    const village = document.getElementById('village');

    // Simpan old value di dataset supaya bisa auto-select
    city.dataset.selected = "{{ old('city_id') }}";
    district.dataset.selected = "{{ old('district_id') }}";
    village.dataset.selected = "{{ old('village_id') }}";

    // Auto load city jika provinsi sudah ada old value
    if (province.value) {
        fetchOptions(`${prefix}/cities/${province.value}`, city, '-- Pilih Kabupaten --');
    }

    province.addEventListener('change', function() {
        fetchOptions(`${prefix}/cities/${this.value}`, city, '-- Pilih Kabupaten --');
        district.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
        village.innerHTML = '<option value="">-- Pilih Desa --</option>';
    });

    city.addEventListener('change', function() {
        fetchOptions(`${prefix}/districts/${this.value}`, district, '-- Pilih Kecamatan --');
        village.innerHTML = '<option value="">-- Pilih Desa --</option>';
    });

    district.addEventListener('change', function() {
        fetchOptions(`${prefix}/villages/${this.value}`, village, '-- Pilih Desa --');
    });
});
</script>
@endsection
