<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Loker;
use App\Models\Lamaran;
use App\Models\Ulasan;
use App\Models\Informasi;
use Illuminate\Http\Request;

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
        return view('dashboard.index')->with(['jml_user' => $jml_user,'jml_loker' => $jml_loker,'jml_lamaran' => $jml_lamaran, 'jml_ulasan' => $jml_ulasan, 'jml_informasi' => $jml_informasi]);
    }

    public function home()
    {
        return view('dashboard.home');
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
