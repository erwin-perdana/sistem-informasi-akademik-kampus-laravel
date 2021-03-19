<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets-real/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-real/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-real/css/fontawesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-real/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-real/css/responsive.css') }}" rel="stylesheet" />
    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Nunito&family=Oswald:wght@400;600;700&display=swap" rel="stylesheet"> 
    <title>Kartu Rencana Studi</title>
    <style>
        body{
            background-color : #fff;
        }
        #headerKrs hr{
            border: 1px solid black;
            width
        }
        .krs {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
        }
        .krs, .krs th, .krs td {
            border: 1px solid #999;
            padding: 3px 15px;
        }
        .jabatan{
            margin-top:-20px;
            font-size:12px;
        }
        .col-md-2.photo{
            margin-right: -25px;
            margin-left: 35px;
        }
    </style>
  </head>
    <body>
        <div id="headerKrs">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 offset-md-1">
                        <img src="{{ asset('assets-real/img/logo.png') }}" alt="" width="150" height="150">
                    </div>
                    <div class="col-md-8 text-center align-self-center">
                        <h4>Universitas Perdana Sumatera Utara</h4>
                        <small>Jl. Di. Panjaitan No.10 Kota Tanjungbalai, Telp: 0623-41079, Fax: 0623-42366</small>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <hr>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
            </div>
        </div>

        <div id="isiKrs">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="mt-3 mb-5"><u>Kartu Rencana Studi </u></h4>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-10 offset-md-1">
                        <table>
                            <tr>
                                <td>Tahun Akademik</td>
                                <td>:</td>
                                <td>{{$ta->tahun_akademik}}</td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td>:</td>
                                <td>{{$mahasiswa->nim}}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{$mahasiswa->nama}}</td>
                            </tr>
                            <tr>
                                <td>Program Studi</td>
                                <td>:</td>
                                <td>{{$mahasiswa->prodis->prodi}}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td>{{$mahasiswa->kelas->nama}}</td>
                            </tr>
                            <tr>
                                <td>Dosen PA</td>
                                <td>:</td>
                                <td>{{$mahasiswa->kelas->dosen->nama}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <table border="1" class="krs">
                            <thead>
                                <th>
                                No
                                </th>
                                <th>
                                Smt
                                </th>
                                <th>
                                Matakuliah
                                </th>
                                <th>
                                SKS
                                </th>
                                <th>
                                Dosen
                                </th>
                                <th>
                                Kelas
                                </th>
                                <th>
                                Hari
                                </th>
                                <th>
                                Waktu
                                </th>
                            </thead>
                            <tbody>
                            @forelse ($items as $index => $item)
                                <tr>
                                    <td>
                                    {{ $index+1 }}
                                    </td>
                                    <td>
                                    {{ $item->schedule['matkul']['smt'] }}
                                    </td>
                                    <td>
                                    {{ $item->schedule['matkul']['matkul'] }}
                                    </td>
                                    <td>
                                    {{ $item->schedule['matkul']['sks'] }}
                                    </td>
                                    <td>
                                    {{ $item->schedule['dosen']['nama'] }}
                                    </td>
                                    <td>
                                    {{ $item->schedule['kelas']['nama'] }}
                                    </td>
                                    <td>
                                    {{ $item->schedule['hari'] }}
                                    </td>
                                    <td>
                                    {{ $item->schedule['waktu'] }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        Matakuliah tidak ada
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 offset-md-1">
                        <table border="0">
                            <tbody>
                                <tr>
                                <td>Total SKS yang diambil</td>
                                <td>:</td>
                                <td>{{ $totalSks }}</td>
                                </tr>
                                <tr>
                                <td>Maximal SKS yang diambil</td>
                                <td>:</td>
                                <td>{{ $maxSks }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3 offset-md-1 text-center">
                        <p>Mengetahui,</p>
                        <br><br>
                        <p class="font-weight-bold"><u>{{$mahasiswa->prodis->dosen->nama}}</u></p>
                        <p class="jabatan">Ka. Prodi {{$mahasiswa->prodis->prodi}}</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <p>Menyetujui,</p>
                        <br><br>
                        <p class="font-weight-bold"><u>{{$mahasiswa->kelas->dosen->nama}}</u></p>
                        <p class="jabatan">Pembimbing Akademik</p>
                    </div>
                    <div class="col-md-2 photo">
                    <img src="/image/mahasiswa/{{ $mahasiswa->photo }}" class="img-thumbnail" alt="...">
                    </div>
                    <div class="col-md-2 text-center">
                        <p>Tanjungbalai, </p>
                        <br><br>
                        <p class="font-weight-bold"><u>{{$mahasiswa->nama}}</u></p>
                        <p class="jabatan">Mahasiswa</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-10 offset-md-1">
                        <p>Catatan :</p>
                        <ul>
                            <li>1 Lembar untuk Mahasiswa</li>
                            <li>1 Lembar untuk Akademik</li>
                            <li>Simpan KRS ini sebaik mungkin di tempat yang aman</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="{{ asset('assets-real/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets-real/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets-real/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets-real/js/script.js') }}"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> -->
    <script src="js/script.js"></script>
    <script>
      window.print()
    </script>
  </body>
</html>