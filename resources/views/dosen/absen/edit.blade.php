@extends('user.layouts.layout2')

@section('content')
<div id="absen">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h4 class="text-success">Absensi Tahun Akademik: </h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table>
          <tr>
            <th>Matakuliah</th>
            <td>:</td>
            <td>{{$schedule->matkul->matkul}}</td>
          </tr>
          <tr>
            <th>Kelas</th>
            <td>:</td>
            <td>{{$schedule->kelas->nama}}</td>
          </tr>
          <tr>
            <th>Program Studi</th>
            <td>:</td>
            <td>{{$schedule->matkul->prodi->prodi}}</td>
          </tr>
          <tr>
            <th>Dosen</th>
            <td>:</td>
            <td>{{$schedule->dosen->nama}}</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12">
        <table class="tg table">
          <thead>
            <tr>
              <th class="tg-6h95" rowspan="2">No</th>
              <th class="tg-6h95" rowspan="2">Nim</th>
              <th class="tg-6h95" rowspan="2">Nama</th>
              <th class="tg-k7qf" colspan="18">Pertemuan</th>
            </tr>
            <tr>
              <td class="tg-k7qf">1</td>
              <td class="tg-k7qf">2</td>
              <td class="tg-k7qf">3</td>
              <td class="tg-k7qf">4</td>
              <td class="tg-k7qf">5</td>
              <td class="tg-k7qf">6</td>
              <td class="tg-k7qf">7</td>
              <td class="tg-k7qf">8</td>
              <td class="tg-k7qf">9</td>
              <td class="tg-k7qf">10<br></td>
              <td class="tg-k7qf">11</td>
              <td class="tg-k7qf">12</td>
              <td class="tg-k7qf">13</td>
              <td class="tg-k7qf">14</td>
              <td class="tg-k7qf">15</td>
              <td class="tg-k7qf">16</td>
              <td class="tg-k7qf">17</td>
              <td class="tg-k7qf">18</td>
            </tr>
          </thead>
          <tbody>
          <form method="post" action="{{ route('absen.update' , $id) }}">
          @method('PUT')
          @csrf
          @forelse ($items as $index => $item)
            <tr>
              <td class="tg-3xi5"><input type="hidden" value="{{ $item->id_mahasiswa }}" name="idMhs[]">{{ $index+1 }}</td>
              <td class="tg-3xi5">{{ $item->mahasiswas->nim }}</td>
              <td class="tg-3xi5">{{ $item->mahasiswas->nama }}</td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p1[]">
                  @if ( $item->p1 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p1 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p1 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p2[]">
                  @if ( $item->p2 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p2 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p2 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p3[]">
                  @if ( $item->p3 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p3 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p3 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p4[]">
                  @if ( $item->p4 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p4 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p4 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p5[]">
                  @if ( $item->p5 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p5 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p5 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p6[]">
                  @if ( $item->p6 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p6 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p6 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p7[]">
                  @if ( $item->p7 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p7 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p7 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p8[]">
                  @if ( $item->p8 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p8 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p8 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p9[]">
                  @if ( $item->p9 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p9 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p9 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p10[]">
                  @if ( $item->p10 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p10 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p10 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p11[]">
                  @if ( $item->p11 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p11 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p11 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p12[]">
                  @if ( $item->p12 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p12 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p12 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p13[]">
                  @if ( $item->p13 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p13 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p13 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p14[]">
                  @if ( $item->p14 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p14 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p14 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p15[]">
                  @if ( $item->p15 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p15 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p15 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p16[]">
                  @if ( $item->p16 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p16 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p16 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p17[]">
                  @if ( $item->p17 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p17 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p17 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
              <td class="tg-3xi5">
                <select id="exampleFormControlSelect1" name="p18[]">
                  @if ( $item->p18 === 0)
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p18 === 1)
                    <option>1</option>
                    <option>0</option>
                    <option>2</option>   
                  @endif
                  @if ( $item->p18 === 2)
                    <option>2</option>
                    <option>0</option>
                    <option>1</option>   
                  @endif
                </select>
              </td>
            </tr>
            @empty
            <tr>
              <td>
                Mahasiswa Belum Mengambil KRS
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
        <div class="d-flex">
          <button type="submit" class="btn btn-success ml-auto">Simpan Absen</button>
        </div>
        </form>
      </div>
  </div>
</div>
@endsection