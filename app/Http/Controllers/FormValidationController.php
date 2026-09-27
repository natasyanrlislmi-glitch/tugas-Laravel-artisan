<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Rules\Uppercase;
use Illuminate\Http\Request;

class FormValidationController extends Controller
{
    // ================================================
    // STEP 1 & 2: Validasi di Controller + Menampilkan Error
    // ================================================

    public function createBasic()
    {
        return view('step1-basic');
    }

    public function storeBasic(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        return back()->with('success', 'Data berhasil divalidasi!');
    }

    // ================================================
    // STEP 3: Custom Validation Message
    // ================================================

    public function createCustomMessage()
    {
        return view('step3-custom-message');
    }

    public function storeCustomMessage(Request $request)
    {
        $messages = [
            'name.required' => 'Nama harus diisi!',
            'email.required' => 'Email tidak boleh kosong!',
            'password.confirmed' => 'Password tidak cocok!',
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ], $messages);

        return back()->with('success', 'Data berhasil divalidasi!');
    }

    // ================================================
    // STEP 4: Validasi Menggunakan Form Request
    // ================================================

    public function createFormRequest()
    {
        return view('step4-form-request');
    }

    public function storeFormRequest(UserRequest $request)
    {
        return back()->with('success', 'Data berhasil divalidasi!');
    }

    // ================================================
    // STEP 5: Validasi Kustom (Custom Rule)
    // ================================================

    public function createCustomRule()
    {
        return view('step5-custom-rule');
    }

    public function storeCustomRule(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', new Uppercase],
        ]);

        return back()->with('success', 'Berhasil! "' . $validated['name'] . '" sudah dalam format huruf kapital.');
    }

    public function createCombined()
    {
        return view('step-combined');
    }

    public function storeCombined(Request $request)
    {
        $request->validate([
            'name' => ['required', new Uppercase],
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        return back()->with('success', 'Data berhasil divalidasi!');
    }
}
