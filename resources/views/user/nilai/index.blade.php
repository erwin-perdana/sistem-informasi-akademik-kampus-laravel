@extends('user.layouts.layout')

@section('content')
<div id="absen">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h4 class="text-success text-center">Kartu Hasil Studi</h4>
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
      <a type="submit" href="{{ route('nilai.print', $mahasiswa->id) }}" target="_blank" class="btn btn-success mt-3 mb-3">Cetak KHS <i class="fas fa-print"></i></a>
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
</div>
@endsection