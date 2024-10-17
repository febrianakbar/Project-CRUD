@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Selamat Datang di Website Data Siswa</h1>
        <p class="lead text-center mb-4">Website ini dirancang untuk membantu dalam pengelolaan dan pemantauan data siswa secara efektif dan efisien.</p>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Fitur Utama</h3>
                        <ul class="list-unstyled">
                            <li><strong>Pendaftaran Siswa:</strong> Memudahkan pendaftaran siswa baru dengan formulir yang sederhana.</li>
                            <li><strong>Pengelolaan Data:</strong> Memungkinkan pengelolaan data siswa, termasuk informasi pribadi dan akademik.</li>
                            <li><strong>Laporan:</strong> Menyediakan laporan yang komprehensif untuk analisis data siswa.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Mengapa Memilih Kami?</h3>
                        <ul class="list-unstyled">
                            <li><strong>Antarmuka yang Ramah Pengguna:</strong> Desain yang intuitif memudahkan navigasi.</li>
                            <li><strong>Keamanan Data:</strong> Data siswa dilindungi dengan sistem keamanan yang ketat.</li>
                            <li><strong>Dukungan Pelanggan:</strong> Tim dukungan kami siap membantu Anda dengan pertanyaan dan masalah.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('data.index') }}" class="btn btn-primary btn-lg">Lihat Data Siswa</a>
        </div>
    </div>
@endsection
