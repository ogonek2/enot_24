@extends('layouts.main.app')

@section('title')
<title>Наші контакти та Локації - Єнот 24</title>
<meta property="og:title" content="Наші контакти та Локації - Єнот 24">
@endsection

@section('header')
    @include('includes.header.nav')
@endsection

@section('content')
    <div class="box-container-block">
        <div class="box locations" style="margin: 0" id="punkti">
            <div class="container">
                <div class="header-block">
                    <div class="head-block-title">
                        <div class="title-name">
                            <span>[ де ми є ]</span>
                        </div>
                        <div class="title-block">
                            <h1>
                                НАШІ ВІДДІЛЕННЯ
                            </h1>
                            <h4>
                                у м. Київ
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="body-block">
                    <div class="box-elements-items">
                        @foreach ($locations as $item)
                            <div class="object">
                                <div class="svg-back-locate">
                                    <svg width="20" height="27" viewBox="0 0 20 27" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.85667 1C4.96705 1 1 4.77577 1 9.42614C1 14.777 6.90445 23.2567 9.07248 26.1855C9.16248 26.3092 9.28043 26.4098 9.41671 26.4791C9.553 26.5485 9.70375 26.5847 9.85667 26.5847C10.0096 26.5847 10.1603 26.5485 10.2966 26.4791C10.4329 26.4098 10.5509 26.3092 10.6409 26.1855C12.8089 23.2579 18.7133 14.7813 18.7133 9.42614C18.7133 4.77577 14.7463 1 9.85667 1Z"
                                            stroke="white" stroke-width="0.837517" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M9.85652 12.8087C11.487 12.8087 12.8087 11.487 12.8087 9.85652C12.8087 8.22605 11.487 6.9043 9.85652 6.9043C8.22605 6.9043 6.9043 8.22605 6.9043 9.85652C6.9043 11.487 8.22605 12.8087 9.85652 12.8087Z"
                                            stroke="white" stroke-width="0.837517" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="content-object">
                                    <div class="text">
                                        <a href="{{ $item->link_map }}">
                                            {{ $item->street }}
                                        </a>
                                    </div>
                                    <div class="time-date">
                                        <div class="text-time">
                                            {{ $item->workinghourse }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="btn-open-map open-map">
                        <span>
                            Відкрити Карту
                        </span>
                    </div>
                </div>
            </div>
            <div class="map" id="map_locations">
                <iframe
                    src="https://www.google.com/maps/d/u/1/embed?mid=1HCsHVYfX5w61I0GZOeTZwImLmDZ5PKo&ehbc=2E312F"
                    ></iframe>
            </div>
        </div>
        @include('includes.add_block')
        <div class="box contacts" style="margin: 0" id="kontakti">
            <div class="container">
                <div class="body-block">
                    <div class="box-elements">
                        <div class="block-image-logo-banner">
                            <div class="banner-image">
                                <img src="{{ asset('storage/src/banner_img/cf5eb47a63301d900efcd4b538dc6a64.png') }}"
                                    alt="Хімчистка Єнот24">
                            </div>
                            <div class="logo-block">
                                <img src="{{ asset('storage/src/logo/logo_contacts.png') }}" alt="Хімчистка Єнот24">
                            </div>
                        </div>
                        <div class="contacts-block-content">
                            <div class="title">
                                Наші контакти:
                            </div>
                            <div class="list">
                                <div class="el">
                                    <a href="https://enot-24.com.ua">https://enot-24.com.ua</a>
                                    <a href="https://www.instagram.com/enot24cleaner?igsh=MTQ3M3d3MjJlYXNsdQ%3D%3D&utm_source=qr">inst: @enot24cleaner</a>
                                </div>
                                <div class="el">
                                    <a href="tel:0678872233">+38 (067) 887-2233</a>
                                    <a href="tel:0443372233">+38 (044) 337-2233</a>
                                </div>
                                <div class="el">
                                    <a href="mailto:office.enot24@gmail.com">office.enot24@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
