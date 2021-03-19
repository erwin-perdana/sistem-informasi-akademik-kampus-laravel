<?php

namespace App\Http\Controllers;

use App\Models\TahunAkademik;
use App\Models\Schedule;
use App\Models\Nilai;
use App\Models\Krs;
use DateTime;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Nilai::where('id_schedule', $id)->with('mahasiswas')->get();

        $schedule = Schedule::findOrFail($id);
        $ta = TahunAkademik::where('status', 1)->first();

        return view('dosen.nilai.show')->with([
            'items' => $items,
            'schedule' => $schedule,
            'id' => $id,
            'ta' => $ta,
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
        $items = Nilai::where('id_schedule', $id)->with('mahasiswas')->get();
        $schedule = Schedule::findOrFail($id);

        return view('dosen.nilai.edit')->with([
            'items' => $items,
            'schedule' => $schedule,
            'id' => $id,
        ]);
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
        $data = $request->all();

        foreach($data['idMhs'] as $index=>$item){
            $Na = ($data['nilai_absen'][$index]*0.15)+($data['nilai_tugas'][$index]*0.15)+($data['nilai_uts'][$index]*0.3)+($data['nilai_uas'][$index]*0.4);
            if($Na >= 80){
                $huruf = "A";
            }elseif($Na >= 60 && $Na < 80){
                $huruf = "B";
            }elseif($Na >= 40 && $Na < 60){
                $huruf = "C";
            }elseif($Na >= 1 && $Na < 40){
                $huruf = "D";
            }else{
                $huruf = "E";
            }
            Nilai::where('id_mahasiswa', $data['idMhs'][$index])
            ->where('id_schedule', $id)
            ->update([
                'nilai_absen' => $data['nilai_absen'][$index],
                'nilai_tugas' => $data['nilai_tugas'][$index],
                'nilai_uts' => $data['nilai_uts'][$index],
                'nilai_uas' => $data['nilai_uas'][$index],
                'nilai_akhir' => $Na,
                'nilai_huruf' => $huruf,
            ]);
        }

        return redirect()->route('nilai.show', $id)->with('status', 'Nilai berhasil diisi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list(Request $request)
    {
        // ambil data dosen berdasarkan session
        $dosen = $request->session()->get('dosen');
        // ambil tahun akademik
        $ta = TahunAkademik::where('status', 1)->first();
        // panggil data schedule berdasarkan id dosen dan ta
        $data = Schedule::where('id_dosen', $dosen->id)->where('id_ta', $ta->id)->with('matkul')->get();

        return view('dosen.nilai.list')->with([
            'data' => $data,
        ]);
    }

    public function cetakDosen($id)
    {
        $items = Nilai::where('id_schedule', $id)->with('mahasiswas')->get();
        $schedule = Schedule::findOrFail($id);
        $ta = TahunAkademik::where('status', 1)->first();

        // ambil tgl sekarang
        $date = new DateTime('now');
        $dateNow = $date->format('d-M-Y');
        $tgl = preg_replace("/-/"," ", $dateNow);
        
        return view('dosen.nilai.cetak')->with([
            'items' => $items,
            'schedule' => $schedule,
            'ta' => $ta,
            'tgl' => $tgl,
        ]);
    }

    public function print(Request $request, $id)
    {
        // ambil data mahasiswa berdasarkan session
        $mahasiswa = $request->session()->get('mahasiswa');

        // ambil tahun akademik yg aktif
        $ta = TahunAkademik::where('status', 1)->first();
        // ambil data absen mahasiswa
        $nilais = Nilai::where('id_mahasiswa', $mahasiswa->id)->where('id_ta', $ta->id)->get();
        $totalSks = 0;
        $totalBobot = 0;
        foreach($nilais as $index=>$nilai){
            // jumlahkan sks
            $totalSks += $nilai->schedule->matkul->sks;
            // hitung bobot
            if($nilai->nilai_huruf == "A"){
                $angka = 4;
            }elseif($nilai->nilai_huruf == "B"){
                $angka = 3;
            }elseif($nilai->nilai_huruf == "C"){
                $angka = 2;
            }elseif($nilai->nilai_huruf == "D"){
                $angka = 1;
            }else{
                $angka = 0;
            }
            $bobot = $angka * $nilai->schedule->matkul->sks;
            // jumlahkan semua bobot
            $totalBobot += $bobot;
        }

        // ambil tgl sekarang
        $date = new DateTime('now');
        $dateNow = $date->format('d-M-Y');
        $tgl = preg_replace("/-/"," ", $dateNow);
        return view('user.nilai.cetak')->with([
            'nilais' => $nilais,
            'mahasiswa' => $mahasiswa,
            'ta' => $ta,
            'tgl' => $tgl,
            'totalSks' => $totalSks,
            'totalBobot' => $totalBobot,
        ]);
    }
}
