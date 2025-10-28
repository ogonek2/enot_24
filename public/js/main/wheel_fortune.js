$(document).ready(function () {
    try {
        // Получаем канвас и контекст
        const canvas = document.getElementById('fortune-wheel');
        const ctx = canvas.getContext('2d');

        if (!ctx) {
            console.error('Не удалось получить контекст канваса.');
            return; // Прерываем выполнение, если нет контекста
        }

        // Инициализация колеса фортуны
        const theWheel = new Winwheel({
            'numSegments': 10,          // Количество сегментов
            'outerRadius': 200,        // Радиус колеса
            'canvasId': 'fortune-wheel', // Обязательное указание ID canvas
            'segments': [              // Сегменты с числами
                { 'fillStyle': '#FFE7BF', 'text': '18%', 'weight': 3 },
                { 'fillStyle': '#FFCCD1', 'text': '17%', 'weight': 1 },
                { 'fillStyle': '#FFCB87', 'text': '10%', 'weight': 0 },
                { 'fillStyle': '#B0A8FE', 'text': '15%', 'weight': 4 },
                { 'fillStyle': '#FFE7BF', 'text': '20%', 'weight': 6 },
                { 'fillStyle': '#FFCB87', 'text': '10%', 'weight': 5 },
                { 'fillStyle': '#B0A8FE', 'text': '15%', 'weight': 4 },
                { 'fillStyle': '#FFE7BF', 'text': '18%', 'weight': 6 },
                { 'fillStyle': '#FFCCD1', 'text': '15%', 'weight': 2 },
                { 'fillStyle': '#FFCB87', 'text': '16%', 'weight': 5 }
            ],
            'animation': {             // Анимация
                'type': 'spinToStop',
                'duration': 11,           // Длительность анимации
                'spins': 100,              // Количество оборотов
                'callbackFinished': alertResult // Функция, вызываемая по завершению вращения
            }
        });

        // Обработчик клика на кнопку
        $(document).on('click', "#start_wheel", function () {
            // Сбросим вращение перед новым запуском
            theWheel.stopAnimation(false);  // Останавливаем анимацию
            theWheel.rotationAngle = 0;      // Сбросим угол вращения

            theWheel.startAnimation(); // Начинаем анимацию
        });
        $(document).on('click', ".return-wheel", function () {
            $('.result_alert-model').removeClass('show')
            theWheel.stopAnimation(false);
            theWheel.rotationAngle = 0;
            theWheel.startAnimation();
        });

        // Функция для вывода результата на экран
        function alertResult() {
            const winningSegment = theWheel.getIndicatedSegment().text;
            $('#result_alert_p').text(`Ви отримали знижку -${winningSegment} на хімчистку одягу та взуття, на перше замовлення!. Натисніть "Продовжити", щоб скористатись`)
            $('#data_f_w_val').val(winningSegment)
            $('.result_alert-model').addClass('show')
        }
    } catch (error) {
        console.log('Колесо відсутнє')
    }
});