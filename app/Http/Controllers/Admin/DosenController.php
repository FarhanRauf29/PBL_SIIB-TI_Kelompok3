<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;
use Barryvdh\DomPDF\Facade\Pdf;

class DosenController extends Controller
{
    public function index(Request $request)
    {
       $dosens = Dosen::all();
        return view('admin.dosen.home',compact('dosens'));
    }

    public function create(){
        return view('admin.dosen.create');
    }

    public function save(Request $request){
        $validation = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'email' => 'required|unique:dosens',
            'no_telp' => 'required',
            'jabatan' => 'required',
        ]);
        toastr()->success('Dosen berhasil ditambahkan.');
        $data = Dosen::create($validation);
        if ($data) {
            session()->flash('success', 'dosen berhasil ditambahkan');
            return redirect(route('admin/dosen'));
        } else {
            session()->flash('error', 'Beberapa masalah terjadi');
            return redirect(route('admin.dosen/create'));
        }
    }

    public function edit($id)
    {
        $dosens = Dosen::findOrFail($id);
        return view('admin.dosen.update', compact('dosens'));
    }

    public function delete($id)
    {
        $dosens = Dosen::findOrFail($id)->delete();
        if ($dosens) {
            session()->flash('success', 'dosen Deleted Successfully');
            return redirect(route('admin/dosen'));
        } else {
            session()->flash('error', 'dosen Not Delete successfully');
            return redirect(route('admin/dosen'));
        }
    }

    public function update(Request $request, $id)
    {
        $dosens = Dosen::findOrFail($id);
        $nama = $request->nama;
        $email = $request->email;
        $no_telp = $request->no_telp;
        $jabatan = $request->jabatan;

        $dosens->nama = $nama;
        $dosens->email = $email;
        $dosens->no_telp = $no_telp;
        $dosens->jabatan = $jabatan;
        $data = $dosens->save();
        if ($data) {
            session()->flash('success', 'dosen Update Successfully');
            return redirect(route('admin/dosen'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/dosen/update'));
        }
    }

    public function print_pdf($id)
    {
        $dosens = Dosen::find($id);
        $pdf = Pdf::loadView('admin.dosen.invoice', compact('dosens'));
        return $pdf->download('invoice.pdf');
    }
}
