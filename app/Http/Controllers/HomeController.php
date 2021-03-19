<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\Prodi;
use App\Models\Kelas;
use App\Models\TahunAkademik;
use App\Models\Absen;
use App\Models\Nilai;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function dashboard()
    {
        $mahasiswa = Mahasiswa::count();
        $dosen = Dosen::count();
        $matkul = Matkul::count();

        return view('pages.dashboard.index')->with([
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'matkul' => $matkul,
        ]);
    }

    public function mahasiswa(Request $request)
    {
        // data dr session
        $data = $request->session()->get('mahasiswa');
        // relasikan dengan prodi dan kelas
        $item = Mahasiswa::with(['prodis','kelas'])->findOrFail($data->id);
        // ambil data fakultas, dosen, dan Tahun akademik
        $fakultas = Prodi::with('fakultas')->findOrFail($data->id_prodi);
        // dd($item->id_kelas);
        if($item->id_kelas == null){
            $dosen = null;
        }else{
            $dosen = Kelas::with('dosen')->findOrFail($data->id_kelas);
        }
        $ta = TahunAkademik::where('status', 1)->first();

        // dd($data);

        return view('user.dashboard.dashboard')->with([
            'item' => $item,
            'fakultas' => $fakultas,
            'dosen' => $dosen,
            'ta' => $ta
        ]);
    }

    public function dosen(Request $request)
    {
        // data dr session
        $data = $request->session()->get('dosen');

        $item = Dosen::with('fakultas')->findOrFail($data->id);
        // // // ambil data fakultas dan Tahun akademik
        // $fakultas = Prodi::with('fakultas')->findOrFail($data->id_prodi);
        // // // $dosen = Kelas::with('dosen')->findOrFail($data->id_kelas);
        $ta = TahunAkademik::where('status', 1)->first();
        // dd($ta);
        return view('dosen.dashboard.dashboard')->with([
            'item' => $item,
            'ta' => $ta,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function absen(Request $request) //mahasiswa
    {
        // ambil data mahasiswa berdasarkan session
        $mahasiswa = $request->session()->get('mahasiswa');
        // ambil tahun akademik yg aktif
        $ta = TahunAkademik::where('status', 1)->first();
        // ambil data absen mahasiswa
        $absens = Absen::where('id_mahasiswa', $mahasiswa->id)->where('id_ta', $ta->id)->get();
        return view('user.absen.index')->with([
            'ta' => $ta,
            'absens' => $absens,
        ]);
    }

    public function nilai(Request $request)
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
        // dd($bobot);
        return view('user.nilai.index')->with([
            'ta' => $ta,
            'nilais' => $nilais,
            'totalSks' => $totalSks,
            'totalBobot' => $totalBobot,
            'mahasiswa' => $mahasiswa,
        ]);
    }
}
