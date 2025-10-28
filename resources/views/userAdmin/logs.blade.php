@extends('layouts.userSystem.app')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Логи</h4>
                </div>
                <div class="card-body">
                    @foreach($logs as $log)
                        <div class="card mt-3">
                            <div class="card-header">
                                <strong>{{ $log['filename'] }}</strong>
                            </div>
                            <div class="card-body">
                                <pre style="white-space: pre-wrap; word-wrap: break-word; font-family: monospace;">
                                    {!! nl2br(e($log['content'])) !!}
                                </pre>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
