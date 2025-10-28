@php
    // Массив с возможными окнами
    $promoWindows = [
        'promo1' => [
            'title' => 'ЗНИЖКА -20% НА ПЕРШЕ ЗАМОВЛЕННЯ!',
            'subtitle' => 'Знижка діє на текстильний одяг',
            'formAction' => route('durationForm'),
            'sub_title' => 'Замовляйте хімчистку прямо зараз!',
            'name' => 'Акція -20% на перше замовлення',
        ],
        'promo2' => [
            'title' => 'ЗРОБІТЬ ЗАМОВЛЕННЯ ЗАРАЗ І ОТРИМУЙТЕ ЗНИЖКУ -20%!',
            'subtitle' => 'На хімчистку текстильного одягу',
            'formAction' => route('durationForm'),
            'sub_title' => 'Отримуйте знижку 20% на замовлення!',
            'name' => 'Акція -20% на перше замовлення',
        ],
        'promo3' => [
            'title' => 'СПЕЦІАЛЬНО ДЛЯ ВАС!',
            'subtitle' => 'Знижка -20% НА ПЕРШЕ ЗАМОВЛЕННЯ!',
            'formAction' => route('durationForm'),
            'sub_title' => 'На хімчистку текстильного одягу',
            'name' => 'Акція -20% на перше замовлення',
        ]
    ];

    // Выбираем случайное окно
    $randomPromo = array_rand($promoWindows);
@endphp

<div class="blade-window-container includes-win-container" id="promoWindow" style="display: none;">
    <div class="window-blade-content">
        <div class="head-el">
            <div class="btn-cl-win" id="closeWindow">
                <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L26 26M26 1L1 26" stroke="#1C214B" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
        <div class="content-el">
            <div class="text-content">
                <h1>{{ $promoWindows[$randomPromo]['title'] }}</h1>
                @if($promoWindows[$randomPromo]['subtitle'])
                    <p><b>{{ $promoWindows[$randomPromo]['subtitle'] }}</b></p>
                @endif
                <h2>{{ $promoWindows[$randomPromo]['sub_title'] }}</h2>
            </div>
            <div class="form-enter-content">
                <form action="{{ $promoWindows[$randomPromo]['formAction'] }}" id="discountForm" method="POST">
                    @csrf
                    <div class="enter">
                        <span>Ваш номер телефону</span>
                        <input type="text" id="discountFormActual" name="phone" required>
                    </div>
                    <input type="hidden" value="{{ $promoWindows[$randomPromo]['title'] }}" name="promotionType">
                    <button type="submit">
                        Отримати знижку
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="overlay" id="overlay"></div>
</div>