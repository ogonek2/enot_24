@extends('layouts.userSystem.app')


@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h4 class="card-title mb-4">Номер телефону</h4>
                    <form id="barcode-form">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="barcode-input" placeholder="Телефон клієнта"
                                autofocus>
                        </div>
                    </form>
                    <small class="text-muted mt-3 d-block">Натисніть Enter для введення</small>
                    <div id="result" class="mt-3"></div>
                </div>
            </div>
            <div class="card shadow-sm">
                <form id="create-client-form" action="">
                    <div class="card-header">
                        <h3 class="card-title">Створити клієнта</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="form-group">
                            <h4 class="card-title mb-2">Ім'я</h4>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="name_client" placeholder="Ім'я клієнта">
                            </div>
                        </div>
                        <div class="form-group">
                            <h4 class="card-title mb-2">Номер телефону</h4>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="phone_client" id="phone2"
                                    placeholder="Телефон клієнта">
                            </div>
                        </div>
                        <div class="form-group">
                            <h4 class="card-title mb-2">Нарахувати бонуси</h4>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-wallet"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" value="50" name="bonus_client"
                                    placeholder="Введіть кількість">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success">Створити</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Знайдено</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Клієнт</th>
                                <th>Номер телефону</th>
                                <th>Бонуси</th>
                                <th>Панель</th>
                            </tr>
                        </thead>
                        <tbody id="result_table_db">

                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <div class="container mt-5">
                        <h3>Додати товари</h3>
                        <div class="form-group">
                            <label for="typeahead">Введіть назву або артикуль:</label>
                            <input type="text" id="typeahead" class="form-control" placeholder="Введите текст...">
                        </div>
                    </div>
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Послуга</th>
                                <th>Тип чистки</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tbody id="list_orders_table_session"></tbody>
                    </table>
                    <div class="card p-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <h5>Ціна за послуги: <span class="total_services">0</span> ₴</h5>
                                <h6>Бонуси за замовлення: <span id="bonus_amount">0</span> ₴</h6>
                            </div>
                            <div class="list-group mb-3">
                                <ul class="list-group" id="list_orders_session"></ul>
                            </div>
                            <div class="mb-3">
                                <h5>Всього: <span class="total" id="use_total_absolute">0</span> ₴</h5>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary select-bonuses-order">
                                Зробити нарахування за сканованим користовачем
                            </button>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script>
        document.getElementById('barcode-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') { // Когда штрих-код полностью введен и нажата клавиша Enter
                e.preventDefault(); // Отключаем стандартное поведение формы
                var barcode = this.value; // Получаем введённый штрих-код
                if (barcode) {
                    // AJAX-запрос на сервер
                    $.ajax({
                        url: '{{ route('scan_code') }}', // Путь к маршруту в Laravel
                        method: 'POST',
                        data: {
                            barcode: barcode,
                            _token: '{{ csrf_token() }}' // CSRF токен для защиты
                        },
                        success: function(response) {
                            // Обработка успешного ответа
                            $('#result').html(`
                                <div class="alert alert-success">${response.message}</div>
                                ${response.client['phone']}
                            `);

                            $('#result_table_db').html(`
                                <tr>
                                    <td id="user_id_bd">${response.client['id']}</td>
                                    <td>${response.client['name']}</td>
                                    <td id="user_phone_bd">${response.client['phone']}</td>
                                    <td>${response.bonuses['bonus']} ₴</td>
                                    <td>
                                        <div class="btn btn-primary" onclick="editFormS(${response.client['id']})">Відкрити</div>
                                    </td>
                                </tr>
                            `);

                            // Append modal outside the table structure
                            let confirmButton = '';
                            if (response.orderList.length > 0) {
                                confirmButton =
                                    `<a class="btn btn-success" href="admin/order/succsess/${response.client['phone']}">Прийнято</a>`;
                            }
                            $('body').append(`
                                <div class="modal fade" id="editFormS${response.client['id']}" tabindex="-1" role="dialog" aria-labelledby="editFormLabel${response.client['id']}" aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="width: 100%; max-width: 1280px">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editFormLabel${response.client['id']}">Підтвердити замовлення</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="order-list-container">
                                                    <ul class="list-group" id="orderList">
                                                        ${response.orderList.map(element => {
                                                            // Извлекаем только цифры из строки цены
                                                            let price = extractPrice(element.price);
                                                            return `
                                                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                                            ${element.name}
                                                                                                            <input type="text" class="form-control price-input" value="${price}" data-id="${element.id}" style="width: 100px;" />
                                                                                                            <span class="btn btn-danger btn-sm" data-id-s='${element.id}'>Видалити</span>
                                                                                                        </li>
                                                                                                    `;
                                                        }).join('')}
                                                    </ul>
                                                </div>
                                                <div class="form-group">
                                                    <label for="useBonuses">Використати бонуси:</label>
                                                    <input type="text" class="form-control" id="useBonuses" value="0" placeholder="Введіть бонуси" />
                                                </div>
                                                <div class="summary">
                                                    <p>Загальна сума: <span id="totalPrice">${getTotalPrice(response.orderList)}</span> грн</p>
                                                    <p>Знижка (Бонуси): <span id="bonusAmount">0</span> грн</p>
                                                    <p>Загальна сума після бонусів: <span id="totalAfterBonus">${getTotalPrice(response.orderList)}</span> грн</p>
                                                    <p>Кількість бонусів доступно: <span id="totalBonuses">${response.bonuses['bonus']}</span></p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" id="applyBonusesBtn">Використати бонуси</button>
                                                <button type="button" class="btn btn-warning" id="submitSuccess">Підтвердити</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Скасувати</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);

                            // Функция для извлечения только числовых значений из строки цены
                            function extractPrice(priceString) {
                                // Убираем все символы кроме цифр и точки
                                let price = priceString.replace(/[^\d.]/g, '').trim();

                                // Если строка пуста или не число, возвращаем 0
                                let result = parseFloat(price);
                                return isNaN(result) ? 0 : Math.abs(
                                    result); // Преобразуем к положительному числу
                            }

                            // Функция для получения общей суммы
                            function getTotalPrice(orderList) {
                                if (!orderList || orderList.length === 0) return 0;
                                return orderList.reduce((total, item) => total + extractPrice(item
                                    .price), 0).toFixed(2);
                            }

                            // Обработчик изменения бонусов
                            $('#useBonuses').on('input', function() {
                                let availableBonuses = parseFloat($('#totalBonuses').text()) ||
                                    0;
                                let bonuses = Math.max(0, parseFloat($(this).val())) || 0;
                                // Ограничиваем бонусы, чтобы их не было больше доступных
                                if (bonuses > availableBonuses) {
                                    $(this).val(
                                        availableBonuses
                                    ); // Если больше доступных, то ограничиваем
                                    bonuses = availableBonuses;
                                }
                                let total = parseFloat($('#totalPrice').text()) || 0;
                                let maxBonuses = Math.min(bonuses, total *
                                    0.5); // Не более 50% от общей суммы
                                $('#bonusAmount').text(maxBonuses.toFixed(2));
                                $('#totalAfterBonus').text((total - maxBonuses).toFixed(2));
                            });

                            // Обработчик нажатия кнопки "Використати бонуси"
                            $('#applyBonusesBtn').on('click', function() {
                                let availableBonuses = parseFloat($('#totalBonuses').text()) ||
                                    0;
                                let bonuses = Math.max(0, parseFloat($('#useBonuses').val())) ||
                                    0;
                                // Ограничиваем бонусы, чтобы их не было больше доступных
                                if (bonuses > availableBonuses) {
                                    $('#useBonuses').val(
                                        availableBonuses
                                    ); // Если больше доступных, то ограничиваем
                                    bonuses = availableBonuses;
                                }
                                let total = parseFloat($('#totalPrice').text()) || 0;
                                let maxBonuses = Math.min(bonuses, total *
                                    0.5); // Не более 50% от общей суммы
                                $('#bonusAmount').text(maxBonuses.toFixed(2));
                                $('#totalAfterBonus').text((total - maxBonuses).toFixed(2));
                            });

                            // Обработчик изменения цены товара
                            $('#orderList').on('input', '.price-input', function() {
                                let updatedPrices = [];
                                $('#orderList .price-input').each(function() {
                                    let itemId = $(this).data('id');
                                    let itemPrice = extractPrice($(this)
                                        .val()
                                    ); // Извлекаем числовое значение из поля ввода
                                    updatedPrices.push({
                                        id: itemId,
                                        price: itemPrice
                                    });
                                });
                                // Обновляем общую сумму
                                let total = updatedPrices.reduce((total, item) => total + item
                                    .price, 0).toFixed(2);
                                $('#totalPrice').text(total);
                                $('#totalAfterBonus').text(
                                    total); // Сбрасываем цену после бонусов
                            });

                            // Фильтрация ввода на поля цен и бонусов, чтобы разрешать только цифры
                            $('#orderList, #useBonuses').on('input', 'input[type="text"]', function() {
                                // Убираем все символы, кроме цифр и точки
                                let currentValue = $(this).val();
                                $(this).val(currentValue.replace(/[^0-9.]/g, ''));

                                // Разрешаем только одну точку для десятичных чисел
                                if ((currentValue.match(/\./g) || []).length > 1) {
                                    $(this).val(currentValue.replace(/\.(?=.*\.)/g, ''));
                                }
                            });

                            $(document).on('click', '#submitSuccess', function() {
                                // Получаем информацию о товарах
                                let products = [];
                                $('#orderList .price-input').each(function() {
                                    let itemId = $(this).data('id');
                                    let itemPrice = extractPrice($(this)
                                        .val()); // Получаем цену товара
                                    products.push({
                                        id: itemId,
                                        price: itemPrice
                                    });
                                });

                                // Получаем бонусы
                                let bonuses = Math.max(0, parseFloat($('#useBonuses').val())) ||
                                    0;
                                let availableBonuses = parseFloat($('#totalBonuses').text()) ||
                                    0;
                                let totalPrice = parseFloat($('#totalPrice').text()) || 0;

                                // Ограничиваем бонусы максимальными доступными
                                let maxBonuses = Math.min(bonuses, totalPrice *
                                    0.5); // Не более 50% от общей суммы

                                // Проверяем, использованы ли бонусы
                                let isBonusUsed = maxBonuses > 0;

                                // Вычисляем финальную сумму после бонусов
                                let finalAmount = isBonusUsed ? (totalPrice - maxBonuses) :
                                    totalPrice;

                                // Отправка данных на сервер
                                $.ajax({
                                    url: `{{ route('order_succsess_admin') }}`, // Путь до контроллера
                                    method: 'POST',
                                    data: {
                                        _token: $('meta[name="csrf-token"]').attr(
                                            'content'), // CSRF-токен
                                        products: products, // Список товаров
                                        bonuses: maxBonuses, // Использованные бонусы
                                        finalAmount: finalAmount, // Итоговая сумма
                                        clientId: response.client['id'],
                                        phone: response.client['phone'],
                                    },
                                    success: function(response) {
                                        // Обработка ответа
                                        console.log(
                                            'Данные успешно отправлены в контроллер'
                                        );
                                        toastr.success(`Замовлення записано!`);
                                        setTimeout(function() {
                                            location.reload();
                                        }, 3000);
                                        console.log(response);
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Ошибка при отправке данных:',
                                            error);
                                        toastr.error('Помилка!')
                                    }
                                });
                            });
                        },

                        error: function(xhr) {
                            // Обработка ошибки
                            $('#result').html(
                                '<div class="alert alert-danger">Нічого не знайдено :(</div>');
                            $('#result_table_db').html(`
                                <tr>
                                    <td>Порожньо</td>
                                </tr>
                            `)
                        }
                    });
                }
            }
        });
    </script>
    <script>
        function editFormS(itemId) {
            $('#editFormS' + itemId).modal('show');
        }
    </script>
    <script>
        $(document).ready(function() {
            // Handle form submission
            $('#create-client-form').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                var formData = $(this).serialize(); // Serialize form data
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // CSRF token setup
                    }
                });
                $.ajax({
                    url: '{{ route('make_client') }}', // Your endpoint URL here
                    type: 'POST', // Method type
                    data: formData, // Form data
                    success: function(response) {
                        // Handle the response here
                        var clientNumber = response.client_number; // Example: response might look like { client_number: '12345' }

                        // Set the client number in the barcode input field
                        $('#barcode-input').val(clientNumber);

                        // Trigger the button click (assuming the button has a click function assigned to it)
                        $('#barcode-input').trigger($.Event('keypress', { key: 'Enter', keyCode: 13 })); // Trigger click on the button
                        // You can reset the form or update the UI here
                        $('#create-client-form')[0].reset();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        alert('Помилка при створенні клієнта: ' + error);
                    }
                });
            });
        });
    </script>
@endsection
