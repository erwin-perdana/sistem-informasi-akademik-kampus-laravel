<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\TahunAkademik;
use App\Models\Absen;
use App\Models\Schedule;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use DateTime;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) //mahasiswa
    {
        // // ambil data mahasiswa berdasarkan session
        // $mahasiswa = $request->session()->get('mahasiswa');
        // // ambil tahun akademik yg aktif
        // $ta = TahunAkademik::where('status', 1)->first();
        // // ambil data absen mahasiswa
        // $absens = Absen::where('id_mahasiswa', $mahasiswa->id)->where('id_ta', $ta->id)->get();
        // return view('user.absen.index')->with([
        //     'ta' => $ta,
        //     'absens' => $absens,
        // ]);
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
    public function show($id) //dosen
    {
        $items = Absen::where('id_schedule', $id)->with('mahasiswas')->get();
        $schedule = Schedule::findOrFail($id);
        $ta = TahunAkademik::where('status', 1)->first();

        return view('dosen.absen.show')->with([
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
        $items = Absen::where('id_schedule', $id)->with('mahasiswas')->get();
        $schedule = Schedule::findOrFail($id);

        return view('dosen.absen.edit')->with([
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
            Absen::where('id_mahasiswa', $data['idMhs'][$index])
            ->where('id_schedule', $id)
            ->update([
                'p1' => $data['p1'][$index],
                'p2' => $data['p2'][$index],
                'p3' => $data['p3'][$index],
                'p4' => $data['p4'][$index],
                'p5' => $data['p5'][$index],
                'p6' => $data['p6'][$index],
                'p7' => $data['p7'][$index],
                'p8' => $data['p8'][$index],
                'p9' => $data['p9'][$index],
                'p10' => $data['p10'][$index],
                'p11' => $data['p11'][$index],
                'p12' => $data['p12'][$index],
                'p13' => $data['p13'][$index],
                'p14' => $data['p14'][$index],
                'p15' => $data['p15'][$index],
                'p16' => $data['p16'][$index],
                'p17' => $data['p17'][$index],
                'p18' => $data['p18'][$index],
            ]);
        }

        return redirect()->route('absen.show', $id)->with('status', 'Absen berhasil diisi');
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

        return view('dosen.absen.list')->with([
            'data' => $data,
        ]);
    }

    public function cetak($id)
    {
        $items = Absen::where('id_schedule', $id)->with('mahasiswas')->get();
        $schedule = Schedule::findOrFail($id);
        $ta = TahunAkademik::where('status', 1)->first();

        // ambil tgl sekarang
        $date = new DateTime('now');
        $dateNow = $date->format('d-M-Y');
        $tgl = preg_replace("/-/"," ", $dateNow);
        
        return view('dosen.absen.cetak')->with([
            'items' => $items,
            'schedule' => $schedule,
            'ta' => $ta,
            'tgl' => $tgl,
        ]);
    }
}
