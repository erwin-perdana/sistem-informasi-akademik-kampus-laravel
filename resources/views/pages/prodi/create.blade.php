@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <a href="{{ route('prodi.index') }}" class="btn btn-success pull-left">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Tambah Program Studi</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('prodi.store') }}" method="POST">
                  @csrf
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Fakultas</label>
                            <select class="form-control @error('id_fakultas') is-invalid @enderror" id="exampleFormControlSelect1" name="id_fakultas">
                              <option>-- Pilih Fakultas --</option>
                              @foreach ($fakultas as $item)
                                <option value="{{ $item->id }}">{{ $item->fakultas }}</option>
                              @endforeach
                            </select>
                            @error('id_fakultas') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Program Studi</label>
                          <input type="text" class="form-control" name="kode_prodi" value="{{ old('kode_prodi') }}" 
                            class="form-control @error('kode_prodi') is-invalid @enderror">
                            @error('kode_prodi') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Program Studi</label>
                          <input type="text" class="form-control" name="prodi" value="{{ old('prodi') }}" 
                            class="form-control @error('prodi') is-invalid @enderror">
                            @error('prodi') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenjang</label>
                            <select class="form-control @error('jenjang') is-invalid @enderror" id="exampleFormControlSelect1" name="jenjang">
                              <option>-- Pilih Jenjang --</option>
                              <option>D3</option>
                              <option>S1</option>
                              <option>S2</option>
                              <option>S3</option>
                            </select>
                            @error('jenjang') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Ketua Program Studi</label>
                            <select class="form-control @error('ka_prodi') is-invalid @enderror" id="exampleFormControlSelect1" name="ka_prodi">
                              <option>-- Pilih Ketua Prodi --</option>
                              @foreach ($dosens as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                              @endforeach
                            </select>
                            @error('ka_prodi') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Tambah</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection