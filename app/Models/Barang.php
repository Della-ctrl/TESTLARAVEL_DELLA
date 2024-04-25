<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Barang extends Model
{
    use HasFactory;
    public static function getData(){
        $query = "select a.*, b.nama_kategori, c.nama_supplier from mst_barang a
        left join tb_kategori b on a.id_kategori = b.id_kategori
        left join tb_supplier c on a.id_supplier = c.id_supplier";
       
        return DB::select($query);
    }

    public static function create($data){
        $insert=DB::table('mst_barang')->insert([
            'nama_barang' => $data['nama_barang'],
            'id_kategori' => $data['id_kategori'],
            'id_supplier' => $data['id_supplier'],
        ]);

        return $insert;
    }

    public static function updateData($data){
        $insert=DB::table('mst_barang')
        ->where('id_barang', $data['id_barang'])
        ->update([
            'nama_barang' => $data['nama_barang'],
            'id_kategori' => $data['id_kategori'],
            'id_supplier' => $data['id_supplier'],
        ]);

        return $insert;
    }
}
