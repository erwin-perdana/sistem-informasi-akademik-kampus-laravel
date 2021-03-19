@extends('user.layouts.layout2')

@section('content')
<!-- profile -->
<div id="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-1">
                <div class="card" style="width: 18rem;">
                    <img src="/image/dosen/{{ $item->photo }}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$item->nama}}</h5>
                        <p class="card-text">{{$item->nidn}}</p>
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
                                <td>Tempat dan Tanggal Lahir</td>
                                <td>:</td>
                                <td>{{$item->tempat_lahir}}, {{ date('d-m-Y', strtotime($item->tanggal_lahir)) }}</td>
                              </tr>
                              <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{$item->alamat}}</td>
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