@extends('layout/main')

@section('title', 'Pembukuan ZAIA')

@section('container')
<div class="container" style="background-image: url(https://i.pinimg.com/originals/38/a0/4a/38a04a7b051c9481ccf55bfa439f242f.jpg); background-size: cover; background-position: center;">
    <div class="row">
        <div class="col-10">
            <h1 style="text-align: center; color: white;">Home</h1>
            <a href="/admin/home" class="btn btn-primary">Tambah Anggota</a>
            <br><br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-white">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Modal</th>
                            <th scope="col">Uang</th>
                            @if(session('level'))
                            <th scope="col">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data[0] as $row)
                        <tr>
                            <td>{{$row->nama}}</td>
                            <td>{{number_format($row->harga)}}</td>
                            <td>{{number_format($row->uang)}}</td>
                            @if(session('level'))
                            <td>
                                <form action="/admin/modal/{{$row->id}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-white">
                    <thead>
                        <tr>
                            <th scope="col">Untung</th>
                            <th scope="col">Modal</th>
                            <th scope="col">Pulang Modal</th>
                            @if(session('level'))
                            <th scope="col">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data[1] as $row)
                        <tr>
                            <td>{{number_format($row->untung)}}</td>
                            <td>{{number_format($row->modal)}}</td>
                            <td>{{number_format($row->pulang)}}</td>
                            @if(session('level'))
                            <td>
                                <form action="/admin/uang/{{$row->id}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-white">
                    <thead>
                        <tr>
                            <th scope="col">Jenis</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Harga Satuan</th>
                            @if(session('level'))
                            <th scope="col">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data[2] as $row)
                        <tr>
                            <td>{{$row->jenis}}</td>
                            <td>{{$row->stock}}</td>
                            <td>{{number_format($row->hargasatuan)}}</td>
                            @if(session('level'))
                            <td>
                                <form action="/admin/stock/{{$row->id}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hapus</button>
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
</div>
@endsection
