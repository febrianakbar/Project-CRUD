@extends('layouts.layout')

@section('content')
    <form action="{{ route('users.store') }}" method="POST" class="card p-5">
        @csrf

        @if(Session::get('success'))
        <div class="alert alert-success"> {{ Session::get('success') }}</div>

        @endif
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama Pengguna</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>

        
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna</label>
            <div class="col-sm-10">
                <select class="form-select" id="role" name="role">
                    <option selected disabled hidden>Pilih</option>
                    <option value="Admin">Admin</option>
                    <option value="Karyawan">Karyawan</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" name="password">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
    </form>
@endsection