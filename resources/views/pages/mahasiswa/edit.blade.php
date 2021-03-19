@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <a href="{{ route('mahasiswa.index') }}" class="btn btn-success pull-left">
                <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Mahasiswa</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('mahasiswa.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nim</label>
                          <input type="text" class="form-control" name="nim" value="{{ old('nim') ? old('nim') : $item->nim }}" 
                            class="form-control @error('nim') is-invalid @enderror">
                            @error('nim') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama</label>
                          <input type="text" class="form-control" name="nama" value="{{ old('nama') ? old('nama') : $item->nama }}" 
                            class="form-control @error('nama') is-invalid @enderror">
                            @error('nama') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" class="form-control" name="password" value="" 
                            class="form-control @error('password') is-invalid @enderror">
                            @error('password') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm Password</label>
                          <input type="password" class="form-control" name="password_confirmation" value="" 
                            class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password2') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tempat Lahir</label>
                          <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') ? old('tempat_lahir') : $item->tempat_lahir }}" 
                            class="form-control @error('tempat_lahir') is-invalid @enderror">
                            @error('tempat_lahir') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal Lahir</label>
                          <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : $item->tanggal_lahir }}" 
                            class="form-control @error('tanggal_lahir') is-invalid @enderror">
                            @error('tanggal_lahir') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" class="form-control" name="alamat" value="{{ old('alamat') ? old('alamat') : $item->alamat }}" 
                            class="form-control @error('alamat') is-invalid @enderror">
                            @error('alamat') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
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
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Agama</label>
                          <input type="text" class="form-control" name="agama" value="{{ old('agama') ? old('agama') : $item->agama }}" 
                            class="form-control @error('agama') is-invalid @enderror">
                            @error('agama') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nomor Telpon</label>
                          <input type="text" class="form-control" name="telp" value="{{ old('telp') ? old('telp') : $item->telp }}" 
                            class="form-control @error('telp') is-invalid @enderror">
                            @error('telp') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $item->email }}" 
                            class="form-control @error('email') is-invalid @enderror">
                            @error('email') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 jk">
                        <div class="form-group">
                            <label class="bmd-label-floating">Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="L" {{$item->jenis_kelamin == 'L' ? 'checked' : ''}} >
                                <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="P" {{$item->jenis_kelamin == 'P' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Photo</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo"><br>
                            <img src="/image/mahasiswa/{{ $item->photo }}" width="100" height="100" alt="No image" class="img-thumbnail gambar">
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