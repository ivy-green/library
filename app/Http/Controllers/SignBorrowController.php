<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignForm;
use App\Models\SignFormDetail;
use App\Models\User;
use App\Models\Lang;
use App\Models\BookTitle;
use App\Models\BookHead;


class SignBorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signforms = SignForm::all();
        $users = User::all();
        return view('management.librarian.exchange.signborrow.index',
         compact('signforms', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $signforms = SignForm::all();

        return view('management.librarian.exchange.signborrow.create', compact('signforms'));
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
        $signform = SignForm::find($id);
        $signformdetails = SignFormDetail::where('maphieu', '=', $signform->id)->get();
        $users = User::all();
        $bhead = BookHead::all();
        $btitle = BookTitle::all();
        $lang = Lang::all();

        return view('management.librarian.exchange.signborrow.show', 
            compact('signform', 'signformdetails', 'users', 'btitle', 'bhead', 'lang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('management.librarian.exchange.signborrow.edit');
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
        //
    }
}
