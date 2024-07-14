<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\KategoriBarang;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::paginate(10);
        $total = Barang::count();
        return view('admin.barang.home', compact(['barangs', 'total']));
    }

    public function create(){
        $ktg = KategoriBarang::all();
        if ($ktg->isEmpty()) {
            // Handle jika data kosong, misalnya redirect ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Data kategori barang kosong');
        }
        return view('admin.barang.create', compact('ktg'));
    }

    public function save(Request $request){

        $number = mt_rand(1000000000,9999999999);

        if ($this->barcodeExists($number)) {
            $number = mt_rand(1000000000,999999999);
        }

        $request['barcode'] = $number;
        $request['kategori_id'] = $request->jenis_id;

        Barang::create($request->all());

        return redirect(route('admin/barang'));
    }

    public function barcodeExists($number){
        return barang::whereBarcode($number)->exists();
    }

    public function edit($id)
    {
        $barangs = Barang::findOrFail($id);
        $barang = Barang::findOrFail($id);
        $ktg = KategoriBarang::all(); // Replace with your logic to fetch categories

        return view('admin.barang.update', compact('barangs'));
    }

    public function delete($id)
    {
        $barangs = Barang::findOrFail($id)->delete();
        toastr()->success('Barang berhasil dihapus.');
        if ($barangs) {
            session()->flash('success', 'barang Deleted Successfully');
            return redirect(route('admin/barang'));
        } else {
            session()->flash('error', 'barang Not Delete successfully');
            return redirect(route('admin/barang'));
        }
    }

    public function update(Request $request, $id)
    {
        $barangs = Barang::findOrFail($id);
        $nama = $request->nama;
        $status = $request->status;

        $barangs->nama = $nama;
        $barangs->status = $status;
        $data = $barangs->save();
        if ($data) {
            session()->flash('success', 'barang Update Successfully');
            return redirect(route('admin/barang'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/barang/update'));
        }
    }

    public function print_pdf($id)
    {
        $barangs = Barang::find($id);
        $pdf = Pdf::loadView('admin.barang.invoice', compact('barangs'));
        return $pdf->download('invoice.pdf');
    }
}
