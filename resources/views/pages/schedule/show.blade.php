@extends('layouts.layout')

@section('content')    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <a href="{{ route('schedule.index') }}" class="btn btn-success pull-left">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Jadwal Kuliah {{$item->prodi}}</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                      <p>Program Studi: {{$item->prodi}}</p>
                      <p>Jenjang: {{$item->jenjang}}</p>
                      <p>Fakultas: {{$item->fakultas->fakultas}}</p>
                      <p>Tahun Akademik: {{$ta->tahun_akademik}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-8">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            </div>
            <div class="col-4">
            <a type="submit" href="{{ url('schedule/'. $item->id . '/create') }}" class="btn btn-primary pull-right">Tambah</a>
            <div class="clearfix"></div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Data Matakuliah</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
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
                      </thead>
                      <tbody>
                      @forelse ($items as $index => $item)
                        <tr>
                          <td>
                          {{ $index+1 }}
                          </td>
                          <td>
                          {{ $item->matkul->smt }} ({{$item->matkul->semester}})
                          </td>
                          <td>
                          {{ $item->matkul->kode }}
                          </td>
                          <td>
                          {{ $item->matkul->matkul }}
                          </td>
                          <td>
                          {{ $item->matkul->sks }}
                          </td>
                          <td>
                          {{ $item->dosen->nama }}
                          </td>
                          <td>
                          {{ $item->kelas->nama }}
                          </td>
                          <td>
                          {{ $item->hari }}
                          </td>
                          <td>
                          {{ $item->waktu }}
                          </td>
                          <td>
                          {{ $item->ruangan->ruangan }}
                          </td>
                          <td>
                            <a href="{{ route('schedule.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form action="{{ route('schedule.destroy', $item->id) }}" 
                                    method="post" 
                                    class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                                </button>
                            </form>
                          </td>
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
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection