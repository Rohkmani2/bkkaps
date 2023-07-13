<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi = DB::table('informasi')->get();
        return view('informasi.informasi', ['informasi' => $informasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informasi.create');
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
            'judul' => 'required|string',
            'tgl_post' => 'required|string',
            'detail' => 'required|string',
            'file' => 'required',
            'foto' => 'required|max:2000|mimes:png,jpg,jpeg,jfif',
        ],$messages);
        // if ($request->hasfile('foto')) {
        //     $file = $request->file('foto');
        //     $validate['foto_'] = $file->store('foto_post');
        // }
        // if ($request->hasfile('file')) {
        //     $file = $request->file('file');
        //     $validate['file_'] = $file->store('file_post');
        // }

        if($request->file('file')) {
            $validate["file"] = $request->file('file')->store('file_post');
        }

        if($request->file('foto')) {
            $validate["foto"] = $request->file('foto')->store('post_post');
        }


        $informasi = Informasi::create($validate);

        if($informasi){
            return redirect('/informasi')->with('success', 'Pendaftaran pengumuman berhasil ditambahkan');
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
        return view('informasi.show');
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
        $informasi = Informasi::query()
        ->findOrFail($id);

        if ($request->hasfile('foto')) {
            Storage::delete($informasi->foto);
            $edit = $request->file('foto')->store('foto_post');
        }else{
            $edit = $informasi->foto;
        }if ($request->hasfile('file')) {
            Storage::delete($informasi->cv);
            $data = $request->file('file')->store('file_post');
        }else{
            $data = $informasi->file;
        }

        $informasi->update([
            "judul" => $request->judul,
            "tgl_post" => $request->tgl_post,
            "detail" => $request->detail,
            "foto" => $edit,
            "file" => $data
        ]);

        return redirect('informasi')->with('success', 'Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informasi = Informasi::find($id);
        $informasi->delete();
        return redirect('informasi')->with('success',' Penghapusan berhasil.');
    }
}
