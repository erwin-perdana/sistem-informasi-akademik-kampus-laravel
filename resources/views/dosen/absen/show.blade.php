@extends('user.layouts.layout2')

@section('content')
<div id="absen">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <a href="{{ route('absen.list') }}" class="btn btn-primary pull-left mb-3">
          <i class="fa fa-arrow-left"></i>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <h4 class="text-success">Absensi Tahun Akademik: {{$ta->tahun_akademik}}/{{$ta->semester}}</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table>
          <tr>
            <th>Matakuliah</th>
            <td>:</td>
            <td>{{$schedule->matkul->matkul}}</td>
          </tr>
          <tr>
            <th>Kelas</th>
            <td>:</td>
            <td>{{$schedule->kelas->nama}}</td>
          </tr>
          <tr>
            <th>Program Studi</th>
            <td>:</td>
            <td>{{$schedule->matkul->prodi->prodi}}</td>
          </tr>
          <tr>
            <th>Dosen</th>
            <td>:</td>
            <td>{{$schedule->dosen->nama}}</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a type="submit" href="{{ route('absen.cetak', $id) }}" target="_blank" class="btn btn-success mt-3 mb-3">Cetak Absen <i class="fas fa-print"></i></a>
        <a href="{{ route('absen.edit' , $id) }}" class="btn btn-success mt-3 mb-3">Isi Absen</a>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <table class="tg table">
          <thead>
            <tr>
              <th class="tg-6h95" rowspan="2">No</th>
              <th class="tg-6h95" rowspan="2">Nim</th>
              <th class="tg-6h95" rowspan="2">Nama</th>
              <th class="tg-k7qf" colspan="18">Pertemuan</th>
              <th class="tg-6h95" rowspan="2">%</th>
            </tr>
            <tr>
              <td class="tg-k7qf">1</td>
              <td class="tg-k7qf">2</td>
              <td class="tg-k7qf">3</td>
              <td class="tg-k7qf">4</td>
              <td class="tg-k7qf">5</td>
              <td class="tg-k7qf">6</td>
              <td class="tg-k7qf">7</td>
              <td class="tg-k7qf">8</td>
              <td class="tg-k7qf">9</td>
              <td class="tg-k7qf">10<br></td>
              <td class="tg-k7qf">11</td>
              <td class="tg-k7qf">12</td>
              <td class="tg-k7qf">13</td>
              <td class="tg-k7qf">14</td>
              <td class="tg-k7qf">15</td>
              <td class="tg-k7qf">16</td>
              <td class="tg-k7qf">17</td>
              <td class="tg-k7qf">18</td>
            </tr>
          </thead>
          <tbody>
          @forelse ($items as $index => $item)
            <tr>
              <td class="tg-3xi5">{{ $index+1 }}</td>
              <td class="tg-3xi5">{{ $item->mahasiswas->nim }}</td>
              <td class="tg-3xi5">{{ $item->mahasiswas->nama }}</td>
              <td class="tg-3xi5">{{ $item->p1 }}</td>
              <td class="tg-3xi5">{{ $item->p2 }}</td>
              <td class="tg-3xi5">{{ $item->p3 }}</td>
              <td class="tg-3xi5">{{ $item->p4 }}</td>
              <td class="tg-3xi5">{{ $item->p5 }}</td>
              <td class="tg-3xi5">{{ $item->p6 }}</td>
              <td class="tg-3xi5">{{ $item->p7 }}</td>
              <td class="tg-3xi5">{{ $item->p8 }}</td>
              <td class="tg-3xi5">{{ $item->p9 }}</td>
              <td class="tg-3xi5">{{ $item->p10 }}</td>
              <td class="tg-3xi5">{{ $item->p11 }}</td>
              <td class="tg-3xi5">{{ $item->p12 }}</td>
              <td class="tg-3xi5">{{ $item->p13 }}</td>
              <td class="tg-3xi5">{{ $item->p14 }}</td>
              <td class="tg-3xi5">{{ $item->p15 }}</td>
              <td class="tg-3xi5">{{ $item->p16 }}</td>
              <td class="tg-3xi5">{{ $item->p17 }}</td>
              <td class="tg-3xi5">{{ $item->p18 }}</td>
              <td class="tg-3xi5">{{number_format((($item->p1 + $item->p2 + $item->p3 + $item->p4 + $item->p5 + $item->p6 + $item->p7 + $item->p8 + $item->p9 + $item->p10 + $item->p11 + $item->p12 + $item->p13 + $item->p14 + $item->p15 + $item->p16 + $item->p17 + $item->p18) / 36) * 100 , 2)}}%</td>
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
@endsection