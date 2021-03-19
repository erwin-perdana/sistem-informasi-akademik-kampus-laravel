@extends('user.layouts.layout2')

@section('content')
<div id="absen">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <a href="{{ route('nilai.list') }}" class="btn btn-primary pull-left mb-3">
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
        <a type="submit" href="{{ route('nilai.cetakDosen', $id) }}" target="_blank" class="btn btn-success mt-3 mb-3">Cetak Nilai <i class="fas fa-print"></i></a>
        <a href="{{ route('nilai.edit' , $id) }}" class="btn btn-success mt-3 mb-3">Isi Nilai</a>
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
@endsection