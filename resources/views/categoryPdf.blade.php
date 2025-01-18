<!DOCTYPE html>
<html>

<head>
    <title>Data Laporan Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 40px;
            line-height: 1.6;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 5px;
        }

        .divider {
            border-bottom: 2px solid #000;
            margin: 15px 0 30px;
        }

        p {
            text-align: justify;
            margin-bottom: 20px;
        }

        .report-date {
            text-align: right;
            font-size: 14px;
            color: #555;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #f4f4f4;
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
        <h1>{{ $title }}</h1>
        <div class="divider"></div>
        <p class="report-date">Tanggal: {{ \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('l, d F Y') }}</p>
        <p>
            Berikut adalah laporan data kategori yang telah tercatat dalam sistem. Data ini mencakup ID, nama kategori,
            waktu pembuatan, dan waktu pembaruan terakhir. Laporan ini dihasilkan secara otomatis untuk keperluan
            dokumentasi dan pelaporan.
        </p>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
