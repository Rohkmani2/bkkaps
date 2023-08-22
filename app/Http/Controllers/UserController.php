<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $user = DB::table('user')->get();
        return view('user.user', ['user' => $user]);
    }
    public function keladmin()
    {
        $user = DB::table('user')->where('level', 'admin')->get();
        return view('user.user', ['user' => $user]);
    }
    public function kelpencaker()
    {
        $user = DB::table('user')->where('level', 'pencaker')->get();
        return view('user.user', ['user' => $user]);
    }
    public function kelperusahaan()
    {
        $user = DB::table('user')->where('level', 'perusahaan')->get();
        return view('user.user', ['user' => $user]);
    }
    public function kelalumni()
    {
        $user = DB::table('user')->where('level', 'alumni')->get();
        return view('user.user', ['user' => $user]);
    }
    public function login()
    {
        return view('login.login');
    }
    public function register()
    {
        return view('login.register');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new UserImport, $file);
        return redirect('user')->with('success', 'Data berhasil diimpor.');
    }

    public function registerUser(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email|unique:user',
            'password' => 'required|min:6|max:255',
            'level' => 'required'

        ]);

        $validate['password'] = bcrypt($validate['password']);
        $user = new User();
        $user->email = $request->email;
        $user->level = $request->level;
        $user->password = Hash::make($request->password);
        // if ($request->level == 'perusahaan') {
        //     $user->status = '0';
        // } elseif ($request->level == 'user') {
        $user->status = '0';
        // }
        $res = $user->save();
        if ($res) {
            return back()->with('success', ' User berhasil ditambahkan dan silahkan login');
        } else {
            return back()->with('fail', ' Terdapat kesalahan saat memasukan data');
        }
    }

    public function regisByAdmin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email|unique:user',
            'password' => 'required|min:6|max:255'

        ]);

        $validate['password'] = bcrypt($validate['password']);
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return back()->with('success', ' User berhasil ditambahkan dan silahkan login');
        } else {
            return back()->with('fail', ' Terdapat kesalahan saat memasukan data');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.editUser', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find(auth()->user()->id); // Ganti sesuai dengan cara Anda mengambil pengguna saat ini
        $user->update($request->all());
        $newPassword = 'password_baru'; // Ganti dengan password baru yang ingin Anda gunakan
        $hashedPassword = Hash::make($newPassword);
        $user->password = $hashedPassword;
        $user->save();
        return redirect('user')->with('success', 'Berhasil diupdate');
    }

    public function validasi($value, $id)
    {
        User::where('id', $id)
        ->update([
           'status' => $value
        ]);
        return redirect('user')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user')->with('success', ' Penghapusan berhasil.');
    }

    public function loginUser(Request $request)
    {
        // var_dump('true');die();
        //Error messages
        $messages = [
            "email.required" => "Email is required",
            "password.required" => "Password is required",
            "password.min" => "Password must be at least 6 characters"
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required|min:6'
            ], $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
            $validated = $validator->validated();
            if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password'], 'status' => 1])) {
                $user = Auth::user();
                    if ($user->level == 'pencaker' || $user->level == 'alumni') {
                        return redirect('home');
                    } elseif ($user->level == "perusahaan") {
                        return redirect('country.dashboard');
                    }else {
                        return redirect('dashboard');
                    }
            }

            return back()->with('fail', 'Password salah atau Akun belum diverifikasi!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
