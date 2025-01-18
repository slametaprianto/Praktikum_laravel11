@extends('theme.default')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Category</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <a href="{{ route('categories.create') }}" class="btn btn-md btn-success mb-3">ADD CATEGORY</a>
                <a href="{{ route('printcategory') }}" class="btn btn-md btn-secondary mb-3"> PRINT CATEGORY</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NAME</th>
                            <th scope="col" style="width: 20%">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('categories.show', $category->id) }}"
                                        class="btn btn-sm btn-info">SHOW</a>
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-sm btn-primary">EDIT</a>
                                    <button class="btn btn-sm btn-danger"
                                        onclick="deleteCategory({{ $category->id }})">HAPUS</button>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Product Tidak Tersedia
                            </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $categories->links() }}
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
</script>
<script>
    function deleteCategory(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin ingin Menghapus?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form to delete category
                document.getElementById(`delete-form-${id}`).submit();
            }
        });
    }
</script>
