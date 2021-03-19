<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets-real/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-real/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-real/css/fontawesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-real/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-real/css/responsive.css') }}" rel="stylesheet" />
    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Nunito&family=Oswald:wght@400;600;700&display=swap" rel="stylesheet"> 
    <title>Nilai</title>
  </head>
<body>
<div id="absen">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h4 class="text-center">Nilai Mahasiswa</h4>
        <h4>Tahun Akademik: {{$ta->tahun_akademik}}/{{$ta->semester}}</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <table>
          <tr>
            <th>Program Studi</th>
            <td>:</td>
            <td>{{$schedule->matkul->prodi->prodi}}</td>
          </tr>
          <tr>
            <th>Fakultas</th>
            <td>:</td>
            <td>{{$schedule->matkul->prodi->fakultas->fakultas}}</td>
          </tr>
          <tr>
            <th>Kelas</th>
            <td>:</td>
            <td>{{$schedule->kelas->nama}}</td>
          </tr>
        </table>
      </div>
      <div class="col-md-6">
        <table>
          <tr>
            <th>Matakuliah</th>
            <td>:</td>
            <td>{{$schedule->matkul->matkul}}</td>
          </tr>
          <tr>
            <th>Waktu</th>
            <td>:</td>
            <td>{{$schedule->hari}}, {{$schedule->waktu}}</td>
          </tr>
          <tr>
            <th>Dosen</th>
            <td>:</td>
            <td>{{$schedule->dosen->nama}}</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12">
        <table class="tg table">
          <thead>
          <tr>
              <th class="tg-6h95" rowspan="2">No</th>
              <th class="tg-6h95" rowspan="2">Nim</th>
              <th class="tg-6h95" rowspan="2">Nama</th>
              <th class="tg-k7qf" colspan="18">Nilai</th>
            </tr>
            <tr>
              <td class="tg-k7qf">Absen</td>
              <td class="tg-k7qf">Tugas</td>
              <td class="tg-k7qf">UTS</td>
              <td class="tg-k7qf">UAS</td>
              <td class="tg-k7qf">Nilai Akhir</td>
              <td class="tg-k7qf">Huruf</td>
            </tr>
          </thead>
          <tbody>
          @forelse ($items as $index => $item)
            <tr>
              <td class="tg-3xi5">{{ $index+1 }}</td>
              <td class="tg-3xi5">{{ $item->mahasiswas->nim }}</td>
              <td class="tg-3xi5">{{ $item->mahasiswas->nama }}</td>
              <td class="tg-3xi5">{{ $item->nilai_absen }}</td>
              <td class="tg-3xi5">{{ $item->nilai_tugas }}</td>
              <td class="tg-3xi5">{{ $item->nilai_uts }}</td>
              <td class="tg-3xi5">{{ $item->nilai_uas }}</td>
              <td class="tg-3xi5">{{ $item->nilai_akhir }}</td>
              <td class="tg-3xi5">{{ $item->nilai_huruf }}</td>
            </tr>
            @empty
            <tr>
              <td>
                Mahasiswa Belum Mengambil KRS
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
  </div>
</div>
<div class="ttd">
  <div class="container">
    <div class="row">
      <div class="col-md-3 offset-md-9">
      <table>
        <tr>
          <td>Tanjungbalai, {{$tgl}}</td>
        </tr>
        <tr>
          <td>Dosen Pengampu</td>
        </tr>
        <tr>
          <td><br></td>
        </tr>
        <tr>
          <td><br></td>
        </tr>
        <tr>
          <td><u>{{$schedule->dosen->nama}}</u></td>
        </tr>
        <tr>
          <td>{{$schedule->dosen->nidn}}</td>
        </tr>
      </table>
      </div>
    </div>
  </div>
</div>
</body>

    <script src="{{ asset('assets-real/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets-real/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets-real/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets-real/js/script.js') }}"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> -->
    <script src="js/script.js"></script>
    <script>
      window.print()
    </script>
  </body>
</html>