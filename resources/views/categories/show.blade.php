@extends('theme.default')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category Details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Category</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Category Details
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at->format('d-m-Y H:i') }}</td>
                            <td>{{ $category->updated_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back to Categories</a>
            </div>
        </div>
    </div>
@endsection
