<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\TahunAkademik;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Kelas;
use App\Models\Krs;
use App\Models\Matkul;
use App\Models\Absen;
use App\Models\Nilai;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // menambilkan data mahasiswa dan krs yang diambil mahasiswa --1
        // data dari session
        $data = $request->session()->get('mahasiswa');
        // relasikan dengan prodi dan kelas
        $mahasiswa = Mahasiswa::with(['prodis','kelas'])->findOrFail($data->id);
        // ambil data fakultas, dosen, dan Tahun akademik
        $fakultas = Prodi::with('fakultas')->findOrFail($data->id_prodi);
        if($mahasiswa->id_kelas == null){
            $dosen = null;
        }else{
            $dosen = Kelas::with('dosen')->findOrFail($data->id_kelas);
        }
        $ta = TahunAkademik::where('status', 1)->first();
        $items = Krs::where('id_mahasiswa', $mahasiswa->id)->where('id_ta', $ta->id)->with(['schedule'])->get();
        $totalSks = 0;
        $maxSks = 24;
        foreach($items as $item){ 
            $totalSks = $totalSks + $item->schedule->matkul->sks;
        }
        // end data mahasiswa --1

        // menyimpan data krs baru kedalam absen mahasiswa
        $absens = Absen::where('id_mahasiswa', $data->id)->where('id_ta', $ta->id)->get();
        // dd($absens);
        // jadikan array id data absen
        foreach($absens as $index => $absen){
            $idAbsens[] = $absen['id_krs'];
        }
        // jadikan array id data krs
        foreach($items as $index => $item){
            $iditem[] = $item['id'];
        }
        // cek jika ada tambahan data dari krs
        if(count($items) == count($absens)){

        }else{ //jika ada
            if(count($absens) == 0){ //jika data absen sebelumnya masih kosong
                foreach($items as $index => $item){
                    Absen::create([
                        'id_krs' => $item->id,
                        'id_mahasiswa' => $item->id_mahasiswa,
                        'id_schedule' => $item->id_schedule,
                        'id_ta' => $item->id_ta
                    ]);

                    Nilai::create([
                        'id_krs' => $item->id,
                        'id_mahasiswa' => $item->id_mahasiswa,
                        'id_schedule' => $item->id_schedule,
                        'id_ta' => $item->id_ta
                    ]);
                }
            }else{ //jika data absen sebelumnya sudah ada
                // bandingkan id item dan absen
                $results = array_diff($iditem,$idAbsens);
                // masukkan hasil perbandingan id kedalam array
                foreach($results as $result){
                    $idKrs[] = $result;
                }
                // tambahkan id krs yang sudah dibandingkan kedalam tabel absen
                foreach($idKrs as $index => $id){
                    $data = Krs::where('id', $id)->get();
    
                    Absen::create([
                        'id_krs' => $data[0]->id,
                        'id_mahasiswa' => $data[0]->id_mahasiswa,
                        'id_schedule' => $data[0]->id_schedule,
                        'id_ta' => $data[0]->id_ta,
                    ]);

                    Nilai::create([
                        'id_krs' => $data[0]->id,
                        'id_mahasiswa' => $data[0]->id_mahasiswa,
                        'id_schedule' => $data[0]->id_schedule,
                        'id_ta' => $data[0]->id_ta,
                    ]);
                }
            }
        }
        return view('user.krs.index')->with([
            'mahasiswa' => $mahasiswa,
            'fakultas' => $fakultas,
            'dosen' => $dosen,
            'ta' => $ta,
            'items' => $items,
            'totalSks' => $totalSks,
            'maxSks' => $maxSks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // ambil session mahasiswa
        $mahasiswa = $request->session()->get('mahasiswa');
        // ambil tahun akademik aktif
        $ta = TahunAkademik::where('status', 1)->first();
        // ambil schedule yang sudah dimasukkan ke krs
        $krsMahasiswas = Krs::where('id_mahasiswa', $mahasiswa->id)->where('id_ta', $ta->id)->with(['schedule'])->get();
        // ambil id dari schedule yang sudah dimasukkan ke krs
        foreach($krsMahasiswas as $index => $krsMahasiswa){
            $idKrs[] = $krsMahasiswa->id_schedule;
        }
        // ambil total sks krs mahasiswa
        $totalSks = 0;
        $maxSks = 24;
        foreach($krsMahasiswas as $item){ 
            $totalSks = $totalSks + $item->schedule->matkul->sks;
        }
        // ambil seluruh schedule
        $items = Schedule::where('id_ta', $ta->id)->where('id_prodi', $mahasiswa->id_prodi)->with(['matkul','ruangan','dosen'])->get();
        // ambil seluruh id schedule
        foreach($items as $index => $item){
            $idSchedule[] = $item->id;
        }
        // bandingkan id schedule yang sudah ada di krs mahasiswa dengan id schedule keseluruhan
        // agar didapat data schedule yg belum dipilih mahasiswa
        if(count($krsMahasiswas) == 0){
            $data = Schedule::where('id_ta', $ta->id)->where('id_prodi', $mahasiswa->id_prodi)->with(['matkul','ruangan','dosen'])->get();
        }else{
            $results = array_diff($idSchedule,$idKrs);
            foreach($results as $result){
                $datas[] = Schedule::where('id', $result)->get();
            }
            // dd($datas);
            foreach($datas as $item){
                $data[] = $item[0];
            }
        }
        
        return view('user.krs.create')->with([
            'data' => $data,
            'idMahasiswa' => $mahasiswa->id,
            'idTa' => $ta->id,
            'totalSks' => $totalSks,
            'maxSks' => $maxSks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // ambil data schedule berdasarkan id yg dikirim dr create
        foreach($data['matkul'] as $index => $item){
            $schedule[] = Schedule::where('id', $item)->get();
        }
        // ambil data matkul berdasarkan id matkul yang ada pada data schedule
        foreach($schedule as $index => $item){
            $matkul[] = Matkul::where('id', $item[0]->id_matkul)->get();
        }
        // hitung total sks yg diambil
        $sks = 0;
        foreach($matkul as $index => $item){
            $sks = $sks + $item[0]->sks;
        }
        // cek jika total sks lebih dari max sks
        if($data['totalSks']+$sks > $data['maxSks']){
            return redirect()->route('krs.index')->with('status', 'Jumlah sks matakuliah melebihi batas maximal pengambilan!');
        }else{
            // simpan krs
            foreach($data['matkul'] as $index=>$value){
                Krs::create([
                    'id_mahasiswa' => $data['idMahasiswa'],
                    'id_schedule' => $data['matkul'][$index],
                    'id_ta' => $data['idTa'],
                ]);
            }

            return redirect()->route('krs.index')->with('status', 'Krs berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // data mahasiswa
        $mahasiswa = Mahasiswa::with(['prodis','kelas'])->findOrFail($id);
        $ta = TahunAkademik::where('status', 1)->first();
        // data krs
        $items = Krs::where('id_mahasiswa', $mahasiswa->id)->where('id_ta', $ta->id)->with(['schedule'])->get();
        $totalSks = 0;
        $maxSks = 24;
        foreach($items as $item){ 
            $totalSks = $totalSks + $item->schedule->matkul->sks;
        }
        return view('user.krs.cetak')->with([
            'mahasiswa' => $mahasiswa,
            'ta' => $ta,
            'items' => $items,
            'totalSks' => $totalSks,
            'maxSks' => $maxSks,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absen = Absen::where('id_krs', $id)->first();
        $nilai = Nilai::where('id_krs', $id)->first();
        $item = Krs::findOrFail($id);
        $item->delete();
        $absen->delete();
        $nilai->delete();

        return redirect()->route('krs.index')->with('status', 'Krs berhasil dihapus!');
    }
}
