@extends('layouts.layout')

@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h2>Data Siswa</h2>
        <a href="{{ route('data.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($datas as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['nis'] }}</td>
                    <td>{{ $item['kelas'] }}</td>
                    <td>{{ $item['jurusan'] }}</td>
                    <td class="text-center">
                        <a href="{{ route('data.edit', $item['id']) }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <button class="btn btn-danger" onclick="showModalDelete('{{ $item->id }}', '{{ $item->name }}')">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </td>                    
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data <b><span id="name_data"></span>?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function showModalDelete(id, name) {
        $('#name_data').text(name);
        $('#exampleModal').modal('show');
        let url = "{{ route('data.delete', ':id') }}";
        url = url.replace(':id', id);
        $('form').attr('action', url);
    }
</script>
@endpush
