@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-container">
            <h1>Create Player</h1>
            <div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <form id="playerForm" method="POST" action="{{route('players.store')}}">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="name" class="form-label">Player Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" required>
                </div>

                <div class="mb-3">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" class="form-control" value="{{old('phone')}}" required>
            </div>

            <div class="mb-3">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="position">Position</label>
                <select id="position" name="position" required>
                    <option value="">Select a position</option>
                    <option value="goalkeeper">Goalkeeper</option>
                    <option value="defender">Defender</option>
                    <option value="midfielder">Midfielder</option>
                    <option value="forward">Forward</option>
                </select>
            </div>

            <div>
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('players.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
        <div id="message" class="message"></div>
    </div>
</div>
@endsection
