@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Form Element sizes -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">ДОДАТИ АДМІНІСТРАТОРА</h3>
                </div>
                <form action="{{ route('admin.admin.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ідентифікатор користувача</label>
                            <input type="text" class="form-control" placeholder="Ідентифікатор користувача" name="admin_id">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пароль️</label>
                            <input type="text" class="form-control"
                                placeholder="Придумайте пароль" name="admin_hash_key">
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
@endsection
