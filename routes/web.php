<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\admin\TransaksiController;
use App\Http\Controllers\Admin\KategoriBarangController;
use App\Http\Controllers\Admin\KategoriBeritaController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::get('/berita', function () {
    return view('berita');
})->name('berita');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth','userMiddleware'])->group(function(){

    Route::get('dashboard',[UserController::class,'index'])->name('dashboard');
    Route::get('peminjaman',[PeminjamanController::class,'index'])->name('user.peminjaman');
    Route::get('pengembalian',[PeminjamanController::class,'index'])->name('user.pengembalian');

});

Route::middleware(['auth','adminMiddleware'])->group(function(){

    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    //mahasiswa
    Route::get('/admin/mahasiswa',[MahasiswaController::class,'index'])->name('admin/mahasiswa');
    Route::get('/admin/mahasiswa/create',[MahasiswaController::class,'create'])->name('admin/mahasiswa/create');
    Route::post('/admin/mahasiswa/save',[MahasiswaController::class,'save'])->name('admin/mahasiswa/save');
    Route::get('/admin/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('admin/mahasiswa/edit');
    Route::put('/admin/mahasiswa/edit/{id}', [MahasiswaController::class, 'update'])->name('admin/mahasiswa/update');
    Route::get('/admin/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete'])->name('admin/mahasiswa/delete');
    Route::get('/admin/mahasiswa/print_pdf/{id}', [MahasiswaController::class, 'print_pdf'])->name('admin/mahasiswa/print_pdf');
    //dosen
    Route::get('/admin/dosen',[DosenController::class,'index'])->name('admin/dosen');
    Route::get('/admin/dosen/create',[DosenController::class,'create'])->name('admin/dosen/create');
    Route::post('/admin/dosen/save',[DosenController::class,'save'])->name('admin/dosen/save');
    Route::get('/admin/dosen/edit/{id}', [DosenController::class, 'edit'])->name('admin/dosen/edit');
    Route::put('/admin/dosen/edit/{id}', [DosenController::class, 'update'])->name('admin/dosen/update');
    Route::get('/admin/dosen/delete/{id}', [DosenController::class, 'delete'])->name('admin/dosen/delete');
    Route::get('/admin/dosen/print_pdf/{id}', [DosenController::class, 'print_pdf'])->name('admin/dosen/print_pdf');
    //staff
    Route::get('/admin/staff',[StaffController::class,'index'])->name('admin/staff');
    Route::get('/admin/staff/create',[StaffController::class,'create'])->name('admin/staff/create');
    Route::post('/admin/staff/save',[StaffController::class,'save'])->name('admin/staff/save');
    Route::get('/admin/staff/edit/{id}', [StaffController::class, 'edit'])->name('admin/staff/edit');
    Route::put('/admin/staff/edit/{id}', [StaffController::class, 'update'])->name('admin/staff/update');
    Route::get('/admin/staff/delete/{id}', [StaffController::class, 'delete'])->name('admin/staff/delete');
    Route::get('/admin/staff/print_pdf/{id}', [StaffController::class, 'print_pdf'])->name('admin/staff/print_pdf');
    //prodi
    Route::get('/admin/prodi',[ProdiController::class,'index'])->name('admin/prodi');
    Route::get('/admin/prodi/create',[ProdiController::class,'create'])->name('admin/prodi/create');
    Route::post('/admin/prodi/save',[ProdiController::class,'save'])->name('admin/prodi/save');
    Route::get('/admin/prodi/edit/{id}', [ProdiController::class, 'edit'])->name('admin/prodi/edit');
    Route::put('/admin/prodi/edit/{id}', [ProdiController::class, 'update'])->name('admin/prodi/update');
    Route::get('/admin/prodi/delete/{id}', [ProdiController::class, 'delete'])->name('admin/prodi/delete');
    //kategori barang
    Route::get('/admin/kategoribarang',[KategoriBarangController::class,'index'])->name('admin/kategoribarang');
    Route::get('/admin/kategoribarang/create',[KategoriBarangController::class,'create'])->name('admin/kategoribarang/create');
    Route::post('/admin/kategoribarang/save',[KategoriBarangController::class,'save'])->name('admin/kategoribarang/save');
    Route::get('/admin/kategoribarang/edit/{id}', [KategoriBarangController::class, 'edit'])->name('admin/kategoribarang/edit');
    Route::put('/admin/kategoribarang/edit/{id}', [KategoriBarangController::class, 'update'])->name('admin/kategoribarang/update');
    Route::get('/admin/kategoribarang/delete/{id}', [KategoriBarangController::class, 'delete'])->name('admin/kategoribarang/delete');
    //barang
    Route::get('/admin/barang',[BarangController::class,'index'])->name('admin/barang');
    Route::get('/admin/barang/create',[BarangController::class,'create'])->name('admin/barang/create');
    Route::post('/admin/barang/save',[BarangController::class,'save'])->name('admin/barang/save');
    Route::get('/admin/barang/edit/{id}', [BarangController::class, 'edit'])->name('admin/barang/edit');
    Route::put('/admin/barang/edit/{id}', [BarangController::class, 'update'])->name('admin/barang/update');
    Route::get('/admin/barang/delete/{id}', [BarangController::class, 'delete'])->name('admin/barang/delete');
    Route::get('/admin/barang/print_pdf/{id}', [BarangController::class, 'print_pdf'])->name('admin/barang/print_pdf');
    //kategori berita
    Route::get('/admin/kategoriberita',[KategoriBeritaController::class,'index'])->name('admin/kategoriberita');
    Route::get('/admin/kategoriberita/create',[KategoriBeritaController::class,'create'])->name('admin/kategoriberita/create');
    Route::post('/admin/kategoriberita/save',[KategoriBeritaController::class,'save'])->name('admin/kategoriberita/save');
    Route::get('/admin/kategoriberita/edit/{id}', [KategoriBeritaController::class, 'edit'])->name('admin/kategoriberita/edit');
    Route::put('/admin/kategoriberita/edit/{id}', [KategoriBeritaController::class, 'update'])->name('admin/kategoriberita/update');
    Route::get('/admin/kategoriberita/delete/{id}', [KategoriBeritaController::class, 'delete'])->name('admin/kategoriberita/delete');
    //berita
    //Route::get('/berita',[BeritaController::class,'show'])->name('berita');
    Route::get('/admin/berita',[BeritaController::class,'index'])->name('admin/berita');
    Route::get('/admin/berita/create',[BeritaController::class,'create'])->name('admin/berita/create');
    Route::post('/admin/berita/save',[BeritaController::class,'save'])->name('admin/berita/save');
    Route::get('/admin/berita/edit/{id}', [BeritaController::class, 'edit'])->name('admin/berita/edit');
    Route::put('/admin/berita/edit/{id}', [BeritaController::class, 'update'])->name('admin/berita/update');
    Route::get('/admin/berita/delete/{id}', [BeritaController::class, 'delete'])->name('admin/berita/delete');
    //transaksi
    Route::get('/admin/transaksi',[TransaksiController::class,'index'])->name('admin/transaksi');
    Route::get('/admin/transaksishow/{id}', [TransaksiController::class, 'show']);
    Route::get('/admin/transaksi/createj',[TransaksiController::class,'createj'])->name('admin/transaksi/createj');
    Route::get('/admin/transaksi/createk',[TransaksiController::class,'createk'])->name('admin/transaksi/createk');
    Route::post('/admin/transaksi/savej',[TransaksiController::class,'savej'])->name('admin/transaksi/savej');
    Route::post('/admin/transaksi/savek',[TransaksiController::class,'savek'])->name('admin/transaksi/savek');
    Route::get('/admin/transaksi/edit/{id}', [TransaksiController::class, 'edit'])->name('admin/transaksi/edit');
    Route::put('/admin/transaksi/edit/{id}', [TransaksiController::class, 'update'])->name('admin/transaksi/update');
    Route::get('/admin/transaksi/delete/{id}', [TransaksiController::class, 'delete'])->name('admin/transaksi/delete');
});
