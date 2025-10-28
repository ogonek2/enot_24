@extends('layouts.main.app')


@section('title')
<title>Акція - {{$stock->name}} / Хімчистка Єнот 24</title>
<meta property="og:title" content="Акція - {{$stock->name}} / Хімчистка">
@endsection

@section('header')
    @include('includes.header.nav')
    @include('includes.header-page', [
        'content' => $stock->name,
    ])
@endsection

@section('content')
    <div class="discount-block-container">
        <div class="discount-box">
            <div class="content-action">
                {!! $stock->umowy !!}
            </div>
        </div>
    </div>
    @include('includes.feedback-page', ['content' => 'Акція: ' . $stock->name])
@endsection
