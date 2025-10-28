@extends('layouts.main.app')

@section('header')
    <div class="header-block-blade header-page-blade lr-hb">
        <div class="header-container">
            @include('includes.header.nav')
        </div>
    </div>
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
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="header-t">
                <h1>
                    Реєстрація
                </h1>
            </div>
            <div class="form-content">
                <div class="form-group row">
                    <label for="name"
                        class="col-md-4 col-form-label text-md-right">Ім'я</label>

                    <div class="col-md-6">
                        <input id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone">Номер телефону</label>
                    <div class="col-md-6">
                        <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password"
                        class="col-md-4 col-form-label text-md-right">Придумайте пароль</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-right">Повторіть пароль</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4 sub">
                        <div class="check">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Не виходити</label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Створити
                        </button>
                    </div>
                </div>
                <div class="form-footer">
                    <p>
                        Відпрявляючі свої контактні данні - ви погоджуєтeся з правилами <a href="{{ route('privacy_policy') }}">конфіденційністі</a>
                    </p>
                    <div class="link">
                        <a href="login">| Вже існує обліковий запис?</a>
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