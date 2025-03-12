@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-container">
        <h1>All Players</h1>
        <a href="{{ route('players.create') }}" class="btn btn-primary mb-3">Add New Players</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th data-sort="name">Name</th>
                    <th data-sort="email">Email</th>
                    <th data-sort="date_of_birth">Date of Birth</th>
                    <th data-sort="phone">Phone</th>
                    <th data-sort="address">Address</th>
                    <th data-sort="position">Position</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="playersTableBody">
                @forelse($players as $player)
                    <tr>
                        <td>{{$player->name}}</td>
                        <td>{{$player->email}}</td>
                        <td>{{$player->date_of_birth}}</td>
                        <td>{{$player->phone}}</td>
                        <td>{{$player->address}}</td>
                        <td>{{$player->position}}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('players.edit', $player->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('players.destroy', $player->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No players found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
