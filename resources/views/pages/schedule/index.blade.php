@extends('layouts.layout')

@section('content')    
    <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Jadwal Kuliah Tahun Akademik: {{$ta->tahun_akademik}} /{{$ta->semester}}</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          No
                        </th>
                        <th>
                          Fakultas
                        </th>
                        <th>
                          Kode Program Studi
                        </th>
                        <th>
                          Program Studi
                        </th>
                        <th>
                         Jenjang
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
                          {{ $item->fakultas['fakultas'] }}
                          </td>
                          <td>
                          {{ $item->kode_prodi }}
                          </td>
                          <td>
                          {{ $item->prodi }}
                          </td>
                          <td>
                          {{ $item->jenjang }}
                          </td>
                          <td>
                            <a href="{{ route('schedule.show', $item->id) }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i>
                            </a>
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