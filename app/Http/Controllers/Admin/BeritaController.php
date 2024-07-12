<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;

class BeritaController extends Controller
{
    public function show(Request $request)
    {
        return view('berita');
    }
    public function index()
    {
        //$beritas = Berita::orderBy('id', 'desc')->get();
        $beritas = Berita::paginate(10);
        $total = Berita::count();
        return view('admin.berita.home', compact(['beritas', 'total']));
    }

    public function create(){
        $data = KategoriBerita::all();
        return view('admin.berita.create', compact('data'));
    }

    public function save(Request $request){
        $validation = $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            'tanggal_publikasi' => 'required|date',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'isi' => 'required',
        ]);
        $data = Berita::create($validation);
        if ($data) {
            session()->flash('success', 'berita berhasil ditambahkan');
            return redirect(route('admin/berita'));
        } else {
            session()->flash('error', 'Beberapa masalah terjadi');
            return redirect(route('admin.berita/create'));
        }
    }

    public function edit($id)
    {
        $beritas = Berita::findOrFail($id);
        return view('admin.berita.update', compact('beritas'));
    }

    public function delete($id)
    {
        $beritas = Berita::findOrFail($id)->delete();
        if ($beritas) {
            session()->flash('success', 'berita Deleted Successfully');
            return redirect(route('admin/berita'));
        } else {
            session()->flash('error', 'berita Not Delete successfully');
            return redirect(route('admin/berita'));
        }
    }

    public function update(Request $request, $id)
    {
        $beritas = Berita::findOrFail($id);
        $judul = $request->judul;
        $kategori = $request->kategori;
        $isi = $request->isi;

        $beritas->judul = $judul;
        $beritas->kategori = $kategori;
        $beritas->isi = $isi;
        $data = $beritas->save();
        if ($data) {
            session()->flash('success', 'berita Update Successfully');
            return redirect(route('admin/berita'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/berita/update'));
        }
    }
}
