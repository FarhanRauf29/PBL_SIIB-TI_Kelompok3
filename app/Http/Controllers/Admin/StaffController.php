<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use Barryvdh\DomPDF\Facade\Pdf;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $staff = Staff::select('*');
            return datatables()->of($staff)
                ->make(true);
        }
        return view('admin.staff.home');
    }

    public function create(){
        return view('admin.staff.create');
    }

    public function save(Request $request){
        $validation = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'bagian' => 'required',
        ]);
        $data = Staff::create($validation);
        if ($data) {
            session()->flash('success', 'staff berhasil ditambahkan');
            return redirect(route('admin/staff'));
        } else {
            session()->flash('error', 'Beberapa masalah terjadi');
            return redirect(route('admin.staff/create'));
        }
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staff.update', compact('staff'));
    }
 
    public function delete($id)
    {
        $staff = Staff::findOrFail($id)->delete();
        if ($staff) {
            session()->flash('success', 'staff Deleted Successfully');
            return redirect(route('admin/staff'));
        } else {
            session()->flash('error', 'staff Not Delete successfully');
            return redirect(route('admin/staff'));
        }
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);
        $nama = $request->nama;
        $email = $request->email;
        $no_telp = $request->no_telp;
        $bagian = $request->bagian;
 
        $staff->nama = $nama;
        $staff->email = $email;
        $staff->no_telp = $no_telp;
        $staff->bagian = $bagian;
        $data = $staff->save();
        if ($data) {
            session()->flash('success', 'staff Update Successfully');
            return redirect(route('admin/staff'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/staff/update'));
        }
    }

    public function print_pdf($id)
    {
        $staff = Staff::find($id);
        $pdf = Pdf::loadView('admin.staff.invoice', compact('staff'));
        return $pdf->download('invoice.pdf');
    }
}
