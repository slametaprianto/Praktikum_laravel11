@extends('theme.default')
@section('content')

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Product Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .zoom {
                transition: transform 0.2s;
                /* Animation */
            }

            .zoom:hover {
                transform: scale(1.05);
                /* Zoom effect */
            }

            .card {
                border-radius: 15px;
            }

            .table th {
                background-color: #f8f9fa;
            }
        </style>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <img src="{{ asset('/storage/products/' . $product->image) }}"
                                    class="rounded img-fluid zoom" style="max-width: 650px">
                            </div>

                            <div class="table-responsive mb-4">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="200px">TITLE</th>
                                        <td>{{ $product->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>PRICE</th>
                                        <td>{{ 'Rp. ' . number_format($product->price, 2, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>STOCK</th>
                                        <td>{{ $product->stock }}</td>
                                    </tr>
                                    <tr>
                                        <th>DESCRIPTION</th>
                                        <td>{{ $product->description }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
