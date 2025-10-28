$('.service_edit_list_this_ajax_id').on('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: $(this).data('action'),
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function() {
            toastr.success('Послуга успішно оновлена! 200');
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText); // Выводим ошибку для отладки
            toastr.error('Помилка! Перевірте свої данні!');
        }
    });
});


$('.service_edit_page_ajax_id').on('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: $(this).data('action'),
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            toastr.success('Послуга успішно оновлена!');
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText); // Выводим ошибку для отладки
            toastr.error('Помилка! Перевірте свої данні!');
        }
    });
});