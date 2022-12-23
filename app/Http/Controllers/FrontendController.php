<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class FrontendController extends Controller
{
    public function index(){
        $books = Book::where('trending','1')->get();
        $academics = Book::where('cat_id','6')->get();
        $fictionals = Book::where('cat_id','8')->get();
        return view('index',compact('books','academics','fictionals'));
    }
}