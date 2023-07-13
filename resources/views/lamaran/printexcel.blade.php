<!DOCTYPE html>
<html>
    <head>
        <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #426de4;
  color: white;
}
</style>
</head>
<body>
    <p align="center"><b>LAPORAN DATA LAMARAN KERJA</b></p>
<table id="customers">
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
  @foreach($data as $icon )
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
