<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TahunAkademik;
use App\Http\Requests\TahunAkademikRequest;

class TahunAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TahunAkademik::all();

        return view('pages.ta.index')->with([
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
        return view('pages.ta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TahunAkademikRequest $request)
    {
        $data = $request->all();

        TahunAkademik::create($data);
        return redirect()->route('ta.index')->with('status', 'Data berhasil ditambahkan!');
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
        $item = TahunAkademik::findOrFail($id);

        return view('pages.ta.edit')->with([
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
    public function update(TahunAkademikRequest $request, $id)
    {
        $data = $request->all();

        $item = TahunAkademik::findOrFail($id);
        $item->update($data);

        return redirect()->route('ta.index')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TahunAkademik::findOrFail($id);
        $item->delete();

        return redirect()->route('ta.index')->with('status', 'Data berhasil dihapus!');
    }

    public function activeTa(Request $request)
    {
        // reset status tahun akademik yang bernilai 1
        $item = TahunAkademik::where('status', 1)->get();
        TahunAkademik::where('id', $item[0]->id)
        ->update([
            'status' => 0,
        ]);
        // update status akademik menjadi 1
        $data = $request->all();
        TahunAkademik::where('id', $data['id'])
        ->update([
            'status' => 1,
        ]);
        return redirect()->route('ta.index')->with('status', 'Tahun Akademik Berhasil Dirubah!'); 
    }
}
