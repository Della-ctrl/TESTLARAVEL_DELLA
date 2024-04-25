<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategori extends Model
{
    use HasFactory;
    public static function getData(){
        $query = "select * from tb_kategori";
       
        return DB::select($query);
    }

    public static function create($data){
        $insert=DB::table('tb_kategori')->insert([
            'nama_kategori' => $data['nama_kategori'],
        ]);

        return $insert;
    }

    public static function updateData($data){
        $insert=DB::table('tb_kategori')
        ->where('id_kategori', $data['id_kategori'])
        ->update([
            'nama_kategori' => $data['nama_kategori'],
        ]);

        return $insert;
    }
}
