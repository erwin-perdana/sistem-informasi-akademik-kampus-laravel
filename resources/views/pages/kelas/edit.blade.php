@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <a href="{{ route('kelas.index') }}" class="btn btn-success pull-left">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Kelas</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('kelas.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Kelas</label>
                          <input type="text" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : $item->nama }}" 
                            class="form-control @error('nama') is-invalid @enderror">
                            @error('nama') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Program Studi</label>
                          <select class="form-control @error('id_prodi') is-invalid @enderror" id="exampleFormControlSelect1" name="id_prodi">
                            @foreach ($prodi as $itemP)
                              @if ($item->id_prodi == $itemP->id)
                                <option value="{{ $itemP->id }}" selected>{{ $itemP->prodi }}</option>
                              @else
                                <option value="{{ $itemP->id }}">{{ $itemP->prodi }}</option>
                              @endif
                            @endforeach
                          </select>
                          @error('id_prodi') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Dosen Wali</label>
                          <select class="form-control @error('id_dosen') is-invalid @enderror" id="exampleFormControlSelect1" name="id_dosen">
                            <option value="{{ $item->id_dosen }}">{{ $item->dosen['nama'] }}</option>
                            @foreach ($dosenWali as $itemD)
                              <option value="{{ $itemD->id }}">{{ $itemD->prodi }}</option>
                            @endforeach
                          </select>
                          @error('id_dosen') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tahun Angkatan</label>
                          <input type="text" class="form-control" name="angkatan" value="{{ old('angkatan') ? old('angkatan') : $item->angkatan }}" 
                            class="form-control @error('angkatan') is-invalid @enderror">
                            @error('angkatan') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
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