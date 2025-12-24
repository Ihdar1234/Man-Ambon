@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Siswa</h1>

    <a href="{{ route('siswas.daftar.index') }}" class="btn btn-secondary mb-4">Kembali</a>

    @if($errors->any())
        <div class="alert alert-error mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswas.daftar.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="label">User ID</label>
            <input type="number" name="user_id" value="{{ old('user_id') }}" class="input input-bordered w-full" required>
        </div>

        <div>
            <label class="label">NISN</label>
            <input type="text" name="nisn" value="{{ old('nisn') }}" class="input input-bordered w-full" required>
        </div>

        <div>
            <label class="label">NIK</label>
            <input type="text" name="nik" value="{{ old('nik') }}" class="input input-bordered w-full">
        </div>

        <div>
            <label class="label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="input input-bordered w-full" required>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="input input-bordered w-full" required>
            </div>
            <div>
                <label class="label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="input input-bordered w-full" required>
            </div>
        </div>

        <div>
            <label class="label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="select select-bordered w-full" required>
                <option value="">-- Pilih --</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div>
            <label class="label">Agama</label>
            <input type="text" name="agama" value="{{ old('agama') }}" class="input input-bordered w-full">
        </div>

        <div>
            <label class="label">Alamat</label>
            <textarea name="alamat" class="textarea textarea-bordered w-full">{{ old('alamat') }}</textarea>
        </div>

        <div>
            <label class="label">Asal Sekolah</label>
            <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}" class="input input-bordered w-full">
        </div>

        <div>
            <label class="label">No HP</label>
            <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="input input-bordered w-full">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="label">Nama Ayah</label>
                <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" class="input input-bordered w-full">
            </div>
            <div>
                <label class="label">Nama Ibu</label>
                <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" class="input input-bordered w-full">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="label">Pekerjaan Ayah</label>
                <input type="text" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" class="input input-bordered w-full">
            </div>
            <div>
                <label class="label">Pekerjaan Ibu</label>
                <input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" class="input input-bordered w-full">
            </div>
        </div>

        <div>
            <label class="label">Penghasilan Orang Tua</label>
            <input type="text" name="penghasilan_ortu" value="{{ old('penghasilan_ortu') }}" class="input input-bordered w-full">
        </div>

        <div>
            <label class="label">Foto</label>
            <input type="file" name="foto" class="file-input file-input-bordered w-full">
        </div>

        <div>
            <label class="label">Status</label>
            <select name="status" class="select select-bordered w-full" required>
                <option value="belum_verifikasi" {{ old('status') == 'belum_verifikasi' ? 'selected' : '' }}>Belum Verifikasi</option>
                <option value="verifikasi" {{ old('status') == 'verifikasi' ? 'selected' : '' }}>Verifikasi</option>
                <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
    </form>
</div>
@endsection
