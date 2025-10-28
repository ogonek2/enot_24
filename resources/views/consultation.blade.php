@extends('layouts.main.app')

@section('title')
<title>Консультація - Прання/Хімчистка Килимів та Одягу в Києві - Єнот 24</title>
<meta property="og:title" content="Консультація - Прання/Хімчистка Килимів та Одягу в Києві - Єнот 24">
@endsection

@section('header')
    @include('includes.header.nav')
@endsection

@section('content')
    <div class="box-container-block">
        <div class="box courier-page">
            <div class="container">
                <div class="body-block">
                    <div class="box-elements">
                        <form action="{{ route('feedback') }}" method="POST">
                            @csrf
                            <div class="enter-block">
                                <div class="title">
                                    Як ми можемо до Вас звертатись?
                                </div>
                                <div class="block-items">
                                    <input type="text" placeholder="Ваше ім`я" name="client_name">
                                </div>
                            </div>
                            <div class="enter-block">
                                <div class="title">
                                    Номер телефону або зручний спосіб зв`язку
                                </div>
                                <div class="block-items">
                                    <input type="text" placeholder="Номер телефону" name="feedback_client">
                                </div>
                            </div>
                            <div class="enter-block">
                                <div class="title">
                                    Коментар
                                </div>
                                <div class="block-items">
                                    <input type="text" placeholder="Вкажіть в якому стані Ваші речі" name="comment">
                                </div>
                            </div>
                            @error('feedback_client')
                                <span class="error">- Введіть контактні данні!</span>
                            @enderror
                            <input type="hidden" value="Потреба консультації" name="service_type">
                            <button type="submit">
                                <div class="btn-order-courier-block">
                                    <span>
                                        Отримати консультацію
                                    </span>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.add_block')
    </div>
@endsection
