@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <a href="{{ route('ta.index') }}" class="btn btn-success pull-left">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Gedung</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('ta.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tahun Akademik</label>
                          <input type="text" class="form-control" name="tahun_akademik" value="{{ old('tahun_akademik') ? old('tahun_akademik') : $item->tahun_akademik }}" 
                            class="form-control @error('tahun_akademik') is-invalid @enderror">
                            @error('tahun_akademik') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Semester</label>
                            <select class="form-control @error('semester') is-invalid @enderror" id="exampleFormControlSelect1" name="semester">
                              @if ($item->semester === 'Ganjil')
                              <option selected>Ganjil</option>
                              @else
                                <option>Ganjil</option>
                              @endif
                              @if ($item->semester === 'Genap')
                                <option selected>Genap</option>
                              @else
                                <option>Genap</option>
                              @endif
                            </select>
                            @error('semester') <div class="text-muted">{{ $message }}</div> @enderror
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