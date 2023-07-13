<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = DB::table('kegiatan')->get();
        return view('kegiatan.kegiatan', ['kegiatan' => $kegiatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kegiatan.create');
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
            'tgl_post' => 'required|string',
            'detail' => 'required|string',
            'foto' => 'required|max:2000|mimes:png,jpg,jpeg,jfif',
        ],$messages);
        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $validate['foto'] = $file->store('foto_kegiatan');
        }
        $kegiatan = Kegiatan::create($validate);

        if($kegiatan){
            return redirect('/kegiatan')->with('success', 'Pendaftaran Lowongan Kerja berhasil ditambahkan');
        } else {
            return back()->with('fail',' Terdapat kesalahan saat memasukan data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        return view('loker.buka');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.ubah', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::query()
        ->findOrFail($id);

        if ($request->hasfile('foto')) {
            Storage::delete($kegiatan->foto);
            $data = $request->file('foto')->store('foto_kegiatan');
        }else{
            $data = $kegiatan->foto;
        }

        $kegiatan->update([
            "nama" => $request->nama,
            "tgl_post" => $request->tgl_post,
            "detail" => $request->detail,
            "foto" => $data
        ]);

        return redirect('kegiatan')->with('success', 'Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();
        return redirect('kegiatan')->with('success',' Penghapusan berhasil.');
    }
}

