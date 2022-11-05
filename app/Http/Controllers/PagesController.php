<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;

class PagesController extends Controller
{
    public function home()
    {
        $users = User::all();
        $books = Book::all();
        return view('pages.home', compact('users', 'books'));
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
