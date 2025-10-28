@extends('layouts.userSystem.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Клієнти</h2>
    <div class="table-responsive">
        <table id="example1" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Bonus Card ID</th>
                    <th scope="col">Bonus Info</th> <!-- Adjust as needed for bonus details -->
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->bonus_card_id }}</td>
                    <td>
                        @if($user->bonus)
                            <!-- Display bonus information here -->
                            {{ $user->bonus->bonus }} ₴ <!-- Adjust as needed -->
                        @else
                            No Bonus Card
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
