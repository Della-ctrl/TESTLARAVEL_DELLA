<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
        $data = Supplier::getData();
        //dd($data);
        return view('supplier.index',compact('data'));
    }

    public function create(){
        return view('supplier.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
        ]);
        
        Supplier::create($request->all());
         
        return redirect()->route('supplier.index')
                        ->with('success','Data created successfully.');
    }

    public function show($id){
        $data = DB::table('tb_supplier')->where('id_supplier', $id)->get();
        $supplier = $data[0];
        return view('supplier.show',compact('supplier'));
    }

    public function edit($id){
        $data = DB::table('tb_supplier')->where('id_supplier', $id)->get();
        $supplier = $data[0];
        return view('supplier.edit',compact('supplier'));
    }

    public function update(Request $request){
        $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
        ]);
        
        Supplier::updateData($request->all());
         
        return redirect()->route('supplier.index')
                        ->with('success','Data updated successfully.');
    }

    public function destroy($id){
        $delete = DB::table('tb_supplier')->where('id_supplier', $id)->delete();

        return redirect()->route('supplier.index')
                        ->with('success','Data deleted successfully.');
    }
}
