@extends('layout/main')

@section('title', 'Pembukuan ZAIA')

@section('container')
<div class="container" style="background-image: url(https://i.pinimg.com/originals/38/a0/4a/38a04a7b051c9481ccf55bfa439f242f.jpg); color: white;">
  <div class="row">
    <div class="col-sm-5 ml-auto mr-auto">
      <h1 style="text-align: center;">Tambah Anggota</h1>
      <form method="POST" action="/admin/home">
        @csrf
        <div class="form-group">    
          <br>
          <table class="table">
            <tr>
              <td width="40%">
                <label @error('nama') class="text-danger" @enderror style="color: white;">Nama Anggota @error('jenis')
                  {{$message}} @enderror</label>
              </td>
              <td>
                <input type="Text" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukan nama" name="nama">
              </td>
            </tr>
            <tr>
              <td>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/" class="btn btn-danger">Kembali</a>
              </td>
            </tr>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
