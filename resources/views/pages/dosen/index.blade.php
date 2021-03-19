@extends('layouts.layout')

@section('content')    
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            </div>
            <div class="col-4">
            <a type="submit" href="{{ route('dosen.create') }}" class="btn btn-primary pull-right">Tambah</a>
            <div class="clearfix"></div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Data Dosen</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Nidn
                        </th>
                        <th>
                          Nama
                        </th>
                        <th>
                          Fakultas
                        </th>
                        <th>
                          No Telpon
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                      @forelse ($items as $item)
                        <tr>
                          <td>
                          {{ $item->id }}
                          </td>
                          <td>
                          {{ $item->nidn }}
                          </td>
                          <td>
                          {{ $item->nama }}
                          </td>
                          <td>
                          {{ $item->fakultas->fakultas }}
                          </td>
                          <td>
                          {{ $item->telp }}
                          </td>
                          <td>
                            <a href="#mymodal"
                              data-remote="{{ route('dosen.show', $item->id) }}"
                              data-toggle="modal"
                              data-target="#mymodal"
                              data-title=""
                              class="btn btn-info btn-sm">
                              <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('dosen.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form action="{{ route('dosen.destroy', $item->id) }}" 
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