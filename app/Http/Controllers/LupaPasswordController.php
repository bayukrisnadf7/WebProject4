<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class LupaPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }
    /**

     * Write code on Method

     *

     * @return response()

     */

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }


    /**

     * Write code on Method

     *

     * @return response()

     */

    public function submitResetPasswordForm(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8', // Minimal panjang kata sandi 8 karakter
        ]);

        // Cari token reset password
        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        // Jika token tidak ditemukan, kembalikan dengan pesan error
        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        // Ubah kata sandi pengguna
        $user = Register::where('email', $request->email)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        // Hapus token reset password
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Redirect ke halaman login dengan pesan sukses
        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
