@extends('layouts.main.app')

@section('title')
<title>Верифікація номеру телефону - Єнот 24</title>
<meta property="og:title" content="Верифікація номеру телефону - Єнот 24">
@endsection

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
            <form method="POST" action="{{ route('verify_code') }}">
                @csrf

                <div class="header-t">
                    <h1>
                        Вхід
                    </h1>
                </div>
                <div class="form-content">
                    <div class="form-group row">
                        <label for="phone">Код підтвердження</label>
                        <div class="col-md-6">
                            <input type="text" name="sms_code" required>
                            @error('sms_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4 sub">
                            <div class="check">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Не виходити</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Увійти
                            </button>
                        </div>
                    </div>
                    <div class="form-footer">
                        <p>
                            Відпрявляючі свої контактні данні - ви погоджуєтeся з правилами <a
                                href="{{ route('privacy_policy') }}">конфіденційністі</a>
                        </p>
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
