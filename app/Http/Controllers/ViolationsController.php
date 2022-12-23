<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViolationForm;
use App\Models\User;
use App\Models\Book;
use App\Models\BorrowForm;
use App\Models\BorrowFormDetail;

class ViolationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $bforms = BorrowForm::all();
        $violations = ViolationForm::all();
        return view('management.librarian.violations.index', compact('violations', 'users', 'bforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.librarian.violations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)   
    {
        $violation = ViolationForm::find($id);
        $bform = BorrowForm::where('id', '=', $violation->maphieu)->first();
        $details = BorrowFormDetail::where('maphieu', '=', $bform->id)->get();
        // dd($bform->phieuvp);
        $user = User::where('id', '=', $bform->madg)->first();
        $books = Book::all();

        return view('management.librarian.violations.show',
         compact('violation', 'bform', 'user', 'details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $violation = ViolationForm::find($id);
        $bform = BorrowForm::where('id', '=', $violation->maphieu)->first();
        $books = Book::all();
        $user = User::where('id', '=', $bform->madg)->first();

        return view('management.librarian.violations.edit', 
        compact('books', 'violation', 'bform', 'user'));
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
            'tientra' => 'numeric|between:100,10000000'
        ]);

        $violation = ViolationForm::find($id);
        $tienvp = $violation->tienvipham;
        $dathanhtoan = $violation->dathanhtoan;
        $tientra = $request->input('tientra');

        // dd($tientra + $dathanhtoan > $tienvp);
        if($tientra + $dathanhtoan <= $tienvp) {
            $violation->dathanhtoan = $dathanhtoan + $tientra;
            $violation->save();
            return redirect()->route('violations')->with('success', 'Đã cập nhật thành công');
        }
        
        else return redirect()->route('violations.edit', $id)->with('error', 'Tổng tiền thu không được lớn hơn tiền vi phạm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
