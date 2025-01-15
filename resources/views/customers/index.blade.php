@extends('theme.default')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Customer</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Customer</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <a href="{{ route('customers.create') }}" class="btn btn-md btn-success mb-3">ADD CUSTOMER</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">NIK</th>
                            <th scope="col">NAME</th>
                            <th scope="col">TELPON</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col" style="width: 20%">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)
                            <tr id="row-{{ $customer->id }}">
                                <td>{{ $customer->nik }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->telp }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->alamat }}</td>
                                <td class="text-center">
                                    <a href="{{ route('customers.show', $customer->id) }}"
                                        class="btn btn-sm btn-info">SHOW</a>
                                    <a href="{{ route('customers.edit', $customer->id) }}"
                                        class="btn btn-sm btn-primary">EDIT</a>
                                    <button class="btn btn-sm btn-danger"
                                        onclick="deleteCustomer({{ $customer->id }})">HAPUS</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Customer Tidak Tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
                {{ $customers->links() }}
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
    function deleteCustomer(id) {
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
                fetch(`/customers/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Hapus baris dari tabel
                            const row = document.getElementById(`row-${id}`);
                            if (row) row.remove();

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
