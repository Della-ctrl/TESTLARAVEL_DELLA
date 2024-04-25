<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
        $data = Barang::getData();
        //dd($data);
        return view('barang.index',compact('data'));
    }

    public function create(){
        $kategori = Kategori::getData();
        $supplier = Supplier::getData();

        return view('barang.create',compact('kategori','supplier'));
    }

    public function store(Request $request){
        $request->validate([
            'nama_barang' => 'required',
            'id_kategori' => 'required',
            'id_supplier' => 'required',
        ]);
        
        Barang::create($request->all());
         
        return redirect()->route('barang.index')
                        ->with('success','Data created successfully.');
    }

    public function show($id){
        $data = DB::select("select a.*, b.nama_kategori, c.nama_supplier from mst_barang a
        left join tb_kategori b on a.id_kategori = b.id_kategori
        left join tb_supplier c on a.id_supplier = c.id_supplier
        where id_barang = '".$id."'");
        $barang = $data[0];
        return view('barang.show',compact('barang'));
    }

    public function edit($id){
        $data = DB::table('mst_barang')->where('id_barang', $id)->get();
        $barang = $data[0];
        $kategori = Kategori::getData();
        $supplier = Supplier::getData();

        return view('barang.edit',compact('barang','kategori','supplier'));
    }

    public function update(Request $request){
        $request->validate([
            'nama_barang' => 'required',
            'id_kategori' => 'required',
            'id_supplier' => 'required',
        ]);
        
        Barang::updateData($request->all());
         
        return redirect()->route('barang.index')
                        ->with('success','Data updated successfully.');
    }

    public function destroy($id){
        $delete = DB::table('mst_barang')->where('id_barang', $id)->delete();

        return redirect()->route('barang.index')
                        ->with('success','Data deleted successfully.');
    }
}
