<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookTitle;
use App\Models\BookHead;
use App\Models\Book;
use App\Models\BorrowFormDetail;
use App\Models\BorrowForm;
use App\Models\Reader;
use App\Models\ReaderType;
use App\Models\Category;
use App\Models\Authors;
use App\Models\User;
use App\Models\Lang;


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
     * Show the book for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Authors::all();
        $categories = Category::all();
        $bookheads = BookHead::all();
        $booktitles = BookTitle::all();
        $books = Book::all();
        $users = User::all();
        $langs = Lang::all();
        return view('management.librarian.books.create', 
        compact('categories', 'authors', 'bookheads', 'booktitles', 'books', 'users', 'langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkExists(){
        $data = request()->tents; // get data to check
        $model = new BookTitle();
        $where = ['tents' => $data]; // passing your where condition to check
        // dd($model->where($where)->get()->count() > 0);
        return $model->where($where)->get()->count() > 0;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'madg' => 'required',
            'matt' => 'required',
        ]);

        $book = new Book;
        $booktitle = new BookTitle;
        $currentTime = Carbon::now();
        //kiểm tra có sách nào hợp lệ và đưuọc lưu trong chi tiết phiếu
        $hasBook = false;

        //add to book detail
        foreach($request->all() as $key => $value){

            //với mỗi cuốn sách
            if($key == "booknames") {
                // dd($value[0]['BN'], $value[0]['bia'], $value[0]['ngonngu']);

                //kiểm tra xem sách có tồn tại trong bảng tựa sách hay không
                $btitleID = BookTitle::where('tents', '=', $value[0]['BN'])->pluck('id')->first();
                
                //sách chưa tồn tại -> thêm tựa sách
                if(!$btitleID) {


                    //check if dausach exists (ngonngu along with tuasach)
                    //kiểm tra ngôn ngữ và tựa sách có hợp lệ trong bảng đầu sách hay không
                    $bheadID = BookHead::where('ngonngu', '=', $value[0]['ngonngu'] + 1)
                        ->pluck('id')->first();

                    $book = Book::where('mads', '=', $bheadID + 1)
                        ->where('tinhtrang', '=', 0)
                        ->first();
                    
                    //kiểm tra đầu sách coi có hong
                    if($bheadID) {
                        
                    }

                }

            }
        }

        // return redirect()->route('borrow.book');
        $id = $book->id;

        return redirect()->route('borrow.show', ['borrow' => $id])->with('success', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booktitle = BookTitle::find($id);
        $bookhead = BookHead::where('mats', '=', $id)->first();
        $book = Book::where('mads', '=', $bookhead->id)->get();
        // dd(count($book));
        $authors = Authors::find($id);
        $categories = Category::find($id);

        //đọc giả đang mượn tựa sách này
        // $users = User::all();
        $users = [];
        $idx = 0;
        $borrowbooks = BorrowFormDetail::where('mads', '=', $bookhead->id);
        foreach($borrowbooks as $borrowbook){
            $userid = BorrowForm::where('id', '=', $borrowbook->maphieu)->pluck('madg');
            if(!in_array($userid, $users)) {
                $users[] = User::where('id', '=', $userid)->get();
            }
        }
        // echo $users[0];

        return view('management.librarian.books.show',
         compact('book', 'categories', 'authors', 'bookhead', 'booktitle', 'users', 'borrowbooks'));
    }

    /**
     * Show the book for editing the specified resource.
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
