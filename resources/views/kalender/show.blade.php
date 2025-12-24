@extends('backend.dashboard')

@section('content')
<div class="container mx-auto p-6">
  <div class="bg-white p-6 rounded-2xl shadow-md text-center">
    <h1 class="text-3xl font-bold text-emerald-700 mb-4">{{ $kalender->judul }}</h1>
    <div class="border-t border-emerald-200 my-4"></div>
    <img src="{{ asset('storage/'.$kalender->gambar) }}" class="w-full h-[500px] object-contain bg-gray-50 rounded-xl mb-6">
    <a href="{{ route('kalender.index') }}" class="btn btn-outline btn-success">← Kembali</a>
  </div>
</div>
@endsection
