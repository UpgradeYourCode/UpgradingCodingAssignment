@extends('layout/main')

@section('title','Pembukuan')

@section('container')
<div class="contianer" style="background-image: url(https://i.pinimg.com/originals/38/a0/4a/38a04a7b051c9481ccf55bfa439f242f.jpg); color: white;">
    <div class="row">
    <div class="col-10">
    <h1 style="text-align: center">Produk Gagal</h1>
    <table class="table">
  <tbody>
  <a href="/admin/produkgagal" class="btn btn-primary">Tambah Produk</a>
  <table class="table" style="color: white;">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Jenis</th>
      <th scope="col">Stock</th>
      <th scope="col">Minus</th>
    </tr>
  </thead>

  @foreach ($data as $row)
  <tbody>
    <tr>
      <td>{{$row->nama}}</td>
      <td>{{$row->jenis}}</td>
      <td>{{$row->stock}}</td>
      <td>{{number_format($row->harga)}}</td>
      <td>
      @if(session('level'))
    <a href="/admin/terjual/{{$row->id}}" class="btn btn-primary">detail</a>
  @endif
      </td>
    </tr>
  </tbody>
  @endforeach
    </div>
    </div>
</div>
@endsection