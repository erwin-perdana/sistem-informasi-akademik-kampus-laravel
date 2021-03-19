@extends('layouts.layout')

@section('content')    
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <a href="{{ url('kelas/'. $id) }}" class="btn btn-success pull-left">
              <i class="fa fa-arrow-left"></i>
            </a>
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
        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Data Mahasiswa</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Nim
                        </th>
                        <th>
                          Nama
                        </th>
                        <th>
                          Program Studi
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                      <form method="post" action="/storeMahasiswa">
                      @csrf
                      <input type="hidden" value="{{ $id }}" name="id">
                      <input type="hidden" value="{{ $jumlahMahasiswa }}" name="jumlahMahasiswa">
                      @forelse ($items as $item)
                        <tr>
                          <td>
                          {{ $item->nim }}
                          </td>
                          <td>
                          {{ $item->nama }}
                          </td>
                          <td>
                          {{ $item->prodis->prodi }}
                          </td>
                          <td>
                          <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck{{ $item->id }}" name="mahasiswa[]">
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
                    <button type="submit" class="btn btn-primary pull-right">Add</button>
                    <div class="clearfix"></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection