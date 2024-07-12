<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriBarang;

class KategoriBarangController extends Controller
{
    public function index()
    {
        $kategori_barangs = KategoriBarang::paginate(10);
        $total = KategoriBarang::count();
        return view('admin.kategoribarang.home', compact(['kategori_barangs', 'total']));
    }

    public function create(){
        return view('admin.kategoribarang.create');
    }

    public function save(Request $request){
        $validation = $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);
        $data = KategoriBarang::create($validation);
        if ($data) {
            session()->flash('success', 'kategori barang berhasil ditambahkan');
            return redirect(route('admin/kategoribarang'));
        } else {
            session()->flash('error', 'Beberapa masalah terjadi');
            return redirect(route('admin.kategoribarang/create'));
        }
    }

    public function edit($id)
    {
        $kategori_barangs = KategoriBarang::findOrFail($id);
        return view('admin.kategoribarang.update', compact('kategori_barangs'));
    }
 
    public function delete($id)
    {
        $kategori_barangs = KategoriBarang::findOrFail($id)->delete();
        if ($kategori_barangs) {
            session()->flash('success', 'kategori barang Deleted Successfully');
            return redirect(route('admin/kategoribarang'));
        } else {
            session()->flash('error', 'kategori barang Not Delete successfully');
            return redirect(route('admin/kategoribarang'));
        }
    }

    public function update(Request $request, $id)
    {
        $kategori_barangs = KategoriBarang::findOrFail($id);
        $nama_kategori = $request->nama_kategori;
        $keterangan = $request->keterangan;
 
        $kategori_barangs->nama_kategori = $nama_kategori;
        $kategori_barangs->keterangan = $keterangan;
        $data = $kategori_barangs->save();
        if ($data) {
            session()->flash('success', 'kategori barang Update Successfully');
            return redirect(route('admin/kategoribarang'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/kategoribarang/update'));
        }
    }
}
