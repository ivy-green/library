<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currentTime = Carbon::now();

        $this->validate($request, [
            'ten' => 'required',
            'email' => 'required',
            'gioitinh' => 'required',
            'ngaysinh' => 'required',
            'dienthoai' => 'required',
            'diachi' => 'required',
        ]);
        
        $user = new User;
        $user->ten = $request->input('ten');
        $user->email = $request->input('email');
        $user->gioitinh = $request->input('gioitinh');
        $user->ngaysinh = $request->input('ngaysinh');
        $user->dienthoai = $request->input('dienthoai');
        $user->diachi = $request->input('diachi');
        $user->password = bcrypt('123456789');

        if($request->hasFile('anhdaidien')){
            $file = $request->file('anhdaidien');
            $extension = $file->getClientOriginalExtension();
            $filename = time().".".$extension;
            //luu anh trong muc uploads
            $file->move('uploads/users/', $filename);
            //gan gia tri
            $user->anhdaidien = $filename;
        }
        $user->create_at = $currentTime;

        $user->save();

        return redirect('/user')->with('success', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $currentTime = Carbon::now();

        $this->validate($request, [
            'ten' => 'required',
            'gioitinh' => 'required',
            'ngaysinh' => 'required',
            'dienthoai' => 'required',
            'diachi' => 'required',
        ]);
        
        $user = new User;
        $user->ten = $request->input('ten');
        $user->gioitinh = $request->input('gioitinh');
        $user->ngaysinh = $request->input('ngaysinh');
        $user->dienthoai = $request->input('dienthoai');
        $user->diachi = $request->input('diachi');

        if($request->hasFile('anhdaidien')){
            $file = $request->file('anhdaidien');
            $extension = $file->getClientOriginalExtension();
            $filename = time().".".$extension;
            //luu anh trong muc uploads
            $file->move('uploads/users/', $filename);
            //gan gia tri
            $user->anhdaidien = $filename;
        }
        $user->create_at = $currentTime;

        $user->save();

        return redirect('/user')->with('success', 'Đã thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success', 'Đã xóa thành công');
    }
}
