<?php

namespace App\Http\Controllers;

// Dibuat dengan: php artisan make:controller PageController
class PageController extends Controller
{
    /**
     * Bonus: GET /hello/{nama}
     */
    public function hello(string $nama)
    {
        return view('hello', [
            'nama' => ucwords($nama),
        ]);
    }
}
