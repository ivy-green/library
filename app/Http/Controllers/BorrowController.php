<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowForm;
use App\Models\BorrowFormDetail;
use App\Models\User;
use App\Models\Reader;
use App\Models\ReaderType;
use App\Models\BookTitle;
use App\Models\BookHead;
use App\Models\Book;
use App\Models\Category;
use App\Models\Lang;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BorrowController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookforms = BorrowForm::all();
        $users = User::all();
        return view('management.librarian.exchange.borrow.index', compact('bookforms', 'users'));
        // return redirect()->route('borrow')->with([
        //     'bookforms' => $bookforms,
        //     'users' => $users,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booktitles = BookTitle::all();
        $bookheads = BookHead::all();
        $books = Book::all();
        $users = User::all();
        $langs = Lang::all();

        return view('management.librarian.exchange.borrow.create',
         compact('booktitles', 'bookheads', 'books', 'users', 'langs'));
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
            'madg' => 'required',
            'matt' => 'required',
        ]);

        $form = new BorrowForm;
        $currentTime = Carbon::now();
        //kiểm tra có sách nào hợp lệ và đưuọc lưu trong chi tiết phiếu
        $hasBook = false;

        $form->madg = $request->input('madg');
        $form->matt = $request->input('matt');
        $id = BorrowForm::orderBy('id', 'desc')->pluck('id')->first();
        $form->maphieu = strval((int)$id + 1);
        //check type of docgia to determine 'ngaytra'
        //kiểm tra loại độc giả để phân loại gày mượn (7 hay 14 ngày)
        $typeOfUser = Reader::where('madg', '=', $request->input('madg'))->pluck('loaidg')->first();
        $dayReturn = ReaderType::where('id', '=', $typeOfUser)->pluck('ngaytra')->first();
        //set 'ngaytra'
        //lưu ngày trả dự kiến trong bảng phiếu mượn trả
        // $formDetails->ngaytra = $currentTime->addDays($dayReturn);
        $form->ngaytradukien = $currentTime->addDays($dayReturn);
        $form->save();

        //add to form detail
        foreach($request->all() as $key => $value){

            //với mỗi cuốn sách
            if($key == "booknames") {
                // dd($value[0]['BN'], $value[0]['bia'], $value[0]['ngonngu']);
                $formDetails = new BorrowFormDetail;

                //kiểm tra xem sách có tồn tại trong bảng tựa sách hay không
                $btitleID = BookTitle::where('tents', '=', $value[0]['BN'])->pluck('id')->first();
                
                if($btitleID) {
                    //check if dausach exists (ngonngu along with tuasach)
                    //kiểm tra ngôn ngữ và tựa sách có hợp lệ trong bảng đầu sách hay không
                    $bheadID = BookHead::where('mats', '=', $btitleID)
                        ->where('ngonngu', '=', $value[0]['ngonngu'] + 1)
                        ->pluck('id')->first();

                    //check if there is any book left to borrow (tinhtrang = 0)
                    //kiểm tra xem còn sách nào chưa được mượn hay không
                    $book = Book::where('mads', '=', $bheadID + 1)
                        ->where('tinhtrang', '=', 0)
                        ->first();
                    

                    if($bheadID) {
                        $hasBook = true;
                        //put data to form details
                        //đưa dữ liệu vào bảng chi tiết phiếu
                        //mỗi cuốn sách được mượn tương ứng với 1 record
                        $formDetails->masach = $book->id;
                        //get maphieu from 'phieumuontra' above
                        //lưu mã phiếu vào bảng chi tiết phiếu
                        $formDetails->maphieu = $form->id;
                        //save record
                        $formDetails->save();   

                        //cập nhật tình trạng cuốn sách đã mượn
                        $book->tinhtrang = 1;
                    }

                }

            }
        }
        // form details has data inside
        if(!$hasBook) {
            $form->delete();
            return redirect()->route('borrow')->with('error', 'Vui lòng nhập sách hợp lệ');
        }

        // return redirect()->route('borrow.form');
        $id = $form->id;

        return redirect()->route('borrow.show', ['borrow' => $id])
            ->with('success', 'Đã thêm thành công');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::all();
        $borrow = BorrowForm::find($id);
        $details = DB::table('ctphieumuontra')->where('maphieu', $id)->get();
        $btitles = BookTitle::all();
        $bheads = BookHead::all();

        return view('management.librarian.exchange.borrow.show',
         compact('details', 'borrow', 'users', 'btitles', 'bheads'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('management.librarian.exchange.borrow.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
