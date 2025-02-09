@extends('layouts.layout')

@section('content')
<form action="{{ route('users.update', $user['id']) }}" method="POST" class="card p-5">
    @csrf
    @method('PATCH')

    @if ($errors->any())
        <div class="alert alert-danger p-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna</label>
        <div class="col-sm-10">
            <select class="form-select" id="role" name="role">
                <option selected disabled hidden>Pilih</option>
                <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="karyawan" {{ $user['role'] == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" value="{{ $user['password'] }}">
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary mte-3">Ubah Data</button>
</form>
@endsection