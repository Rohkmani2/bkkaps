<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loker = Loker::latest()->get();
        $perusahaan = Perusahaan::get();
        return view('loker.loker', ['loker' => $loker,'perusahaan'=>$perusahaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loker.create');
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
            'id_perusahaan' => 'required',
            'posisi' => 'required|string',
            'usia' => 'required|string',
            'pendidikan' => 'required|string',
            'lokasi' => 'required|string',
            'detail' => 'required|string',
            'foto' => 'required|max:2000|mimes:png,jpg,jpeg,jfif',
        ],$messages);
        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $validate['foto'] = $file->store('foto_loker');
        }
        $loker = Loker::create($validate);

        if($loker){
            return redirect()->back()->with('success', 'Pendaftaran Lowongan Kerja berhasil ditambahkan');
        } else {
            return back()->with('fail',' Terdapat kesalahan saat memasukan data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loker  $loker
     * @return \Illuminate\Http\Response
     */
    public function show(Loker $loker)
    {
        return view('loker.buka');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loker  $loker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loker = Loker::findOrFail($id);
        return view('loker.ubah', compact('loker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loker  $loker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loker = Loker::query()
        ->findOrFail($id);

        if ($request->hasfile('foto')) {
            Storage::delete($loker->foto);
            $data = $request->file('foto')->store('foto_loker');
        }else{
            $data = $loker->foto;
        }

        $loker->update([
            "nama" => $request->nama,
            "posisi" => $request->posisi,
            "usia" => $request->usia,
            "pendidikan" => $request->pendidikan,
            "lokasi" => $request->lokasi,
            "detail" => $request->detail,
            "foto" => $data
        ]);

        return redirect()->back()->with('success', 'Berhasil diupdate');
    }

    public function updateStatusLoker(Request $request, $id)
    {
        $loker = Loker::findOrFail($id);

        $loker->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loker $loker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loker = Loker::find($id);
        $loker->delete();
        return redirect()->back()->with('success',' Penghapusan berhasil.');
    }
}

