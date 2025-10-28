@extends('layouts.main.app')

@section('title')
    <title>Єнот-24 - {{ $data->street }}</title>
    <meta property="Єнот-24 - {{ $data->street }}">
@endsection

@section('header')
    @include('includes.header.nav')
@endsection

@section('content')
    <div class="box-container-block">
        <div class="box adress-page">
            <div class="container">
                <div class="body-block">
                    <div class="box-elements">
                        <div class="adress-card">
                            <div class="banner-card">
                                <img src="{{ asset('storage/' . ($data->banner ?? 'src/banner_img/banner_back.png')) }}" alt="Доставка Єнот-24">
                            </div>
                            <div class="content-card">
                                <div class="title">
                                    <h1>
                                        ПРИЙМАЛЬНЕ<br>ВІДДІЛЕННЯ
                                    </h1>
                                    <h2>
                                        <a href="{{ $data->link_map }}" target="_blank">{{ $data->street }}</a>
                                    </h2>
                                    <b>
                                        {{ $data->workinghourse}}
                                    </b>
                                </div>
                                <div class="info-d">
                                    @if ($data->value)
                                        <h2>Поточна акція:</h2>
                                        <p>{{ $data->value }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box locations_box">
            <div class="locations_container">
                <div class="locations">
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
                    <div class="locations-list">
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
                </div>

                <div id="map" class="map-container"></div>
            </div>
        </div>
        @include('includes.add_block')
    </div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (document.getElementById("map")) {
                var map = L.map("map").setView([50.4501, 30.5234], 10);

                // 📌 Google Maps-like стиль
                L.tileLayer("https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
                    subdomains: ["mt0", "mt1", "mt2", "mt3"],
                    attribution: '&copy; Google Maps'
                }).addTo(map);

                var locations = @json($locations);
                var markers = [];

                locations.forEach(function(location, index) {
                    var customIcon = L.icon({
                        iconUrl: "{{ asset('storage/src/logo/logo_location.svg') }}", // SVG иконка
                        iconSize: [50, 60], // Размер
                        iconAnchor: [15, 40], // Точка опоры
                        popupAnchor: [0, -40] // Смещение всплывающего окна
                    });

                    var marker = L.marker([location.lat, location.lng], {
                            icon: customIcon
                        })
                        .addTo(map)
                        .bindPopup(
                            `<a href="${location.link_map}" target="_blank"><strong>${location.street}</strong></a>`
                            );

                    markers.push(marker);

                    // 🔥 Перемещение карты при наведении на список
                    document.querySelectorAll(".object")[index]?.addEventListener("mouseenter", function() {
                        map.setView([location.lat, location.lng], 15);
                    });
                });
            }
        });
    </script>
@endsection
