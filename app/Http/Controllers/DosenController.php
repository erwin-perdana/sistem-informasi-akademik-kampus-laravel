<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dosen;
use App\Models\Fakultas;
use App\User;
use App\Http\Requests\DosenRequest;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Dosen::with('fakultas')->get();

        return view('pages.dosen.index')->with([
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
        return view('pages.dosen.create')->with([
            'fakultas' => $fakultas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DosenRequest $request)
    {
        $data = $request->all();
        
        $photoName = $data['photo']->getClientOriginalName() . '-' . time(). '.' . $data['photo']->extension();
        $data['photo']->move(public_path('image/dosen'), $photoName);

        Dosen::create([
            'nidn' => $data['nidn'],
            'nama' => $data['nama'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'agama' => $data['agama'],
            'telp' => $data['telp'],
            'email' => $data['email'],
            'id_fakultas' => $data['id_fakultas'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'photo' => $photoName,
        ]);

        User::create([
            'name' => $data['nama'],
            'username' => $data['nidn'],
            'password' => Hash::make($data['password']),
            'role' => "Dosen",
        ]);

        return redirect()->route('dosen.index')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Dosen::with('fakultas')->findOrFail($id);

        return view('pages.dosen.show')->with([
            'item' => $item
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
        $item = Dosen::with('fakultas')->findOrFail($id);
    
        $fakultas = Fakultas::all();
        return view('pages.dosen.edit')->with([
            'item' => $item,
            'fakultas' => $fakultas
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

        $item = Dosen::findOrFail($id);
        $user = User::where('username', $item->nidn)->first();

        if($request->photo == ""){
            $photoName = $item->photo;
        }else{
            $photoName = $data['photo']->getClientOriginalName() . '-' . time(). '.' . $data['photo']->extension();
            $data['photo']->move(public_path('image/dosen'), $photoName);
            if($item->photo == NULL){

            }else{
                unlink(public_path('image')."/dosen/".$item->photo);
            }
        }

        Dosen::where('id', $item->id)
        ->update([
            'nidn' => $data['nidn'],
            'nama' => $data['nama'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'agama' => $data['agama'],
            'telp' => $data['telp'],
            'email' => $data['email'],
            'id_fakultas' => $data['id_fakultas'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'photo' => $photoName,
        ]);

        if($request->password == ""){
            $password = $user->password;
        }else{
            $password = Hash::make($data['password']);
        }
        
        User::where('id', $user->id)
        ->update([
            'name' => $data['nama'],
            'username' => $data['nidn'],
            'password' => $password,
        ]);

        return redirect()->route('dosen.index')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Dosen::findOrFail($id);
        $item->delete();

        $user = User::where('username', $item->nidn)->first();
        User::where('id', $user['id'])->delete();

        return redirect()->route('dosen.index')->with('status', 'Data berhasil dihapus!');
    }
}
