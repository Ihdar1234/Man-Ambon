@extends('dashboard.siswa.siswa')

@section('title', 'Dashboard Siswa | PPDB MAN Ambon')

@section('content')
  @include('dashboard.partials.hero')
  @include('dashboard.partials.alur')
  @include('dashboard.partials.informasi')
  @include('dashboard.partials.syarat')
  @include('dashboard.partials.kontak')
@endsection
