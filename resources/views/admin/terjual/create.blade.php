@extends('layout/main')

@section('title','Pembukuan ZAIA')

@section('container')
<div class="container" style="background-image: url(https://i.pinimg.com/originals/38/a0/4a/38a04a7b051c9481ccf55bfa439f242f.jpg);">
  <div class="row">
    <div class="col-sm-5 ml-auto mr-auto">
      <h1 style="text-align: center; color: white;">Jual Barang</h1>
      <form method="POST" action="/admin/terjual/">
        @csrf
        <div class="form-group">
          <br>
          <table class="table" style="color: white;">
            <tr>
              <td width="40%">
                <label @error('nama') class="text-danger" @enderror>Nama @error('nama')
                  {{$message}} @enderror</label>
              </td>
              <td width="60%">
                <select value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukan nama" name="nama">
                  @foreach($data as $row)
                  <option value="{{$row->nama}}">{{$row->nama}}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td width="40%">
                <label @error('deskripsi') class="text-danger" @enderror>Deskripsi @error('deskripsi')
                  {{$message}} @enderror</label>
              </td>
              <td>
                <input type="text" value="{{old('deskripsi')}}" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="masukan deskripsi" name="deskripsi">
              </td>
            </tr>
            <tr>
              <td width="40%">
                <label @error('harga') class="text-danger" @enderror>Harga Barang @error('harga')
                  {{$message}} @enderror</label>
              </td>
              <td>
                <input type="number" value="{{old('harga')}}" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="masukan harga" name="harga">
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex justify-content-between">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="/terjual" class="btn btn-danger">Kembali</a>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
