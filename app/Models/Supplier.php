<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    use HasFactory;
    public static function getData(){
        $query = "select * from tb_supplier";
       
        return DB::select($query);
    }

    public static function create($data){
        $insert=DB::table('tb_supplier')->insert([
            'nama_supplier' => $data['nama_supplier'],
            'alamat' => $data['alamat'],
        ]);

        return $insert;
    }

    public static function updateData($data){
        $insert=DB::table('tb_supplier')
        ->where('id_supplier', $data['id_supplier'])
        ->update([
            'nama_supplier' => $data['nama_supplier'],
            'alamat' => $data['alamat'],
        ]);

        return $insert;
    }
}
