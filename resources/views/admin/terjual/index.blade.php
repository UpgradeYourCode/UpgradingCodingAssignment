@extends('layout/main')

@section('title','Pembukuan ZAIA')

@section('container')
<div class="container" style="background-image: url(https://i.pinimg.com/originals/38/a0/4a/38a04a7b051c9481ccf55bfa439f242f.jpg);">
  <div class="row">
    <div class="col-10">
      <h1 style="text-align: center; color: white;">Barang Terjual</h1>
      <a href="/admin/terjual" class="btn btn-primary">Jual Barang</a>
      <table class="table" style="color: white;">
        <thead>
          <tr>
            <th scope="col">Nama</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Harga</th>
            <th scope="col">Modal</th>
            <th scope="col">Untung</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>

        @foreach ($namapaket as $row)
        <tbody>
          <tr>
            <td>{{$row->nama}}</td>
            <td>{{$row->deskripsi}}</td>
            <td>{{number_format($row->harga)}}</td>
            <td>{{number_format($row->modal)}}</td>
            <td>{{number_format($row->untung)}}</td>
            <td>{{$row->status}}</td>
            <td>
              <a href="/admin/terjual/{{$row->id}}" class="btn btn-primary">detail</a>
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
