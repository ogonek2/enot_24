@extends('layouts.main.app')

@section('title')
<title>Мій кабінет - Єнот 24</title>
<meta property="og:title" content="Мій кабінет - Єнот 24">
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
@endsection
{{-- <ion-icon name="log-out-outline"></ion-icon> --}}
{{-- <ion-icon name="cash-outline"></ion-icon> --}}

@section('content')
    <div class="container-user">
        <div class="nav">
            <ul>
                <li data-target="info" class="active cl-tgl-li">
                    <span><ion-icon name="person-outline"></ion-icon></span>
                    <span>ПАНЕЛЬ КЛІЄНТА</span>
                </li>
                <li data-target="orders" class="cl-tgl-li">
                    <span><ion-icon name="reader-outline"></ion-icon></span>
                    <span>Мої замовлення</span>
                </li>
                {{-- <li data-target="durations" class="cl-tgl-li">
                    <span><ion-icon name="pricetag-outline"></ion-icon></span>
                    <span>Акції</span>
                </li> --}}
                <li data-target="notifications" class="cl-tgl-li">
                    <span><ion-icon name="notifications-outline"></ion-icon></span>
                    <span>Сповіщення</span>
                </li>
            </ul>
            <div class="nav-link">
                <ul>
                    <li id="open-question-modal">
                        <span><ion-icon name="help-circle-outline"></ion-icon></span>
                        <span>Задати питання</span>
                    </li>
                    <li onclick="window.location = '/contacts'">
                        <span><ion-icon name="people-outline"></ion-icon></span>
                        <span>Контакти</span>
                    </li>
                    <li id="open-rating-modal">
                        <span><ion-icon name="star-outline"></ion-icon></span>
                        <span>Оцінити нас</span>
                    </li>
                </ul>
            </div>
            <div class="logout">
                <a href="logout">
                    <span><ion-icon name="log-out-outline"></ion-icon></span>
                    <span>ВИЙТИ</span>
                </a>
            </div>
            <div class="nav-footer">
                <div class="logo-container" onclick="window.location.href = '/'">
                    <div class="logo-img">
                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="21" cy="21" r="21" fill="white" />
                            <path
                                d="M24.4622 24.6933C23.8849 24.7019 23.411 24.2457 23.411 23.6691C23.4024 23.0924 23.859 22.6277 24.4364 22.6191C25.0137 22.6105 25.4876 23.0666 25.4962 23.6433C25.4962 24.2199 25.0309 24.6847 24.4622 24.6933ZM17.7842 24.788C17.2069 24.7966 16.733 24.3404 16.733 23.7638C16.7244 23.1871 17.1811 22.7224 17.7584 22.7137C18.3357 22.7051 18.8096 23.1613 18.8096 23.7379C18.8269 24.306 18.3616 24.7794 17.7842 24.788ZM32.3465 25.1839C30.7955 24.4523 27.8572 23.0408 26.5561 22.2146C24.7466 21.0613 24.3243 21.2678 22.9543 22.1199C21.5842 22.9719 21.4377 21.44 21.9547 20.1059C22.4804 18.7719 24.1262 19.5551 24.1262 19.5551L31.166 22.533C31.6141 22.7224 32.0191 22.1973 31.7175 21.8186C31.0885 21.0096 30.3647 20.0801 30.0459 19.7014C29.4255 18.9698 29.9252 18.3588 29.9252 18.3588C29.9252 18.3588 31.5021 16.0349 30.83 13.5906C30.1579 11.1463 28.6413 11.964 27.3316 13.4443C26.0391 14.9075 24.9534 14.6923 24.9534 14.6923L16.957 14.8042C16.957 14.8042 15.8799 15.0452 14.5271 13.6078C13.1829 12.1705 11.6405 11.3873 11.0373 13.8488C10.4342 16.3104 12.0713 18.5911 12.0713 18.5911C12.0713 18.5911 12.5883 19.1936 11.9938 19.9424C11.6577 20.3641 10.8478 21.4658 10.2101 22.3351C9.96886 22.6621 10.3221 23.0924 10.6927 22.9203L17.9135 19.6325C17.9135 19.6325 19.5421 18.8063 20.1021 20.1231C20.6622 21.44 20.5502 22.9806 19.1629 22.1629C17.7756 21.3453 17.3448 21.1559 15.5611 22.3609C14.2945 23.2215 11.4337 24.6933 9.89131 25.4679C9.46909 25.6831 9.47771 26.2769 9.89993 26.4835L16.8536 29.8745C17.0346 29.9606 17.2155 29.754 17.1121 29.5905C16.7933 29.0999 16.5348 28.4286 16.9398 27.9122C17.6808 26.9827 18.4736 25.9757 18.9303 26.1306C19.3956 26.2855 19.8953 26.9052 19.8953 26.9052C19.8953 26.9052 20.4382 27.3269 19.7316 28.1704C19.0164 29.0139 19.5765 30.236 21.1017 30.2102H21.2309C22.7561 30.193 23.2817 28.9536 22.5493 28.1274C21.8169 27.3011 22.3511 26.8708 22.3511 26.8708C22.3511 26.8708 22.8337 26.2425 23.2903 26.0704C23.747 25.8982 24.5656 26.888 25.3325 27.7917C25.7547 28.2909 25.5221 28.9536 25.2291 29.4442C25.1257 29.6249 25.3153 29.8315 25.5048 29.7368L32.3724 26.1564C32.7774 25.9585 32.7601 25.3732 32.3465 25.1839ZM18.1806 23.7552C18.1806 23.54 18.0083 23.3679 17.7929 23.3679C17.5774 23.3679 17.4051 23.54 17.4051 23.7552C17.4051 23.9703 17.5774 24.1425 17.7929 24.1425C18.0083 24.1425 18.1806 23.9703 18.1806 23.7552ZM24.8069 23.6519C24.8069 23.4367 24.6345 23.2646 24.4191 23.2646C24.2037 23.2646 24.0314 23.4367 24.0314 23.6519C24.0314 23.867 24.2037 24.0392 24.4191 24.0392C24.6345 24.0478 24.8069 23.867 24.8069 23.6519Z"
                                fill="#15102E" />
                        </svg>
                    </div>
                    <div class="logo-title">
                        <svg width="87" height="22" viewBox="0 0 87 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M49.879 8.81503V8.99172H50.0556H54.49V20.4957V20.6661H54.6667H58.0035H58.1738V20.4957V8.99172H62.6145H62.7848V8.81503V6.10153V5.93115H62.6145L50.0556 5.93115H49.879V6.10153V8.81503Z"
                                fill="#F9FBF3" />
                            <path
                                d="M49.879 8.81503V8.99172H50.0556H54.49V20.4957V20.6661H54.6667H58.0035H58.1738V20.4957V8.99172H62.6145H62.7848V8.81503V6.10153V5.93115H62.6145L50.0556 5.93115H49.879V6.10153V8.81503Z"
                                fill="#F9FBF3" stroke="#2B2A27" stroke-width="0.0227272" stroke-miterlimit="22.9256" />
                            <path
                                d="M76.8638 8.99959V8.88509H76.75H72.8737L74.8909 6.97679C75.5295 6.37885 75.9722 5.83816 76.2061 5.36109C76.4338 4.88401 76.5476 4.36877 76.5476 3.82172C76.5476 3.21743 76.3958 2.6831 76.0797 2.23147C75.7635 1.77984 75.3272 1.43634 74.7707 1.18826C74.2143 0.946543 73.5693 0.825684 72.8357 0.825684C71.9631 0.825684 71.1853 0.99107 70.5024 1.31548C69.8195 1.64626 69.282 2.09789 68.8962 2.6831L68.833 2.78488L68.9342 2.84849L70.5656 3.90442L70.6605 3.96166L70.7237 3.87261C70.945 3.56092 71.2169 3.33192 71.5394 3.17926C71.8619 3.0266 72.2287 2.95026 72.6397 2.95026C73.133 2.95026 73.4934 3.05204 73.721 3.23651C73.955 3.42098 74.0688 3.68178 74.0688 4.038C74.0688 4.28608 74.0056 4.54052 73.8728 4.80132C73.74 5.05576 73.4871 5.37381 73.095 5.74911L69.3579 9.2922L69.3199 9.324V9.37489V10.8379V10.9524H69.4337H76.7563H76.8701V10.8379V8.99959H76.8638Z"
                                fill="#F9FBF3" />
                            <path
                                d="M76.8638 8.99959V8.88509H76.75H72.8737L74.8909 6.97679C75.5295 6.37885 75.9722 5.83816 76.2061 5.36109C76.4338 4.88401 76.5476 4.36877 76.5476 3.82172C76.5476 3.21743 76.3958 2.6831 76.0797 2.23147C75.7635 1.77984 75.3272 1.43634 74.7707 1.18826C74.2143 0.946543 73.5693 0.825684 72.8357 0.825684C71.9631 0.825684 71.1853 0.99107 70.5024 1.31548C69.8195 1.64626 69.282 2.09789 68.8962 2.6831L68.833 2.78488L68.9342 2.84849L70.5656 3.90442L70.6605 3.96166L70.7237 3.87261C70.945 3.56092 71.2169 3.33192 71.5394 3.17926C71.8619 3.0266 72.2287 2.95026 72.6397 2.95026C73.133 2.95026 73.4934 3.05204 73.721 3.23651C73.955 3.42098 74.0688 3.68178 74.0688 4.038C74.0688 4.28608 74.0056 4.54052 73.8728 4.80132C73.74 5.05576 73.4871 5.37381 73.095 5.74911L69.3579 9.2922L69.3199 9.324V9.37489V10.8379V10.9524H69.4337H76.7563H76.8701V10.8379V8.99959H76.8638Z"
                                fill="#F9FBF3" stroke="#2B2A27" stroke-width="0.0227272" stroke-miterlimit="22.9256" />
                            <path
                                d="M77.7931 8.90492H82.8581V10.832V10.9528H82.9775H85.1518H85.265V10.832V8.90492H86.7166H86.836V8.79044V6.95878V6.83794H86.7166L85.265 6.83794V5.13984V5.01901H85.1518H83.0467H82.9335V5.13984V6.83794H80.6901L84.7622 1.17761L84.8942 0.986816L84.668 0.986816L82.3303 0.986816H82.2737L82.236 1.0377L77.6988 7.20682L77.6737 7.23862V7.27678V8.79044V8.90492H77.7931Z"
                                fill="#F9FBF3" />
                            <path
                                d="M77.7931 8.90492H82.8581V10.832V10.9528H82.9775H85.1518H85.265V10.832V8.90492H86.7166H86.836V8.79044V6.95878V6.83794H86.7166L85.265 6.83794V5.13984V5.01901H85.1518H83.0467H82.9335V5.13984V6.83794H80.6901L84.7622 1.17761L84.8942 0.986816L84.668 0.986816L82.3303 0.986816H82.2737L82.236 1.0377L77.6988 7.20682L77.6737 7.23862V7.27678V8.79044V8.90492H77.7931Z"
                                fill="#F9FBF3" stroke="#2B2A27" stroke-width="0.0227272" stroke-miterlimit="22.9256" />
                            <path
                                d="M31.2828 6.10702V5.93115H31.1134H27.7894H27.6138V6.10702V11.6028H21.4299V6.10702V5.93115H21.2606H17.9366H17.7673V6.10702V20.4902V20.6661H17.9366H21.2606H21.4299V20.4902V14.7683H27.6138V20.4902V20.6661H27.7894H31.1134H31.2828V20.4902V6.10702Z"
                                fill="#F9FBF3" />
                            <path
                                d="M31.2828 6.10702V5.93115H31.1134H27.7894H27.6138V6.10702V11.6028H21.4299V6.10702V5.93115H21.2606H17.9366H17.7673V6.10702V20.4902V20.6661H17.9366H21.2606H21.4299V20.4902V14.7683H27.6138V20.4902V20.6661H27.7894H31.1134H31.2828V20.4902V6.10702Z"
                                fill="#F9FBF3" stroke="#2B2A27" stroke-width="0.0227272" stroke-miterlimit="22.9256" />
                            <path
                                d="M5.04294 11.8385C5.28186 10.8823 5.74715 10.1274 6.4325 9.54869C7.15557 8.93848 8.04212 8.62394 9.10473 8.62394C10.5823 8.62394 11.8273 9.1964 12.8521 10.3413L12.9716 10.4734L13.1036 10.3539L15.3106 8.29682L15.4301 8.18359L15.3295 8.05777C14.6001 7.16448 13.6884 6.48508 12.6132 6.01957C11.5192 5.55405 10.2994 5.32129 8.94754 5.32129C7.43851 5.32129 6.08039 5.6547 4.87946 6.32781C3.66595 7.01351 2.71652 7.95712 2.03117 9.15237C1.34582 10.3665 1 11.7316 1 13.2414C1 14.7512 1.33953 16.11 2.03117 17.3115C2.71652 18.5256 3.66595 19.4692 4.87946 20.1423C6.08039 20.828 7.43222 21.174 8.94754 21.174C10.2931 21.174 11.5192 20.9413 12.6132 20.4758C13.6947 20.0102 14.6001 19.3245 15.3295 18.4375L15.4301 18.3117L15.3106 18.1985L13.1036 16.1414L12.9716 16.0219L12.8521 16.154C11.8273 17.3052 10.5823 17.8714 9.10473 17.8714C8.06727 17.8714 7.19329 17.5757 6.47022 16.9907C5.79745 16.4434 5.33845 15.7262 5.08695 14.8329H10.903H11.0727V14.6631V12.0084V11.8385H10.903H5.04294Z"
                                fill="#F9FBF3" />
                            <path
                                d="M5.04294 11.8385C5.28186 10.8823 5.74715 10.1274 6.4325 9.54869C7.15557 8.93848 8.04212 8.62394 9.10473 8.62394C10.5823 8.62394 11.8273 9.1964 12.8521 10.3413L12.9716 10.4734L13.1036 10.3539L15.3106 8.29682L15.4301 8.18359L15.3295 8.05777C14.6001 7.16448 13.6884 6.48508 12.6132 6.01957C11.5192 5.55405 10.2994 5.32129 8.94754 5.32129C7.43851 5.32129 6.08039 5.6547 4.87946 6.32781C3.66595 7.01351 2.71652 7.95712 2.03117 9.15237C1.34582 10.3665 1 11.7316 1 13.2414C1 14.7512 1.33953 16.11 2.03117 17.3115C2.71652 18.5256 3.66595 19.4692 4.87946 20.1423C6.08039 20.828 7.43222 21.174 8.94754 21.174C10.2931 21.174 11.5192 20.9413 12.6132 20.4758C13.6947 20.0102 14.6001 19.3245 15.3295 18.4375L15.4301 18.3117L15.3106 18.1985L13.1036 16.1414L12.9716 16.0219L12.8521 16.154C11.8273 17.3052 10.5823 17.8714 9.10473 17.8714C8.06727 17.8714 7.19329 17.5757 6.47022 16.9907C5.79745 16.4434 5.33845 15.7262 5.08695 14.8329H10.903H11.0727V14.6631V12.0084V11.8385H10.903H5.04294Z"
                                fill="#F9FBF3" stroke="#2B2A27" stroke-width="0.0227272" stroke-miterlimit="22.9256" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M37.79 15.5795C37.4131 14.9152 37.2247 14.1568 37.2247 13.2982C37.2247 12.4396 37.4131 11.6813 37.79 11.017C38.1669 10.3527 38.6758 9.83251 39.3353 9.45649C39.9886 9.08046 40.7236 8.89871 41.5465 8.89871C42.3631 8.89871 43.0981 9.08672 43.7576 9.45649C44.4109 9.82625 44.926 10.3464 45.3029 11.017C45.6798 11.6813 45.8683 12.4396 45.8683 13.2982C45.8683 14.1568 45.6798 14.9152 45.3029 15.5795C44.9323 16.2438 44.4172 16.764 43.7576 17.14C43.0981 17.516 42.3694 17.6978 41.5465 17.6978C40.7236 17.6978 39.9886 17.5098 39.3353 17.14C38.6758 16.7702 38.1669 16.2501 37.79 15.5795ZM33.5185 13.2982C33.5185 14.7271 33.864 16.0244 34.5613 17.1776C35.2522 18.3245 36.2133 19.227 37.4383 19.885C38.6632 20.5431 40.0326 20.8627 41.5465 20.8689C43.0604 20.8689 44.4298 20.5431 45.6484 19.885C46.8671 19.2332 47.8219 18.3308 48.5254 17.1776C49.2227 16.0244 49.5745 14.7334 49.5745 13.2982C49.5745 11.8693 49.229 10.572 48.5254 9.41888C47.8219 8.272 46.8671 7.36953 45.6484 6.71148C44.4298 6.05343 43.0604 5.72754 41.5465 5.72754C40.0326 5.72754 38.6632 6.05343 37.4383 6.71148C36.2133 7.36326 35.2585 8.26573 34.5613 9.41888C33.864 10.572 33.5185 11.8693 33.5185 13.2982Z"
                                fill="#F9FBF3" />
                            <path
                                d="M37.79 15.5795C37.4131 14.9152 37.2247 14.1568 37.2247 13.2982C37.2247 12.4396 37.4131 11.6813 37.79 11.017C38.1669 10.3527 38.6758 9.83251 39.3353 9.45649C39.9886 9.08046 40.7236 8.89871 41.5465 8.89871C42.3631 8.89871 43.0981 9.08672 43.7576 9.45649C44.4109 9.82625 44.926 10.3464 45.3029 11.017C45.6798 11.6813 45.8683 12.4396 45.8683 13.2982C45.8683 14.1568 45.6798 14.9152 45.3029 15.5795C44.9323 16.2438 44.4172 16.764 43.7576 17.14C43.0981 17.516 42.3694 17.6978 41.5465 17.6978C40.7236 17.6978 39.9886 17.5098 39.3353 17.14C38.6758 16.7702 38.1669 16.2501 37.79 15.5795ZM33.5185 13.2982C33.5185 14.7271 33.864 16.0244 34.5613 17.1776C35.2522 18.3245 36.2133 19.227 37.4383 19.885C38.6632 20.5431 40.0326 20.8627 41.5465 20.8689C43.0604 20.8689 44.4298 20.5431 45.6484 19.885C46.8671 19.2332 47.8219 18.3308 48.5254 17.1776C49.2227 16.0244 49.5745 14.7334 49.5745 13.2982C49.5745 11.8693 49.229 10.572 48.5254 9.41888C47.8219 8.272 46.8671 7.36953 45.6484 6.71148C44.4298 6.05343 43.0604 5.72754 41.5465 5.72754C40.0326 5.72754 38.6632 6.05343 37.4383 6.71148C36.2133 7.36326 35.2585 8.26573 34.5613 9.41888C33.864 10.572 33.5185 11.8693 33.5185 13.2982Z"
                                fill="#F9FBF3" stroke="#15102E" stroke-width="0.0227272" stroke-miterlimit="22.9256" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Кнопка для открытия/закрытия навигации -->
        <button class="toggle-nav">☰</button>

        <div class="content">
            <div id="info" class="panel active">
                <div class="panel-container-us">
                    <div class="header-panel-c">
                        <div class="title-panel">
                            <h1>Мій кабінет</h1>
                            <span>Панель клієнта</span>
                        </div>
                    </div>
                    <div class="content-panel-c">
                        <div class="header-form-c">
                            <div class="enter">
                                <span>ПІБ <small>Для пришвидшення оформлення замовлень</small></span>
                                <input type="text" class="form-input" name="name_client" value="{{ Auth::user()->name }}"
                                    id="editableName">
                            </div>
                            <div class="enter">
                                <span>Ваш номер телефону</span>
                                <input type="text" class="form-input" name="phone_client"
                                    value="{{ Auth::user()->phone }}" id="editablePhone">
                            </div>
                        </div>
                        <div class="bonus-card-c">
                            <div class="card-container">
                                <div class="card">
                                    <div class="card-front">
                                        <div class="card-c">
                                            <div class="bg">
                                                <img src="{{ asset('storage/src/logo/logo_contactsWH.png') }}"
                                                    alt="ENOT 24">
                                            </div>
                                            <div class="card-content-b">
                                                <div class="header-content-b">
                                                    <h1>
                                                        ВАШІ БОНУСИ
                                                    </h1>
                                                    <p>Використайте на <b>НЕ АКЦІЙНІ</b> пропозиції</p>
                                                </div>
                                                <div class="bonuses-wallet">
                                                    <h1><b>{{ $bonuses->bonus }}</b></h1>
                                                    <p>грн</p>
                                                </div>
                                                <div class="bonuses-footer">
                                                    <p id="card_number">{{ $bonuses->bonus_number }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-back">
                                        <div class="logo">
                                            <img src="{{ asset('storage/src/logo/logo_contactsWH.png') }}" alt="ENOT 24">
                                        </div>
                                        <div class="bonus_code-scann">
                                            <img src="data:image/png;base64,{{ $bonuses->bonus_code }}" alt="Штрих-код">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="orders" class="panel">
                <div class="panel-container-us">
                    <div class="header-panel-c">
                        <div class="title-panel">
                            <h1>Мій кабінет</h1>
                            <span>МОЇ ЗАМОВЛЕННЯ</span>
                        </div>
                    </div>
                    <div class="content-panel-c">
                        <div class="service-items">
                            @foreach ($orderList as $oe)
                                @php
                                    $ser = $services->where('id', $oe->service_id)->first();
                                    $category = $categories->where('id', $ser->category_id)->first();
                                @endphp
                                <div class="order-element">
                                    <span class="or_da">{{ $oe->created_at }} -
                                        @if ($oe->status == 1)
                                            <b class="sccss"><i class="fa-solid fa-square-check"></i> Готово</b>
                                        @else
                                            <b class="dngr"><i class="fa-solid fa-clock"></i> Не оформлено або не
                                                перевірено</b>
                                        @endif
                                    </span>
                                    <div class="co-box">
                                        <div class="head-inf">
                                            <div class="img-ico">
                                                <img src="{{ asset('storage/' . $category->catyegory_img) }}"
                                                    alt="{{ $category->category }}">
                                            </div>
                                            <div class="text-name">
                                                <span>
                                                    <b>{{ $ser->name }}</b>
                                                </span>
                                                <span>{{ $category->category }}</span>
                                            </div>
                                        </div>
                                        <div class="footer-inf">
                                            <div class="price-t">
                                                <b><i class="fa-solid fa-tags"></i> {{ $oe->service_price }}</b>
                                            </div>
                                            <div class="btn-add-cart btn-add-to-cart-func-ac"
                                                data-service_id="{{ $oe->service_id }}">
                                                <span>
                                                    Додати у кошик
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div id="durations" class="panel">
                <div class="panel-container-us">
                    <div class="header-panel-c">
                        <div class="title-panel">
                            <h1>Мій кабінет</h1>
                            <span>Акції</span>
                        </div>
                    </div>
                    <div class="content-panel-c">

                    </div>
                </div>
            </div> --}}
            <div id="notifications" class="panel">
                <div class="panel-container-us">
                    <div class="header-panel-c">
                        <div class="title-panel">
                            <h1>Мій кабінет</h1>
                            <span>Центр сповіщень</span>
                        </div>
                    </div>
                    <div class="content-panel-c">
                        <div class="chat-container">
                            <!-- Список чатов -->
                            <div class="chat-list">
                                @foreach ($notificationsProfile as $item)
                                    <div class="chat-item" data-chat-id="chat{{ $item->id }}">
                                        <div class="item-avatar">
                                            <img src="{{ asset('storage/' . $item->icon) }}" alt="{{ $item->name }}">
                                        </div>
                                        <div class="text-pr-inf">
                                            <span>
                                                <b>{{ $item->name }}</b>
                                            </span>
                                            <span>{{ $item->title }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Сообщения чата -->
                            <div class="chat-content">
                                @foreach ($notificationsProfile as $item)
                                    <div class="chat-messages" id="chat{{ $item->id }}">
                                        <div class="chat-header">{{ $item->title }}</div>
                                        <div class="messages">
                                            @foreach ($notifications->where('from_profile', $item->id) as $el)
                                                <div class="message">
                                                    <div class="date-msg">{{ $el->created_at }}</div>
                                                    <div class="text-msg">
                                                        {!! $el->message !!}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        {{-- @if ($item->message_permisson == 1)
                                            <div class="form-group chat-input">
                                                <textarea name="text_help" placeholder="Введіть повідомлення..."></textarea>
                                                <button><i class="fa-solid fa-paper-plane"></i></button>
                                            </div>
                                        @endif --}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="overlay"></div>
        <div id="rating-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h3>Оцініть нас</h3>
                <div class="star-rating">
                    <span class="star" data-rating="1">&#9733;</span>
                    <span class="star" data-rating="2">&#9733;</span>
                    <span class="star" data-rating="3">&#9733;</span>
                    <span class="star" data-rating="4">&#9733;</span>
                    <span class="star" data-rating="5">&#9733;</span>
                </div>
                <div class="emoji-display">
                    <span class="emoji" id="emoji-display">🙂</span>
                </div>
                <button id="submit-rating">Відправити</button>
            </div>
        </div>
        <div id="question-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h3>Задати питання</h3>
                <textarea id="question-input" placeholder="Введіть ваше питання..."></textarea>
                <button id="submit-question">Відправити</button>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Inputmask({
                mask: "+380(99)999-9999"
            }).mask(document.getElementById("editablePhone"));
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Inputmask({
                mask: "9999 9999 9999"
            }).mask(document.getElementById("card_number"));
        });
    </script>
    <script>
        $(document).ready(function() {
            // Обработчик клика по пунктам навигации
            $('.nav ul .cl-tgl-li').on('click', function() {
                // Убираем активный класс у всех пунктов
                $('.nav ul .cl-tgl-li').removeClass('active');
                // Добавляем активный класс на выбранный пункт
                $(this).addClass('active');

                // Получаем целевую панель
                var target = $(this).data('target');
                // Скрываем все панели
                $('.panel').removeClass('active');
                // Отображаем выбранную панель
                $('#' + target).addClass('active');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Изначально скрываем навигацию для мобильных устройств
            $('.nav').addClass('hidden');

            // Обработчик клика по пунктам навигации
            $('.nav ul .cl-tgl-li').on('click', function() {
                // Убираем активный класс у всех пунктов
                $('.nav ul .cl-tgl-li').removeClass('active');
                // Добавляем активный класс на выбранный пункт
                $(this).addClass('active');

                // Получаем целевую панель
                var target = $(this).data('target');
                // Скрываем все панели
                $('.panel').removeClass('active');
                // Отображаем выбранную панель
                $('#' + target).addClass('active');
            });

            // Обработчик клика по кнопке навигации
            $('.toggle-nav, .cl-tgl-li').on('click', function() {
                $('.nav').toggleClass('hidden');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.card-container').click(function() {
                $('.card').toggleClass('flipped');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Делаем первый чат активным при загрузке страницы
            $('.chat-messages').hide();
            $('.chat-item').first().addClass('active');
            const firstChatId = $('.chat-item').first().data('chat-id');
            $('#' + firstChatId).show();

            $('.chat-item').on('click', function() {
                // Убираем активный класс у всех чатов и скрываем все сообщения
                $('.chat-item').removeClass('active');
                $('.chat-messages').hide();

                // Добавляем активный класс к выбранному чату и отображаем его сообщения
                $(this).addClass('active');
                const chatId = $(this).data('chat-id');
                $('#' + chatId).show();
            });
        });
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('js/main/ajax.js') }}"></script>
    <script>
        $(document).ready(function() {
            const emojiMap = {
                1: "😢",
                2: "😟",
                3: "😐",
                4: "🙂",
                5: "😁"
            };

            // Открытие окон
            $("#open-rating-modal").click(function() {
                $("#overlay").fadeIn();
                $("#rating-modal").fadeIn();
            });

            $("#open-question-modal").click(function() {
                $("#overlay").fadeIn();
                $("#question-modal").fadeIn();
            });

            // Закрытие окон
            $(".close-btn, #overlay").click(function() {
                $("#overlay").fadeOut();
                $(".modal").fadeOut();
            });

            // Выбор звезд и отображение соответствующего эмодзи
            $(".star").click(function() {
                $(".star").removeClass("active");
                $(this).addClass("active").prevAll().addClass("active");

                const starRating = $(this).data("rating");
                $("#emoji-display").text(emojiMap[starRating]);
            });
        });
    </script>
@endsection
