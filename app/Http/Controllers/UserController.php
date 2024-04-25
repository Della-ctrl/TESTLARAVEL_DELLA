<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
        $data = User::getData();
        //dd($data);
        return view('user.index',compact('data'));
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => 'required',
        ]);
        
        User::create($request->all());
         
        return redirect()->route('user.index')
                        ->with('success','Data created successfully.');
    }

    public function show($id){
        $data = DB::table('users')->where('id', $id)->get();
        $user = $data[0];
        return view('user.show',compact('user'));
    }

    public function edit($id){
        $data = DB::table('users')->where('id', $id)->get();
        $user = $data[0];

        return view('user.edit',compact('user'));
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => 'required',
        ]);
        
        User::updateData($request->all());
         
        return redirect()->route('user.index')
                        ->with('success','Data updated successfully.');
    }

    public function destroy($id){
        $delete = DB::table('users')->where('id', $id)->delete();

        return redirect()->route('user.index')
                        ->with('success','Data deleted successfully.');
    }
}
