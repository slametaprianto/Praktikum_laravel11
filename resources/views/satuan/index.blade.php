@extends('theme.default')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Satuan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Satuan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <a href="{{ route('satuan.create') }}" class="btn btn-md btn-success mb-3">ADD SATUAN</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NAME</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col" style="width: 20%">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($satuans as $satuan)
                            <tr id="row-{{ $satuan->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $satuan->name }}</td>
                                <td>{{ $satuan->description }}</td>
                                <td class="text-center">
                                    <a href="{{ route('satuan.show', $satuan->id) }}" class="btn btn-sm btn-info">SHOW</a>
                                    <a href="{{ route('satuan.edit', $satuan->id) }}"
                                        class="btn btn-sm btn-primary">EDIT</a>
                                    <button class="btn btn-sm btn-danger"
                                        onclick="deleteSatuan({{ $satuan->id }})">HAPUS</button>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Satuan Tidak Tersedia
                            </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $satuans->links() }}
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    //message with sweetalert
    @if (session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @elseif (session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif
    function deleteSatuan(id) {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim permintaan DELETE menggunakan fetch
                fetch(`/satuan/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content'),
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => response.json()) // Mengambil respons JSON
                    .then(data => {
                        if (data.success) {
                            // Hapus baris dari tabel dengan id yang sesuai
                            const row = document.getElementById(`row-${id}`);
                            if (row) {
                                row.remove(); // Menghapus baris dari tabel
                            }

                            Swal.fire(
                                'Terhapus!',
                                data.message,
                                'success'
                            );
                        } else {
                            Swal.fire(
                                'Error!',
                                data.message || 'Terjadi kesalahan saat menghapus data.',
                                'error'
                            );
                        }
                    })
                    .catch(() => {
                        Swal.fire(
                            'Error!',
                            'Tidak dapat menghapus data.',
                            'error'
                        );
                    });
            }
        });
    }
</script>
