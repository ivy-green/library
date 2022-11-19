<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Charts\UserChart;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function home()
    {
        $data = Book::select('id', 'created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });

        $months = [];
        $monthCount = array_fill(1, 12, 0);

        foreach($data as $month => $values){
            //convert months to number <3 good things hehe
            $months[] = date('m',strtotime($month));
            $monthCount[(int)(date('m',strtotime($month)))] = count($values);
        }

        // return $monthCount;

        $users = User::pluck('ngaysinh', 'gioitinh');
        $books = Book::all();

        $genderChart = ["Nữ", "Nam"];
        $ageAverage = array();

        $gender = $users->keys()->toArray();
        $birthday = $users->values();

        $age = array();    
        //calculate age of each member
        foreach($birthday as $day){
            array_push($age, Carbon::parse($day)->age);
        }

        //categorize it by gender
        if(count($gender) > 0) {
            $femaleAge = 0;
            $maleAge = 0;
            $Fcount = 0;
            $Mcount = 0;
            for($i = 0; $i < count($gender); $i++){
                if($gender[$i] == 1) {
                    $femaleAge += $age[$i];
                    $Fcount++;
                } else {
                    $maleAge += $age[$i];
                    $Mcount++;
                }
            }

            if($Fcount != 0 && $Mcount != 0) array_push($ageAverage, $femaleAge / $Fcount, $maleAge / $Mcount);  
            else if($Fcount != 0) array_push($ageAverage, $femaleAge / $Fcount, 0);
            else array_push($ageAverage, 0, $maleAge / $Mcount);   
        }

        return view('pages.home', compact('users', 'books', 'ageAverage', 'genderChart', 'monthCount'));

    }

    public function about()
    {
        return view('pages.about');
    }

    public function index()
    {
        return view('pages.index');
    }
}
