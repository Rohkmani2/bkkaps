<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if(auth()->user()->level == 'admin' || 'user'){

            $ulasan = DB::table('ulasan')->get();
        }else{
            $ulasan = DB::table('ulasan')->where('id_perusahaan', auth()->user()->id)->get();
        }
             return view('ulasan.ulasan', ['ulasan'=> $ulasan]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ulasan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'ulasan' => 'required',

        ]);

        $ulasan = Ulasan::create($request->all());
        $pas = $ulasan->save();
        if($pas){
            return redirect()->back()->with('success',' Pesan Anda berhasil ditambahkan');
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
    public function update(Request $request)
    {
        $ulasan = Ulasan::where('id', $request->id)
             ->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'telepon' => $request->telepon,
                    'ulasan' => $request->ulasan,
             ]);
        return redirect('ulasan')->with('success','Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ulasan = Ulasan::find($id);
        $ulasan->delete();
        return redirect('ulasan')->with('success',' Penghapusan berhasil.');
    }
}
