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
            'tensach' => 'required',
        ]);

        $book = new Book;
        $booktitle = new BookTitle;
        $bookhead = new BookHead;
        $currentTime = Carbon::now();
        //kiểm tra có sách nào hợp lệ và đưuọc lưu trong chi tiết phiếu
        $hasBook = false;
        $bookName = $request->input('tensach');

        $btitleID = BookTitle::where('tents', '=', strtolower($bookName))
            ->where('theloai', '=', $request->matl[0])
            ->where('tacgia', '=', $request->matg[0])
            ->pluck('id')->first();
        if($request->bia[0] == "0"){
            $bia = "bìa mềm";
        } else $bia = "bìa cứng";
        //sách chưa tồn tại -> thêm tựa sách
        if($btitleID) {
            
            //kiểm tra xem đầu sách đó có tồn tại chưa 
            $bheadID = BookHead::where('mats', '=', $btitleID)
                ->where('ngonngu', '=', '2')
                ->where('bia', '=', $bia)
                ->where('nhaxb', '=', strtolower($request->input('nhaxb')))
                ->pluck('id')->first();
                // dd($btitleID, $bheadID);
            if($bheadID) {
                //có tồn tại
                //tạo sách mới là xong
                echo 'do not create book head';
            } else {
                //không tồn tại => tạo mới
                $bookhead->nhaxb = $request->input('nhaxb');
                $bookhead->bia = $bia;
                $bookhead->ngonngu = $request->ngonngu[0];
                $bookhead->mats = $btitleID;

                $bookhead->save();

                $bheadID = $bookhead->id;
            }

        } else {
            //tạo mới tựa sách
            $booktitle->theloai = $request->matl[0];
            $booktitle->tacgia = $request->matg[0];
            $booktitle->tents = strtolower($request->input('tensach'));

            $booktitle->save();
            //tạo mới đầu sách
            $bookhead->nhaxb = $request->input('nhaxb');

            $bookhead->bia = $bia;
            $bookhead->ngonngu = $request->ngonngu[0];
            $bookhead->mats = $booktitle->id;

            $bookhead->save();

            //define booktitleID and bookheadID
            $btitleID = $booktitle->id;
            $bheadID = $bookhead->id;

        }

        //tạo sách mới
        if(isset($btitleID)){
            if(isset($bheadID)){
                // dd($btitleID, $bheadID);
                $book->mads = $bheadID;
                $book->tinhtrang = 0;

                $book->save();

                $book->masach = 's'. $book->id;
            }
        }
        // dd($btitleID);
        return redirect()->route('books.show', $btitleID)->with('success', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $booktitle = BookTitle::find($id);
        $bookhead = BookHead::where('mats', '=', $id)->first();
        if($bookhead){
            $book = Book::where('mads', '=', $bookhead->id)->get();
            $authors = Authors::find($id);
            // $category = Category::find($id);
    
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
        else {
            return view('management.librarian.books.show', compact('booktitle', 'categories'));
        }
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
        $categories = Category::all();
        $bookhead = BookHead::where('mats', '=', $book->mads)->first();
        $booktitle = BookTitle::find($bookhead->mats);

        // $book = Book::where('mads', '=', $bookhead->id)->get();
        $author = Authors::find($booktitle->tacgia);
        $authors = Authors::all();
        $category = Category::find($booktitle->tacgia);
        $categories = Category::all();

        return view('management.librarian.books.edit', 
        compact('book', 'bookhead', 'booktitle', 'category', 'author', 'authors', 'categories'));
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
