<table class="table table-bordered">
  <tr>
    <td></td>
    <td><img src="/image/dosen/{{ $item->photo }}" alt="foto" width="100" height="100"></td>
  </tr>
  <tr>
    <th>Nidn</th>
    <td>{{ $item->nidn }}</td>
  </tr>
  <tr>
    <th>Nama</th>
    <td>{{ $item->nama }}</td>
  </tr>
  <tr>
    <th>Tempat Tanggal Lahir</th>
    <td>{{ $item->tempat_lahir }}, {{ date('d-m-Y', strtotime($item->tanggal_lahir)) }}</td>
  </tr>
  <tr>
    <th>Alamat</th>
    <td>{{ $item->alamat }}</td>
  </tr>
  <tr>
    <th>Jenis Kelamin</th>
    <td>{{ $item->jenis_kelamin }}</td>
  </tr>
  <tr>
    <th>Agama</th>
    <td>{{ $item->agama }}</td>
  </tr>
  <tr>
    <th>Fakultas</th>
    <td>{{ $item->fakultas->fakultas }}</td>
  </tr>
  <tr>
    <th>Telpon</th>
    <td>{{ $item->telp }}</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>{{ $item->email }}</td>
  </tr>
</table>