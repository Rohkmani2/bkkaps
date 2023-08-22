<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perusahaan = DB::table('perusahaan')->get();
        return view('perusahaan.perusahaan', ['perusahaan' => $perusahaan]);
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
        $messages = [
            'required' => 'Data tidak boleh kosong',
            'string' => 'Data harus angka, huruf maupun kombinasi',
            'foto.max'=>'Foto maksimal ukuran 2mb',
            'mimes'=>'File harus :values'
        ];

        $validate = $request->validate([
            'nama' => 'required|string',
            'agen' => 'required|string',
            'telepon' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|string',
            'foto' => 'required|max:2000|mimes:png,jpg,jpeg,jfif',
        ],$messages);
        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $validate['foto'] = $file->store('foto_post');
        }
        $perusahaan = Perusahaan::create($validate);

        if($perusahaan){
            return redirect('/perusahaan')->with('success', 'Pendaftaran Perusahaan ditambahkan');
        } else {
            return back()->with('fail',' Terdapat kesalahan saat memasukan data');
        }
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
        //
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
        $perusahaan = Perusahaan::query()
        ->findOrFail($id);

        if ($request->hasfile('foto')) {
            Storage::delete($perusahaan->foto);
            $data = $request->file('foto')->store('foto_post');
        }else{
            $data = $perusahaan->foto;
        }

        $perusahaan->update([
            "nama" => $request->nama,
            'agen' => $request->agen,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'email' => $request->email,
            "foto" => $data
        ]);

        return redirect('perusahaan')->with('success', 'Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perusahaan = Perusahaan::find($id);
        $perusahaan->delete();
        return redirect('perusahaan')->with('success',' Penghapusan berhasil.');
    }
}
