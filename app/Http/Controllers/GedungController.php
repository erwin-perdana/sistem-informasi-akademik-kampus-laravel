<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gedung;
use App\Http\Requests\GedungRequest;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gedung::all();

        return view('pages.gedung.index')->with([
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
        return view('pages.gedung.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GedungRequest $request)
    {
        $data = $request->all();

        Gedung::create($data);
        return redirect()->route('gedung.index')->with('status', 'Data berhasil ditambahkan!');
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
        $item = Gedung::findOrFail($id);

        return view('pages.gedung.edit')->with([
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GedungRequest $request, $id)
    {
        $data = $request->all();

        $item = Gedung::findOrFail($id);
        $item->update($data);

        return redirect()->route('gedung.index')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gedung::findOrFail($id);
        $item->delete();

        return redirect()->route('gedung.index')->with('status', 'Data berhasil dihapus!');
    }
}
