<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Http\Requests\KelasRequest;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Kelas::with(['prodi','dosen'])->get();
        // $jumlahMahasiswa = count(Mahasiswa::where('id_kelas', $id)->get());

        return view('pages.kelas.index')->with([
            'items' => $items,
            // 'jumlahMahasiswa' => $jumlahMahasiswa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = Prodi::all();
        $dosenWali = Dosen::all();
        return view('pages.kelas.create')->with([
            'prodi' => $prodi,
            'dosenWali' => $dosenWali
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KelasRequest $request)
    {
        $data = $request->all();

        Kelas::create($data);
        return redirect()->route('kelas.index')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Kelas::with(['prodi','dosen'])->findOrFail($id);
        $mahasiswa = Mahasiswa::where('id_kelas', $id)->get();
        $jumlahMahasiswa = count($mahasiswa);
        $idKelas = $id;
        return view('pages.kelas.show')->with([
            'item' => $item,
            'mahasiswa' => $mahasiswa,
            'jumlahMahasiswa' => $jumlahMahasiswa,
            'idKelas' => $idKelas
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
        $item = Kelas::with(['prodi','dosen'])->findOrFail($id);
    
        $prodi = Prodi::all();
        $dosenWali = Dosen::all();

        return view('pages.kelas.edit')->with([
            'item' => $item,
            'prodi' => $prodi,
            'dosenWali' => $dosenWali
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KelasRequest $request, $id)
    {
        $data = $request->all();

        $item = Kelas::findOrFail($id);
        $item->update($data);

        return redirect()->route('kelas.index')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kelas::findOrFail($id);
        $item->delete();

        return redirect()->route('kelas.index')->with('status', 'Data berhasil dihapus!');
    }

    public function addMahasiswa($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        $items = Mahasiswa::where('id_kelas', NULL)->where('id_prodi', $kelas->id_prodi)->with('prodis')->get();
        $mahasiswa = Mahasiswa::where('id_kelas', $id)->get();
        $jumlahMahasiswa = count($mahasiswa);

        return view('pages.kelas.add')->with([
            'items' => $items,
            'id' => $id,
            'jumlahMahasiswa' => $jumlahMahasiswa,
        ]);
    }

    public function storeMahasiswa(Request $request)
    {
        $data = $request->all();
        $jumlahMahasiswa = $request->jumlahMahasiswa + count($data['mahasiswa']);

        Kelas::where('id', $request->id)
            ->update([
                'jumlah' => $jumlahMahasiswa,
        ]);

        foreach($data['mahasiswa'] as $index=>$value){
            Mahasiswa::where('id', $data['mahasiswa'][$index])
            ->update([
                'id_kelas' => $data['id'],
            ]);
        }
        return redirect('kelas/'. $data['id'])->with('status', 'Data berhasil ditambahkan!'); 
    }

    public function deleteMahasiswa(Request $request)
    {
        $data = $request->all();

        Mahasiswa::where('id', $data['id'])
        ->update([
            'id_kelas' => NULL,
        ]);

        $jumlahMahasiswa = $data['jumlahMahasiswa']-1;

        Kelas::where('id', $data['idKelas'])
            ->update([
                'jumlah' => $jumlahMahasiswa,
        ]);

        return redirect('kelas/'. $data['idKelas'])->with('status', 'Data mahasiswa berhasil di hapus!'); 
    }
}
