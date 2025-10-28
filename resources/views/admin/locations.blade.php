@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Form Element sizes -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">ДОДАТИ НОВУ ЛОКАЦІЮ</h3>
                </div>
                <form action="{{ route('admin.locations.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Вулиця 📍</label>
                            <input type="text" class="form-control" placeholder="Введіть адресу локації" name="street">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Часи роботи ⏱</label>
                            <input type="text" class="form-control" placeholder="Введіть часи роботи, та вихідні дні"
                                name="workinghourse">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Посилання на карті ️🗺️</label>
                            <input type="text" class="form-control"
                                placeholder="Введіть посилання вказанної точки на мапі" name="link_map">
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Усі локації 📍</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Вулиця</th>
                                <th>Часи роботи</th>
                                <th>Посилання</th>
                                <th>Дії</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locations as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->street }}</td>
                                    <td>{{ $item->workinghourse }}</td>
                                    <td>{{ $item->link_map }}</td>
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
                                                #{{ $item->id }} - {{ $item->street }} - {{ $item->workinghourse }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Скасувати</button>
                                                <a href="{{ route('admin.locations.delete', $item->id) }}"
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
                                                <form action="{{ route('admin.location_img.edit', $item->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card-body">
                                                        <img src="{{ asset('storage/' . $item->banner) }}" alt="(Пусто)"
                                                            style="width: 100%; height: auto; text-align: center;">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Баннер локації</label>
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
                                                <form action="{{ route('admin.locations.edit', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Вулиця 📍</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Введіть адресу локації"
                                                                value="{{ $item->street }}" name="street">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Часи роботи ⏱</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Введіть часи роботи, та вихідні дні"
                                                                value="{{ $item->workinghourse }}" name="workinghourse">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">SEO посилання <small>obolon/...</small></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Введіть посилання"
                                                                value="{{ $item->seo_link }}" name="seo_link">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Посилання на карті ️🗺️</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Введіть посилання вказанної точки на мапі"
                                                                value="{{ $item->link_map }}" name="link_map">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>Широта</label>
                                                                        <div class="input-group">
                                                                            <input name="lat" type="text"
                                                                                class="form-control"
                                                                                placeholder="..."
                                                                                value="{{ $item->lat }}">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-ruler"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Довгота</label>
                                                                        <div class="input-group">
                                                                            <input name="lng" type="text"
                                                                                class="form-control"
                                                                                placeholder="..."
                                                                                value="{{ $item->lng }}">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-ruler"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Дійсна акція</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Введіть акцію"
                                                                value="{{ $item->value }}" name="value">
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Оновити</button>
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
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Вулиця</th>
                                <th>Часи роботи</th>
                                <th>Посилання</th>
                                <th>Дії</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
