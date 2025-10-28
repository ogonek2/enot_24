@extends('layouts.userSystem.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Планер випадаючих вікон</h2>

        <!-- Сообщения об успешных действиях -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Список модальных окон -->
        <div class="row mb-4">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>День тижня</th>
                            <th>Заголовок</th>
                            <th>Оператор</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($planers as $planer)
                            <tr>
                                <td>{{ $planer->id }}</td>
                                <td>{{ $planer->day }}</td>
                                <td>{{ $planer->title }}</td>
                                <td>
                                    <form action="{{ route('planer.destroy', $planer->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Вы уверены?')">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Форма для создания модального окна -->
        <div class="row">
            <div class="col-md-12">
                <h4>Додати вікно</h4>
                <form action="{{ route('planer.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="day">Заголок</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="day">День тиждня (1 = Понеділок, 7 = Неділя)</label>
                        <input type="number" min="1" max="7" name="day" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Контент</label>
                        <textarea name="content" class="form-control summernote2" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Додати</button>
                </form>
            </div>
        </div>
    </div>
@endsection
