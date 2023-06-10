@extends('layout/main')

@section('title','Pembukuan')

@section('container')
<div class="container" style="background-image: url(https://i.pinimg.com/originals/38/a0/4a/38a04a7b051c9481ccf55bfa439f242f.jpg); background-size: cover; background-position: center;">
    <div class="row">
        <div class="col-10">
            <h1 style="text-align: center; color: white;">Beli Barang</h1>
            <a href="/admin/belibarang" class="btn btn-primary">Tambah Barang</a>
            <table class="table" style="color: white;">
                <thead>
                    <tr>
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($belibarang as $row)
                    <tr>
                        <td>{{$row->jenis}}</td>
                        <td>{{number_format($row->harga)}}</td>
                        <td>{{$row->stock}}</td>
                        <td>{{$row->nama}}</td>
                        @if(session('level'))
                        <td>
                            <form action="/admin/galeri/" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
