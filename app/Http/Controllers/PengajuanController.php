<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class PengajuanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
        $data = Pengajuan::getData();
        //dd($data);
        return view('pengajuan.index',compact('data'));
    }

    public function create(){
        $barang = Barang::getData();

        return view('pengajuan.create',compact('barang'));
    }

    public function store(Request $request){
        $request->validate([
            'id_barang' => 'required',
            'keterangan' => 'required',
        ]);
        
        Pengajuan::create($request->all());
         
        $detail = [
            'nama_barang' => '',
            'keterangan' => $request->keterangan,
            'created_by' => Auth::user()->name,
            'created_date' => date('Y-m-d'),
            'status' => 'DIAJUKAN'
        ];
        //send email to spv
        $data = [
            'name' => 'Pengajuan Stationary',
            'detail' => $detail
        ];
        Mail::to(Auth::user()->email)->send(new SendEmail($data));

        return redirect()->route('pengajuan.index')
                        ->with('success','Data created successfully.');
    }

    public function show($id){
        $data = DB::select("select a.*, b.nama_barang from tb_pengajuan a
        left join mst_barang b on a.id_barang = b.id_barang
        where id_pengajuan = '".$id."'");
        $pengajuan = $data[0];
        return view('pengajuan.show',compact('pengajuan'));
    }

    public function edit($id){
        $data = DB::table('tb_pengajuan')->where('id_pengajuan', $id)->get();
        $pengajuan = $data[0];
        $barang = Barang::getData();

        return view('pengajuan.edit',compact('pengajuan','barang'));
    }

    public function update(Request $request){
        $request->validate([
            'id_barang' => 'required',
            'keterangan' => 'required',
        ]);
        
        Pengajuan::updateData($request->all());
         
        return redirect()->route('pengajuan.index')
                        ->with('success','Data updated successfully.');
    }

    public function destroy($id){
        $delete = DB::table('tb_pengajuan')->where('id_pengajuan', $id)->delete();

        return redirect()->route('pengajuan.index')
                        ->with('success','Data deleted successfully.');
    }

    public function approve($id){
        Pengajuan::approvedData($id);
        
        //send email to requester
        $pengajuan = DB::select("select a.*, b.nama_barang from tb_pengajuan a
        left join mst_barang b on a.id_barang = b.id_barang where id_pengajuan = '".$id."'");
        $pe = $pengajuan[0];
        
        $detail = [
            'nama_barang' => $pe->nama_barang,
            'keterangan' => $pe->keterangan,
            'approved_by' => Auth::user()->name,
            'approved_date' => date('Y-m-d'),
            'status' => 'DISETUJUI'
        ];
        
        $body = "Dear Bapak / Ibu, pengajuan Stationary telah diapproved oleh SPV, Terima Kasih";
        $data = [
            'name' => 'Pengajuan Stationary',
            'body' => $body,
            'detail' => $detail
        ];
        Mail::to(Auth::user()->email)->send(new SendEmail($data));

        return redirect()->route('pengajuan.index')
                        ->with('success','Data updated successfully.');
    }

    public function reject($id){
        Pengajuan::rejectData($id);

        //send email to requester
        $pengajuan = DB::select("select a.*, b.nama_barang from tb_pengajuan a
        left join mst_barang b on a.id_barang = b.id_barang where id_pengajuan = '".$id."'");
        $pe = $pengajuan[0];
        
        $detail = [
            'nama_barang' => $pe->nama_barang,
            'keterangan' => $pe->keterangan,
            'approved_by' => Auth::user()->name,
            'approved_date' => date('Y-m-d'),
            'status' => 'DITOLAK'
        ];
        
        $body = "Dear Bapak / Ibu, pengajuan Stationary tidak disetujui oleh SPV, Terima Kasih";
        $data = [
            'name' => 'Pengajuan Stationary',
            'body' => $body,
            'detail' => $detail
        ];
        Mail::to(Auth::user()->email)->send(new SendEmail($data));

        return redirect()->route('pengajuan.index')
                        ->with('success','Data updated successfully.');
    }

    public function print($id)
    {

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', -1);

        $no_pengajuan = base64_decode($id);

        $mpdf = new \Mpdf\Mpdf();
        $pages = 1;
        $mpdf->AddPage ( 'p','','1', 'i','on', 
                    '','','',20,'', 
                    '','','','', 
                    '','','','','','',('A4'));
        $mpdf->SetFont('Arial',12);

        //data
        $data_ = DB::select("select a.*, b.nama_barang from tb_pengajuan a
        left join mst_barang b on a.id_barang = b.id_barang where id_pengajuan = '".$id."'");
        $data = $data_[0];

        $mpdf->WriteText(70,10,'SURAT PENGAMBILAN BARANG');
        $mpdf->WriteText(15,20,'Mohon dapat disediakan barang dengan detail seperti berikut.');
        $mpdf->WriteText(15,40,'Nama Barang');
        $mpdf->WriteText(45,40,':');
        $mpdf->WriteText(50,40, $data->nama_barang); 
        $mpdf->WriteText(15,50,'Jumlah Barang');
        $mpdf->WriteText(45,50,':');
        $mpdf->WriteText(50,50, number_format($data->jumlah, 0, ",", "."),0,0,'L',0); 
        $mpdf->WriteText(15,60,'Keterangan');
        $mpdf->WriteText(45,60,':'); 
        $mpdf->WriteText(50,60, $data->keterangan); 
        $mpdf->WriteText(15,70,'Diajukan oleh'); 
        $mpdf->WriteText(45,70,':');
        $mpdf->WriteText(50,70, $data->created_by); 
        $mpdf->WriteText(15,80,'Disetujui oleh'); 
        $mpdf->WriteText(45,80,':'); 
        $mpdf->WriteText(50,80, $data->approved_by);



        $mpdf->Output("Surat Pengambilan Barang_". date('YmdHis') .".pdf", 'I');
        exit;
    }
}
