<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Pengajuan extends Model
{
    use HasFactory;
    public static function getData(){
        $query = "select a.*, b.nama_barang from tb_pengajuan a
        left join mst_barang b on a.id_barang = b.id_barang";
       
        return DB::select($query);
    }

    public static function create($data){
        $insert=DB::table('tb_pengajuan')->insert([
            'id_barang' => $data['id_barang'],
            'jumlah' => $data['jumlah'],
            'keterangan' => $data['keterangan'],
            'created_by' => Auth::user()->name,
            'created_date' => date('Y-m-d'),
            'status' => 'DIAJUKAN'
        ]);

        return $insert;
    }

    public static function updateData($data){
        $insert=DB::table('tb_pengajuan')
        ->where('id_pengajuan', $data['id_pengajuan'])
        ->update([
            'id_barang' => $data['id_barang'],
            'keterangan' => $data['keterangan'],
            'jumlah' => $data['jumlah'],
        ]);

        return $insert;
    }

    public static function approvedData($id_pengajuan){
        $insert=DB::table('tb_pengajuan')
        ->where('id_pengajuan', $id_pengajuan)
        ->update([
            'approved_by' => Auth::user()->name,
            'approved_date' => date('Y-m-d'),
            'status' => 'DISETUJUI'
        ]);

        return $insert;
    }

    public static function rejectData($id_pengajuan){
        $insert=DB::table('tb_pengajuan')
        ->where('id_pengajuan', $id_pengajuan)
        ->update([
            'approved_by' => Auth::user()->name,
            'approved_date' => date('Y-m-d'),
            'status' => 'DITOLAK'
        ]);

        return $insert;
    }
}
