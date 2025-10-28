<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Сторінку не знайдено - Enot24</title>
    <link rel="shortcut icon" href="{{ asset('storage/src/logo/logo-enot24.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="error-container">
        <div class="error-content">
            <div class="image-content">
                <img src="{{ asset('storage/src/enot_search.png') }}" alt="Enot Serarch">
            </div>
            <div class="error-text">
                <div class="box">
                    <h1>404</h1>
                    <div class="pr-t">
                        <p>
                            На жаль, ми не змогли знайти сторінку або послугу, яку ви шукаєте.
                        </p>
                        <p>
                            Це може бути через неправильну URL-адресу або сторінка була видалена.
                        </p>
                        <p>
                            Спробуйте перевірити введену адресу або <a href="{{ url('/') }}">повернутися на
                                головну</a>.
                        </p>
                        <p>
                            Якщо проблема не зникла, будь ласка, зверніться до нашої служби підтримки для допомоги.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
