@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <a href="{{ url('schedule/'. $id) }}" class="btn btn-success pull-left">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Jadwal Kuliah</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('schedule.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <input type="hidden" name="id_prodi" value="{{$item->id_prodi}}">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Matakuliah</label>
                          <select class="form-control @error('id_matkul') is-invalid @enderror" id="exampleFormControlSelect1" name="id_matkul">
                            @foreach ($matkuls as $itemM)
                              @if ($item->id_matkul == $itemM->id)
                                <option value="{{ $itemM->id }}" selected>{{ $itemM->smt }} | {{ $itemM->matkul }} | {{ $itemM->sks }} SKS</option>
                              @else
                                <option value="{{ $itemM->id }}">{{ $itemM->smt }} | {{ $itemM->matkul }} | {{ $itemM->sks }} SKS</option>
                              @endif
                            @endforeach
                          </select>
                          @error('id_matkul') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Dosen</label>
                          <select class="form-control @error('id_dosen') is-invalid @enderror" id="exampleFormControlSelect1" name="id_dosen">
                            @foreach ($dosens as $itemD)
                              @if ($item->id_dosen == $itemD->id)
                                <option value="{{ $itemD->id }}" selected>{{ $itemD->nama }}</option>
                              @else
                                <option value="{{ $itemD->id }}">{{ $itemD->nama }}</option>
                              @endif
                            @endforeach
                          </select>
                          @error('id_dosen') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Kelas</label>
                          <select class="form-control @error('id_kelas') is-invalid @enderror" id="exampleFormControlSelect1" name="id_kelas">
                            @foreach ($kelas as $itemK)
                              @if ($item->id_kelas == $itemK->id)
                                <option value="{{ $itemK->id }}" selected>{{ $itemK->nama }}</option>
                              @else
                                <option value="{{ $itemK->id }}">{{ $itemK->nama }}</option>
                              @endif
                            @endforeach
                          </select>
                          @error('id_kelas') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Hari</label>
                          <select class="form-control @error('hari') is-invalid @enderror" id="exampleFormControlSelect1" name="hari">
                            @if ($item->hari === 'Senin')
                              <option selected>Senin</option>
                            @else
                              <option>Senin</option>
                            @endif
                            @if ($item->hari === 'Selasa')
                              <option selected>Selasa</option>
                            @else
                              <option>Selasa</option>
                            @endif
                            @if ($item->hari === 'Rabu')
                              <option selected>Rabu</option>
                            @else
                              <option>Rabu</option>
                            @endif
                            @if ($item->hari === 'Kamis')
                              <option selected>Kamis</option>
                            @else
                              <option>Kamis</option>
                            @endif
                            @if ($item->hari === "Jum'at")
                              <option selected>Jum'at</option>
                            @else
                              <option>Jum'at</option>
                            @endif
                            @if ($item->hari === 'Sabtu')
                              <option selected>Sabtu</option>
                            @else
                              <option>Sabtu</option>
                            @endif
                          </select>
                          @error('hari') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Waktu</label>
                          <input type="text" class="form-control" name="waktu" value="{{ old('waktu') ? old('waktu') : $item->waktu }}" 
                            class="form-control @error('waktu') is-invalid @enderror">
                            @error('waktu') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Ruangan</label>
                          <select class="form-control @error('id_ruangan') is-invalid @enderror" id="exampleFormControlSelect1" name="id_ruangan">
                            @foreach ($ruangans as $itemR)
                              @if ($item->id_ruangan == $itemR->id)
                                <option value="{{ $itemR->id }}" selected>{{ $itemR->ruangan }}</option>
                              @else
                                <option value="{{ $itemR->id }}">{{ $itemR->ruangan }}</option>
                              @endif
                            @endforeach
                          </select>
                          @error('id_ruangan') <div class="text-muted">{{ $message }}</div> @enderror
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