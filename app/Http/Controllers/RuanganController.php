<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ruangan;
use App\Models\Gedung;
use App\Http\Requests\RuanganRequest;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Ruangan::with('gedung')->get();

        return view('pages.ruangan.index')->with([
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
        $gedungs = Gedung::all();
        return view('pages.ruangan.create')->with([
            'gedungs' => $gedungs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuanganRequest $request)
    {
        $data = $request->all();
        Ruangan::create($data);
        return redirect()->route('ruangan.index')->with('status', 'Data berhasil ditambahkan!');
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
        $item = Ruangan::with('gedung')->findOrFail($id);
    
        $gedungs = Gedung::all();
        return view('pages.ruangan.edit')->with([
            'item' => $item,
            'gedungs' => $gedungs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RuanganRequest $request, $id)
    {
        $data = $request->all();

        $item = Ruangan::findOrFail($id);
        $item->update($data);

        return redirect()->route('ruangan.index')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Ruangan::findOrFail($id);
        $item->delete();

        return redirect()->route('ruangan.index')->with('status', 'Data berhasil dihapus!');
    }
}
