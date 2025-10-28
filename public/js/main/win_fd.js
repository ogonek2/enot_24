$(document).ready(function () {
    // Регулярное выражение для проверки телефона
    var phoneRegex = /^\+380 \(\d{2}\)\d{3}-\d{4}$/;

    // Функция для проверки, что номер телефона корректен
    function validatePhone() {
        var phoneValue = $('#phone_w_f').val().trim();
        return phoneRegex.test(phoneValue);
    }

    // Функция для включения/выключения кнопки отправки
    function toggleSubmitButton() {
        if (validatePhone() && $('#check_w_f_phone').prop('checked')) {
            $('#sb_w_f_validate').prop('disabled', false);
        } else {
            $('#sb_w_f_validate').prop('disabled', true);
        }
    }

    function closeWindow() {
        $('.wn-ct .model-content').hide('slide')
        setTimeout(() => {
            $('.wn-ct').hide()
        }, 500);
    }
    function showFeedback() {
        $('.window-feedback-model').show()
        setTimeout(() => {
            $('.window-feedback-model .model-content').show('slide')
        }, 200);
    }

    // Обработчики событий для обновления кнопки отправки
    $('#phone_w_f').on('input', toggleSubmitButton); // При изменении телефона
    $('#check_w_f_phone').on('change', toggleSubmitButton); // При изменении состояния чекбокса

    // Валидация при отправке формы
    $('#contactForm').on('submit', function (event) {
        if (!validatePhone()) {
            alert("Будь ласка, введіть правильний номер телефону.");
            event.preventDefault(); // Предотвращаем отправку формы
        }
        if (!$('#check_w_f_phone').prop('checked')) {
            alert("Потрібно підтвердити згоду на обробку даних.");
            event.preventDefault(); // Предотвращаем отправку формы
        }
    });
    $(document).on('click', ".show_fd_w", function () {
        showFeedback()
    });
    $(document).on('click', "#show_fortune_w", function () {
        $('.window-fortune-model').show()
        setTimeout(() => {
            $('.window-fortune-model .model-content').show('slide')
        }, 200);
    });
    $(document).on('click', "#next_fortune_w_form", function () {
        $('.result_alert-model').removeClass('show')
        showFeedback()
    });
    $(document).on('click', ".hide_fd_w", function () {
        closeWindow()
        localStorage.setItem('windowClosed_fd_w', new Date().getTime());
    });
});