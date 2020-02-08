<?php

namespace App\Http\Controllers;

use App\Response\MessageResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('app.edit-pass');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ], [
            'password.required' => 'وارد کردن رمز عبور الزامیست',
            'password.confirmed' => 'رمز عبورهای وارد شده باهم مطابقت ندارند',
            'password.min' => 'رمز عبور حداقل 6 کاراکتر باشد',
        ]);
        $user = Auth::user();
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return MessageResponse::respondSuccess('رمز عبور با موفقیت تغییر یافت');
    }
}
