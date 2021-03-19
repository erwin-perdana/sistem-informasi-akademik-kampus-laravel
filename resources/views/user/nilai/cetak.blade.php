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
        <div class="col-md-12 text-center align-self-center">
            <h4>Universitas Perdana Sumatera Utara</h4>
            <small>Jl. Di. Panjaitan No.10 Kota Tanjungbalai, Telp: 0623-41079, Fax: 0623-42366</small>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <h4 class="text-center">Kartu Hasil Studi</h4>
        <h4>Tahun Akademik: {{$ta->tahun_akademik}}/{{$ta->semester}}</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <table>
          <tr>
            <td>Nim</td>
            <td>:</td>
            <td>{{$mahasiswa->nim}}</td>
          </tr>
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{$mahasiswa->nama}}</td>
          </tr>
          <tr>
            <td>Kelas</td>
            <td>:</td>
            <td>{{$mahasiswa->kelas->nama}}</td>
          </tr>
        </table>
      </div>
      <div class="col-md-6">
        <table>
          <tr>
            <td>Program Studi</td>
            <td>:</td>
            <td>{{$mahasiswa->prodis->prodi}}</td>
          </tr>
          <tr>
            <td>Dosen PA</td>
            <td>:</td>
            <td>{{$mahasiswa->kelas->dosen->nama}}</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <table class="tg table">
          <thead>
            <tr>
              <th class="tg-6h95" rowspan="2">No</th>
              <th class="tg-6h95" rowspan="2">Kode</th>
              <th class="tg-6h95" rowspan="2">Mata Kuliah</th>
              <th class="tg-6h95" rowspan="2">SKS</th>
              <th class="tg-k7qf" colspan="18">Nilai</th>
            </tr>
            <tr>
              <td class="tg-k7qf">Nilai Akhir</td>
              <td class="tg-k7qf">Huruf</td>
              <td class="tg-k7qf">Bobot</td>
              <td class="tg-k7qf">SKS x Bobot</td>
            </tr>
          </thead>
          <tbody>
          @forelse ($nilais as $index => $nilai)
            <tr>
              <td class="tg-3xi5">{{ $index+1 }}</td>
              <td class="tg-3xi5">{{ $nilai->schedule->matkul->kode }}</td>
              <td class="tg-3xi5">{{ $nilai->schedule->matkul->matkul }}</td>
              <td class="tg-3xi5">{{ $nilai->schedule->matkul->sks }}</td>
              <td class="tg-3xi5">{{ $nilai->nilai_akhir }}</td>
              <td class="tg-3xi5">{{ $nilai->nilai_huruf }}</td>
              <td class="tg-3xi5">
                @if($nilai->nilai_huruf == "A")
                  {{4}}
                @elseif($nilai->nilai_huruf == "B")
                  {{3}}
                @elseif($nilai->nilai_huruf == "C")
                  {{2}}
                @elseif($nilai->nilai_huruf == "D")
                  {{1}}
                @else
                  {{0}}
                @endif
              </td>
              <td class="tg-3xi5">
                @if($nilai->nilai_huruf == "A")
                  {{4 * $nilai->schedule->matkul->sks}}
                @elseif($nilai->nilai_huruf == "B")
                  {{3 * $nilai->schedule->matkul->sks}}
                @elseif($nilai->nilai_huruf == "C")
                  {{2 * $nilai->schedule->matkul->sks}}
                @elseif($nilai->nilai_huruf == "D")
                  {{1 * $nilai->schedule->matkul->sks}}
                @else
                  {{0}}
                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td>
                Jadwal Kosong
              </td>
            </tr>
            @endforelse
            <tr>
              <td class="tg-3xi5"><b>Total</b></td>
              <td class="tg-3xi5"></td>
              <td class="tg-3xi5"></td>
              <td class="tg-3xi5"><b>{{$totalSks}}</b></td>
              <td class="tg-3xi5"></td>
              <td class="tg-3xi5"></td>
              <td class="tg-3xi5"></td>
              <td class="tg-3xi5"><b>{{$totalBobot}}</b></td>
            </tr>
          </tbody>
        </table>
        <table class="font-weight-bold">
          <tr>
            <td>Indeks Prestasi Semester</td>
            <td>:</td>
            <td>{{ number_format(($totalBobot/$totalSks) * 4 , 2)}}</td>
          </tr>
        </table>
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
          <td>Ketua Prgoram Studi</td>
        </tr>
        <tr>
          <td><br></td>
        </tr>
        <tr>
          <td><br></td>
        </tr>
        <tr>
          <td><u><b>{{$mahasiswa->prodis->dosen->nama}}</b></u></td>
        </tr>
        <tr>
          <td><b>NIDN. {{$mahasiswa->prodis->dosen->nidn}}</b></td>
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