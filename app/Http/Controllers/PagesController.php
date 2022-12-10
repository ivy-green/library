<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Charts\UserChart;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Book;
use App\Models\BookTitle;
use App\Models\BookHead;
use App\Models\Category;
use App\Models\Authors;
use App\Models\Notify;

class PagesController extends Controller
{
    public function home()
    {
        //
        if(Auth::user()->maquyen != 2){
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
        } else {
            $data = [];

            // $booktitles = BookTitle::skip(0)->take(10)->get();
            $booktitles = BookTitle::all();
            $categories = Category::all();
            $authors = Authors::all();

            //count borrow
            // $borrow = 0;
            foreach($booktitles as $bt){
                $bhid = BookHead::where('mats', '=', $bt->id)->pluck('id')->first();
                //find book id with tinh trang = 0
                $bCount = Book::where('tinhtrang', '=', 1)->where('mads', '=', $bhid)
                    ->orderby('mads')->count();
                if($bCount > 0) {
                    $borrow = $bCount;
                    //số lượng sách còn lại chưa đưuọc mượn
                    $remain = Book::where('tinhtrang', '=', 0)->where('mads', '=', $bhid)
                        ->orderby('mads')->count();
                    if($remain > 0) {
                        //add data
                        $data[] = (object) [
                            'tents' => $bt->tents,
                            'theloai' => $categories[$bt->theloai - 1]->tentl,
                            'tacgia' => $authors[$bt->tacgia - 1]->tentg,
                            'luotmuon' => $bCount,
                            'conlai' => $remain
                        ];
                    }
                }
            }

            // dd($data);

            return view('pages.home', compact('data'));
        }
    }

    public function rule()
    {
        return view('pages.rule');
    }

    public function notify()
    {
        $notifications = Notify::all();
        $users = User::all();
        return view('pages.notify', compact('users', 'notifications'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
