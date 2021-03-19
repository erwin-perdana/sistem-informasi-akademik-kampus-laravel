@extends('user.layouts.layout')

@section('content')    
    <div class="container mt-4">
          <div class="row">
            <div class="col-12">
              <a href="{{ route('krs.index') }}" class="btn btn-primary pull-left mb-3">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Matakuliah</h4>
                </div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          No
                        </th>
                        <th>
                          Semester
                        </th>
                        <th>
                          Kode Matakuliah
                        </th>
                        <th>
                          Matakuliah
                        </th>
                        <th>
                          SKS
                        </th>
                        <th>
                          Dosen
                        </th>
                        <th>
                          Kelas
                        </th>
                        <th>
                          Hari
                        </th>
                        <th>
                          Waktu
                        </th>
                        <th>
                          Ruangan
                        </th>
                        <th>
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    <form method="post" action="{{ route('krs.store') }}">
                    @csrf
                    <input type="hidden" name="idMahasiswa" value="{{$idMahasiswa}}">
                    <input type="hidden" name="idTa" value="{{$idTa}}">
                    <input type="hidden" name="totalSks" value="{{$totalSks}}">
                    <input type="hidden" name="maxSks" value="{{$maxSks}}">
                    @forelse ($data as $index => $item)
                      <tr>
                        <th>
                        {{ $index+1 }}
                        </th>
                        <th>
                        {{ $item->matkul->smt }} ({{$item->matkul->semester}})
                        </th>
                        <th>
                        {{ $item->matkul->kode }}
                        </th>
                        <th>
                        {{ $item->matkul->matkul }}
                        </th>
                        <th>
                        {{ $item->matkul->sks }}
                        </th>
                        <th>
                        {{ $item->dosen->nama }}
                        </th>
                        <th>
                        {{ $item->kelas->nama }}
                        </th>
                        <th>
                        {{ $item->hari }}
                        </th>
                        <th>
                        {{ $item->waktu }}
                        </th>
                        <th>
                        {{ $item->ruangan->ruangan }}
                        </th>
                        <th>
                          <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck{{ $item->id }}" name="matkul[]">
                        </th>
                      </tr>
                      @empty
                      <tr>
                        <td>
                          data tidak tersedia
                        </td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                  <button type="submit" class="btn btn-primary">Tambah Matakuliah</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection