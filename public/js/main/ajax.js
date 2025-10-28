$(document).on('blur', '#editableName', function () {
    var newText = $(this).val(); // Получаем новый текст
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "home/update/name/submit", // Маршрут на сервере для обновления
        method: 'POST',
        data: {
            text: newText,
        },
        success: function (response) {
            toastr.success(`Ваше ім'я успішно змінено!`);
        },
        error: function () {
            toastr.error('error');
        }
    });
});
$(document).on('blur', '#editablePhone', function () {
    var newText = $(this).val(); // Получаем новый текст
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "home/update/phone/submit", // Маршрут на сервере для обновления
        method: 'POST',
        data: {
            text: newText,
        },
        success: function (response) {
            toastr.success(`Ваше ім'я успішно змінено!`);
        },
        error: function () {
            toastr.error('error');
        }
    });
});
$(document).on('click', '#submit-rating', function () {
    var starRating = $(".star.active").length;

    if (starRating) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "home/rating/submit", // Маршрут на сервере для обновления
            method: 'POST',
            data: {
                assessment: starRating,
            },
            success: function (response) {
                toastr.success(`&#9733; Дякую за оцінку!`);
                $("#overlay").fadeOut();
                $("#rating-modal").fadeOut();
            },
            error: function () {
                toastr.error('error');
            }
        });
    } else {
        toastr.error(`Будь ласка, оберіть оцінку`);
    }
});
$(document).on('click', '#submit-question', function () {
    var question = $("#question-input").val().trim();

    if (question) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "home/question/submit", // Маршрут на сервере для обновления
            method: 'POST',
            data: {
                question: question,
            },
            success: function (response) {
                toastr.success(`Ваше питання надіслано!`);
                $("#overlay").fadeOut();
                $("#question-modal").fadeOut();
                $("#question-input").val("");
            },
            error: function () {
                toastr.error('error');
            }
        });
    } else {
        toastr.error(`Будь ласка, введіть своє питання`);
    }
});