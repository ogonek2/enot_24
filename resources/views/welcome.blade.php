@extends('layouts.main.app')


@section('title')
    <title>Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві</title>
    <meta property="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">

    <meta property="og:description"
        content="Замовити послугу прання/хімчистки килимів та одягу Ви можете в компанії Єнот-24. Краща якість хімчистки. Безпечна хімія. Найкоротші терміни. Замовляйте просто зараз!">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('storage/src/logo/enot-white-bg.png') }}">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="{{ asset('storage/src/logo/logo-enot24.png') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    
    <!-- Локалізація та адреса -->
    <meta name="geo.position" content="50.4501;30.5234">
    <meta name="geo.region" content="UA-30">
    <meta name="geo.placename" content="Київ, Україна">
    <meta name="DC.title" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta name="DC.description" content="Замовити послугу прання/хімчистки килимів та одягу Ви можете в компанії Єнот-24. Краща якість хімчистки. Безпечна хімія. Найкоротші терміни. Замовляйте просто зараз!">
    <meta name="DC.subject" content="Прання, хімчистка, Київ, Єнот-24, чистка килимів, одяг">
    
    <!-- Оптимізація для пошукових систем -->
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://enot-24.com.ua/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta property="og:description" content="Якісні послуги прання та хімчистки в Києві. Звертайтеся до Єнот-24 для чистоти, яку ви заслуговуєте!">
    <meta property="og:url" content="https://enot-24.com.ua/">
    
    <!-- Додаткові метатеги для SEO -->
    <meta name="city" content="Київ">
    <meta name="coverage" content="Київ, Україна">
    <meta name="revisit-after" content="3 days">
    <meta name="author" content="Єнот-24">
    <meta name="rating" content="general">
    
    <!-- Контактна інформація для локального SEO -->
    <meta name="business" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta name="address" content="Київ, Україна">
    <meta name="phone" content="+38 (067) 887-2233">
    
    <!-- Покращення швидкості відображення сторінки -->
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://enot-24.com.ua/" crossorigin>
    
    <!-- Підказка для мобільних пристроїв (Google та інші пошукові системи враховують адаптивність сайту) -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=yes">
    
    <!-- Додаткові метатеги для пошукової оптимізації -->
    <meta property="og:locale" content="uk_UA">
    <meta property="og:site_name" content="Єнот-24">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta name="twitter:description" content="Професійне прання та хімчистка килимів і одягу в Києві. Чистота, якість та вигідні ціни від Єнот-24!">
    <meta name="twitter:url" content="https://enot-24.com.ua/">
    
    <!-- Локалізаційні теги для Google My Business -->
    <meta itemprop="name" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta itemprop="addressLocality" content="Київ">
    <meta itemprop="telephone" content="+38 (067) 887-2233">
    
    <!-- Підказки для пошукових систем -->
    <meta name="google-site-verification" content="-Tye_Cwi5cK0K8x7A1C8Heuxg5Nmxgjh-H5j3vGd6gQ" />
    
    <!-- Теги для локального SEO, спрямовані на підвищення залученості користувачів -->
    <meta name="service" content="Прання килимів Київ, хімчистка одягу Київ, чистка меблів, професійне прання">
    <meta name="distribution" content="global">
    <meta name="target" content="all">
    <meta name="audience" content="Кияни, люди, зацікавлені у чистоті та догляді за одягом і килимами">
    
    <!-- Структуровані дані Schema.org для покращення індексації (JSON-LD формат) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві",
      "image": "{{ asset('storage/src/logo/logo-enot24.png') }}",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Київ",
        "addressCountry": "UA"
      },
      "url": "https://enot-24.com.ua",
      "telephone": "+38 (067) 887-2233",
      "priceRange": "₴₴",
      "description": "Професійні послуги прання та хімчистки килимів і одягу в Києві від Єнот-24.",
      "areaServed": "Київ, Україна"
    }
    </script>
@endsection

@section('header')
    @include('includes.header.nav')
    <div class="header-block-blade">
        <div class="header-container">
            <div class="back-banner-block">
                <img src="{{ asset('storage/src/banner_img/IMG_2914.jpg') }}" alt="ЄНОТ-24 Хімчистка">
            </div>
            <div class="header-content">
                {{-- <div class="fly-block">
                    <div class="contacts-block-h">
                        <div class="contacts-h">
                            <div class="phones">
                                <a href="tel:0678872233">+38 (067) 887-2233</a>
                                <a href="tel:0443372233">+38 (044) 337-2233</a>
                            </div>
                            <div class="sclsh">
                                <a href="https://t.me/servisenot24">
                                    <div class="blsc"><i class="fab fa-telegram"></i></div>
                                </a>
                                <a href="viber://chat?number=%2B380678872233">
                                    <div class="blsc"><i class="fab fa-viber"></i></div>
                                </a>
                                <a
                                    href="https://www.instagram.com/enot24cleaner?igsh=MTQ3M3d3MjJlYXNsdQ%3D%3D&utm_source=qr">
                                    <div class="blsc"><i class="fab fa-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="content-block">
                        <div class="count">
                            50 000+
                        </div>
                        <div class="text">
                            Задоволених кліентів
                        </div>
                        <div class="images-gallery">
                            <img src="{{ asset('storage/src/Ellipse.png') }}" alt="Клієнт">
                            <img src="{{ asset('storage/src/Ellipse-1.png') }}" alt="Клієнт">
                            <img src="{{ asset('storage/src/Ellipse-2.png') }}" alt="Клієнт">
                        </div>
                    </div>
                </div> --}}
                <div class="content">
                    <div class="block">
                        <div class="box">
                            <div class="title">
                                <span>ХІМЧИСТКА</span><br>
                                ОДЯГУ ЄНОТ 24
                            </div>
                            <div class="sub-title">
                                Мережа хімчисток Єнот-24 в Києві має довгу і вражаючу історію, що налічує
                                понад
                                десять років успішної діяльності.
                            </div>
                            <div class="footer-title-header">
                                <a href="{{ route('services') }}" style="width: 270px">
                                    <div class="btn-order-clean" style="max-width: 100%">
                                        <span>
                                            Замовити хімчистку
                                        </span>
                                    </div>
                                </a>
                                <a href="{{ route('courier') }}">
                                    <div class="btn-order-courier">
                                        <span>
                                            Викликати кур’єра
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="box location-box">
                            <div class="contacts-block-h">
                                <div class="contacts-h">
                                    <div class="phones">
                                        <a href="tel:0678872233">+38 (067) 887-2233</a>
                                        <a href="tel:0443372233">+38 (044) 337-2233</a>
                                    </div>
                                    <div class="sclsh">
                                        <a href="https://t.me/servisenot24">
                                            <div class="blsc"><i class="fab fa-telegram"></i></div>
                                        </a>
                                        <a href="viber://chat?number=%2B380678872233">
                                            <div class="blsc"><i class="fab fa-viber"></i></div>
                                        </a>
                                        <a
                                            href="https://www.instagram.com/enot24cleaner?igsh=MTQ3M3d3MjJlYXNsdQ%3D%3D&utm_source=qr">
                                            <div class="blsc"><i class="fab fa-instagram"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-box">
                                <div class="swiper mySwiper swiperLocations">
                                    <div class="swiper-wrapper">
                                        @foreach ($locations as $item)
                                            <div class="swiper-slide">
                                                <div class="el-sw">
                                                    <div class="sw-header">
                                                        <span>Відділення:</span>
                                                    </div>
                                                    <div class="sw-header">
                                                        <div class="location-block">
                                                            <a href="{{ $item->link_map }}">
                                                                <svg width="22" height="30" viewBox="0 0 22 30"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M11 0C4.93447 0 0 4.97132 0 11.0821C0 13.0939 0.895529 15.2575 0.933059 15.3488C1.22229 16.0404 1.793 17.1147 2.20453 17.7445L9.74665 29.2575C10.0553 29.7295 10.5121 30 11 30C11.4879 30 11.9447 29.7295 12.2534 29.2581L19.7961 17.7445C20.2083 17.1147 20.7784 16.0404 21.0676 15.3488C21.1051 15.2581 22 13.0945 22 11.0821C22 4.97132 17.0655 0 11 0ZM19.8744 14.8429C19.6162 15.4628 19.085 16.4622 18.7155 17.0267L11.1728 28.5404C11.0239 28.7679 10.9767 28.7679 10.8279 28.5404L3.28512 17.0267C2.91565 16.4622 2.38441 15.4622 2.12624 14.8422C2.11523 14.8155 1.29412 12.824 1.29412 11.0821C1.29412 5.69035 5.64818 1.30378 11 1.30378C16.3518 1.30378 20.7059 5.69035 20.7059 11.0821C20.7059 12.8266 19.8828 14.8233 19.8744 14.8429Z"
                                                                        fill="#F9FBF3" />
                                                                    <path
                                                                        d="M11 5.21582C7.78869 5.21582 5.17651 7.84815 5.17651 11.0828C5.17651 14.3175 7.78869 16.9498 11 16.9498C14.2114 16.9498 16.8236 14.3175 16.8236 11.0828C16.8236 7.84815 14.2114 5.21582 11 5.21582ZM11 15.6461C8.50304 15.6461 6.47063 13.5991 6.47063 11.0828C6.47063 8.56654 8.50304 6.5196 11 6.5196C13.497 6.5196 15.5295 8.56654 15.5295 11.0828C15.5295 13.5991 13.497 15.6461 11 15.6461Z"
                                                                        fill="#F9FBF3" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="button-block">
                                                            <a href="{{ $item->link_map }}">
                                                                <svg width="48" height="48" viewBox="0 0 48 48"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="48" height="48" rx="24"
                                                                        fill="#B0A8FE" />
                                                                    <path
                                                                        d="M31.3846 16H16.6154C16.2757 16 16 16.2757 16 16.6154C16 16.9551 16.2757 17.2308 16.6154 17.2308H29.8988L16.1803 30.9495C15.94 31.1898 15.94 31.5794 16.1803 31.8197C16.3006 31.94 16.4578 32 16.6154 32C16.7729 32 16.9305 31.94 17.0505 31.8197L30.7692 18.1009V31.3846C30.7692 31.7243 31.0449 32 31.3846 32C31.7243 32 32 31.7243 32 31.3846V16.6154C32 16.2757 31.7243 16 31.3846 16Z"
                                                                        fill="#000000" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="sw-content">
                                                        <div class="sw-title">
                                                            <a href="{{ $item->link_map }}">
                                                                {{ $item->street }}
                                                            </a>
                                                        </div>
                                                        <div class="sw-sub-title">
                                                            Завітайте до нашого нового відділення!
                                                            Або знайдіть локацію біля себе.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if ($planer != false)
        @if (session('modal_closed_day') != \Carbon\Carbon::now()->dayOfWeekIso)
            <div class="modal-planer-pop" id="planerModal">
                <div class="modal-planer-content">
                    <div class="modal-header">
                        <h1>{{ $planer->title }}</h1>
                        <span class="close-btn" id="closeModalButton">&times;</span>
                    </div>
                    <div class="modal-body">
                        {!! $planer->content !!}
                    </div>
                </div>
                <div class="overlay-pop"></div>
            </div>
        @endif
    @endif

    <div class="box-container-block">
        <div class="box durations" id="stock">
            <div class="container">
                <div class="header-block">
                    <div class="head-block-title">
                        <div class="title-name">
                            <span>[ АКЦІЇ ]</span>
                        </div>
                        <div class="title-block">
                            Актуальні акції:
                        </div>
                    </div>
                </div>
                <div class="body-block">
                    <div class="swiper mySwiper swiperDurations">
                        <div class="swiper-wrapper">
                            @foreach ($stock as $st)
                                <div class="swiper-slide">
                                    <a href="{{ route('this_discount', ['id' => $st->id, 'name' => $st->link_name]) }}" target="_blank">
                                        <div class="block-el">
                                            <div class="banner-dr">
                                                <img src="{{ asset('storage/' . $st->banner) }}" alt="{{ $st->name }}">
                                                <div class="detail-button">Детальніше</div>
                                            </div>
                                            <div class="name-stock-b" id="name_stock_{{ $st->id }}" style="display: none;">
                                                <span>{{ $st->name }}</span>
                                                <h1>{{ $st->discount_action }}</h1>
                                            </div>
                                            <div class="content-block-sw">
                                                <div class="first-information">
                                                    <div class="bl">
                                                        <div class="title-inf">НАЗВА</div>
                                                        <div class="desc-inf">{{ $st->name }}</div>
                                                    </div>
                                                    <div class="bl">
                                                        <div class="title-inf">ВІДДІЛЕННЯ</div>
                                                        <div class="desc-inf">{{ $st->locations }}</div>
                                                    </div>
                                                    <div class="bl">
                                                        <div class="title-inf">Умови акції: </div>
                                                        <div class="desc-inf black-text">{!! $st->umowy !!}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box services">
            <div class="container">
                <div class="header-block">
                    <div class="head-block-title">
                        <div class="title-name">
                            <span>[ ПОСЛУГИ ]</span>
                        </div>
                        <div class="title-block">
                            <a href="{{ route('services') }}#spisok">
                                До списку послуг
                            </a>
                        </div>
                    </div>
                </div>
                <div class="body-block">
                    <div class="box-elements-items">
                        <div class="box-items">
                            <div class="item">
                                <div class="block-content">
                                    <div class="block-header">
                                        <a href="https://enot-24.com.ua/poslugi/categoriya/8" target="_blank">
                                            <div class="go-link">
                                                <svg width="64" height="64" viewBox="0 0 64 64" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="64" height="64" rx="32" fill="#F9FBF3" />
                                                    <path
                                                        d="M39.3846 24H24.6154C24.2757 24 24 24.2757 24 24.6154C24 24.9551 24.2757 25.2308 24.6154 25.2308H37.8988L24.1803 38.9495C23.94 39.1898 23.94 39.5794 24.1803 39.8197C24.3006 39.94 24.4578 40 24.6154 40C24.7729 40 24.9305 39.94 25.0505 39.8197L38.7692 26.1009V39.3846C38.7692 39.7243 39.0449 40 39.3846 40C39.7243 40 40 39.7243 40 39.3846V24.6154C40 24.2757 39.7243 24 39.3846 24Z"
                                                        fill="#E75A84" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="block-text">
                                        <h1>
                                            ЧИСТКА<br>
                                            КИЛИМІВ
                                        </h1>
                                        <p>
                                            Ми знаємось на чистці килимів як ніхто інший - за рік ми чистимо більше 1000+
                                            килимів по місту Києву
                                        </p>
                                    </div>
                                </div>
                                <div class="block-back">
                                    <img src="{{ asset('storage/src/banner_img/ea3d500215e319afde78ae89a2b7f379.jpg') }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="block-content">
                                    <div class="block-header">
                                        <a href="https://enot-24.com.ua/poslugi/categoriya/1" target="_blank">
                                            <div class="go-link">
                                                <svg width="64" height="64" viewBox="0 0 64 64" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="64" height="64" rx="32" fill="#F9FBF3" />
                                                    <path
                                                        d="M39.3846 24H24.6154C24.2757 24 24 24.2757 24 24.6154C24 24.9551 24.2757 25.2308 24.6154 25.2308H37.8988L24.1803 38.9495C23.94 39.1898 23.94 39.5794 24.1803 39.8197C24.3006 39.94 24.4578 40 24.6154 40C24.7729 40 24.9305 39.94 25.0505 39.8197L38.7692 26.1009V39.3846C38.7692 39.7243 39.0449 40 39.3846 40C39.7243 40 40 39.7243 40 39.3846V24.6154C40 24.2757 39.7243 24 39.3846 24Z"
                                                        fill="#E75A84" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="block-text">
                                        <h1>
                                            ХІМЧИСТКА<br>
                                            ОДЯГУ НА<br>
                                            КОЖЕН ДЕНЬ
                                        </h1>
                                        <p>
                                            Сорочки та футболки - щоб завжди мати пристойний вигляд.
                                            За адекватну ціну!
                                        </p>
                                    </div>
                                </div>
                                <div class="block-back">
                                    <img src="{{ asset('storage/src/banner_img/3cbdb04dbe2e27e14a4dcaf77d2168c6.jpg') }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="block-content">
                                    <div class="block-header">
                                        <a href="https://enot-24.com.ua/poslugi/categoriya/2" target="_blank">
                                            <div class="go-link">
                                                <svg width="64" height="64" viewBox="0 0 64 64" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="64" height="64" rx="32" fill="#F9FBF3" />
                                                    <path
                                                        d="M39.3846 24H24.6154C24.2757 24 24 24.2757 24 24.6154C24 24.9551 24.2757 25.2308 24.6154 25.2308H37.8988L24.1803 38.9495C23.94 39.1898 23.94 39.5794 24.1803 39.8197C24.3006 39.94 24.4578 40 24.6154 40C24.7729 40 24.9305 39.94 25.0505 39.8197L38.7692 26.1009V39.3846C38.7692 39.7243 39.0449 40 39.3846 40C39.7243 40 40 39.7243 40 39.3846V24.6154C40 24.2757 39.7243 24 39.3846 24Z"
                                                        fill="#E75A84" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="block-text">
                                        <h1>
                                            ХІМЧИСТКА<br>
                                            ПАЛЬТО ТА<br>
                                            ПУХОВИКІВ
                                        </h1>
                                        <p>
                                            Щоб на зиму був чистий пуховик, а на осінь та весну - гарне пальто!
                                        </p>
                                    </div>
                                </div>
                                <div class="block-back">
                                    <img src="{{ asset('storage/src/banner_img/dbfe29a645530f132e9417df9864ed21.jpg') }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="block-content">
                                    <div class="block-header">
                                        <a href="https://enot-24.com.ua/poslugi/categoriya/11" target="_blank">
                                            <div class="go-link">
                                                <svg width="64" height="64" viewBox="0 0 64 64" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="64" height="64" rx="32" fill="#F9FBF3" />
                                                    <path
                                                        d="M39.3846 24H24.6154C24.2757 24 24 24.2757 24 24.6154C24 24.9551 24.2757 25.2308 24.6154 25.2308H37.8988L24.1803 38.9495C23.94 39.1898 23.94 39.5794 24.1803 39.8197C24.3006 39.94 24.4578 40 24.6154 40C24.7729 40 24.9305 39.94 25.0505 39.8197L38.7692 26.1009V39.3846C38.7692 39.7243 39.0449 40 39.3846 40C39.7243 40 40 39.7243 40 39.3846V24.6154C40 24.2757 39.7243 24 39.3846 24Z"
                                                        fill="#E75A84" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="block-text">
                                        <h1>
                                            ДЛЯ ВЛАСНИКІВ<br>
                                            ПУХНАСТИХ УЛЮБЛЕНЦІВ
                                        </h1>
                                        <p>
                                            Коли вдома є проблеми з шерстю і не тільки :)
                                        </p>
                                    </div>
                                </div>
                                <div class="block-back">
                                    <img src="{{ asset('storage/src/banner_img/7c98497552a603ad002b587c92dafeb6.jpg') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="box about-work">
            <div class="container">
                <div class="header-block">
                    <div class="head-block-title">
                        <div class="title-name">
                            <span>[ як це працює ]</span>
                        </div>
                        <div class="title-block">
                            <h1>
                                Прості кроки
                            </h1>
                            <h4>
                                до замовлення хімчистки одягу у Єнот 24
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="body-block">
                    <div class="box-elements-items">
                        <div class="line-track-vertical">
                            <div class="ball-items">
                                <div class="ball"></div>
                                <div class="ball"></div>
                                <div class="ball"></div>
                                <div class="ball"></div>
                            </div>
                        </div>
                        <div class="box-items">
                            <div class="item">
                                <div class="block-dt">
                                    <div class="title-b">
                                        01 | Приходите у відділення або замовляєте курєра
                                    </div>
                                    <div class="description-b">
                                        Відвідайте наше відділення або викличте кур'єра для зручного та швидкого
                                        обслуговування, забезпечуючи вашим речам професійний догляд без зайвих турбот.
                                    </div>
                                </div>
                                <div class="block-dt">
                                    <div class="title-b">
                                        02 | Отримуєте консультацію щодо чистки яка підійде саме Вашим речам
                                    </div>
                                    <div class="description-b">
                                        Наші експерти нададуть детальну консультацію, підбираючи оптимальний метод чистки
                                        для кожного предмета вашого гардеробу.
                                    </div>
                                </div>
                            </div>
                            <div class="line-track">
                                <div class="ball-items">
                                    <div class="ball"></div>
                                    <div class="ball"></div>
                                    <div class="ball"></div>
                                    <div class="ball"></div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="block-dt">
                                    <div class="title-b">
                                        03 | Ваші речі знаходяться у нас декілька днів
                                        поки проводиться хімчистка одягу
                                    </div>
                                    <div class="description-b">
                                        Ваші речі будуть у надійних руках протягом декількох днів, поки ми проводимо
                                        професійну хімчистку, гарантуючи якісний результат.
                                    </div>
                                </div>
                                <div class="block-dt">
                                    <div class="title-b">
                                        04 | В зазначену дату Ви забираете речі з відділення або отримуєте доставкою від
                                        курєра
                                    </div>
                                    <div class="description-b">
                                        У вказану дату ви можете забрати свої речі з нашого відділення або отримати їх
                                        зручною доставкою від кур'єра прямо до дверей.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="box add-block">
            <div class="container">
                <div class="body-block">
                    <div class="box-elements-items">
                        <div class="block-content">
                            <div class="title">
                                <h1>
                                    Прання килимів
                                </h1>
                            </div>
                            <div class="text">
                                <p>
                                    Дайте друге життя старим, але дорогим серцю речам!<br>Не викидай - спробуй відновити!
                                </p>
                            </div>
                            <a href="{{ route('consultation') }}">
                                <div class="btn-order-clean">
                                    <span>
                                        Проконсультуйте мене!
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="block-back">
                            <img src="{{ asset('storage/src/banner_img/1862199947357d445819704e18d3241d-min(1).png') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box locations">
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
                    src="https://www.google.com/maps/d/u/1/embed?mid=1HCsHVYfX5w61I0GZOeTZwImLmDZ5PKo&ehbc=2E312F"></iframe>
            </div>
        </div>
        @include('includes.add_block')
    </div>
    <script>
        $(document).ready(function() {
            // Установка CSRF-токена для всех AJAX-запросов
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Обработчик нажатия на кнопку закрытия модального окна
            $('#closeModalButton').click(function() {
                $.ajax({
                    url: '/close-modal',
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        if (data.status === 'Modal closed') {
                            $('#planerModal').hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Ошибка:', error);
                    }
                });
            });
        });
    </script>
@endsection
