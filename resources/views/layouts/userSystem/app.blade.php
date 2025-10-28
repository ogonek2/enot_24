<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ENOT24 - Керування клієнтами</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.0/collection/components/icon/icon.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/daterangepicker/3.1/css/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-indigo-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">ВІТАЮ!</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                        <li class="nav-header">Керування</li>
                        <li class="nav-item">
                            <a href="{{ route('userAdmin') }}" class="nav-link">
                                <i class="nav-icon fas fa-cloud"></i>
                                <p>
                                    Панель
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('notifications_admin') }}" class="nav-link">
                                <i class="nav-icon fas fa-bell"></i>
                                <p>
                                    Система сповіщень
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('planer.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>
                                    Планувальник
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('clients.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Таблиця клієнтів
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('analytics.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>
                                    Панель лояльності
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Система</li>
                        <li class="nav-item">
                            <a href="{{ route('logs.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-bug"></i>
                                <p>
                                    Логи
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('notifications_admin') }}" class="nav-link">
                                <i class="nav-icon fas fa-bolt"></i>
                                <p>
                                    Підтримка
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('notifications_admin') }}" class="nav-link">
                                <i class="nav-icon fas fa-cat"></i>
                                <p>
                                    Адміністратори
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-top: 50px; background-color: unset;">
            <!-- Main content -->
            @if (session()->has('success'))
                <div class="modal fade show" id="exampleModalLive" tabindex="-1"
                    aria-labelledby="exampleModalLiveLabel" style="display: block;" aria-modal="true" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLiveLabel">Успіх!</h5>
                            </div>
                            <div class="modal-body">
                                <p>{{ session('success') }}</p>
                            </div>
                            <div class="modal-footer" onclick="$('#exampleModalLive').hide()">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Зачинити</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    @yield('content')
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="/plugins/select2/js/select2.full.min.js"></script>
    <!-- BS-Stepper -->
    <script src="/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- InputMask -->
    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- overlayScrollbars -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/jquery.overlayScrollbars.min.js">
    </script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/demo.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/plugins/jszip/jszip.min.js"></script>
    <script src="/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>



    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script src="{{ asset('js/main/cartSystem.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script>
        $(document).ready(function() {
            let servicesList = [];

            // Загрузка списка услуг
            $.ajax({
                url: '{{ route('getservices') }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    servicesList = data;
                    initializeTypeahead();
                }
            });

            function initializeTypeahead() {
                $('#typeahead').typeahead({
                    minLength: 2,
                    autoSelect: true,
                    source: function(query, process) {
                        const filtered = servicesList.filter(service => {
                            const nameMatch = service.name && service.name.toLowerCase()
                                .includes(query.toLowerCase());
                            const articleMatch = service.article && service.article
                                .toLowerCase().includes(query.toLowerCase());
                            return nameMatch || articleMatch;
                        });
                        return process(filtered.map(service => ({
                            name: `${service.name} (${service.article})`,
                            id: service.id,
                            indprice: service.individual_price,
                            strprice: service.stream_price,
                            promotion: service.promotion
                        })));
                    },
                    updater: function(item) {
                        $('#selected-service-id').val(item.id);

                        $('#list_orders_session').append(`
                    <li class="list-group-item d-flex justify-content-between align-items-center product-lst"
                        data-ser-id="${item.id}" data-promotion="${item.promotion}"
                        data-s-na="${item.name}" data-s-price="${item.strprice}">
                        ${item.name}: <b class="ser_price">${item.strprice} ₴</b>
                    </li>
                `);

                        $('#list_orders_table_session').append(`
                    <tr>
                        <td>
                            <div class="box-title-cart-service">
                                <div class="service-title-information">
                                    <div class="title-service-name">
                                        ${item.name}
                                    </div>
                                    <div class="service-category-name">
                                        <!-- Категория не указана -->
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="select-container">
                                <select name="type_service_price[]" class="service-select-pti" 
                                    data-ser-id="${item.id}" data-s-price="${item.strprice}" 
                                    data-i-price="${item.indprice}">
                                    <option value="${item.strprice}">Базова ${item.strprice} ₴</option>
                                    ${item.indprice > 0 ? `<option value="${item.indprice}">Індивідуальна ${item.indprice} ₴</option>` : ''}
                                </select>
                            </div>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-danger remove-service" data-ser-id="${item.id}">
                                Відміна
                            </a>
                        </td>
                    </tr>
                `);

                        updateTotals();

                        // Очищаем поле ввода и уничтожаем typeahead, затем повторно инициализируем его
                        $('#typeahead').typeahead('destroy').val('');
                        initializeTypeahead();

                        return item.name;
                    }
                });
            }

            // Обработчик для удаления услуги
            $(document).on('click', '.remove-service', function() {
                const serviceId = $(this).data('ser-id');
                $(`[data-ser-id="${serviceId}"]`).remove();
                updateTotals();
            });

            // Обработчик для изменения типа цены (индивидуальная/потоковая)
            $(document).on('change', '.service-select-pti', function() {
                const selectedPrice = parseFloat($(this).val());
                const serviceId = $(this).data('ser-id');

                // Обновляем отображаемую цену в списке
                $(`#list_orders_session [data-ser-id="${serviceId}"] .ser_price`).text(
                    `${selectedPrice} ₴`);

                // Пересчитываем общую сумму
                updateTotals();
            });

            // Функция обновления итоговых сумм и расчета бонусов
            function updateTotals() {
                let totalServicePrice = 0;

                $('#list_orders_session .list-group-item').each(function() {
                    const price = parseFloat($(this).find('.ser_price').text());
                    if (!isNaN(price)) {
                        totalServicePrice += price;
                    }
                });

                // Рассчитываем бонусы как 3% от общей суммы
                const bonus = (totalServicePrice * 0.02).toFixed(2);

                // Обновляем значения на странице
                $('.total_services').text(totalServicePrice);
                $('#use_total_absolute').text(totalServicePrice);
                $('#bonus_amount').text(bonus);
            }
        });
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
    <script>
        $('.summernote2').summernote({
            tabsize: 2,
            height: 100
        });
    </script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })



        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Inputmask({
                mask: "+380(99)999-9999"
            }).mask(document.getElementById("phone"));
        });
        document.addEventListener('DOMContentLoaded', function() {
            Inputmask({
                mask: "+380(99)999-9999"
            }).mask(document.getElementById("phone2"));
        });
        document.addEventListener('DOMContentLoaded', function() {
            Inputmask({
                mask: "+380(99)999-9999"
            }).mask(document.getElementById("barcode-input"));
        });
    </script>
    <script>
        $(document).on('click', '.select-bonuses-order', function() {
            var client = {
                id: $('#user_id_bd').text(),
                phone: $('#user_phone_bd').text()
            };
            var bonusAmout = parseFloat($('#bonus_amount').text()); // Убрали лишние скобки
            var servicesList = [];

            $('.product-lst').each(function() {
                servicesList.push({
                    id: $(this).data('ser-id'),
                    price: $(this).children('b').text() // Преобразуем цену в число
                });
            });
            console.log(servicesList)

            var formData = new FormData();
            formData.append('client', JSON.stringify(client)); // Сериализуем объект client
            formData.append('bonusAmout', bonusAmout); // Числовое значение можно добавить напрямую
            formData.append('servicesList', JSON.stringify(servicesList)); // Сериализуем массив servicesList
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token setup
                }
            });
            $.ajax({
                url: "{{ route('make_order_auth_admin') }}", // Обернули route в кавычки для корректной работы в шаблоне
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('Успішно!')
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.select-bonuses-order-reserve', function() {
            var client = {
                phone: $('#phone').val()
            };
            var bonusAmout = parseFloat($('#bonus_amount').text()); // Убрали лишние скобки
            var servicesList = [];

            $('.product-lst').each(function() {
                servicesList.push({
                    id: $(this).data('ser-id'),
                    price: $(this).children('b').text() // Преобразуем цену в число
                });
            });
            console.log(servicesList)

            var formData = new FormData();
            formData.append('client', JSON.stringify(client)); // Сериализуем объект client
            formData.append('bonusAmout', bonusAmout); // Числовое значение можно добавить напрямую
            formData.append('servicesList', JSON.stringify(servicesList)); // Сериализуем массив servicesList
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token setup
                }
            });
            $.ajax({
                url: "{{ route('make_order_reserve_admin') }}", // Обернули route в кавычки для корректной работы в шаблоне
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('Успішно!')
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        });
    </script>
</body>

</html>
