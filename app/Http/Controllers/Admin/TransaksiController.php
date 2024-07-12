<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Barang;
use Milon\Barcode\DNS1D;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $transaksis = Transaksi::all();

        return view('admin.transaksi.home')->with('transaksis', $transaksis);
    }

    public function show($id) {
        $transaksi = Transaksi::findorfail($id);

        return view('admin.transaksi.detail')->with('item', $transaksi);
    }

    public function createj()
    {
        // Ambil data user (jika perlu)
        $users = User::all();

        // Ambil data barang (jika perlu)
        $barangs = Barang::all();

        // Tampilkan view create.blade.php dan passing data user dan barang ke view
        return view('admin.transaksi.createj', compact('users', 'barangs'));
    }

    public function createk()
    {
        // Ambil data user (jika perlu)
        $users = User::all();

        // Ambil data barang (jika perlu)
        $barangs = Barang::all();

        // Tampilkan view create.blade.php dan passing data user dan barang ke view
        return view('admin.transaksi.createk', compact('users', 'barangs'));
    }

    public function savej(Request $request)
    {
        $validation = $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_pen_jwb' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
            'batas_waktu' => 'required',
        ]);

        $data = Transaksi::create($validation);
        if ($data) {
            session()->flash('success', 'Transakasi berhasil ditambahkan');
            return redirect(route('admin/transaksi'));
        } else {
            session()->flash('error', 'Beberapa masalah terjadi');
            return redirect(route('admin.transaksi/create'));
        }
        // Validasi input dari form
        // $validator = Validator::make($request->all(), [

        // ]);

        // // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        // if ($validator->fails()) {
        //     return redirect()->back()
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        // // Simpan transaksi baru
        // Transaksi::create($request->all());

        // // Redirect ke halaman index transaksi dengan pesan sukses
        // return redirect()->route('transaksi.index')
        //                 ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function savek(Request $request)
    {
        $validation = $request->validate([
            'id_user' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
            'status' => 'required|in:sedang dipinjam, sudah dikembalikan, belum dikembalikan',
            'catatan' => 'nullable|string',
        ]);

        dd($request->tgl_kembali->diff($request->tgl_pinjam)->days);

        $validation['batas_waktu'] = '';

        $data = Transaksi::create($validation);
        if ($data) {
            session()->flash('success', 'Transakasi berhasil ditambahkan');
            return redirect(route('admin/transaksi'));
        } else {
            session()->flash('error', 'Beberapa masalah terjadi');
            return redirect(route('admin.transaksi/create'));
        }
        // Validasi input dari form
        // $validator = Validator::make($request->all(), [

        // ]);

        // // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        // if ($validator->fails()) {
        //     return redirect()->back()
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        // // Simpan transaksi baru
        // Transaksi::create($request->all());

        // // Redirect ke halaman index transaksi dengan pesan sukses
        // return redirect()->route('transaksi.index')
        //                 ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Ambil data user (jika perlu)
        $users = User::all();

        // Ambil data barang (jika perlu)
        $barangs = Barang::all();

        // Tampilkan view edit.blade.php dan passing data transaksi, user, dan barang ke view
        return view('admin.transaksi.update', compact('transaksi', 'users', 'barangs'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
            'status' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // Ambil data transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Update hanya data yang diubah, biarkan yang lainnya tetap sama
        $transaksi->id_user = $request->input('id_user', $transaksi->id_user);
        $transaksi->barang_id = $request->input('barang_id', $transaksi->barang_id);
        $transaksi->tgl_pinjam = $request->input('tgl_pinjam', $transaksi->tgl_pinjam);
        $transaksi->tgl_kembali = $request->input('tgl_kembali', $transaksi->tgl_kembali);
        $transaksi->status = $request->input('status', $transaksi->status);
        $transaksi->catatan = $request->input('catatan', $transaksi->catatan);

        // Simpan perubahan
        $transaksi->save();

        // Redirect ke halaman index transaksi dengan pesan sukses
        return redirect()->route('admin/transaksi')
                        ->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function delete($id)
    {
        $transaksis = Transaksi::findOrFail($id)->delete();
        if ($transaksis) {
            session()->flash('success', 'barang Deleted Successfully');
            return redirect(route('admin/transaksi'));
        } else {
            session()->flash('error', 'barang Not Delete successfully');
            return redirect(route('admin/transaksi'));
        }
    }
}
