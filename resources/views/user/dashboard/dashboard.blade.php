@extends('user.layouts.layout')

@section('content')
<!-- profile -->
<div id="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-1">
                <div class="card" style="width: 18rem;">
                    <img src="/image/mahasiswa/{{ $item->photo }}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$item->nama}}</h5>
                        <p class="card-text">{{$item->nim}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card" style="width: 40rem;">
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                              <tr>
                                <td>Tahun Akademik</td>
                                <td>:</td>
                                <td>{{$ta->tahun_akademik}}/{{$ta->semester}}</td>
                              </tr>
                              <tr>
                                <td>Fakultas</td>
                                <td>:</td>
                                <td>{{$fakultas->fakultas->fakultas}}</td>
                              </tr>
                              <tr>
                                <td>Prodi</td>
                                <td>:</td>
                                <td>{{$item->prodis->prodi}}</td>
                              </tr>
                              <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                @if ($item->id_kelas === null)
                                  <td></td>
                                @else
                                  <td>{{ $item->kelas->nama }}</td>
                                @endif
                              </tr>
                              <tr>
                                <td>Dosen PA</td>
                                <td>:</td>
                                @if ($item->id_kelas === null)
                                  <td></td>
                                @else
                                  <td>{{$dosen->dosen->nama}}</td>
                                @endif
                              </tr>
                              <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{$item->alamat}}</td>
                              </tr>
                              <tr>
                                <td>Tempat dan Tanggal Lahir</td>
                                <td>:</td>
                                <td>{{$item->tempat_lahir}}, {{ date('d-m-Y', strtotime($item->tanggal_lahir)) }}</td>
                              </tr>
                              <tr>
                                <td>No HP</td>
                                <td>:</td>
                                <td>{{$item->telp}}</td>
                              </tr>
                              <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{$item->email}}</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- end profile -->
@endsection