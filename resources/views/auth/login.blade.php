@extends('layouts.app')

@section('content')
<div class="gradient-custom">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body p-5">
  
                <div class="row d-flex align-items-center">
                  <div class="col-md-6 col-xl-7">
  
                    <div class="box_logo text-center pt-md-5 pb-5 my-md-5" style="padding-right: 24px;">
                        <img class="logo_fenix" src="{{ asset('img/logo-fenix.png') }}" alt="">
                    </div>
  
                  </div>
                  <div class="col-md-6 col-xl-4 text-center">
  
                    <h2 class="fw-bold mb-4 pb-2">INGRESO</h2>
                    <form method="POST" action="{{ route('login') }}">
                            @csrf

                        <div class="form-outline mb-3">
                            {{-- <input type="email" id="typeEmail" class="form-control form-control-lg" /> --}}
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label class="form-label" for="typeEmail">Correo</label>
                        </div>
    
                        <div class="form-outline mb-4">
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <label class="form-label" for="typePassword">Contraseña</label>
                        </div>
    
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-block btn-lg">
                                {{ __('Ingresar') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('¿Olvido su contraseña?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                  </div>
                </div>
  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



@endsection
