<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    
    <!-- Підказки для пошукових систем -->
    <meta name="google-site-verification" content="-Tye_Cwi5cK0K8x7A1C8Heuxg5Nmxgjh-H5j3vGd6gQ" />
    
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('storage/src/logo/enot-white-bg.png') }}">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="{{ asset('storage/src/logo/logo-enot24.png') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
        :root {
            --var-first-color-1: #C47E93;
            --var-first-color-2: #FFFFFF;
            --var-first-color-3: #000000;

            --var-color-1: #F4F4F2;
            --var-color-2: #302950;
            --var-color-3: #FDD9E5;
            --var-color-4: #C47E93;
            --var-color-5: #B0A8FE;
            --var-color-6: #FDD9E5;
            --var-color-7: #D4DE85;
            --var-color-8: #B0A8FE;
        }
    </style>
    <style>
        #my-video {
          pointer-events: none; /* Отключает все взаимодействия с видео */
        }
        
        .vjs-poster {
          pointer-events: none; /* Отключает взаимодействие с постером видео */
        }
    </style>

    <link rel="stylesheet" href="css/swiper-bundle.min.css" />
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://vjs.zencdn.net/8.16.1/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/8.16.1/video.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content-services.css') }}">
    <link rel="stylesheet" href="{{ asset('css/windows.css') }}">
    <link rel="stylesheet" href="{{ asset('css/canonicalPage.css') }}">
    <style>
        .swiper-slide.single-slide {
            width: 100% !important;
        }
    </style>
    @yield('styles')
    
        <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-N29G5VKN');</script>
    <!-- End Google Tag Manager -->
    
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N29G5VKN"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</head>

<body>
    @if (!Request::is('contacts'))
        @include('includes.wheel_fortune')
    @endif
    @include('includes.feedback-win')
    @include('includes.elements.app_bar')
    <div id="app" class="app">
        <div class="alert-btn-fixed open-modal-alert-fd show_fd_w">
            <div class="alert-btn">
                <span>
                    <i class="fa-solid fa-phone"></i>
                </span>
            </div>
        </div>
        <div class="modals-window-popaps popap-service">
            <div class="ppapp">
                <div class="block-content-window">
                    <div class="popapp-content">
                        <div class="close-btn" id="close-popapps">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.3769 0L10.5 7.875L2.625 0L0 2.625L7.875 10.5L0 18.375L2.625 21L10.5 13.125L18.3769 21L21.0019 18.375L13.1269 10.5L21.0019 2.625L18.3769 0Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="header-popapp">
                            <div class="title-pp">
                                <h1>
                                    Привіт!
                                </h1>
                                <p>
                                    Для того щоб Наші Єноти отримали Ваш запит<br>
                                    зробіть замовлення або викличте кур`єра
                                </p>
                            </div>
                        </div>
                        <div class="this-service">
                            <div class="icon-service">
                                <img src="" alt="Категорія" id="category_img_data">
                            </div>
                            <div class="text-info">
                                <div class="title-ser" id="service_data"></div>
                                <div class="category-ser" id="service_category_data"></div>
                            </div>
                            <div class="prices-info">
                                <div class="price-i-block">
                                    <span>Потокове прання</span>
                                    <div class="price-i" id="service_data_price_stm"></div>
                                </div>
                                <div class="price-i-block">
                                    <span>Індивід. прання</span>
                                    <div class="price-i" id="service_data_price_ind"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="btn-order-courier btn-go-to-cart-func-ac" id="order-this-service">
                            <span>
                                Замовити цю послугу
                            </span>
                        </div>
                        <div class="btn-add-cart btn-add-to-cart-func-ac" id="add-to-cart">
                            <span>
                                Додати у кошик
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
        <div class="modals-window-popaps popap-success-cart">
            <div class="ppapp">
                <div class="block-content-window">
                    <div class="popapp-content">
                        <div class="close-btn" id="close-popapps">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.3769 0L10.5 7.875L2.625 0L0 2.625L7.875 10.5L0 18.375L2.625 21L10.5 13.125L18.3769 21L21.0019 18.375L13.1269 10.5L21.0019 2.625L18.3769 0Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="header-popapp">
                            <div class="title-pp">
                                <h1>
                                    Успішно!
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="buttons" style="margin-top: 25px">
                        <a href="{{ route('cart') }}">
                            <div class="btn-order-courier">
                                <span>
                                    Перейти у кошик
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
        <div class="container-app">
            <div class="container">
                @yield('header')
                <div class="search-window-panel">
                <div class="content-panel">
                    <form action="post" id="searchForm">
                        <div class="enter">
                            <input type="text" placeholder="Що будемо чистити?" id="search_input_elem_header"
                                name="search_input_elem">
                        </div>
                        <button type="submit">
                            <div class="btn-search-btn">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.7556 18.5773L14.0682 12.8899C15.1699 11.5291 15.8332 9.7999 15.8332 7.9166C15.8332 3.55164 12.2815 0 7.91656 0C3.55161 0 0 3.55161 0 7.91656C0 12.2815 3.55165 15.8332 7.9166 15.8332C9.7999 15.8332 11.5291 15.1699 12.8899 14.0682L18.5773 19.7556C18.7398 19.9181 18.9531 19.9998 19.1665 19.9998C19.3798 19.9998 19.5932 19.9181 19.7557 19.7556C20.0815 19.4298 20.0815 18.9031 19.7556 18.5773ZM7.9166 14.1665C4.46996 14.1665 1.66666 11.3632 1.66666 7.91656C1.66666 4.46992 4.46996 1.66662 7.9166 1.66662C11.3632 1.66662 14.1665 4.46992 14.1665 7.91656C14.1665 11.3632 11.3632 14.1665 7.9166 14.1665Z"
                                        fill="#F9FBF3" />
                                </svg>
                            </div>
                        </button>
                        <div class="btn-close-search">
                            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                                <!-- Горизонтальная линия -->
                                <line x1="0" y1="0" x2="20" y2="20" stroke="#fff"
                                    stroke-width="2" />
                                <!-- Вертикальная линия -->
                                <line x1="20" y1="0" x2="0" y2="20" stroke="#fff"
                                    stroke-width="2" />
                            </svg>
                        </div>
                    </form>
                </div>
            </div>
                <div class="content">
                    @yield('content')
                </div>
                <div class="footer-container">
                    <div class="block-body">
                        <div class="banner-image-block">
                            <img src="{{ asset('storage/src/banner_img/footerbanner.png') }}" alt="Хімчисткаа Єнот24">
                        </div>
                        <div class="footer-block">
                            <div class="content-ft">
                                <div class="logo-container" onclick="window.location.href = '/'">
                                    <div class="logo-img">
                                        <svg width="81" height="81" viewBox="0 0 42 42" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="21" cy="21" r="21" fill="white" />
                                            <path
                                                d="M24.4622 24.6933C23.8849 24.7019 23.411 24.2457 23.411 23.6691C23.4024 23.0924 23.859 22.6277 24.4364 22.6191C25.0137 22.6105 25.4876 23.0666 25.4962 23.6433C25.4962 24.2199 25.0309 24.6847 24.4622 24.6933ZM17.7842 24.788C17.2069 24.7966 16.733 24.3404 16.733 23.7638C16.7244 23.1871 17.1811 22.7224 17.7584 22.7137C18.3357 22.7051 18.8096 23.1613 18.8096 23.7379C18.8269 24.306 18.3616 24.7794 17.7842 24.788ZM32.3465 25.1839C30.7955 24.4523 27.8572 23.0408 26.5561 22.2146C24.7466 21.0613 24.3243 21.2678 22.9543 22.1199C21.5842 22.9719 21.4377 21.44 21.9547 20.1059C22.4804 18.7719 24.1262 19.5551 24.1262 19.5551L31.166 22.533C31.6141 22.7224 32.0191 22.1973 31.7175 21.8186C31.0885 21.0096 30.3647 20.0801 30.0459 19.7014C29.4255 18.9698 29.9252 18.3588 29.9252 18.3588C29.9252 18.3588 31.5021 16.0349 30.83 13.5906C30.1579 11.1463 28.6413 11.964 27.3316 13.4443C26.0391 14.9075 24.9534 14.6923 24.9534 14.6923L16.957 14.8042C16.957 14.8042 15.8799 15.0452 14.5271 13.6078C13.1829 12.1705 11.6405 11.3873 11.0373 13.8488C10.4342 16.3104 12.0713 18.5911 12.0713 18.5911C12.0713 18.5911 12.5883 19.1936 11.9938 19.9424C11.6577 20.3641 10.8478 21.4658 10.2101 22.3351C9.96886 22.6621 10.3221 23.0924 10.6927 22.9203L17.9135 19.6325C17.9135 19.6325 19.5421 18.8063 20.1021 20.1231C20.6622 21.44 20.5502 22.9806 19.1629 22.1629C17.7756 21.3453 17.3448 21.1559 15.5611 22.3609C14.2945 23.2215 11.4337 24.6933 9.89131 25.4679C9.46909 25.6831 9.47771 26.2769 9.89993 26.4835L16.8536 29.8745C17.0346 29.9606 17.2155 29.754 17.1121 29.5905C16.7933 29.0999 16.5348 28.4286 16.9398 27.9122C17.6808 26.9827 18.4736 25.9757 18.9303 26.1306C19.3956 26.2855 19.8953 26.9052 19.8953 26.9052C19.8953 26.9052 20.4382 27.3269 19.7316 28.1704C19.0164 29.0139 19.5765 30.236 21.1017 30.2102H21.2309C22.7561 30.193 23.2817 28.9536 22.5493 28.1274C21.8169 27.3011 22.3511 26.8708 22.3511 26.8708C22.3511 26.8708 22.8337 26.2425 23.2903 26.0704C23.747 25.8982 24.5656 26.888 25.3325 27.7917C25.7547 28.2909 25.5221 28.9536 25.2291 29.4442C25.1257 29.6249 25.3153 29.8315 25.5048 29.7368L32.3724 26.1564C32.7774 25.9585 32.7601 25.3732 32.3465 25.1839ZM18.1806 23.7552C18.1806 23.54 18.0083 23.3679 17.7929 23.3679C17.5774 23.3679 17.4051 23.54 17.4051 23.7552C17.4051 23.9703 17.5774 24.1425 17.7929 24.1425C18.0083 24.1425 18.1806 23.9703 18.1806 23.7552ZM24.8069 23.6519C24.8069 23.4367 24.6345 23.2646 24.4191 23.2646C24.2037 23.2646 24.0314 23.4367 24.0314 23.6519C24.0314 23.867 24.2037 24.0392 24.4191 24.0392C24.6345 24.0478 24.8069 23.867 24.8069 23.6519Z"
                                                fill="#15102E" />
                                        </svg>
                                    </div>
                                    <div class="logo-title">
                                        <svg width="167" height="39" viewBox="0 0 87 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M49.879 8.81503V8.99172H50.0556H54.49V20.4957V20.6661H54.6667H58.0035H58.1738V20.4957V8.99172H62.6145H62.7848V8.81503V6.10153V5.93115H62.6145L50.0556 5.93115H49.879V6.10153V8.81503Z"
                                                fill="#F9FBF3" />
                                            <path
                                                d="M49.879 8.81503V8.99172H50.0556H54.49V20.4957V20.6661H54.6667H58.0035H58.1738V20.4957V8.99172H62.6145H62.7848V8.81503V6.10153V5.93115H62.6145L50.0556 5.93115H49.879V6.10153V8.81503Z"
                                                fill="#F9FBF3" stroke="#2B2A27" stroke-width="0.0227272"
                                                stroke-miterlimit="22.9256" />
                                            <path
                                                d="M76.8638 8.99959V8.88509H76.75H72.8737L74.8909 6.97679C75.5295 6.37885 75.9722 5.83816 76.2061 5.36109C76.4338 4.88401 76.5476 4.36877 76.5476 3.82172C76.5476 3.21743 76.3958 2.6831 76.0797 2.23147C75.7635 1.77984 75.3272 1.43634 74.7707 1.18826C74.2143 0.946543 73.5693 0.825684 72.8357 0.825684C71.9631 0.825684 71.1853 0.99107 70.5024 1.31548C69.8195 1.64626 69.282 2.09789 68.8962 2.6831L68.833 2.78488L68.9342 2.84849L70.5656 3.90442L70.6605 3.96166L70.7237 3.87261C70.945 3.56092 71.2169 3.33192 71.5394 3.17926C71.8619 3.0266 72.2287 2.95026 72.6397 2.95026C73.133 2.95026 73.4934 3.05204 73.721 3.23651C73.955 3.42098 74.0688 3.68178 74.0688 4.038C74.0688 4.28608 74.0056 4.54052 73.8728 4.80132C73.74 5.05576 73.4871 5.37381 73.095 5.74911L69.3579 9.2922L69.3199 9.324V9.37489V10.8379V10.9524H69.4337H76.7563H76.8701V10.8379V8.99959H76.8638Z"
                                                fill="#F9FBF3" />
                                            <path
                                                d="M76.8638 8.99959V8.88509H76.75H72.8737L74.8909 6.97679C75.5295 6.37885 75.9722 5.83816 76.2061 5.36109C76.4338 4.88401 76.5476 4.36877 76.5476 3.82172C76.5476 3.21743 76.3958 2.6831 76.0797 2.23147C75.7635 1.77984 75.3272 1.43634 74.7707 1.18826C74.2143 0.946543 73.5693 0.825684 72.8357 0.825684C71.9631 0.825684 71.1853 0.99107 70.5024 1.31548C69.8195 1.64626 69.282 2.09789 68.8962 2.6831L68.833 2.78488L68.9342 2.84849L70.5656 3.90442L70.6605 3.96166L70.7237 3.87261C70.945 3.56092 71.2169 3.33192 71.5394 3.17926C71.8619 3.0266 72.2287 2.95026 72.6397 2.95026C73.133 2.95026 73.4934 3.05204 73.721 3.23651C73.955 3.42098 74.0688 3.68178 74.0688 4.038C74.0688 4.28608 74.0056 4.54052 73.8728 4.80132C73.74 5.05576 73.4871 5.37381 73.095 5.74911L69.3579 9.2922L69.3199 9.324V9.37489V10.8379V10.9524H69.4337H76.7563H76.8701V10.8379V8.99959H76.8638Z"
                                                fill="#F9FBF3" stroke="#2B2A27" stroke-width="0.0227272"
                                                stroke-miterlimit="22.9256" />
                                            <path
                                                d="M77.7931 8.90492H82.8581V10.832V10.9528H82.9775H85.1518H85.265V10.832V8.90492H86.7166H86.836V8.79044V6.95878V6.83794H86.7166L85.265 6.83794V5.13984V5.01901H85.1518H83.0467H82.9335V5.13984V6.83794H80.6901L84.7622 1.17761L84.8942 0.986816L84.668 0.986816L82.3303 0.986816H82.2737L82.236 1.0377L77.6988 7.20682L77.6737 7.23862V7.27678V8.79044V8.90492H77.7931Z"
                                                fill="#F9FBF3" />
                                            <path
                                                d="M77.7931 8.90492H82.8581V10.832V10.9528H82.9775H85.1518H85.265V10.832V8.90492H86.7166H86.836V8.79044V6.95878V6.83794H86.7166L85.265 6.83794V5.13984V5.01901H85.1518H83.0467H82.9335V5.13984V6.83794H80.6901L84.7622 1.17761L84.8942 0.986816L84.668 0.986816L82.3303 0.986816H82.2737L82.236 1.0377L77.6988 7.20682L77.6737 7.23862V7.27678V8.79044V8.90492H77.7931Z"
                                                fill="#F9FBF3" stroke="#2B2A27" stroke-width="0.0227272"
                                                stroke-miterlimit="22.9256" />
                                            <path
                                                d="M31.2828 6.10702V5.93115H31.1134H27.7894H27.6138V6.10702V11.6028H21.4299V6.10702V5.93115H21.2606H17.9366H17.7673V6.10702V20.4902V20.6661H17.9366H21.2606H21.4299V20.4902V14.7683H27.6138V20.4902V20.6661H27.7894H31.1134H31.2828V20.4902V6.10702Z"
                                                fill="#F9FBF3" />
                                            <path
                                                d="M31.2828 6.10702V5.93115H31.1134H27.7894H27.6138V6.10702V11.6028H21.4299V6.10702V5.93115H21.2606H17.9366H17.7673V6.10702V20.4902V20.6661H17.9366H21.2606H21.4299V20.4902V14.7683H27.6138V20.4902V20.6661H27.7894H31.1134H31.2828V20.4902V6.10702Z"
                                                fill="#F9FBF3" stroke="#2B2A27" stroke-width="0.0227272"
                                                stroke-miterlimit="22.9256" />
                                            <path
                                                d="M5.04294 11.8385C5.28186 10.8823 5.74715 10.1274 6.4325 9.54869C7.15557 8.93848 8.04212 8.62394 9.10473 8.62394C10.5823 8.62394 11.8273 9.1964 12.8521 10.3413L12.9716 10.4734L13.1036 10.3539L15.3106 8.29682L15.4301 8.18359L15.3295 8.05777C14.6001 7.16448 13.6884 6.48508 12.6132 6.01957C11.5192 5.55405 10.2994 5.32129 8.94754 5.32129C7.43851 5.32129 6.08039 5.6547 4.87946 6.32781C3.66595 7.01351 2.71652 7.95712 2.03117 9.15237C1.34582 10.3665 1 11.7316 1 13.2414C1 14.7512 1.33953 16.11 2.03117 17.3115C2.71652 18.5256 3.66595 19.4692 4.87946 20.1423C6.08039 20.828 7.43222 21.174 8.94754 21.174C10.2931 21.174 11.5192 20.9413 12.6132 20.4758C13.6947 20.0102 14.6001 19.3245 15.3295 18.4375L15.4301 18.3117L15.3106 18.1985L13.1036 16.1414L12.9716 16.0219L12.8521 16.154C11.8273 17.3052 10.5823 17.8714 9.10473 17.8714C8.06727 17.8714 7.19329 17.5757 6.47022 16.9907C5.79745 16.4434 5.33845 15.7262 5.08695 14.8329H10.903H11.0727V14.6631V12.0084V11.8385H10.903H5.04294Z"
                                                fill="#F9FBF3" />
                                            <path
                                                d="M5.04294 11.8385C5.28186 10.8823 5.74715 10.1274 6.4325 9.54869C7.15557 8.93848 8.04212 8.62394 9.10473 8.62394C10.5823 8.62394 11.8273 9.1964 12.8521 10.3413L12.9716 10.4734L13.1036 10.3539L15.3106 8.29682L15.4301 8.18359L15.3295 8.05777C14.6001 7.16448 13.6884 6.48508 12.6132 6.01957C11.5192 5.55405 10.2994 5.32129 8.94754 5.32129C7.43851 5.32129 6.08039 5.6547 4.87946 6.32781C3.66595 7.01351 2.71652 7.95712 2.03117 9.15237C1.34582 10.3665 1 11.7316 1 13.2414C1 14.7512 1.33953 16.11 2.03117 17.3115C2.71652 18.5256 3.66595 19.4692 4.87946 20.1423C6.08039 20.828 7.43222 21.174 8.94754 21.174C10.2931 21.174 11.5192 20.9413 12.6132 20.4758C13.6947 20.0102 14.6001 19.3245 15.3295 18.4375L15.4301 18.3117L15.3106 18.1985L13.1036 16.1414L12.9716 16.0219L12.8521 16.154C11.8273 17.3052 10.5823 17.8714 9.10473 17.8714C8.06727 17.8714 7.19329 17.5757 6.47022 16.9907C5.79745 16.4434 5.33845 15.7262 5.08695 14.8329H10.903H11.0727V14.6631V12.0084V11.8385H10.903H5.04294Z"
                                                fill="#F9FBF3" stroke="#2B2A27" stroke-width="0.0227272"
                                                stroke-miterlimit="22.9256" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M37.79 15.5795C37.4131 14.9152 37.2247 14.1568 37.2247 13.2982C37.2247 12.4396 37.4131 11.6813 37.79 11.017C38.1669 10.3527 38.6758 9.83251 39.3353 9.45649C39.9886 9.08046 40.7236 8.89871 41.5465 8.89871C42.3631 8.89871 43.0981 9.08672 43.7576 9.45649C44.4109 9.82625 44.926 10.3464 45.3029 11.017C45.6798 11.6813 45.8683 12.4396 45.8683 13.2982C45.8683 14.1568 45.6798 14.9152 45.3029 15.5795C44.9323 16.2438 44.4172 16.764 43.7576 17.14C43.0981 17.516 42.3694 17.6978 41.5465 17.6978C40.7236 17.6978 39.9886 17.5098 39.3353 17.14C38.6758 16.7702 38.1669 16.2501 37.79 15.5795ZM33.5185 13.2982C33.5185 14.7271 33.864 16.0244 34.5613 17.1776C35.2522 18.3245 36.2133 19.227 37.4383 19.885C38.6632 20.5431 40.0326 20.8627 41.5465 20.8689C43.0604 20.8689 44.4298 20.5431 45.6484 19.885C46.8671 19.2332 47.8219 18.3308 48.5254 17.1776C49.2227 16.0244 49.5745 14.7334 49.5745 13.2982C49.5745 11.8693 49.229 10.572 48.5254 9.41888C47.8219 8.272 46.8671 7.36953 45.6484 6.71148C44.4298 6.05343 43.0604 5.72754 41.5465 5.72754C40.0326 5.72754 38.6632 6.05343 37.4383 6.71148C36.2133 7.36326 35.2585 8.26573 34.5613 9.41888C33.864 10.572 33.5185 11.8693 33.5185 13.2982Z"
                                                fill="#F9FBF3" />
                                            <path
                                                d="M37.79 15.5795C37.4131 14.9152 37.2247 14.1568 37.2247 13.2982C37.2247 12.4396 37.4131 11.6813 37.79 11.017C38.1669 10.3527 38.6758 9.83251 39.3353 9.45649C39.9886 9.08046 40.7236 8.89871 41.5465 8.89871C42.3631 8.89871 43.0981 9.08672 43.7576 9.45649C44.4109 9.82625 44.926 10.3464 45.3029 11.017C45.6798 11.6813 45.8683 12.4396 45.8683 13.2982C45.8683 14.1568 45.6798 14.9152 45.3029 15.5795C44.9323 16.2438 44.4172 16.764 43.7576 17.14C43.0981 17.516 42.3694 17.6978 41.5465 17.6978C40.7236 17.6978 39.9886 17.5098 39.3353 17.14C38.6758 16.7702 38.1669 16.2501 37.79 15.5795ZM33.5185 13.2982C33.5185 14.7271 33.864 16.0244 34.5613 17.1776C35.2522 18.3245 36.2133 19.227 37.4383 19.885C38.6632 20.5431 40.0326 20.8627 41.5465 20.8689C43.0604 20.8689 44.4298 20.5431 45.6484 19.885C46.8671 19.2332 47.8219 18.3308 48.5254 17.1776C49.2227 16.0244 49.5745 14.7334 49.5745 13.2982C49.5745 11.8693 49.229 10.572 48.5254 9.41888C47.8219 8.272 46.8671 7.36953 45.6484 6.71148C44.4298 6.05343 43.0604 5.72754 41.5465 5.72754C40.0326 5.72754 38.6632 6.05343 37.4383 6.71148C36.2133 7.36326 35.2585 8.26573 34.5613 9.41888C33.864 10.572 33.5185 11.8693 33.5185 13.2982Z"
                                                fill="#F9FBF3" stroke="#15102E" stroke-width="0.0227272"
                                                stroke-miterlimit="22.9256" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="navigator-container">
                                    <div class="items">
                                        <div class="item">
                                            <div class="title">
                                                Контакти
                                            </div>
                                            <div class="list">
                                                <ul>
                                                    <li><a href="tel:0678872233">+38 (067) 887-2233</a></li>
                                                    <li><a href="tel:0443372233">+38 (044) 337-2233</a></li>
                                                    <br><br>
                                                    <li><a href="mailto:office.enot24@gmail.com">office.enot24@gmail.com</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="title">
                                                Соціальні мережі
                                            </div>
                                            <div class="list">
                                                <ul>
                                                    <li><a href="https://www.instagram.com/enot24cleaner?igsh=MTQ3M3d3MjJlYXNsdQ%3D%3D&utm_source=qr" target="_blank">Instagram</a></li>
                                                    <li><a href="https://t.me/servisenot24" target="_blank">telegram</a></li>
                                                    <li><a href="viber://chat?number=%2B380678872233" target="_blank">viber</a></li>
                                                    <li><a href="https://www.facebook.com/enot24cleaner.fb" target="_blank">facebook</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="title">
                                                Навігація
                                            </div>
                                            <div class="list">
                                                <ul>
                                                    <li><a href="{{ route('services') }}#spisok">Ціни</a></li>
                                                    <li><a href="{{ route('welcome') }}#stock">Акції</a></li>
                                                    <li><a href="{{ route('services') }}#spisok-poslug">Послуги</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-footer-line">
                                <div class="underline"></div>
                                <div class="links">
                                    <a href="{{ route('umovy') }}" target="_blank">Умови використання</a>
                                    <span>|</span>
                                    <a href="{{ route('oferta') }}" target="_blank">Публічна оферта</a>
                                    <span>|</span>
                                    <a href="{{ route('privacy_policy') }}" target="_blank">Політика конфеденційності</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $('.window-feedback-model').hide()
        $('.window-feedback-model .model-content').hide()

        $('.window-fortune-model').hide()
        $('.window-fortune-model .model-content').hide()
        
        // Проверка наличия ключа в localStorage
        if (!localStorage.getItem('windowClosed_fd_w') || (new Date().getTime() - localStorage.getItem(
                'windowClosed_fd_w')) > 1 * 60 * 1000) {
            setTimeout(() => {
                $('.window-fortune-model').show()
                setTimeout(() => {
                    $('.window-fortune-model .model-content').show('slide')
                }, 200);
            }, 3000);
        }
    </script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js" integrity="sha512-F5Ul1uuyFlGnIT1dk2c4kB4DBdi5wnBJjVhL7gQlGh46Xn0VhvD8kgxLtjdZ5YN83gybk/aASUAlpdoWUjRR3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Winwheel.js via CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
    <script src="{{ asset('js/Winwheel.js') }}"></script>


    <script src="{{ asset('js/main/wheel_fortune.js') }}"></script>

    {{-- Caty System --}}
    <script src="{{ asset('js/main/cartSystem.js') }}"></script>
    <script src="{{ asset('js/main/feedbackAjax.js') }}"></script>
    <script src="{{ asset('js/main/win_fd.js') }}"></script>
    <script src="{{ asset('js/main/nav-bar.js') }}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Inputmask({
                mask: "+380(99)999-9999"
            }).mask(document.getElementById("durationPhone"));
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Inputmask({
                mask: "+380 (99)999-9999"
            }).mask(document.getElementById("phone_w_f"));
        });
    </script>
    
    <script>
        $(document).ready(function () {
            const $promoWindow = $("#promoWindow");
        
            // Проверяем куки, чтобы решить, показывать окно или нет
            const checkCookie = (cookieName) => {
                const match = document.cookie.match(new RegExp('(^| )' + cookieName + '=([^;]+)'));
                return match ? match[2] : null;
            };
        
            const setCookie = (name, value, minutes) => {
                const date = new Date();
                date.setTime(date.getTime() + minutes * 60 * 1000);
                document.cookie = `${name}=${value}; expires=${date.toUTCString()}; path=/`;
            };
        
            const showWindow = () => {
                if (!checkCookie("windowHidden")) {
                    $promoWindow.css("display", "flex");
                }
            };
        
            const hideWindow = (duration) => {
                $promoWindow.hide();
                setCookie("windowHidden", "true", duration);
            };
        
            // Показываем окно при загрузке страницы
            showWindow();
        
            // Закрытие окна крестиком или через оверлей
            $("#closeWindow, #overlay").on("click", function () {
                hideWindow(1); // 3 минуты
            });
        
            // Скрытие окна через отправку формы
            $("#discountForm").on("submit", function () {
                hideWindow(3); // 10 минут
            });
        });

    </script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".swiperLocations", {
            autoplay: {
                delay: 1000, // Задержка между переключениями в миллисекундах
                disableOnInteraction: false, // Автослайд не останавливается при взаимодействии пользователя
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                renderBullet: function(index, className) {
                    // Отображаем только первые три точки
                    if (index < 3) {
                        return '<span class="' + className + '"></span>';
                    }
                    return '';
                },
            },
        });
    </script>
    
    <script>
        var swiper = new Swiper(".swiperDurations", {
            slidesPerView: 'auto',
            spaceBetween: 15,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2000, // Auto-slide every 3 seconds
            },
            on: {
                init: function() {
                    var swiperWrapper = this.el.querySelector('.swiper-wrapper');
                    var slides = swiperWrapper.querySelectorAll('.swiper-slide');
                    if (slides.length === 1) {
                        slides[0].classList.add('single-slide');
                    }
                },
            },
            breakpoints: {
                340: {
                    slidesPerView: 1,
                },
                1080: {
                    slidesPerView: 3,
                },
                1280: {
                    slidesPerView: 3,
                },
                1480: {
                    slidesPerView: 3,
                },
            },
        });
    </script>
    <script>
        $(document).on('click', '.sw-block-open', function() {
            var findClass = $(this).children('.block-el').children('.content-block-sw')
            $(findClass).toggleClass('active')
        })
    </script>

    {{-- Search --}}
    <script>
        $(document).on('click', '.btn-open-search-menu', function() {
            $('.search-window-panel').addClass('active')
        })
    </script>
    <script>
        $(document).on('click', '.btn-close-search', function() {
            $('.search-window-panel').removeClass('active')
        })
    </script>
    {{-- AutoSearch --}}
    <script type="text/javascript">
        let searchResults = [];
        var route = "{{ url('autocomplete-search') }}";
        $('#search_input_elem_services').typeahead({
            limit: 10,
            source: function(query, process) {
                // Отправляем запрос на сервер
                return $.get(route, { query: query }, function(data) {
                    // Преобразуем данные в массив объектов для хранения ключевых слов и ссылок
                    const results = data.names.map(item => ({
                        name: item.name,
                        url: item.url
                    }));
    
                    // Отправляем только ключевые слова в Typeahead для отображения
                    const keywords = results.map(item => item.name);
                    $('#search_input_elem_services').data('searchResults', results); // Сохраняем результаты в элементе
                    return process(keywords);
                });
            },
            afterSelect: function(selected) {
                // Обрабатываем выбор элемента из списка
                const results = $('#search_input_elem_services').data('searchResults');
                const selectedResult = results.find(item => item.name === selected);
    
                // Переходим на страницу, если URL найден
                if (selectedResult && selectedResult.url) {
                    window.location.href = 'poslugi/' + selectedResult.url;
                }
            }
        });
        $('#search_input_elem_header').typeahead({
            limit: 10,
            source: function(query, process) {
                // Отправляем запрос на сервер
                return $.get(route, { query: query }, function(data) {
                    // Преобразуем данные в массив объектов для хранения ключевых слов и ссылок
                    const results = data.names.map(item => ({
                        name: item.name,
                        url: item.url
                    }));
    
                    // Отправляем только ключевые слова в Typeahead для отображения
                    const keywords = results.map(item => item.name);
                    $('#search_input_elem_header').data('searchResults', results); // Сохраняем результаты в элементе
                    return process(keywords);
                });
            },
            afterSelect: function(selected) {
                // Обрабатываем выбор элемента из списка
                const results = $('#search_input_elem_header').data('searchResults');
                const selectedResult = results.find(item => item.name === selected);
    
                // Переходим на страницу, если URL найден
                if (selectedResult && selectedResult.url) {
                    window.location.href = 'poslugi/' + selectedResult.url;
                }
            }
        });

        // Обработка отправки формы
        $('#searchForm, #searchForm2').on('submit', function(e) {
            e.preventDefault(); // Останавливаем стандартное поведение формы
        
            const query = $(this).children('input').val();
            const selectedResult = searchResults.find(item => item.name === query);
        
            if (selectedResult && selectedResult.url) {
                // Перенаправление на страницу выбранной услуги
                window.location.href = '/poslugi/' + selectedResult.url;
            } else {
                // Если текст введён вручную и не совпадает с подсказками
                alert('Оберіть послугу зі списку.');
            }
        });
    </script>



    {{-- Navigator --}}
    <script>
        $(document).ready(function() {
            var navbar = $('#navigator');
            var origOffsetY = navbar.offset().top;
            var scrollCount = 0; // Счётчик прокруток
            var maxScrollCount = 1; // Количество прокруток до закрепления

            function onScroll() {
                if ($(window).scrollTop() > origOffsetY) {
                    scrollCount++;
                } else {
                    scrollCount = 0;
                }

                if (scrollCount >= maxScrollCount) {
                    navbar.addClass('nav-fixed');
                } else {
                    navbar.removeClass('nav-fixed');
                }
            }

            $(window).on('scroll', onScroll);
        });
    </script>

    {{-- Map --}}
    <script>
        $(document).on('click', '.btn-open-map', function() {
            if ($(this).hasClass('open-map')) {
                $('#map_locations').addClass('opened')
                $(this).removeClass('open-map').addClass('close-map');
                $(this).children('span').text('Згорнути Карту')
            } else if ($(this).hasClass('close-map')) {
                $('#map_locations').removeClass('opened')
                $(this).removeClass('close-map').addClass('open-map');
                $(this).children('span').text('Відкрити Карту')
            } else {
                alert('Виникла не зрозуміла помилка. Зверніться за гарячою лінією і попередьте нас про це.')
            }
        })
    </script>

    {{-- PopApps --}}
    <script>
        $(document).on('click', '#close-popapps', function() {
            $('.modals-window-popaps').hide()
        })
    </script>

    <script>
        $(document).on('click', '.btn-open-win-service', function() {
            $('.popap-service').show()

            var service_id = $(this).data('service-id')
            var category_id = $(this).data('category-id')
            var service_name = $(this).data('service-name')
            var service_ind = $(this).data('ind-price');
            var service_stm = $(this).data('stm-price');
            var service_category = $(this).data('service-category')
            var category_image = $(this).data('category-image')
            
            $('#service_data_price_stm').text(service_stm + ' ₴');
            if (service_ind < 1) {
                $('#service_data_price_ind').text('Відсутньо');
            } else {
                $('#service_data_price_ind').text(service_ind + ' ₴');
            }
            
            $('#category_img_data').attr('src', category_image)
            $('#service_data').text(service_name)
            $('#service_category_data').text(service_category)

            $('#order-this-service').attr({
                'data-service_id': service_id
            });
            $('#add-to-cart').attr({
                'data-service_id': service_id,
            });
        })
    </script>

    {{-- Cart --}}
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-add-to-cart-func-ac').click(function() {
                var serviceId = $(this).attr('data-service_id');

                $.ajax({
                    url: '{{ route('cart.store') }}',
                    method: 'POST',
                    data: {
                        service_id: serviceId,
                    },
                    success: function(response) {
                        $('.popap-service').hide()
                        $('.popap-success-cart').show()
                    },
                    error: function(xhr) {
                        alert(xhr);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-go-to-cart-func-ac').click(function() {
                var serviceId = $(this).attr('data-service_id');

                $.ajax({
                    url: '{{ route('cart.store') }}',
                    method: 'POST',
                    data: {
                        service_id: serviceId,
                    },
                    success: function(response) {
                        $('.popap-service').hide()
                        window.location.href = '{{ route('cart') }}'
                    },
                    error: function(xhr) {
                        alert(xhr);
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Inputmask({
                mask: "+380(99)999-9999"
            }).mask(document.getElementById("phone_cart"));
        });
    </script>
    
    @yield('scripts')
</body>
