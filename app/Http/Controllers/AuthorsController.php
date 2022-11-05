<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authors;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Authors::all();
        return view('management.librarian.authors.index')->with('authors', $authors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.librarian.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tentacgia' => 'required',
            'ngaysinh' => 'required',
            'gioitinh' => 'required',
            'soluongsach' => 'required',
        ]);
        
        $author = new Authors;
        $author->tentacgia = $request->input('tentacgia');
        $author->ngaysinh = $request->input('ngaysinh');
        $author->gioitinh = $request->input('gioitinh');
        $author->soluongsach = $request->input('soluongsach');

        // if($request->hasFile('anhbia')){
        //     $file = $request->file('anhbia');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().".".$extension;
        //     //luu anh trong muc uploads
        //     $file->move('uploads/authors/', $filename);
        //     //gan gia tri
        //     $author->anhbia = $filename;
        // }else{
        // }
        $author->save();

        return redirect('management/librarian/authors')->with('success', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Authors::find($id);
        return view('management.librarian.authors.show')->with('author', $author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Authors::find($id);
        return view('management.librarian.authors.edit')->with('author', $author);
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
        $this->validate($request, [
            'tentacgia' => 'required',
            'ngaysinh' => 'required',
            'gioitinh' => 'required',
        ]);
        
        $author = Authors::find($id);
        $author->tentacgia = $request->input('tentacgia');
        $author->ngaysinh = $request->input('ngaysinh');
        $author->gioitinh = $request->input('gioitinh');

        // if($request->hasFile('anhbia')){
        //     $file = $request->file('anhbia');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().".".$extension;
        //     //luu anh trong muc uploads
        //     $file->move('uploads/authors/', $filename);
        //     //gan gia tri
        //     $author->anhbia = $filename;
        // }else{
        // }
        $author->save();

        return redirect('management/librarian/authors')->with('success', 'Đã thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Authors::find($id);
        $author->delete();
        return redirect('management/librarian/authors')->with('success', 'Đã xóa thành công');
    }
}
