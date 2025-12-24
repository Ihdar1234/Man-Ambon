<div class="card">
    <div class="card-header">
        <h3>{{ $guru->nama }}</h3>
    </div>
    <div class="card-body">
        <p><strong>NIP:</strong> {{ $guru->nip }}</p>
        <p><strong>Nama:</strong> {{ $guru->nama }}</p>
        <p><strong>Mata Pelajaran:</strong> {{ $guru->mata_pelajaran }}</p>
        <p><strong>Alamat:</strong> {{ $guru->alamat }}</p>
        <p><strong>No HP:</strong> {{ $guru->no_hp }}</p>
        <p><strong>Slug:</strong> {{ $guru->slug }}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('gurus.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
