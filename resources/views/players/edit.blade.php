@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('players.update', $player->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Player Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $player->name) }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $player->email) }}"
                   required>
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" id="date_of_birth" name="date_of_birth"
                   value="{{ old('date_of_birth', $player->date_of_birth) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone', $player->phone) }}" required>
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <textarea id="address" name="address" rows="3" class="form-control" required>
                {{ old('address', $player->address) }}
            </textarea>
        </div>
        <div class="mb-3">
            <label for="position">Position</label>
            <select id="position" name="position" required>
                <option value="">Select a position</option>
                <option value="goalkeeper" {{ old('position', $player->position) === 'goalkeeper' ? 'selected' : '' }}>Goalkeeper</option>
                <option value="defender" {{ old('position', $player->position) === 'defender' ? 'selected' : '' }}>Defender</option>
                <option value="midfielder" {{ old('position', $player->position) === 'midfielder' ? 'selected' : '' }}>Midfielder</option>
                <option value="forward" {{ old('position', $player->position) === 'forward' ? 'selected' : '' }}>Forward</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('players.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
