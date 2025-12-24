@extends('backend.dashboard')

@section('content')
<div class="container mx-auto p-6">
  <h1 class="text-3xl font-bold mb-4">{{ $pdf->judul }}</h1>

  <iframe src="{{ asset('storage/' . $pdf->file) }}" class="w-full h-[800px] border-2 rounded-lg"></iframe>

  <div class="mt-4">
    <a href="{{ route('pdf.index') }}" class="btn btn-secondary">⬅ Kembali</a>
  </div>
</div>
@endsection
