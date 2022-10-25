<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::select('select * from book');
        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
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
            'tensach' => 'required',
            'ngaynhap' => 'required',
            'trigia' => 'required',
            'anhbia' => 'required'
        ]);
        
        $book = new Book;
        $book->tensach = $request->input('tensach');
        $book->ngaynhap = $request->input('ngaynhap');
        $book->trigia = $request->input('trigia');
        if($request->hasFile('anhbia')){
            $file = $request->file('anhbia');
            $extension = $file->getClientOriginalExtension();
            $filename = time().".".$extension;
            //luu anh trong muc uploads
            $file->move('uploads/books/', $filename);
            //gan gia tri
            $book->anhbia = $filename;
        }else{
        }
        $book->save();

        return redirect('/book')->with('success', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit')->with('book', $book);
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
            'tensach' => 'required',
            'ngaynhap' => 'required',
            'trigia' => 'required',
            'anhbia' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $book = Book::find($id);
        $book->tensach = $request->input('tensach');
        $book->ngaynhap = $request->input('ngaynhap');
        $book->trigia = $request->input('trigia');
        if($request->hasFile('anhbia')){
            $file = $request->file('anhbia');
            $extension = $file->getClientOriginalExtension();
            $filename = time().".".$extension;
            //luu anh trong muc uploads
            $file->move('uploads/books/', $filename);
            //gan gia tri
            $book->anhbia = $filename;
        }
        $book->save();

        return redirect('/book')->with('success', 'Đã chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/book')->with('success', 'Đã xóa thành công');;
    }
}
