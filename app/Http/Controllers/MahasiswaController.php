<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Kelas;
use App\User;
use App\Http\Requests\MahasiswaRequest;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Mahasiswa::with('prodis')->get();
        // $tgl = \Carbon\Carbon::createFromFormat('Y-m-d', $items[0]->tanggal_lahir)
        // ->format('d-m-Y');//$items[0]->tanggal_lahir;
        // dd($tgl);
        return view('pages.mahasiswa.index')->with([
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
        $kelas = Kelas::all();
        $prodi = Prodi::all();
        return view('pages.mahasiswa.create')->with([
            'prodi' => $prodi,
            'kelas' => $kelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MahasiswaRequest $request)
    {
        $data = $request->all();

        $photoName = $data['photo']->getClientOriginalName() . '-' . time(). '.' . $data['photo']->extension();
        $data['photo']->move(public_path('image/mahasiswa'), $photoName);

        Mahasiswa::create([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'id_prodi' => $data['id_prodi'],
            'agama' => $data['agama'],
            'telp' => $data['telp'],
            'email' => $data['email'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'photo' => $photoName,
        ]);

        User::create([
            'name' => $data['nama'],
            'username' => $data['nim'],
            'password' => Hash::make($data['password']),
            'role' => "Mahasiswa",
        ]);

        return redirect()->route('mahasiswa.index')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Mahasiswa::with(['prodis','kelas'])->findOrFail($id);

        return view('pages.mahasiswa.show')->with([
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
        $item = Mahasiswa::with(['prodis','kelas'])->findOrFail($id);
    
        $prodi = Prodi::all();
        $kelas = Kelas::all();
        return view('pages.mahasiswa.edit')->with([
            'item' => $item,
            'prodi' => $prodi,
            'kelas' => $kelas
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
        
        $item = Mahasiswa::findOrFail($id);
        $user = User::where('username', $item->nim)->first();

        if($request->photo == ""){
            $photoName = $item->photo;
        }else{
            $photoName = $data['photo']->getClientOriginalName() . '-' . time(). '.' . $data['photo']->extension();
            $data['photo']->move(public_path('image/mahasiswa'), $photoName);
            if($item->photo == NULL){

            }else{
                unlink(public_path('image')."/mahasiswa/".$item->photo);
            }
        }

        Mahasiswa::where('id', $item->id)
        ->update([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'id_prodi' => $data['id_prodi'],
            'agama' => $data['agama'],
            'telp' => $data['telp'],
            'email' => $data['email'],
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
            'username' => $data['nim'],
            'password' => $password,
        ]);

        return redirect()->route('mahasiswa.index')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Mahasiswa::findOrFail($id);
        $item->delete();

        $user = User::where('username', $item->nim)->first();
        User::where('id', $user['id'])->delete();

        return redirect()->route('mahasiswa.index')->with('status', 'Data berhasil dihapus!');
    }
}
