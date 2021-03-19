<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Matkul;
use App\Models\Prodi;
use App\Http\Requests\MatkulRequest;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Matkul::with('prodi')->get();

        return view('pages.matkul.index')->with([
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
        $prodi = Prodi::all();
        return view('pages.matkul.create')->with([
            'prodi' => $prodi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatkulRequest $request)
    {
        $data = $request->all();

        if($data['smt'] % 2 == 0){
            $data['semester'] = "Genap";
        }else{
            $data['semester'] = "Ganjil";
        }

        Matkul::create($data);
        return redirect()->route('matkul.index')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Matkul::with('prodi')->findOrFail($id);
    
        $prodi = Prodi::all();

        return view('pages.matkul.edit')->with([
            'item' => $item,
            'prodi' => $prodi
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

        $item = Matkul::findOrFail($id);
        $item->update($data);

        return redirect()->route('matkul.index')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Matkul::findOrFail($id);
        $item->delete();

        return redirect()->route('matkul.index')->with('status', 'Data berhasil dihapus!');
    }
}
