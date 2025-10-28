function checkThursday() {
    var today = new Date();
    var day = today.getDay(); // Возвращает день недели (0-6, где 0 - воскресенье, 4 - четверг)

    // Проверка, если сегодня четверг (4)
    if (day === 4) {
        return true;
    } else {
        return false;
    }
}

function updateTotal() {
    var total = 0;
    $('.service-select-pti').each(function () {
        var selectedText = $(this).find('option:selected')
            .text(); // Получаем текст выбранной опции
        var price = parseFloat(selectedText.replace(/\D/g,
            '')); // Удаляем все нечисловые символы и парсим число
        if (!isNaN(price)) {
            total += price; // Суммируем выбранные значения
        }
    });
    $('.total_services').text(total.toFixed(0));
    // Получаем элементы с классом .service_selected_list_price
    var $selectedList = $('.service_selected_list_price li');

    $selectedList.each(function () {
        // Получаем значение data-id текущего элемента
        var id = $(this).data('ser-id');
        // Находим соответствующий select с ID "selected_ser_id_{id}"
        var $selectElement = $(`#selected_ser_id_${id}`).val();
        // Проверка на существование select и установка нужного значения
        $(this).children('b').text($selectElement)
    });

    if (checkThursday()) {
        // Применение скидки 35%
        total = total * 0.65;
        $('.clear-action').show()
    } else {
        $('.clear-action').hide()
    }

    // Отображение total
    $('.total').text(total.toFixed(0));
}

function useBonusSelect(bonuses) {
    $('.tt-bsn-us').remove();
    $('#use_bsn').html('Використати бонуси');
    $('#use_bsn').removeClass('active-bonuse');
}


function useBonuss(bonuses) {
    var total = parseFloat($('#use_total_absolute').text().replace(/[^\d.-]/g, '')); // Общая сумма
    var maxBonus = total * 0.5;  // Максимальная скидка до 50% от общей суммы

    var discount = Math.min(bonuses, maxBonus); // Скидка не может превышать 50% от общей суммы

    // Функция для добавления или обновления поля скидки
    function applyDiscount(discount) {
        var sum = total - discount
        $('.total-container').append(`<span class='tt-bsn-us'>З бонусами: <span class="total">${sum}</span> ₴</span>`)
        $('#use_bsn').html(`Використано: <b id='have_use_bonuses'>${discount}</b> ₴`);
    }

    // Применить бонусы
    if ($('#use_bsn').hasClass('active-bonuse')) {
        $('.tt-bsn-us').remove();
        $('#use_bsn').html('Використати бонуси');
    } else {
        applyDiscount(discount);
    }

    $('#use_bsn').toggleClass('active-bonuse');
}

// Вызываем функцию при изменении выбора в любом из селектов
$('.service-select-pti').change(function () {
    updateTotal();
    useBonusSelect($('#user_bsn_c').val())
});

// Инициализация итоговой суммы при загрузке страницы
updateTotal();

