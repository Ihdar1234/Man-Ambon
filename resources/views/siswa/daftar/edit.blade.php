@extends('siswa.layouts.siswa')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Edit Siswa</h1>

    <form action="{{ route('siswa.daftar.update', $daftar->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div class="form-control">
                <label class="label">NISN</label>
                <input type="text" name="nisn" value="{{ old('nisn', $daftar->nisn) }}" class="input input-bordered" required>
                @error('nisn') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">NIK</label>
                <input type="text" name="nik" value="{{ old('nik', $daftar->nik) }}" class="input input-bordered">
                @error('nik') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $daftar->nama_lengkap) }}" class="input input-bordered" required>
                @error('nama_lengkap') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $daftar->tempat_lahir) }}" class="input input-bordered" required>
                @error('tempat_lahir') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $daftar->tanggal_lahir->format('Y-m-d')) }}" class="input input-bordered" required>
                @error('tanggal_lahir') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="select select-bordered" required>
                    <option value="L" {{ old('jenis_kelamin', $daftar->jenis_kelamin)=='L'?'selected':'' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin', $daftar->jenis_kelamin)=='P'?'selected':'' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">Agama</label>
                <input type="text" name="agama" value="{{ old('agama', $daftar->agama) }}" class="input input-bordered">
                @error('agama') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat', $daftar->alamat) }}" class="input input-bordered">
                @error('alamat') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $daftar->asal_sekolah) }}" class="input input-bordered">
                @error('asal_sekolah') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $daftar->no_hp) }}" class="input input-bordered">
                @error('no_hp') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">Nama Ayah</label>
                <input type="text" name="nama_ayah" value="{{ old('nama_ayah', $daftar->nama_ayah) }}" class="input input-bordered">
                @error('nama_ayah') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">Nama Ibu</label>
                <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $daftar->nama_ibu) }}" class="input input-bordered">
                @error('nama_ibu') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">Pekerjaan Ayah</label>
                <input type="text" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah', $daftar->pekerjaan_ayah) }}" class="input input-bordered">
                @error('pekerjaan_ayah') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">Pekerjaan Ibu</label>
                <input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $daftar->pekerjaan_ibu) }}" class="input input-bordered">
                @error('pekerjaan_ibu') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">Penghasilan Orang Tua</label>
                <input type="text" name="penghasilan_ortu" value="{{ old('penghasilan_ortu', $daftar->penghasilan_ortu) }}" class="input input-bordered">
                @error('penghasilan_ortu') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">Foto</label>
                <input type="file" name="foto" class="file-input file-input-bordered">
                @if($daftar->foto)
                    <img src="{{ asset('storage/'.$daftar->foto) }}" alt="Foto Siswa" class="w-32 mt-2">
                @endif
                @error('foto') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">Status</label>
                <select name="status" class="select select-bordered" required>
                    <option value="belum_verifikasi" {{ old('status', $daftar->status)=='belum_verifikasi'?'selected':'' }}>Belum Verifikasi</option>
                    <option value="verifikasi" {{ old('status', $daftar->status)=='verifikasi'?'selected':'' }}>Verifikasi</option>
                    <option value="ditolak" {{ old('status', $daftar->status)=='ditolak'?'selected':'' }}>Ditolak</option>
                </select>
                @error('status') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

        </div>

        <button type="submit" class="btn btn-primary mt-4">Update</button>
        <a href="{{ route('siswa.daftar.index') }}" class="btn btn-ghost mt-4">Kembali</a>
    </form>
</div>
@endsection
