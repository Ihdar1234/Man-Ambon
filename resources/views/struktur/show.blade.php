@extends('backend.dashboard')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
    <h1 class="text-3xl font-bold text-gray-700 mb-4">{{ $struktur->judul }}</h1>

    @if($struktur->image)
    <img src="{{ asset('storage/'.$struktur->image) }}" alt="{{ $struktur->judul }}" class="w-full h-[500px] object-contain mb-6 rounded-lg shadow-md">
    @endif

    <div class="flex justify-end">
        <a href="{{ route('struktur.index') }}" class="btn btn-primary">Kembali</a>
    </div>
</div>
@endsection
