@extends('layouts.admin.app')

@section('content')
<div class="row">
        <div class="col-md-4">
            <!-- Form Element sizes -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">ДОДАТИ НОВУ КАТЕГОРІЮ</h3>
                </div>
                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Назва категорії 📍</label>
                            <input type="text" class="form-control" placeholder="Придумайте назву для основної категорії"
                                name="category">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Тип категорії 📍</label>
                            <select class="form-control" name="category_type">
                                <option value="1">Хімчистка</option>
                                <option value="2">Ремонт та реставрація</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Іконка категорії</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="category_img" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Завантажте
                                        картинку</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Створити</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">ДОДАТИ ПОСЛУГУ</h3>
                </div>
                <form action="{{ route('admin.service.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Назва послуги 📍</label>
                            <input type="text" class="form-control" placeholder="Придумайте назву для послуги"
                                name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2">Ціна</label>
                            <input type="text" class="form-control" placeholder="Звичайна" name="stream_price">
                            <br>
                            <input type="text" class="form-control" placeholder="Індивідуальна" name="individual_price">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Оберіть категорію</label>
                            <select class="custom-select rounded-0" id="exampleSelectRounded0" name="category_id">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Створити</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Усі категорії 📍</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Назва</th>
                                <th>Дії</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>
                                        <span href="#" class="btn btn-primary"
                                            onclick="editForm({{ $item->id }})">Оновити</span>
                                        <span class="btn btn-danger"
                                            onclick="confirmDelete({{ $item->id }})">Видалити</span>
                                    </td>
                                </tr>
                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">
                                                    Підтвердження видалення</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Ви впевнені, що хочете видалити цей запис? <br>
                                                #{{ $item->id }} - {{ $item->category }} <br><br>
                                                При видаленні категорії, всі послуги прив'язані до неї будуть також видалені:
                                                <ol>
                                                    @foreach ($services->where('category_id', $item->id)->all() as $ser)
                                                        <li>{{ $ser->name }}</li>
                                                    @endforeach
                                                </ol>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Скасувати</button>
                                                <a href="{{ route('admin.category.delete', $item->id) }}"
                                                    class="btn btn-danger">
                                                    Видалити
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="editForm{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editFormLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editFormLabel{{ $item->id }}">
                                                    Редагування інформації</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.category_img.edit', $item->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card-body">
                                                        <img src="{{ asset('storage/' . $item->catyegory_img) }}" alt="" style="width: 100%; height: auto; text-align: center;">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Іконка категорії</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                    name="category_img" id="exampleInputFile">
                                                                    <label class="custom-file-label"
                                                                        for="exampleInputFile">Завантажте
                                                                        картинку</label>
                                                                </div>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Upload</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Оновити
                                                            іконку</button>
                                                    </div>
                                                </form>
                                                <form action="{{ route('admin.category.edit', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Назва категорії 📍</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Введіть назву категорії"
                                                                value="{{ $item->category }}" name="category">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Тип категорії 📍</label>
                                                            <select class="form-control" name="category_type">
                                                                <option value="1">Хімчистка</option>
                                                                <option value="2">Ремонт та реставрація</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Оновити
                                                            інформацію</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Скасувати</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function editForm(itemId) {
                                        $('#editForm' + itemId).modal('show');
                                    }
                                </script>
                                <script>
                                    function confirmDelete(itemId) {
                                        $('#deleteModal' + itemId).modal('show');
                                    }
                                </script>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.refresh_services') }}" class="btn btn-warning mb-2">REFRESH SERVICES URL</a>
                    <a href="{{ route('admin.get_services_sitemap') }}" class="btn btn-primary mb-2">GET SITEMAP</a>
                    <h3 class="card-title">Усі послуги 📍</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>link</th>
                                <th>category_id</th>
                                <th>stream_price</th>
                                <th>individual_price</th>
                                <th>Дії</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->transform_url }}</td>
                                    <td>{{ $categories->firstWhere('id', $item->category_id)->category }}</td>
                                    <td>{{ $item->stream_price }}</td>
                                    <td>{{ $item->individual_price }}</td>
                                    <td>
                                        <span href="#" class="btn btn-primary"
                                            onclick="editFormS({{ $item->id }})">Оновити</span>
                                        <span href="#" class="btn btn-warning"
                                            onclick="editPageS({{ $item->id }})">Налаштування сторінки</span>
                                        <span class="btn btn-danger"
                                            onclick="confirmDeleteS({{ $item->id }})">Видалити</span>
                                    </td>
                                </tr>
                                <div class="modal fade" id="deleteModalS{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deleteModalLabel{{ $item->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">
                                                    Підтвердження видалення</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Ви впевнені, що хочете видалити цей запис? <br>
                                                #{{ $item->id }} - {{ $item->name }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Скасувати</button>
                                                <a href="{{ route('admin.service.delete', $item->id) }}"
                                                    class="btn btn-danger">
                                                    Видалити
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="editFormS{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editFormLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editFormLabel{{ $item->id }}">
                                                    Редагування інформації</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form data-action="{{ route('admin.service.edit', $item->id) }}" method="POST" class="service_edit_list_this_ajax_id">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Назва послуги 📍</label>
                                                            <input type="text" class="form-control" placeholder="Введіть адресу локації"
                                                                value="{{ $item->name }}" name="name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Маркер</label>
                                                            <input type="text" class="form-control" placeholder="Введіть маркер"
                                                                value="{{ $item->marker }}" name="marker">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail2">Ціна</label>
                                                            <input type="text" class="form-control" placeholder="Звичайна"
                                                                value="{{ $item->stream_price }}" name="stream_price">
                                                            <br>
                                                            <input type="text" class="form-control" placeholder="Індивідуальна"
                                                                value="{{ $item->individual_price }}" name="individual_price">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleSelectRounded0">Оберіть категорію</label>
                                                            <select class="custom-select rounded-0" id="exampleSelectRounded0" name="category_id">
                                                                @foreach ($categories as $el)
                                                                    <option value="{{ $el->id }}"
                                                                        @if ($el->id == $item->category_id) selected @endif>
                                                                        {{ $el->category }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Оновити
                                                            інформацію</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Скасувати</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="modal fade" id="editPageS{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editPageLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPageLabel{{ $item->id }}">{{ $item->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="service_edit_page_ajax_id" method="post" data-action="{{ route('admin.service.edit.page', $item->id) }}">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Назва сторінки</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="-"
                                                                value="{{ $item->name_page }}" name="name_page">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Опис сторінки СЕО</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="-" value="{{ $item->seo_description }}" name="seo_description">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Keywords</label>
                                                            <textarea type="text" class="form-control" name="seo_keywords">{{ $item->seo_keywords }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Опис на сторінці</label>
                                                            <textarea type="text" class="form-control" name="description">{{ $item->description }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Оновити інформацію</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Скасувати</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function editFormS(itemId) {
                                        $('#editFormS' + itemId).modal('show');
                                    }
                                </script>
                                <script>
                                    function confirmDeleteS(itemId) {
                                        $('#deleteModalS' + itemId).modal('show');
                                    }
                                </script>
                                <script>
                                    function editPageS(itemId) {
                                        $('#editPageS' + itemId).modal('show');
                                    }
                                </script>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
