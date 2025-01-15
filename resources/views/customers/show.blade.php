@extends('theme.default')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Customer Details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Customer</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Customer Details
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NIK</th>
                            <th scope="col">NAME</th>
                            <th scope="col">TELPON</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">ALAMAT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->nik }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->telp }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->alamat }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Back to Customers</a>
            </div>
        </div>
    </div>
@endsection
