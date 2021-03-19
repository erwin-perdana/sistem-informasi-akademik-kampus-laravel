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
                  <h4 class="card-title">Edit Program Studi</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('prodi.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Fakultas</label>
                          <select class="form-control @error('id_fakultas') is-invalid @enderror" id="exampleFormControlSelect1" name="id_fakultas">
                            @foreach ($fakultas as $itemF)
                              @if ($item->id_fakultas == $itemF->id)
                                <option value="{{ $itemF->id }}" selected>{{ $itemF->fakultas }}</option>
                              @else
                                <option value="{{ $itemF->id }}">{{ $itemF->fakultas }}</option>
                              @endif
                            @endforeach
                          </select>
                          @error('id_fakultas') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Program Studi</label>
                          <input type="text" class="form-control" name="kode_prodi" value="{{ old('kode_prodi') ? old('kode_prodi') : $item->kode_prodi }}" 
                            class="form-control @error('kode_prodi') is-invalid @enderror">
                            @error('kode_prodi') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Program Studi</label>
                          <input type="text" class="form-control" name="prodi" value="{{ old('prodi') ? old('prodi') : $item->prodi }}" 
                            class="form-control @error('prodi') is-invalid @enderror">
                            @error('prodi') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Jenjang</label>
                          <select class="form-control @error('jenjang') is-invalid @enderror" id="exampleFormControlSelect1" name="jenjang">
                            <option value="{{ $item->jenjang }}">{{ $item->jenjang }}</option>
                            <option>D3</option>
                            <option>S1</option>
                            <option>S2</option>
                            <option>S3</option>
                          </select>
                          @error('jenjang') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">Ketua Program Studi</label>
                          <select class="form-control @error('ka_prodi') is-invalid @enderror" id="exampleFormControlSelect1" name="ka_prodi">
                            <option value="{{ $item->ka_prodi }}">{{ $item->dosen['nama'] }}</option>
                            @foreach ($dosens as $itemD)
                              <option value="{{ $itemD->id }}">{{ $itemD->nama }}</option>
                            @endforeach
                          </select>
                          @error('ka_prodi') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Edit</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection