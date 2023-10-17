@extends('layouts.dashboard')
@section('content')
    <div class="register-box" style="width: 80% ; margin:auto">

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Edit users data</p>

                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-3 align-items-center">
                        <label for="name" class="mr-2">Name</label>

                        <input type="text" class="form-control" placeholder="Full name" name="name"
                            value="{{ $user->name }}">
                        <div class="input-group-append">
                            <div class="input-group-text d-inline">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    {{-- show validation errors --}}
                    <div class="text-danger  mb-4">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="input-group mb-3 align-items-center">
                        <label for="email" class="mr-2">Email</label>

                        <input type="email" class="form-control" placeholder="Email" name="email" id="email"
                            value="{{ $user->email }}">
                        <div class="input-group-append">
                            <div class="input-group-text d-inline">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    {{-- show validation errors --}}
                    <div class="text-danger  mb-4">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>


                    <div class="input-group mb-3 align-items-center">
                        <label for="room" class="mr-2">Room</label>

                        <select name="room_id" class="form-control form-select mb-3 align-items-center " style="width: 25%"
                            aria-label="Default select example">
                            <option selected value="">not selected</option>

                            @foreach ($rooms as $room)
                            <option value="{{ $room->id }}" @if($room->id == $user->room_id) selected @endif>{{ $room->name }}</option>
                            
                            @endforeach

                           


                        </select>
                    </div>
                    {{-- show validation errors --}}
                    <div class="text-danger  mb-4">
                        @error('room')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile" class="mr-2">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                <label class="custom-file-label" class="mr-2" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text d-inline">Upload</span>
                            </div>
                        </div>
                    </div>
                    {{-- show validation errors --}}
                    <div class="text-danger  mb-4">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="col-4 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
