    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <style>
        .container {
            text-align: center;
            margin: auto;
        }

        .column {
            float: left;
            text-align: center;
            width: 33.33%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            font-size: 5pt;
        }

        .garis {
            border: 1px solid #000000;
            margin-bottom: 25px;
        }

        h1 {
            font-size: 23pt;
            color: #212121;
            text-align: center;
        }

        .text {
            font-size: 12pt;
            color: #212121;
            text-align: center;
        }

        html,
        body {
            margin: 35px 40px 35px 50px;
        }
    </style>

    <body>
        <div class="row">
            <div class="column">
                <img src="images/smknonewie.png" alt="Logo Instansi" style="width:100px; margin-top: 40px;"
                    height="95px">
            </div>
            <div class="column">
                <h2><br>DATA PENDAFTAR</br> BKK SMKN 1 WIDASARI</h2>
                <p class="text">Jl. ByPass Ujangjaya, Ujungjaya, Kec. Widasari, Kabupaten Indramayu, Jawa Barat 45271
                </p>
            </div>
            <div class="column">
                <img src="images/bkkonewie.png" alt="Logo Instansi" style="width:100px; margin-top: 40px;"
                    height="95px">
            </div>
        </div>

        <hr class="garis">
        <table style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No Handphone</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Tempat Lahir</th>
                    <th>Alamat Domisili</th>
                    <th>Agama</th>
                    <th>Usia</th>
                    <th>Tinggi Badan</th>
                    <th>Berat Badan</th>
                    <th>Asal Sekolah</th>
                    <th>Jurusan</th>
                    <th>Tahun Lulus</th>
                    <th>Pengalaman Kerja</th>
                    <th>Status Vaksin</th>
                </tr>
                @foreach ($lamaran as $icon)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $icon->nama }}</td>
                        <td>{{ $icon->email }}</td>
                        <td>{{ $icon->telepon }}</td>
                        <td>{{ $icon->nik }}</td>
                        <td>{{ $icon->jenis_kelamin }}</td>
                        <td>{{ $icon->tgl_lahir }}</td>
                        <td>{{ $icon->ttl }}</td>
                        <td>{{ $icon->alamat }}</td>
                        <td>{{ $icon->agama }}</td>
                        <td>{{ $icon->usia }}</td>
                        <td>{{ $icon->tb }}</td>
                        <td>{{ $icon->bb }}</td>
                        <td>{{ $icon->sekolah }}</td>
                        <td>{{ $icon->jurusan }}</td>
                        <td>{{ $icon->thn_lulus }}</td>
                        <td>{{ $icon->pengalaman }}</td>
                        <td>{{ $icon->vaksin }}</td>
                    </tr>
                @endforeach
        </table>

    </body>
    <script type="text/javascript">
        window.print();
    </script>

    </html>
