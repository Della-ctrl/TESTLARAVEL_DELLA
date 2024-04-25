<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
        $data = Kategori::getData();
        //dd($data);
        return view('kategori.index',compact('data'));
    }

    public function create(){
        return view('kategori.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_kategori' => 'required',
        ]);
        
        Kategori::create($request->all());
         
        return redirect()->route('kategori.index')
                        ->with('success','Data created successfully.');
    }

    public function show($id){
        $data = DB::table('tb_kategori')->where('id_kategori', $id)->get();
        $kategori = $data[0];
        return view('kategori.show',compact('kategori'));
    }

    public function edit($id){
        $data = DB::table('tb_kategori')->where('id_kategori', $id)->get();
        $kategori = $data[0];
        return view('kategori.edit',compact('kategori'));
    }

    public function update(Request $request){
        $request->validate([
            'nama_kategori' => 'required',
        ]);
        
        Kategori::updateData($request->all());
         
        return redirect()->route('kategori.index')
                        ->with('success','Data updated successfully.');
    }

    public function destroy($id){
        $delete = DB::table('tb_kategori')->where('id_kategori', $id)->delete();

        return redirect()->route('kategori.index')
                        ->with('success','Data deleted successfully.');
    }
}
