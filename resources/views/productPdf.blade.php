<!DOCTYPE html>
<html>

<head>
    <title>Laravel 11 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 20px;
            line-height: 1.6;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .divider {
            border-bottom: 2px solid #000;
            margin: 15px 0 30px;
        }

        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
        }

        .kop-surat img {
            height: 60px;
        }

        .kop-surat .title {
            font-size: 14px;
            font-weight: bold;
        }

        .report-date {
            text-align: right;
            font-size: 14px;
            font-style: italic;
            margin-bottom: 20px;
        }

        p {
            text-align: justify;
            margin-bottom: 20px;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            vertical-align: middle;
        }

        table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="kop-surat">
            <img src="{{ public_path('logo.png') }}" alt="Logo Perusahaan">
        </div>
        <h1>{{ $title }}</h1>
        <div class="divider"></div>

        <p class="report-date">Tanggal: {{ \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('l, d F Y') }}</p>
        <p>
            Laporan ini disusun untuk memberikan gambaran lengkap mengenai data produk yang terdapat pada sistem kami.
            Informasi dalam laporan ini mencakup ID produk, gambar, judul produk, harga, dan jumlah stok yang tersedia.
            Kami berharap laporan ini dapat memberikan informasi yang jelas dan membantu dalam proses evaluasi dan
            analisis.
        </p>

        <div class="table-container">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Gambar</th>
                        <th>Judul Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <img src="{{ public_path('storage/products/' . $product->image) }}"
                                    style="width: 80px; height: auto;">
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p>
            Demikian laporan ini dibuat untuk memberikan informasi yang dapat digunakan dalam pengambilan keputusan.
            Jika ada hal yang perlu diklarifikasi, mohon segera hubungi kami melalui kontak yang tersedia.
        </p>
    </div>
</body>

</html>
