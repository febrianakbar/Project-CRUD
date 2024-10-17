@extends('layouts.layout')

@section('content')
    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::get('failed'))
        <div class="alert alert-danger">{{ Session::get('failed') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Pengguna</h2>
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if (count($users) < 1)
                <tr>
                    <td colspan="5" class="text-center">Belum ada pengguna</td>
                </tr>
            @else
                @foreach ($users as $index => $item)
                    <tr>
                        <td>{{ ($users->currentPage()-1) * ($users->perPage()) + ($index+1) }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['email'] }}</td>
                        <td>{{ $item['role'] }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button class="btn btn-danger" onclick="showModalDelete('{{ $item->id }}', '{{ $item->name }}')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </div>
                        </td>                    
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <!-- Modal Hapus Pengguna -->
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
                    Apakah Anda yakin ingin menghapus data <b><span id="name_user"></span>?</b>
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
        $('#name_user').text(name);
        $('#exampleModal').modal('show');
        let url = "{{ route('users.delete', ':id') }}";
        url = url.replace(':id', id);
        $('form').attr('action', url);
    }
</script>
@endpush
