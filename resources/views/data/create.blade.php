@extends('layouts.layout')

@section('content')
    <form action="{{ route('data.store') }}" method="POST" class="card p-5">
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
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="nis" class="col-sm-2 col-form-label">Nis :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="nis" name="nis">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas :</label>
            <div class="col-sm-10">
                <select class="form-select" id="kelas" name="kelas">
                    <option selected disabled hidden>Pilih</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan :</label>
            <div class="col-sm-10">
                <select class="form-select" id="jurusan" name="jurusan">
                    <option selected disabled hidden>Pilih</option>
                    <option value="PPLG">PPLG</option>
                    <option value="TJKT">TJKT</option>
                    <option value="DKV">DKV</option>
                    <option value="HOTEL">HOTEL</option>
                    <option value="KULINER">KULINER</option>
                    <option value="PEMASARAN">PEMASARAN</option>
                    <option value="MPLB">MPLB</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    </form>
@endsection