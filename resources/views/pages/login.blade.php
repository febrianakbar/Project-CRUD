@extends('layouts.layout')

@section('content')

<div> <!-- Mengubah justify-content menjadi start -->
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px; margin-left: 300px;"> <!-- Menambahkan margin kiri -->
        <div class="card-body">
            <h2 class="text-center mb-4 text-primary">Login</h2>
            <form action="{{ route('login.user') }}" method="POST">
                @csrf
                @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if(Session::get('failed'))
                    <div class="alert alert-danger">
                        {{ Session::get('failed') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group mb-3">
                    <label for="email">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-2">Login</button>
                <p class="text-center mt-3">Don't have an account? <a href="{{ route('auth.register') }}" class="text-primary">Sign up</a></p>
            </form>
        </div>
    </div>
</div>

@endsection
