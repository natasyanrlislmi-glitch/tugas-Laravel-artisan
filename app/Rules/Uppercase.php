<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Uppercase implements Rule
{
    /**
     * Tentukan apakah rule ini lolos validasi.
     */
    public function passes($attribute, $value)
    {
        return strtoupper($value) === $value;
    }

    /**
     * Pesan error yang ditampilkan jika validasi gagal.
     */
    public function message()
    {
        return ':attribute harus dalam huruf kapital.';
    }
}
