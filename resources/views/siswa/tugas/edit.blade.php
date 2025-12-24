@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Edit Siswa</h1>

    <form action="{{ route('siswas.update', $siswa->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        @include('siswa.form', ['siswa' => $siswa])

        <button type="submit" class="btn btn-primary mt-4">Update</button>
        <a href="{{ route('siswas.index') }}" class="btn btn-ghost mt-4">Kembali</a>
    </form>
</div>
@endsection
