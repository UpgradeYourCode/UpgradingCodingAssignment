@extends('layout/main')

@section('title','Pembukuan ZAIA')

@section('container')
<div class="contianer" style="background-image: url(https://i.pinimg.com/originals/38/a0/4a/38a04a7b051c9481ccf55bfa439f242f.jpg); color: white;">
  <div class="row">
    <div class="col-sm-5 ml-auto mr-auto">
      <h1 style="text-align: center;">Ambil Uang</h1>
      @if (session('surat'))
        <div class="alert alert-danger">
          {{session('surat')}}
        </div>
        @endif
      <form method="POST" action="/admin/ambiluang">
        @csrf
        <div class="form-group">    
          <br>
          <table class="table" style="color: white;">
          <tr>
            <td width="40%">
                <label @error('nama') class="text-danger" @enderror>Nama @error('nama')
                  {{$message}} @enderror</label>
              </td>
            <td width="60%"><select value="" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="masukan nama" name="nama">
                  @foreach($data as $row)
                  <option value="{{$row->nama}}">{{$row->nama}}</option>
                  @endforeach
                </select></td>
              <td>
            </tr>
            <tr>
            <td width="40%">
                <label @error('uang') class="text-danger" @enderror>Uang @error('uang')
                  {{$message}} @enderror</label>
              </td>
            <td width="60%"><select value="" class="form-control @error('uang') is-invalid @enderror" id="uang" placeholder="masukan uang" name="uang">
                  @foreach($data as $row)
                  <option value="{{$row->nama}}">{{$row->nama}}</option>
                  @endforeach
                </select></td>
              <td>
            </tr>
            <tr>
            <td width="40%">
                <label @error('jenis') class="text-danger" @enderror>Jenis @error('Jenis')
                  {{$message}} @enderror</label>
              </td>
              <td width="60%">
              <select value="" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="masukan jenis" name="jenis">
                  <option value="untung">Untung</option>
                  <option value="modal">Modal</option>
                </select>
                </td>
              <td>
            </tr>
            <tr>
              <td width="40%">
                <label @error('harga') class="text-danger" @enderror>Jumlah @error('harga')
                  {{$message}} @enderror</label>
              </td>
              <td>
                <input type="Number" value="{{old('harga')}}" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="masukan harga" name="harga">
              </td>
            </tr>
            <tr>
              <td>
                <button type="submit" class="btn btn-primary">Ambil</button>
                <a href="/ambiluang" class="btn btn-danger">Kembali</a>
              </td>
            </tr>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection