<?php

namespace App\Http\Controllers;

use App\Models\Pencaker;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;

class PencakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pencaker = DB::table('pencaker')->get();
        return view('pencaker.pencaker', ['pencaker' => $pencaker]);
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

        $validate = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'nik' => 'required',
            'telepon' => 'required',
            'tempat_lhr' => 'required',
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
            'foto' => 'required',

        ]);
;
        // if($request->file('cv')) {
        //     $validate["cv"] = $request->file('cv')->store('cv_post');
        // }

        if($request->file('foto')) {
            $validate["foto"] = $request->file('foto')->store('foto_post');
        }


        $pencaker = Pencaker::create($validate);

        if($pencaker){
            return redirect('/pencaker')->with('success', 'Data pencaker berhasil ditambahkan');
        } else {
            return redirect()->back()->with('fail',' Terdapat kesalahan saat memasukan data');
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
//     //proses update profil
    // public function update(Request $request)
    // {
    //     dd("oke");
    //     $user = Auth::user(); // Mendapatkan objek pengguna yang sedang login
    //     $user = User::get()->user_id;
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //         //Tambahkan validasi lain sesuai kebutuhan
    //     ]);

    //     $user->nama = $request->input('nama');
    //     // Update properti-propertri lain yang ingin diubah

    //     try {
    //         $user->save();
    //         return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan profil: ' . $e->getMessage());
    //     }
    // }
    public function update(Request $request)
    {
        // $user_perubahan =  [
        //     'id' => $request->id_user,
        //     'email' =>$request->email
        // ];
        // if ($request->password) {
        //     $user_perubahan['email'] = $request->email;
        //     unset($request->email);
        //     $user_perubahan['password'] = $request->password;
        //     unset($request->password);
        // }
        // $user->update($user_perubahan);
        // // unset($request->id_user, $request->email);
        // // unset($request->id_user, $request->password);
        $user = User::query()
        ->findOrFail(auth()->user()->id);
        if($user)
        {
            $pw = $user->password;
        }else{
            $pw = bcrypt($request->password);
        }

        $user->update([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'password'=>$pw
        ]);

        $pencaker = Pencaker::query()
        ->where('id_user',auth()->user()->id)
        ->first();

        if ($request->hasfile('foto') && !empty($pencaker)) {
            Storage::delete($pencaker->foto);
            $data = $request->file('foto')->store('foto_post');
        }else{
            if(!empty($pencaker))
            {
                $data = $pencaker->foto;
            }else{
                $data = '';
            }
        }

        Pencaker::updateOrCreate(
            [
                'id_user'=>auth()->user()->id
            ],
            [
            "jenis_kelamin" => $request->jenis_kelamin,
            "telepon" => $request->telepon,
            "ttl" => $request->kota,
            "alamat" => $request->alamat,
            "agama" => $request->agama,
            "nik" => $request->nik,
            "tgl_lahir" => $request->tgl_lahir,
            "tempat_lhr"=>$request->tempat_lhr,
            "usia" => $request->usia,
            "tb" => $request->tb,
            "bb" => $request->bb,
            "vaksin" => $request->vaksin,
            "sekolah" => $request->sekolah,
            "thn_lulus" => $request->thn_lulus,
            "pengalaman" => $request->pengalaman,
            "jurusan" => $request->jurusan,
            "foto" => $data
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
        $pencaker = Pencaker::find($id);
        $pencaker->delete();
        return redirect('pencaker')->with('success',' Penghapusan berhasil.');
    }
}
