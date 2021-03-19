<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Prodi;
use App\Models\Fakultas;
use App\Models\Dosen;
use App\Http\Requests\ProdiRequest;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Prodi::with(['fakultas','dosen'])->get();
        
        return view('pages.prodi.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        $dosens = Dosen::all();
        return view('pages.prodi.create')->with([
            'fakultas' => $fakultas,
            'dosens' => $dosens
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdiRequest $request)
    {
        $data = $request->all();
        Prodi::create($data);
        return redirect()->route('prodi.index')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Prodi::with(['fakultas','dosen'])->findOrFail($id);
        $fakultas = Fakultas::all();
        $dosens = Dosen::all();
        return view('pages.prodi.edit')->with([
            'item' => $item,
            'fakultas' => $fakultas,
            'dosens' => $dosens,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdiRequest $request, $id)
    {
        $data = $request->all();

        $item = Prodi::findOrFail($id);
        $item->update($data);

        return redirect()->route('prodi.index')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Prodi::findOrFail($id);
        $item->delete();

        return redirect()->route('prodi.index')->with('status', 'Data berhasil dihapus!');
    }
}
