<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Charts\UserChart;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Book;
use App\Models\ViolationForm;
use App\Models\BorrowForm;
use App\Models\Notify;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::select('id', 'created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });

        $months = [];
        $monthCount = array_fill(1, 12, 0);
        $violateCount = array_fill(1, 12, 0);

        foreach($data as $month => $values){
            //convert months to number <3 good things hehe
            $months[] = date('m',strtotime($month));
            $monthCount[(int)(date('m',strtotime($month)))] = count($values);
        }

        $violations = ViolationForm::select('id', 'created_at')->get()->groupBy(function($violate){
            return Carbon::parse($violate->created_at)->format('M');
        });

        foreach($violations as $month => $values){
            //convert months to number <3 good things hehe
            $violateCount[(int)(date('m',strtotime($month)))] = count($values);
        }


        $borrows = BorrowForm::select('id', 'created_at')->get()->groupBy(function($violate){
            return Carbon::parse($violate->created_at)->format('M');
        });

        foreach($borrows as $month => $values){
            //convert months to number <3 good things hehe
            $violateCount[(int)(date('m',strtotime($month)))] = count($values);
        }

        // return $monthCount;

        return view('management.librarian.exchange.index', compact('monthCount', 'violateCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
