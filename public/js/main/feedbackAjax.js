$('#store_cart_submit_form').on('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Create a FormData object to handle file uploads
    var formData = new FormData(this); 

    var servicesArray = [];
    var servicesObject = [];
    var fbInfo;

    $('.product-lst').each(function () {
        var getName = $(this).data('s-na');
        var getId = $(this).data('ser-id');
        var getType = $(this).children('b').text();
        var getPromotion = $(this).children('span').text();
        if (getPromotion != '') {
            var getPromotion = ` ~ Знижка (${getPromotion})`;
        } else {
            var getPromotion = '';
        }
        servicesArray += `[${getName}: ${getType}${getPromotion}]\n`;
        servicesObject.push({
            service_name: getId,
            service_price: getType
        })
    });

    if ($('.tt-bsn-us').text()) {
        var fbInfo =  'Загальна ціна: ' + $('#use_total_absolute').text() + '\n' + 'Використано бонусів: ' + $('#have_use_bonuses').text() + '\n' + $('.tt-bsn-us').text()
    } else {
        var fbInfo = 'Загальна ціна: ' + $('#use_total_absolute').text()
    }

    var total_priceBD = $('#use_total_absolute').text();
    var bonus_useBD = $('#have_use_bonuses').text();


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token setup
        }
    });

    formData.append('servicesArray', servicesArray)
    formData.append('fbInfo', fbInfo);
    formData.append('servicesObject', JSON.stringify(servicesObject));

    formData.append('total_priceBD', parseFloat(total_priceBD));
    formData.append('bonus_useBD', bonus_useBD);

    $.ajax({
        url: $(this).attr('action'), // Get the form's action URL
        method: 'POST', // Specify POST method
        data: formData, // Send FormData object (which includes the file)
        contentType: false, // Set content type to false for FormData
        processData: false, // Prevent jQuery from processing the data
        success: function(response) {
            window.location = "thanks";
        },
        error: function(xhr, status, error) {
            toastr.error('Помилка! Перевірте свої данні!');
        }
    });
});