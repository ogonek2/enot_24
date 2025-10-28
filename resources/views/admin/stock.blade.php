@extends('layouts.admin.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.refresh_discount') }}" class="btn btn-warning mb-2">REFRESH DISCOUNT URL</a>
                    <h3 class="card-title">Усі акції 📍</h3>
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
                            @foreach ($stock as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
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
                                                #{{ $item->id }} - {{ $item->name }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Скасувати</button>
                                                <a href="{{ route('admin.stock.delete', $item->id) }}"
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
                                                <form action="{{ route('admin.stock_img.edit', $item->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card-body">
                                                        <img src="{{ asset('storage/' . $item->banner) }}" alt=""
                                                            style="width: 100%; height: auto; text-align: center;">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Іконка категорії</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                        name="banner" id="exampleInputFile">
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
                                                <form action="{{ route('admin.stock.edit', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Назва акції 📍</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Придумайте назву акції" name="name" value="{{ $item->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Назва акції для кастомного відображення📍</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Придумайте назву акції для кастомного відображення" name="telegram_name" value="{{ $item->telegram_name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Локації 📍</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Напишіть в яких відділеннях діє акція"
                                                                name="locations" value="{{ $item->locations }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Акційна приписка</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Напишіть приписку до акції"
                                                                name="discount_action" value="{{ $item->discount_action }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Умови акції</label>
                                                            <textarea class="summernote2" placeholder="Придумайте умови для акції" name="umowy">{!! $item->umowy !!}</textarea>
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
        <div class="col-md-4">
            <!-- Form Element sizes -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">ДОДАТИ НОВУ АКЦІЮ</h3>
                </div>
                <form action="{{ route('admin.stock.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Назва акції 📍</label>
                            <input type="text" class="form-control" placeholder="Придумайте назву акції"
                                name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Назва акції для кастомного відображення📍</label>
                            <input type="text" class="form-control"
                            placeholder="Придумайте назву акції для кастомного відображення" name="telegram_name" value="{{ $item->telegram_name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Баннер акції</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="banner"
                                        id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Завантажте
                                        картинку</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Локації 📍</label>
                            <input type="text" class="form-control"
                                placeholder="Напишіть в яких відділеннях діє акція" name="locations">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Акційна приписка</label>
                            <input type="text" class="form-control"
                                placeholder="Напишіть приписку до акції"
                                name="discount_action">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Умови акції</label>
                            <textarea id="summernote" placeholder="Придумайте умови для акції"
                                name="umowy"></textarea>
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
    </div>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 100
        });
    </script>
    <script>
        $('.summernote2').summernote({
            tabsize: 2,
            height: 100
        });
    </script>
@endsection
