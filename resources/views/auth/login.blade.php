@extends('layouts.app')

@section('content')
<body class="bg-gradient" style="background-color: darkblue;">
<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-6" style="min-height: 200px;">
        <div class="p-5" >
            <div class="card" style="border-radius:20px 20px 20px 20px;  margin-top: 80px;">

                <div class="card-body" style="widht: 60px;">
                    
                <div class="text-center">
                                        <h1 class="h4 text-gray-900">E-Learning </h1>
                                        <p>SMP Negeri 1 Lohbener</p>
                                    </div>
</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="login" class="col-sm-5 col-form-label text-md-right">
                                {{ __('Username or Email') }}
                            </label>
                        
                            <div class="col-md-6">
                                <input id="login" type="text"
                                    class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="login" value="{{ old('username') ?: old('email') }}" required autofocus>
                        
                                @if ($errors->has('username') || $errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> <div class="form-group row mb-4">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn" style="background-color: darkblue; color: white;">
                                    {{ __('Login') }}
                                </button>
                                <button type="submit" class="btn btn" style="background-color: darkblue; color: white;">
                                <a href="https://wa.me/6287744403036?text=Assalamualaikum Pak/Bu maaf saya lupa password">
                                    Forgot Password
                                </a>
                                </button>

                            </div>
                        </div>
                        <!-- <a href="https://wa.me/6285735501035?text=Isi Pesan">Chat Via WhatsApp</a> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

@endsection
