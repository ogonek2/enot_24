@extends('layouts.main.app')

@section('title')
<title>Вхід/Реєстрація - Єнот 24</title>
<meta property="og:title" content="Вхід/Реєстрація - Єнот 24">
@endsection

@section('header')
    @include('includes.header.nav')
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/userPanel.css') }}">
    <style>
        html,
        body {
        background-color: #302950;
        }
    </style>
@endsection

@section('content')
    <div class="container-lr">
        <div class="enot-logo">
            <div class="logo">
                <img src="{{ asset('storage/src/logo/logo_contactsWH.png') }}" alt="Enot-24">
            </div>
        </div>
        <div class="user-system-register-login_content">
            <form method="POST" action="{{ route('login.admin.hash') }}">
                @csrf

                <div class="header-t">
                    <h1>
                        Кабінет адміністратора
                    </h1>
                </div>
                <div class="form-content">
                    <div class="form-group row">
                        <label for="phone">Номер телефону</label>
                        <div class="col-md-6">
                            <input type="text" name="phone" value="{{ old('phone') }}" id="phone" required>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="key_auth">Ключ доступу</label>
                        <div class="col-md-6">
                            <input type="text" name="key_auth" required>

                            @error('key_auth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4 sub">
                            <button type="submit" class="btn btn-primary">
                                Увійти
                            </button>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Inputmask({
                mask: "+380(99)999-9999"
            }).mask(document.getElementById("phone"));
        });
    </script>
@endsection
