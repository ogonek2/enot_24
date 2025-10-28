$(document).on('click', '.sh_wb_b', function () {
    $data = $(this).data('sh');
    $('#' + $data + '_bar_wn').toggleClass('open');

    if ($data == 'burger') {
        $(this).find('.burger-menu').toggleClass('open');
    } else {
        $(this).toggleClass('active')
        if ($(this).hasClass('active')) {

        } else {

        }
    }
})

// Переключение вкладок
$('.tab-btn').on('click', function () {
    const tab = $(this).data('tab');

    $('.tab-btn').removeClass('active');
    $('.tab-content').removeClass('active');

    $(this).addClass('active');
    $('#' + tab).addClass('active');
});

// QR переключатели
$('#showTelegramQR').on('change', function () {
    $('#telegramQR').toggle(this.checked);
});

$('#showViberQR').on('change', function () {
    $('#viberQR').toggle(this.checked);
});