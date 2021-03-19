@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <a href="{{ route('matkul.index') }}" class="btn btn-success pull-left">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Matakuliah</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('matkul.update', $item->id) }}" method="POST">
                  @method('PUT')
                  @csrf
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Matakuliah</label>
                          <input type="text" class="form-control" name="kode" value="{{ old('kode') ? old('kode') : $item->kode  }}" 
                            class="form-control @error('kode') is-invalid @enderror">
                            @error('kode') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Matakuliah</label>
                          <input type="text" class="form-control" name="matkul" value="{{ old('matkul') ? old('matkul') : $item->matkul }}" 
                            class="form-control @error('matkul') is-invalid @enderror">
                            @error('matkul') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">SKS</label>
                          <input type="text" class="form-control" name="sks" value="{{ old('sks') ? old('sks') : $item->sks }}" 
                            class="form-control @error('sks') is-invalid @enderror">
                            @error('sks') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori</label>
                            <select class="form-control @error('kategori') is-invalid @enderror" id="exampleFormControlSelect1" name="kategori">
                            <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
                              <option>Wajib</option>
                              <option>Pilihan</option>
                            </select>
                            @error('kategori') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Semester</label>
                            <select class="form-control @error('smt') is-invalid @enderror" id="exampleFormControlSelect1" name="smt">
                            @if ($item->smt === 1)
                              <option selected>1</option>
                            @else
                              <option>1</option>
                            @endif
                            @if ($item->smt === 2)
                              <option selected>2</option>
                            @else
                              <option>2</option>
                            @endif
                            @if ($item->smt === 3)
                              <option selected>3</option>
                            @else
                              <option>3</option>
                            @endif
                            @if ($item->smt === 4)
                              <option selected>4</option>
                            @else
                              <option>4</option>
                            @endif
                            @if ($item->smt === 5)
                              <option selected>5</option>
                            @else
                              <option>5</option>
                            @endif
                            @if ($item->smt === 6)
                              <option selected>6</option>
                            @else
                              <option>6</option>
                            @endif
                            @if ($item->smt === 7)
                              <option selected>7</option>
                            @else
                              <option>7</option>
                            @endif
                            @if ($item->smt === 8)
                              <option selected>8</option>
                            @else
                              <option>8</option>
                            @endif
                            </select>
                            @error('smt') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
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