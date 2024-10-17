@extends('layouts.layout')

@section('content')
<form action="{{ route('data.update', $data['id']) }}" method="POST" class="card p-5">
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
        <label for="name" class="col-sm-2 col-form-label">Nama :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $data['name'] }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nis" class="col-sm-2 col-form-label">Nis :</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="nis" name="nis" value="{{ $data['nis'] }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas :</label>
        <div class="col-sm-10">
            <select class="form-select" id="kelas" name="kelas">
                <option selected disabled hidden>Pilih</option>
                <option value="X" {{ $data['kelas'] == 'X' ? 'selected' : '' }}>X</option>
                <option value="XI" {{ $data['kelas'] == 'XI' ? 'selected' : '' }}>XI</option>
                <option value="XII" {{ $data['kelas'] == 'XII' ? 'selected' : '' }}>XII</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan :</label>
        <div class="col-sm-10">
            <select class="form-select" id="jurusan" name="jurusan">
                <option selected disabled hidden>Pilih</option>
                <option value="PPLG" {{ $data['jurusan'] == 'PPLG' ? 'selected' : '' }}>PPLG</option>
                <option value="TJKT" {{ $data['jurusan'] == 'TJKT' ? 'selected' : '' }}>TJKT</option>
                <option value="DKV" {{ $data['jurusan'] == 'DKV' ? 'selected' : '' }}>DKV</option>
                <option value="HOTEL" {{ $data['jurusan'] == 'HOTEL' ? 'selected' : '' }}>HOTEL</option>
                <option value="KULINER" {{ $data['jurusan'] == 'KULINER' ? 'selected' : '' }}>KULINER</option>
                <option value="PEMASARAN" {{ $data['jurusan'] == 'PEMASARAN' ? 'selected' : '' }}>PEMASARAN</option>
                <option value="MPLB" {{ $data['jurusan'] == 'MPLB' ? 'selected' : '' }}>MPLB</option>
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mte-3">Ubah Data</button>
    @endsection