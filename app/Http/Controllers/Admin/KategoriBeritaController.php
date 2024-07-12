<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $kategori_beritas = KategoriBerita::paginate(10);
        $total = KategoriBerita::count();
        return view('admin.kategoriberita.home', compact(['kategori_beritas', 'total']));
    }

    public function create(){
        return view('admin.kategoriberita.create');
    }

    public function save(Request $request){
        $validation = $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);
        $data = KategoriBerita::create($validation);
        if ($data) {
            session()->flash('success', 'kategori berita berhasil ditambahkan');
            return redirect(route('admin/kategoriberita'));
        } else {
            session()->flash('error', 'Beberapa masalah terjadi');
            return redirect(route('admin.kategoriberita/create'));
        }
    }

    public function edit($id)
    {
        $kategori_beritas = KategoriBerita::findOrFail($id);
        return view('admin.kategoriberita.update', compact('kategori_beritas'));
    }
 
    public function delete($id)
    {
        $kategori_beritas = KategoriBerita::findOrFail($id)->delete();
        if ($kategori_beritas) {
            session()->flash('success', 'kategori berita Deleted Successfully');
            return redirect(route('admin/kategoriberita'));
        } else {
            session()->flash('error', 'kategori berita Not Delete successfully');
            return redirect(route('admin/kategoriberita'));
        }
    }

    public function update(Request $request, $id)
    {
        $kategori_beritas = KategoriBerita::findOrFail($id);
        $nama_kategori = $request->nama_kategori;
        $keterangan = $request->keterangan;
 
        $kategori_beritas->nama_kategori = $nama_kategori;
        $kategori_beritas->keterangan = $keterangan;
        $data = $kategori_beritas->save();
        if ($data) {
            session()->flash('success', 'kategori berita Update Successfully');
            return redirect(route('admin/kategoriberita'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/kategoriberita/update'));
        }
    }
}
