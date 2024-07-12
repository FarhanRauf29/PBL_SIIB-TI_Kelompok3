<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Barryvdh\DomPDF\Facade\Pdf;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $mahasiswas = Mahasiswa::select('*');
            return datatables()->of($mahasiswas)
                ->addColumn('prodi', function ($row) {
                    return $row->prodi ? $row->prodi->nama_prodi : '';
                })
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.mahasiswa.home');
    }

    public function create(){
        $data = Prodi::all(); // Retrieve data from your model

        return view('admin.mahasiswa.create', compact('data'));
    }

    public function save(Request $request){
        $validation = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'prodi_id' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
        ]);
        $data = Mahasiswa::create($validation);
        if ($data) {
            session()->flash('success', 'Mahasiswa berhasil ditambahkan');
            return redirect(route('admin/mahasiswa'));
        } else {
            session()->flash('error', 'Beberapa masalah terjadi');
            return redirect(route('admin.mahasiswa/create'));
        }
    }

    public function edit($id)
    {
        $mahasiswas = Mahasiswa::findOrFail($id);
        $data = Prodi::all();
        return view('admin.mahasiswa.update', compact('mahasiswas', 'data'));
    }

    public function delete($id)
    {
        $mahasiswas = Mahasiswa::findOrFail($id)->delete();
        if ($mahasiswas) {
            session()->flash('success', 'mahasiswa Deleted Successfully');
            return redirect(route('admin/mahasiswa'));
        } else {
            session()->flash('error', 'mahasiswa Not Delete successfully');
            return redirect(route('admin/mahasiswa'));
        }
    }

    public function update(Request $request, $id)
    {
        $mahasiswas = Mahasiswa::findOrFail($id);
        $nama = $request->nama;
        $prodi_id = $request->prodi_id;
        $email = $request->email;
        $no_telp = $request->no_telp;

        $mahasiswas->nama = $nama;
        $mahasiswas->prodi_id = $prodi_id;
        $mahasiswas->email = $email;
        $mahasiswas->no_telp = $no_telp;
        $data = $mahasiswas->save();
        if ($data) {
            session()->flash('success', 'mahasiswa Update Successfully');
            return redirect(route('admin/mahasiswa'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/mahasiswa/update'));
        }
    }

    public function print_pdf($id)
    {
        $mahasiswas = Mahasiswa::find($id);
        $pdf = Pdf::loadView('admin.mahasiswa.invoice', compact('mahasiswas'));
        return $pdf->download('invoice.pdf');
    }
}
