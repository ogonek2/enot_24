@extends('layouts.main.app')

@section('title')
<title>Мій кошик - Єнот 24</title>
<meta property="og:title" content="Мій кошик - Єнот-24 Прання/Хімчистка Килимів та Одягу в Києві">
@endsection

@section('header')
    @include('includes.header.nav')
@endsection

@section('content')
    <div class="box-container-block">
        <div class="box cart-page">
            <div class="container">
                <div class="body-block">
                    <div class="box-elements">
                        <div class="services-block">
                            <div class="title">
                                Вибрані послуги
                            </div>
                            <div class="block-items">
                                <form action="{{ route('cart_submit_orders') }}" method="POST" id="store_cart_submit_form">
                                    @csrf
                                    <div class="block-box">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Послуга</th>
                                                    <th>Ціна</th>
                                                    <th><a href="{{ route('cart_all.delete') }}">Видалити все</a></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cart as $el)
                                                    @php
                                                        $service = $services->find($el->service_id);
                                                        $category = $categories->find($service->category_id);
                                                    @endphp
                                                    @if ($service && $category)
                                                        <tr>
                                                            <td>
                                                                <div class="box-title-cart-service">
                                                                    <div class="icon-service-category">
                                                                        <img src="{{ asset('storage/' . $category->catyegory_img) }}"
                                                                            alt="{{ $service->name }}">
                                                                    </div>
                                                                    <div class="service-title-information">
                                                                        <div class="title-service-name">
                                                                            {{ $service->name }}
                                                                        </div>
                                                                        <div class="service-category-name">
                                                                            {{ $category->category }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="select-container">
                                                                    <select name="type_service_price[]"
                                                                        class="service-select-pti"
                                                                        id="selected_ser_id_{{ $service->id }}">
                                                                        <option
                                                                            value="Потокова - {{ $service->stream_price }} ₴">
                                                                            Базова {{ $service->stream_price }} ₴</option>
                                                                        @if ($service->individual_price != 0)
                                                                            <option
                                                                                value="Індивідуальна - {{ $service->individual_price }} ₴">
                                                                                Індивідуальна
                                                                                {{ $service->individual_price }} ₴</option>
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('cart_this.delete', $el->id) }}">
                                                                    <svg width="12" height="12" viewBox="0 0 12 12"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11.25 1.8075L10.1925 0.75L6 4.9425L1.8075 0.75L0.75 1.8075L4.9425 6L0.75 10.1925L1.8075 11.25L6 7.0575L10.1925 11.25L11.25 10.1925L7.0575 6L11.25 1.8075Z"
                                                                            fill="#666666" />
                                                                    </svg>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <input type="hidden" value="{{ $service->name }}"
                                                            name="service_client[]">
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="block-box">
                                        <div class="form-block">
                                            <div class="form-enter-block">
                                                <div class="enter-block">
                                                    <div class="title">
                                                        Як ми можемо до Вас звертатись?
                                                    </div>
                                                    <div class="block-items">
                                                        <input type="text" placeholder="Ваше ім`я"
                                                            name="client_name">
                                                    </div>
                                                </div>
                                                <div class="enter-block">
                                                    <div class="title">
                                                        Номер телефону
                                                    </div>
                                                    <div class="block-items">
                                                        <input type="text" placeholder="Номер телефону"
                                                            name="feedback_client" id="phone_cart">
                                                    </div>
                                                </div>
                                                <div class="enter-block">
                                                    <div class="title">
                                                        Коментар
                                                    </div>
                                                    <div class="block-items">
                                                        <input type="text"
                                                            placeholder="Вкажіть в якому стані Ваші речі" name="comment">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-footer-block">
                                                @error('feedback_client')
                                                    <span class="error">- Введіть контактні данні!</span>
                                                @enderror
                                                @error('service_client')
                                                    <span class="error">- Ви не обрали жодної послуги!</span>
                                                @enderror
                                                <div class="information">
                                                    <div class="detail">
                                                        <div class="total-sum">
                                                            Ціна за послуги: <span class="total_services">0</span> ₴
                                                        </div>
                                                        <div class="total-sum clear-action">
                                                            З акцією чистий четвер <span
                                                                class="total_services">0</span>-35%: <span
                                                                class="total">0</span> ₴
                                                        </div>
                                                        <div class="list-detail">
                                                            <ul class="service_selected_list_price">
                                                                @foreach ($cart as $ser)
                                                                    @php
                                                                        $service = $service
                                                                            ->where('id', $ser->service_id)
                                                                            ->first();
                                                                    @endphp
                                                                    @if ($service)
                                                                        <li data-ser-id="{{ $service->id }}" class="product-lst"
                                                                            data-promotion="{{ $service->promotion }}" data-s-na="{{ $service->name }}">
                                                                            {{ $service->name }}:
                                                                            <b class="ser_price">{{ $ser->price }}</b>
                                                                            @if ($service->promotion == 2)
                                                                                <i title="Це акційна пропозиція"
                                                                                    color="#C47E93"
                                                                                    class="fa-sharp fa-solid fa-percent"></i>
                                                                            @endif
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="total-container">
                                                        <span>Всього: <span class="total" id="use_total_absolute">0</span> ₴</span>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="buttons">
                                                    <a href="{{ route('courier') }}">
                                                        <div class="btn-order-courier-block">
                                                            <span>
                                                                Замовити кур`єра
                                                            </span>
                                                        </div>
                                                    </a>
                                                    <button type="submit">
                                                        <div class="btn-order-submit-block">
                                                            <span>
                                                                Зробити замовлення
                                                            </span>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.add_block')
    </div>
@endsection