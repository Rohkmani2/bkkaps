<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use App\Exports\LamaranExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class LamaranController extends Controller
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

            $lamaran = DB::table('lamaran')->get();
        }else{
            $lamaran = DB::table('lamaran')->where('id_perusahaan', auth()->user()->id)->get();
        }
        return view('lamaran.lamaran', ['lamaran'=> $lamaran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lamaran.tambah');
    }

    public function cetak()
    {
        $lamaran = DB::table('lamaran')->get();
        return view('lamaran.cetakLamaran', ['lamaran' => $lamaran]);
    }

    public function unduhpdf()
    {
        $data = Lamaran::all();
        view()->share('data', $data);
        $pdf = Pdf::loadview('lamaran.printpdf')->setpaper('A4','potrait');
        return $pdf->download('Laporan_Data_Lamaran_Kerja.pdf');
    }

    public function unduhexcel()
    {
        return excel::download(new LamaranExport,'Laporan_Data_Lamaran_Kerja.xlsx');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //proses pengajuan lamaran
    public function store(Request $request)
    {
        // $userID = Auth::id(); // Mendapatkan ID pengguna yang sedang login
        // $user = User::find($userID); // Mengambil data pengguna dari database

        $validate = $request->validate([
            'id_user'=>'',
            'id_perusahaan'=>'',
            'id_loker'=>'',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'nik' => 'required',
            'telepon' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'tgl_lahir' => 'required',
            'usia' => 'required',
            'tb' => 'required',
            'bb' => 'required',
            'vaksin' => 'required',
            'sekolah' => 'required',
            'thn_lulus' => 'required',
            'pengalaman' => 'required',
            'jurusan' => 'required',
            'cv' => 'required',

        ]);
        $validate['id_loker']=$request->loker;
        $validate['id_perusahaan'] = $request->perusahaan;
        $validate['id_user'] = auth()->user()->id;
        $validate['cv']=$request->file('cv')->store('cv_image');
        $lamaran = Lamaran::create($validate);
        if($lamaran){
            return redirect()->back()->with('success',' Data Lamaran Anda berhasil ditambahkan');
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
        $lamaran= Lamaran::findOrFail($id);
        return view ('lamaran.ganti', compact('lamaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  @param  \App\Models\Lamaran  $lamaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lamaran = Lamaran::query()
        ->findOrFail($id);

        if ($request->hasfile('cv')) {
            Storage::delete($lamaran->cv);
            $data = $request->file('cv')->store('cv_image');
        }else{
            $data = $lamaran->cv;
        }

        $lamaran->update([
            "nama" => $request->nama,
            "jenis_kelamin" => $request->jenis_kelamin,
            "email" => $request->email,
            "telepon" => $request->telepon,
            "ttl" => $request->ttl,
            "alamat" => $request->alamat,
            "agama" => $request->agama,
            "nik" => $request->nik,
            "tgl_lahir" => $request->tgl_lahir,
            "usia" => $request->usia,
            "tb" => $request->tb,
            "bb" => $request->bb,
            "vaksin" => $request->vaksin,
            "sekolah" => $request->sekolah,
            "thn_lulus" => $request->thn_lulus,
            "pengalaman" => $request->pengalaman,
            "jurusan" => $request->jurusan,
            "cv" => $data
        ]);

        return redirect()->back()->with('success', 'Berhasil diupdate');
    }

    public function updateStatusLamaran(Request $request, $id)
    {
        $lamaran = Lamaran::findOrFail($id);

        $lamaran->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lamaran = Lamaran::find($id);
        $lamaran->delete();
        return redirect()->back()->with('success',' Penghapusan berhasil.');
    }
}
