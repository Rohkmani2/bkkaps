<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\User;
use App\Models\Loker;
use App\Models\Lamaran;
use App\Models\Ulasan;
use App\Models\Pencaker;
use App\Models\Informasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jml_user = User::all()->count();
        $jml_informasi = Informasi::all()->count();
        $jml_lamaran = Lamaran::all()->count();
        $jml_loker = Loker::all()->count();
        $jml_ulasan = Ulasan::all()->count();
        $jml_pencaker = Pencaker::all()->count();
        $jml_perusahaan = Perusahaan::all()->count();
        return view('dashboard.index')->with([
            'jml_user' => $jml_user,
            'jml_loker' => $jml_loker,
            'jml_lamaran' => $jml_lamaran,
             'jml_ulasan' => $jml_ulasan,
             'jml_pencaker' => $jml_pencaker,
             'jml_perusahaan' =>  $jml_perusahaan,
              'jml_informasi' => $jml_informasi]);
    }

    public function home()
    {
        if(!Auth::check()){
            $ket = "logout";
        }else{
            $ket = "login";
        }
        $jml_user = User::all()->count();
        $jml_informasi = Informasi::all()->count();
        $jml_lamaran = Lamaran::all()->count();
        $jml_loker = Loker::all()->count();
        $jml_ulasan = Ulasan::all()->count();
        $loker = Loker::latest()->get();
        $informasi = DB::table('informasi')->get();
        $kegiatan = DB::table('kegiatan')->get();
        $perusahaan = DB::table('perusahaan')->get();
        return view('dashboard.home')->with([
            'perusahaan' =>  $perusahaan,
            'kegiatan' => $kegiatan,
            'informasi' => $informasi,
            'ket' => $ket,
            'loker' => $loker,
            'jml_user' => $jml_user,
            'jml_loker' => $jml_loker,
            'jml_lamaran' => $jml_lamaran,
            'jml_ulasan' => $jml_ulasan,
            'jml_informasi' => $jml_informasi
        ]);
    }

    public function spk(){
        return view('frontend.spk');
    }

    public function profil()
    {

        // $user = User::find(Auth::user()->id)->toArray() ;

        // $user = DB::table('pencaker')
        // ->select('user.email', 'pencaker.*')
        // ->join('user', function($join) {
        //     $join->on('pencaker.id_user', '=', 'user.id')
        //     ->where('user.id', '=', Auth::user()->id);
        // })
        // ->first();

        $user = Pencaker::where('id_user', Auth::user()->id)->first();
            $data = $user;

        // echo "<pre>";
        // var_dump($user);
        // echo "</pre>";
        // die();

        if(!Auth::check()){
            $ket = "logout";
        }else{
            $ket = "login";
        }
        $jml_user = User::all()->count();
        $jml_informasi = Informasi::all()->count();
        $jml_lamaran = Lamaran::all()->count();
        $jml_loker = Loker::all()->count();
        $jml_ulasan = Ulasan::all()->count();
        $loker = DB::table('loker')->get();
        return view('dashboard.profil')->with([
            'user' => $data,
            'ket' => $ket,
            'loker' => $loker,
            'jml_user' => $jml_user,
            'jml_loker' => $jml_loker,
            'jml_lamaran' => $jml_lamaran,
            'jml_ulasan' => $jml_ulasan,
            'jml_informasi' => $jml_informasi
        ]);
    }

    public function lokerdetail($id)
    {
        if(!Auth::check()){
            $ket = "logout";
        }else{
            $ket = "login";
        }
        $jml_user = User::all()->count();
        $jml_informasi = Informasi::all()->count();
        $jml_lamaran = Lamaran::all()->count();
        $jml_loker = Loker::all()->count();
        $jml_ulasan = Ulasan::all()->count();
        $loker = Loker::find($id);
        $informasi = DB::table('informasi')->get();
        $kegiatan = DB::table('kegiatan')->get();
        $perusahaan = DB::table('perusahaan')->get();
        return view('dashboard.detailloker')->with([
            'perusahaan' =>  $perusahaan,
            'kegiatan' => $kegiatan,
            'informasi' => $informasi,
            'ket' => $ket,
            'loker' => $loker,
            'jml_user' => $jml_user,
            'jml_loker' => $jml_loker,
            'jml_lamaran' => $jml_lamaran,
            'jml_ulasan' => $jml_ulasan,
            'jml_informasi' => $jml_informasi
        ]);
    }

    public function ajukan()
    {
        if(!Auth::check()){
            $ket = "logout";
        }else{
            $ket = "login";
        }
        $pencaker = Pencaker::where('id_user',auth()->user()->id)->first();
        $jml_user = User::all()->count();
        $jml_informasi = Informasi::all()->count();
        $jml_lamaran = Lamaran::all()->count();
        $jml_loker = Loker::all()->count();
        $jml_ulasan = Ulasan::all()->count();
        $loker = DB::table('loker')->get();
        $informasi = DB::table('informasi')->get();
        $kegiatan = DB::table('kegiatan')->get();
        $perusahaan = DB::table('perusahaan')->get();
        return view('dashboard.buatlamaran')->with([
            'pencaker'=>$pencaker,
            'perusahaan' =>  $perusahaan,
            'kegiatan' => $kegiatan,
            'informasi' => $informasi,
            'ket' => $ket,
            'loker' => $loker,
            'jml_user' => $jml_user,
            'jml_loker' => $jml_loker,
            'jml_lamaran' => $jml_lamaran,
            'jml_ulasan' => $jml_ulasan,
            'jml_informasi' => $jml_informasi
        ]);
    }

    public function infodetail($id)
    {
        if(!Auth::check()){
            $ket = "logout";
        }else{
            $ket = "login";
        }
        $jml_user = User::all()->count();
        $jml_informasi = Informasi::all()->count();
        $jml_lamaran = Lamaran::all()->count();
        $jml_loker = Loker::all()->count();
        $jml_ulasan = Ulasan::all()->count();
        $loker = DB::table('loker')->get();
        $informasi = DB::table('informasi')->find($id);
        $kegiatan = DB::table('kegiatan')->get();
        $perusahaan = DB::table('perusahaan')->get();
        return view('dashboard.detailinfo')->with([
            'perusahaan' =>  $perusahaan,
            'kegiatan' => $kegiatan,
            'informasi' => $informasi,
            'ket' => $ket,
            'loker' => $loker,
            'jml_user' => $jml_user,
            'jml_loker' => $jml_loker,
            'jml_lamaran' => $jml_lamaran,
            'jml_ulasan' => $jml_ulasan,
            'jml_informasi' => $jml_informasi
        ]);
    }

    public function galeri($id)
    {

        if(!Auth::check()){
            $ket = "logout";
        }else{
            $ket = "login";
        }
        $jml_user = User::all()->count();
        $jml_informasi = Informasi::all()->count();
        $jml_lamaran = Lamaran::all()->count();
        $jml_loker = Loker::all()->count();
        $jml_ulasan = Ulasan::all()->count();
        $loker = DB::table('loker')->get();
        $informasi = DB::table('informasi')->get();
        $kegiatan = DB::table('kegiatan')->find($id);
        $perusahaan = DB::table('perusahaan')->get();
        return view('dashboard.detailgaleri')->with([
            'perusahaan' =>  $perusahaan,
            'kegiatan' => $kegiatan,
            'informasi' => $informasi,
            'ket' => $ket,
            'loker' => $loker,
            'jml_user' => $jml_user,
            'jml_loker' => $jml_loker,
            'jml_lamaran' => $jml_lamaran,
            'jml_ulasan' => $jml_ulasan,
            'jml_informasi' => $jml_informasi
        ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

