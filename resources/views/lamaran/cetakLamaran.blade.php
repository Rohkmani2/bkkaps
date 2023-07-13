<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
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
    <h1><br>LAPORAN DATA LAMARAN KERJA</br> BKK SMKN 1 WIDASARI</h1>
    <p class="text">Jl. ByPass Ujangjaya, Ujungjaya, Kec. Widasari, Kabupaten Indramayu, Jawa Barat 45271
    </p>
    <hr class="garis">
    <table style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>NIK</th>
                <th>No Handphone</th>
                <th>Asal Kabupaten/kota</th>
                <th>Alamat Domisili</th>
                <th>Agama</th>
                <th>Tanggal Lahir</th>
                <th>Usia</th>
                <th>Tinggi Badan</th>
                <th>Berat Badan</th>
                <th>Status Vaksin</th>
                <th>Asal Sekolah</th>
                <th>Tahun Lulus</th>
                <th>Pengalaman Kerja</th>
                <th>Jurusan</th>
              </tr>
              @foreach($lamaran as $icon )
                       <tr>
                         <td>{{ $loop->iteration }}</td>
                         <td>{{ $icon->nama }}</td>
                         <td>{{ $icon->jenis_kelamin }}</td>
                         <td>{{ $icon->email }}</td>
                         <td>{{ $icon->nik }}</td>
                         <td>{{ $icon->telepon }}</td>
                         <td>{{ $icon->kota }}</td>
                         <td>{{ $icon->alamat }}</td>
                         <td>{{ $icon->agama }}</td>
                         <td>{{ $icon->tgl_lahir }}</td>
                         <td>{{ $icon->usia }}</td>
                         <td>{{ $icon->tb }}</td>
                         <td>{{ $icon->bb }}</td>
                         <td>{{ $icon->vaksin }}</td>
                         <td>{{ $icon->sekolah }}</td>
                         <td>{{ $icon->thn_lulus }}</td>
                         <td>{{ $icon->pengalaman }}</td>
                         <td>{{ $icon->jurusan }}</td>
              </tr>
              @endforeach
            </table>

</body>
<script type="text/javascript">
    window.print();
</script>
</html>
