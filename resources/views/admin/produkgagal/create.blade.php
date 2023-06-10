@extends('layout/main')

@section('title','Pembukuan ZAIA')

@section('container')
<div class="container" style="background-image: url(https://i.pinimg.com/originals/38/a0/4a/38a04a7b051c9481ccf55bfa439f242f.jpg); color: white;">
  <div class="row">
    <div class="col-sm-5 ml-auto mr-auto">
      <h1 style="text-align: center;">Produk Gagal</h1>
      @if (session('ggal'))
        <div class="alert alert-danger">
          {{session('ggal')}}
        </div>
        @endif
      <form method="POST" action="/admin/produkgagal">
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
              <select value="" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukan nama" name="nama">
                 @foreach($anggota as $row)
                  <option value="{{$row->nama}}">{{$row->nama}}</option>
                  @endforeach
                </select>
                </td>
              <td>
            </tr>
            <tr>
            <td width="40%">
                <label @error('jenis') class="text-danger" @enderror>Jenis @error('Jenis')
                  {{$message}} @enderror</label>
              </td>
              <td width="60%">
              <select value="" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="masukan jenis" name="jenis">
                 @foreach($data as $row)
                  <option value="{{$row->jenis}}">{{$row->jenis}}</option>
                  @endforeach
                </select>
                </td>
              <td>
            </tr>
            <tr>
              <td width="40%">
                <label @error('stock') class="text-danger" @enderror>Jumlah @error('stock')
                  {{$message}} @enderror</label>
              </td>
              <td>
                <input type="Number" value="{{old('stock')}}" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="masukan stock" name="stock">
              </td>
            </tr>
            <tr>
              <td>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/produkgagal" class="btn btn-danger">Kembali</a>
              </td>
            </tr>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection