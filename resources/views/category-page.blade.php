@extends('layouts.main.app')

@section('title')
    <title>Хімчистка - {{ $thisCategory->category }}</title>
    <meta name="description" content="Замовити послуги хімчистки в Києві: чищення килимів, одягу та ін. Швидко, якісно та за доступними цінами. Доставка і вивезення по Києву.">
    <meta name="keywords" content="хімчистка Київ, чищення килимів Київ, хімчистка Київ, чистка одягу Київ, послуги хімчистки Київ, пральня Київ, чищення килимів, чистка одягу">
    <meta name="robots" content="index, follow">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Хімчистка в Києві - Професійне чищення килимів та одягу">
    <meta property="og:description" content="Надаємо послуги хімчистки в Києві для килимів, одягу та інших тканин. Якісна та швидка хімчистка з доставкою по місту.">
    <meta property="og:image" content="URL_до_картинки_представлення">
    <meta property="og:url" content="https://yourwebsite.com/khimchistka-kyiv">
    <meta name="twitter:title" content="Хімчистка в Києві - Професійне чищення килимів та одягу">
    <meta name="twitter:description" content="Професійна хімчистка в Києві: чистка килимів, одягу. Швидко та якісно.">
@endsection

@section('header')
    @include('includes.header.nav')
    @include('includes.header-page', [
        'content' => $thisCategory->category,
        'paragraph' =>
            'Мережа хімчисток Єнот-24 в Києві має довгу і вражаючу історію, що налічує понад десять років успішної діяльності. ',
    ])
@endsection

@section('content')
    @include('includes.feedback-page', ['content' => $thisCategory->category])
    <div class="services-block-list">
        <div class="services-table-mix-box">
            <div class="responsive-table">
                <div class="price-head">
                    @if ($thisCategory->category_type == 2)
                        <div class="price-row first-row">Послуга</div>
                        <div class="price-row standart"></div>
                        <div class="price-row pro"></div>
                    @else
                        <div class="price-row first-row">Послуга</div>
                        <div class="price-row standart">Потокова</div>
                        <div class="price-row pro">Індивідуальна</div>
                    @endif
                </div>
            </div>
            <div class="price-table">
                @foreach ($services as $el)
                    <div class="price-row btn-open-win-service" data-service-id="{{ $el->id }}"
                        data-category-id="{{ $el->category_id }}" data-service-name="{{ $el->name }}"
                        data-service-category="{{ $thisCategory->category }}"
                        data-category-image="{{ asset('storage/' . $thisCategory->catyegory_img) }}"
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
                                {{ $el->name }} @if ($el->marker) <span style="padding: 5px; font-size: 12px; background-color: #D4DE85; border-radius: 20px; color: #000; white-space: nowrap;">{{ $el->marker }}</span> @endif
                            </span>
                        </div>
                        @if ($thisCategory->category_type == 1)
                        <div class="price-head">
                            <div class="price-row standart">Потокова</div>
                            <div class="price-row pro">Індивідуальна</div>
                        </div>
                        <div class="service-box s-price" @if ($el->marker) style="color: #D4DE85" @endif>@if ($el->marker) <i class="fa-solid fa-tag"></i> @endif {{ $el->stream_price }} ₴ </div>
                        <div class="service-box s-price">
                            @if ($el->individual_price == '0')
                            ~Відсутньо~
                            @else
                            {{ $el->individual_price }} ₴
                            @endif
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="box-container-block">
        <div class="box services-page">
            <div class="container">
                <div class="body-block">
                    <div class="box-elements">
                        <div class="search-block">
                            <div class="block-enter">
                                <div class="box-enter">
                                    <form action="post" id="searchForm2">
                                        <div class="enter">
                                            <input type="text" placeholder="Я шукаю..." name="search_input_elem"
                                                id="search_input_elem_services">
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
                        @include('includes.categories', ['content' => $categories])
                    </div>
                </div>
            </div>
        </div>
        @include('includes.add_block')
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const items = $('.item-box-content');
            let currentIndex = 0;

            function animateItems() {
                // Убираем класс active у всех элементов
                items.removeClass('active');

                // Добавляем класс active текущему элементу
                items.eq(currentIndex).addClass('active');

                // Проверяем, достигли ли последнего элемента
                if (currentIndex === items.length - 1) {
                    // После последнего элемента убираем класс active со всех
                    setTimeout(() => {
                        items.removeClass('active');
                    }, 1000); // Задержка для завершения последней анимации
                    return; // Прерываем цикл
                }

                // Переходим к следующему элементу
                currentIndex++;

                // Запускаем анимацию с задержкой
                setTimeout(animateItems, 200); // 1 секунда на каждый элемент
            }

            // Начинаем анимацию
            animateItems();
        });
    </script>
@endsection
