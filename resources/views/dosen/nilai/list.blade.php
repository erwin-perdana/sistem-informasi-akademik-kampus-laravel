@extends('user.layouts.layout2')

@section('content')
<!-- profile -->
<div id="profile">
    <div class="container">
        <div class="row">
        @forelse ($data as $index => $item)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                    <h5 class="card-title">{{$item->matkul->matkul}}</h5>
                    <table>
                        <tr>
                            <th>Kelas</th>
                            <td>:</td>
                            <td>{{$item->kelas->nama}}</td>
                        </tr>
                        <tr>
                            <th>Waktu</th>
                            <td>:</td>
                            <td>{{$item->hari}}, {{$item->waktu}}</td>
                        </tr>
                        <tr>
                            <th>Ruangan</th>
                            <td>:</td>
                            <td>{{$item->ruangan->ruangan}}</td>
                        </tr>
                        <tr>
                            <th>Program Studi</th>
                            <td>:</td>
                            <td>{{$item->matkul->prodi->prodi}}</td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('nilai.show' , $item->id) }}" class="btn btn-primary mt-2">Isi Nilai</a></td>
                        </tr>
                    </table>
                    
                    </div>
                </div>
            </div>
        @empty
        <p>Jadwal Kosong</p>
        @endforelse
        </div>
    </div>
  </div>
  <!-- end profile -->
@endsection