<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::paginate(10);
        $total = Prodi::count();
        return view('admin.prodi.home', compact(['prodis', 'total']));
    }

    public function create(){
        return view('admin.prodi.create');
    }

    public function save(Request $request){
        $validation = $request->validate([
            'nama_prodi' => 'required',
            'keterangan' => 'required',
        ]);
        $data = Prodi::create($validation);
        if ($data) {
            session()->flash('success', 'prodi berhasil ditambahkan');
            return redirect(route('admin/prodi'));
        } else {
            session()->flash('error', 'Beberapa masalah terjadi');
            return redirect(route('admin.prodi/create'));
        }
    }

    public function edit($id)
    {
        $prodis = Prodi::findOrFail($id);
        return view('admin.prodi.update', compact('prodis'));
    }
 
    public function delete($id)
    {
        $prodis = Prodi::findOrFail($id)->delete();
        if ($prodis) {
            session()->flash('success', 'prodi Deleted Successfully');
            return redirect(route('admin/prodi'));
        } else {
            session()->flash('error', 'prodi Not Delete successfully');
            return redirect(route('admin/prodi'));
        }
    }

    public function update(Request $request, $id)
    {
        $prodis = Prodi::findOrFail($id);
        $nama_prodi = $request->nama_prodi;
        $keterangan = $request->keterangan;
 
        $prodis->nama_prodi = $nama_prodi;
        $prodis->keterangan = $keterangan;
        $data = $prodis->save();
        if ($data) {
            session()->flash('success', 'mahasiswa Update Successfully');
            return redirect(route('admin/prodi'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/prodi/update'));
        }
    }
}
