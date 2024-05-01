<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LupaPasswordController extends Controller
{
    public function index(){
        return view('auth.lupa-password');
    }
    public function lupaPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $token = Str::random(64);

    DB::table('password_reset_tokens')->insert([
        'email' => $request->email,
        'token' => $token,
        'created_at' => Carbon::now(),
    ]);

    Mail::send('emails.lupa-password', ['token' => $token], function ($message) use ($request) {
        $message->to($request->email)->subject('Reset Password');
    });

    return redirect('lupa-password')->with('success', '');
}

    function resetPassword($token){
        return view('auth.ubah-password', compact('token'));
    }
    function resetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password'=> 'required|vonfirmed',
            'konfirmasi_password' => 'required'
        ]);

        $update_password = DB::table('users')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();
            if(!$update_password){
                return redirect()->to(route('reset.password'))->with('error', "Invalid");
            }
            User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

            DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

            return redirect('/login')->with('success', 'Password Berhasil Diubah');
    }
}
