@extends('layouts.main.app')

@section('title')
    <title>Послуги з хімчистки та прання - Єнот-24</title>
    <meta property="Послуги з хімчистки та прання - Єнот-24">

    <meta property="og:description"
        content="Замовити послугу прання/хімчистки килимів та одягу Ви можете в компанії Єнот-24. Краща якість хімчистки. Безпечна хімія. Найкоротші терміни. Замовляйте просто зараз!">
    
    <!-- Локалізація та адреса -->
    <meta name="geo.position" content="50.4501;30.5234">
    <meta name="geo.region" content="UA-30">
    <meta name="geo.placename" content="Київ, Україна">
    <meta name="DC.title" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta name="DC.description" content="Замовити послугу прання/хімчистки килимів та одягу Ви можете в компанії Єнот-24. Краща якість хімчистки. Безпечна хімія. Найкоротші терміни. Замовляйте просто зараз!">
    <meta name="DC.subject" content="Прання, хімчистка, Київ, Єнот-24, чистка килимів, одяг">
    
    <!-- Оптимізація для пошукових систем -->
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://enot-24.com.ua/poslugi">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta property="og:description" content="Якісні послуги прання та хімчистки в Києві. Звертайтеся до Єнот-24 для чистоти, яку ви заслуговуєте!">
    <meta property="og:url" content="https://enot-24.com.ua/poslugi">
    
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
    <link rel="preconnect" href="https://enot-24.com.ua/poslugi" crossorigin>
    
    <!-- Підказка для мобільних пристроїв (Google та інші пошукові системи враховують адаптивність сайту) -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=yes">
    
    <!-- Додаткові метатеги для пошукової оптимізації -->
    <meta property="og:locale" content="uk_UA">
    <meta property="og:site_name" content="Єнот-24">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta name="twitter:description" content="Професійне прання та хімчистка килимів і одягу в Києві. Чистота, якість та вигідні ціни від Єнот-24!">
    <meta name="twitter:url" content="https://enot-24.com.ua/poslugi">
    
    <!-- Локалізаційні теги для Google My Business -->
    <meta itemprop="name" content="Єнот-24 - Прання/Хімчистка Килимів та Одягу в Києві">
    <meta itemprop="addressLocality" content="Київ">
    <meta itemprop="telephone" content="+38 (067) 887-2233">
    
    
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
      "url": "https://enot-24.com.ua/poslugi",
      "telephone": "+38 (067) 887-2233",
      "priceRange": "₴₴",
      "description": "Професійні послуги прання та хімчистки килимів і одягу в Києві від Єнот-24.",
      "areaServed": "Київ, Україна"
    }
    </script>
@endsection


@section('header')
    @include('includes.header.nav')
@endsection

@section('content')
    <div class="box-container-block">
        <div class="box services-page">
            <div class="container">
                <div class="body-block">
                    <div class="box-elements">
                        <div class="search-block">
                            <div class="block-enter">
                                <div class="box-enter">
                                    <form id="searchForm2" method="get">
                                        <div class="enter">
                                            <input type="text" placeholder="Я шукаю..." name="search_input_elem"
                                                id="search_input_elem_services" autocomplete="false" old="false">
                                        </div>
                                        <button type="submit">
                                            <div class="btn-search-submit">
                                                <span>
                                                    <span>
                                                        <svg width="14" height="14" viewBox="0 0 20 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M19.7556 18.5773L14.0682 12.8899C15.1699 11.5291 15.8332 9.7999 15.8332 7.9166C15.8332 3.55164 12.2815 0 7.91656 0C3.55161 0 0 3.55161 0 7.91656C0 12.2815 3.55165 15.8332 7.9166 15.8332C9.7999 15.8332 11.5291 15.1699 12.8899 14.0682L18.5773 19.7556C18.7398 19.9181 18.9531 19.9998 19.1665 19.9998C19.3798 19.9998 19.5932 19.9181 19.7557 19.7556C20.0815 19.4298 20.0815 18.9031 19.7556 18.5773ZM7.9166 14.1665C4.46996 14.1665 1.66666 11.3632 1.66666 7.91656C1.66666 4.46992 4.46996 1.66662 7.9166 1.66662C11.3632 1.66662 14.1665 4.46992 14.1665 7.91656C14.1665 11.3632 11.3632 14.1665 7.9166 14.1665Z"
                                                                fill="#F9FBF3" />
                                                        </svg>
                                                    </span>
                                                    <span>
                                                        Пошук
                                                    </span>
                                                </span>
                                            </div>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="categories-block" id="spisok-poslug">
                            <div class="block-items">
                                @foreach ($categories as $item)
                                    <a href="#posluga{{ $item->id }}">
                                        <div class="item">
                                            <span>{{ $item->category }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="services-block" id="spisok">
        <div class="block-items">
            @foreach ($categories as $item)
                <div class="block-box" id="posluga{{ $item->id }}">
                    <div class="services-block-list">
                        <div class="services-table-mix-box">
                            <div class="responsive-table">
                                <div class="price-head">
                                    <div class="price-row first-row">{{ $item->category }}</div>
                                    <div class="price-row standart">Потокова</div>
                                    <div class="price-row pro">Індивідуальна</div>
                                </div>
                            </div>
                            <div class="price-table">
                                @foreach ($services->where('category_id', $item->id) as $el)
                                    <div class="price-row btn-open-win-service" data-service-id="{{ $el->id }}"
                                        data-category-id="{{ $el->category_id }}" data-service-name="{{ $el->name }}"
                                        data-service-category="{{ $item->category }}"
                                        data-category-image="{{ asset('storage/' . $item->catyegory_img) }}"
                                        data-ind-price="{{ $el->individual_price }}" data-stm-price="{{ $el->stream_price }}">
                                        <div class="service-box s-name">
                                            <div class="go-link">
                                                <svg width="24" height="24" viewBox="0 0 64 64" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="64" height="64" rx="32" fill="#F9FBF3" />
                                                    <path
                                                        d="M39.3846 24H24.6154C24.2757 24 24 24.2757 24 24.6154C24 24.9551 24.2757 25.2308 24.6154 25.2308H37.8988L24.1803 38.9495C23.94 39.1898 23.94 39.5794 24.1803 39.8197C24.3006 39.94 24.4578 40 24.6154 40C24.7729 40 24.9305 39.94 25.0505 39.8197L38.7692 26.1009V39.3846C38.7692 39.7243 39.0449 40 39.3846 40C39.7243 40 40 39.7243 40 39.3846V24.6154C40 24.2757 39.7243 24 39.3846 24Z"
                                                        fill="#E75A84" />
                                                </svg>
                                            </div>
                                            <span>
                                                <small>{{ $item->category }}</small>
                                                {{ $el->name }}
                                            </span>
                                        </div>
                                        <div class="price-head">
                                            <div class="price-row standart">Потокова</div>
                                            <div class="price-row pro">Індивідуальна</div>
                                        </div>
                                        <div class="service-box s-price">{{ $el->stream_price }} ₴</div>
                                        <div class="service-box s-price">
                                            @if ($el->individual_price == '0')
                                            ~Відсутньо~
                                            @else
                                            {{ $el->individual_price }} ₴
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('includes.feedback-page', ['content' => '~Не обрано~'])
@endsection
