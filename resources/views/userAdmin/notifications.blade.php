@extends('layouts.userSystem.app')


@section('content')
    <div class="row">
        <div class="col-md-3 d-flex">
            <!-- Form Element sizes -->
            <div class="card w-100">
                <div class="card-header">
                    <h3 class="card-title">Додати нового посильного</h3>
                </div>
                <form action="{{ route('notifications_admin_make_profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ім'я</label>
                            <input type="text" class="form-control" placeholder="Ім'я посильного" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Заголовок</label>
                            <input type="text" class="form-control" placeholder="Заголовок посильного" name="title">
                        </div>
                        <div class="form-group">
                            <label>Дозволи</label><br>
                            <select name="message_permission" class="form-control">
                                <option value="1">Можна відповідати</option>
                                <option value="2">Не можна відповідати</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Іконка</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="icon" id="exampleInputFile">
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
                <div class="card-footer">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Посильний</th>
                                <th>Заголовок</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profile as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->title }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <!-- Form Element sizes -->
            <div class="card w-100">
                <div class="card-header">
                    <h3 class="card-title">Окремий лист</h3>
                </div>
                <form action="{{ route('notifications_admin_make_individual') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Від</label>
                            <select class="form-control" style="width: 100%;" name="from_profile">
                                @foreach ($profile as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Клієнт</label>
                            <select class="form-control select2" style="width: 100%;" name="client">
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->phone }} - ({{ $item->name }}) ~ {{ $bonuses->where('user_id', $item->id)->pluck('bonus') }} ₴
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Повідомлення</label>
                            <textarea class="summernote2" name="value"></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Створити</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <!-- Form Element sizes -->
            <div class="card w-100">
                <div class="card-header">
                    <h3 class="card-title">Розсилка</h3>
                </div>
                <form action="{{ route('notifications_admin_make_mailing') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Від</label>
                            <select class="form-control" style="width: 100%;" name="from_profile">
                                @foreach ($profile as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Повідомлення</label>
                            <textarea class="summernote2" name="value"></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Створити</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <!-- Form Element sizes -->
            <div class="card w-100">
                <div class="card-header">
                    <h3 class="card-title">Нарахування</h3>
                </div>
                <form action="{{ route('notifications_admin_make_bonus') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Клієнт</label>
                            <select class="form-control select2" style="width: 100%;" name="client">
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->phone }} - ({{ $item->name }}) ~ {{ $bonuses->where('user_id', $item->id)->pluck('bonus') }} ₴
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Кількість нарахування ₴</label>
                            <input type="number" min="1" max="1000" class="form-control" value="1" name="bonus">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Створити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('.summernote2').summernote({
            tabsize: 2,
            height: 100
        });
    </script>
@endsection
