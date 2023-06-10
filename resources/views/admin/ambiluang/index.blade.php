@extends('layout/main')

@section('title', 'Pembukuan ZAIA')

@section('container')
<div class="container" style="background-image: url(https://i.pinimg.com/originals/38/a0/4a/38a04a7b051c9481ccf55bfa439f242f.jpg); color: white;">
    <div class="row">
        <div class="col-10">
            <h1 style="text-align: center">Ambil Uang</h1>
            <table class="table">
                <tbody>
                    <a href="/admin/ambiluang" class="btn btn-primary">Ambil Uang</a>
                    <table class="table" style="color: white;">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Tanggal</th>
                            </tr>
                        </thead>

                        @foreach ($ambiluang as $row)
                        <tbody>
                            <tr>
                                <td>{{$row->nama}}</td>
                                <td>{{number_format($row->harga)}}</td>
                                <td>{{$row->jenis}}</td>
                                <td>{{substr($row->created_at, 0, 10)}}</td>
                                <td>
                                    @if(session('level'))
                                    <a href="/admin/terjual/{{$row->id}}" class="btn btn-primary">detail</a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
        </div>
    </div>
</div>
@endsection
