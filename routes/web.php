<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// 1. Halaman utama (/) -> data dinamis berupa array dari route
Route::get('/', function () {
    return view('home', [
        'nama'    => 'JEFLIE YOFI PUTRA',
        'courses' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel'],
    ]);
})->name('home');

// 2. Halaman about
Route::get('/about', function () {
    return view('about', [
        'profil' => [
            'Nama'     => 'JEFLIE YOFI PUTRA',
            'NIM'      => '4253250027',
            'Prodi'    => 'Ilmu Komputer',
            'Kampus'   => 'Universitas Negeri Medan',
            'Mata Kuliah' => 'Pemrograman Web (3KOM40115)',
        ],
        'skills' => ['PHP', 'MySQL', 'Laravel', 'Git & GitHub'],
    ]);
})->name('about');

// 3. Halaman contact
Route::get('/contact', function () {
    return view('contact', [
        'kontak' => [
            'Email'     => 'jeflie.putra22@gmail.com',
            'GitHub'    => 'github.com/jeflieputra22-dev',
            'Instagram' => '@lie_jejiee',
        ],
    ]);
})->name('contact');

// BONUS: route parameter /hello/{nama} -> ditangani controller (hasil make:controller)
Route::get('/hello/{nama}', [PageController::class, 'hello'])
    ->where('nama', '[A-Za-z ]+')
    ->name('hello');
