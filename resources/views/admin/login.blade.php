@extends('layout.auth-master')

@section('title', 'Pembukuan ZAIA')

@section('container')
<div class="container-fluid" style="background-image: url(https://i.pinimg.com/originals/38/a0/4a/38a04a7b051c9481ccf55bfa439f242f.jpg); background-size: cover; background-repeat: no-repeat; background-position: center center; color: white;">

@section('content')

<div class="card card-primary">
  <div class="card-header" style="color: black"><h4>Login Admin</h4></div>

  <div class="card-body">
    <form method="POST" action="/admin/login">
        @csrf
      <div class="form-group">
      @if (session('message'))
    <div class="alert alert-danger">
      {{session('message')}}
    </div>
    @endif 
        <label for="email" style="color: black">Nama</label>
        <input aria-describedby="emailHelpBlock" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Masukkan Nama " tabindex="1" value="{{ old('name') }}" autofocus>
        <div class="invalid-feedback">
          {{ $errors->first('email') }}
        </div>
        @if(App::environment('demo'))
        <small id="emailHelpBlock" class="form-text text-muted">
            Email Demo: admin@example.com
        </small>
        @endif
      </div>
      <div class="form-group">
        <div class="d-block">
            <label for="password" class="control-label" style="color: black">Kata Sandi</label>
          <!-- <div class="float-right">
            <a href="/admin/gaun" class="text-small">
              Lupa Kata Sandi?
            </a>
          </div> -->
        </div>
        <input aria-describedby="passwordHelpBlock" id="password" type="password" placeholder="Masukkan kata sandi" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password" tabindex="2">
        <div class="invalid-feedback">
          {{ $errors->first('password') }}
        </div>
        @if(App::environment('demo'))
        <small id="passwordHelpBlock" class="form-text text-muted">
            Kata Sandi Demo: 1234
        </small>
        @endif
      </div>

      <!-- <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember"{{ old('remember') ? ' checked': '' }}>
          <label class="custom-control-label" for="remember">Ingat Saya</label>
        </div>
      </div> -->

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
          Masuk
        </button>
      </div>
    </form>
  </div>
</div>
<div class="mt-5 text-muted text-center">
  Belum punya akun? <a href="/admin/register">Buat Akun</a>
</div>

@endsection
