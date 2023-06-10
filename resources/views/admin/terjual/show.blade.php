@extends('layout/main')

@section('title', 'Pembukuan')

@section('container')
<div class="container" style="background: url(https://i.pinimg.com/originals/38/a0/4a/38a04a7b051c9481ccf55bfa439f242f.jpg)">
    <div class="row">
        <div class="col-10" style="color: white;">
            <h1 style="text-align: center">Detail Jual Barang</h1>
            <table class="table">
                <tbody>
                    <table class="table" style="color: white;">
                        @if (session('untung'))
                        <div class="alert alert-danger">
                            {{session('untung')}}
                        </div>
                        @endif
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Modal</th>
                                <th scope="col">Untung</th>
                            </tr>
                        </thead>
                        <a href="/terjual" class="btn btn-danger">Kembali</a>
                        @foreach ($data[0] as $row)
                        <tbody>
                            <tr>
                                <td>{{$row->nama}}</td>
                                <td>{{$row->deskripsi}}</td>
                                <td>{{number_format($row->harga)}}</td>
                                <td>{{number_format($row->modal)}}</td>
                                <td>{{number_format($row->untung)}}</td>
                                <?php
                                $id_jual = $row->id;
                                $status = $row->status;
                                ?>
                                <td>
                                    @if($row->modal == 0)
                                    <form action="/admin/jual/delete/{{$row->id}}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    @if($row->status != 'Selesai' )
                                    <form action="/admin/jual/selesai" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" value="{{$id_jual}}" id="id_jual" name="id_jual">
                                        <input type="hidden" value="{{$row->nama}}" id="nama" name="nama">
                                        <button type="submit" class="btn btn-primary">Selesai</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                        @endforeach

                        @if (session('surat'))
                        <div class="alert alert-danger">
                            {{session('surat')}}
                        </div>
                        @endif

                        @if($status != 'Selesai')
                        <table class="table">
                            <tbody>
                                <table class="table" style="color: white;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Jenis</th>
                                            <th scope="col">Stock</th>
                                            <th scope="col"></th>
                                            <th scope="col">Deskripsi Biaya</th>
                                            <th scope="col">Biaya Tambah</th>
                                            <!-- <th scope="col">harga</th> -->
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>

                                            <form action="/admin/jual/" method="post" class="d-inline">
                                                @csrf
                                                <td width="25%">
                                                    <select value="{{old('jenis')}}" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="masukan jenis" name="jenis">
                                                        @foreach($data[1] as $row)
                                                        <option value="{{$row->jenis}}">{{$row->jenis}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="hidden" value="{{$id_jual}}" id="id_jual" name="id_jual">
                                                    <input type="Number" min="1" value="{{old('stock')}}" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="masukan stock" name="stock">
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary">+</button>
                                                </form>
                                                </td>
                                                <form action="/admin/biayatambah/" method="post" class="d-inline">
                                                    @csrf
                                                    <td><input type="Text" min="1" value="{{old('deskripsi')}}" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="masukan deskripsi" name="deskripsi"></td>
                                                    <td>
                                                        <input type="hidden" value="{{$id_jual}}" id="id_jual" name="id_jual">
                                                        <input type="Number" min="1" value="{{old('harga')}}" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="masukan harga" name="harga">
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary">+</button>
                                                    </form>
                                                </td>
                                        </tr>
                                    </tbody>
                                    @endif
                                    <tbody>
                                        <table class="table" style="color: white;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Jenis</th>
                                                    <th scope="col">Stock</th>
                                                    <th scope="col">Harga modal</th>
                                                </tr>
                                            </thead>

                                            @foreach ($data[2] as $row)
                                            <tbody>
                                                <tr>
                                                    <td>{{$row->jenis}}</td>
                                                    <td>{{$row->stock}}</td>
                                                    <td>{{number_format($row->harga)}}</td>
                                                    <td>
                                                        @if($status != 'Selesai' )
                                                        <form action="/admin/jual/{{$row->id}}" method="post" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <input type="hidden" value="{{$row->id_jual}}" id="id_jual" name="id_jual">
                                                            <button type="submit" class="btn btn-danger">delete</button>
                                                        </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach

                                            <tbody>
                                                <table class="table" style= "color: white;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Deskripsi</th>
                                                            <th scope="col">Biaya Tambahan</th>
                                                        </tr>
                                                    </thead>

                                                    @foreach ($data[3] as $row)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$row->deskripsi}}</td>
                                                            <td>{{number_format($row->harga)}}</td>
                                                            <td>
                                                                @if($status != 'Selesai' )
                                                                <form action="/admin/biayatambah/delete/{{$row->id}}" method="post" class="d-inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <input type="hidden" value="{{$row->id_jual}}" id="id_jual" name="id_jual">
                                                                    <button type="submit" class="btn btn-danger">delete</button>
                                                                </form>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    @endforeach

                                        </table>
                                    </tbody>
                                </table>
                            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
