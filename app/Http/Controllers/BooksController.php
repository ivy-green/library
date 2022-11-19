<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookTitle;
use App\Models\BookHead;
use App\Models\Book;
use App\Models\Category;
use App\Models\Authors;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 

use Carbon\Carbon;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $bookheads = BookHead::all();
        $booktitles = BookTitle::all();
        $authors = Authors::all();
        $categories = Category::all();
        return view('management.librarian.books.index', compact('books', 'categories', 'authors', 'booktitles', 'bookheads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Authors::all();
        $categories = Category::all();
        return view('management.librarian.books.create')
            ->with('categories', $categories)
            ->with('authors', $authors);
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
            'tensach' => 'required',
            'trigia' => 'required',
            'soluong' => 'required',
        ]);

        $book = Book::where(
            [
                ['tensach', '=', $request->input('tensach')], 
                ['matheloai', '=', $request->get('categoryid')],
                ['matacgia', '=', $request->get('authorid')], 
            ])->first();
        // check if exists
        if($book != null) {
            $book->soluong += $request->input('soluong');
        } else {
            $book = new Book;
            $book->tensach = $request->input('tensach');
            $book->trigia = $request->input('trigia');
            $book->soluong = $request->input('soluong');
            $book->matheloai = $request->get('categoryid');
            $book->matacgia = $request->get('authorid');
            $book->created_at = $currentTime;
    
            if($request->hasFile('anhbia')){
                $file = $request->file('anhbia');
                $extension = $file->getClientOriginalExtension();
                $filename = time().".".$extension;
                //luu anh trong muc uploads
                $file->move('uploads/books/', $filename);
                //gan gia tri
                $book->anhbia = $filename;
            } else {
                $book->anhbia = 'default.png';
            }

        }

        $book->save();

        return redirect('/books')->with('success', 'Đã thêm thành công');
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
        $authors = Authors::find($id);
        $categories = Category::find($id);
        return view('management.librarian.books.show')
            ->with('book', $book)
            ->with('categories', $categories)
            ->with('authors', $authors);
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
        $authors = Authors::all();
        $categories = Category::all();
        return view('management.librarian.books.edit')
            ->with('book', $book)
            ->with('categories', $categories)
            ->with('authors', $authors);
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
            'tensach' => 'required',
            'trigia' => 'required',
            'anhbia' => 'optional|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $book = Book::find($id);
        $book->tensach = $request->input('tensach');
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
        $book->update_at = $currentTime;

        $book->save();

        return redirect('/books')->with('success', 'Đã chỉnh sửa thành công');
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
        File::delete(public_path('uploads/books/' . $book->anhbia));
        $book->delete();
        return redirect('/books')->with('success', 'Đã xóa thành công');
    }
}
