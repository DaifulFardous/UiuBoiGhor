<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::all();
        $books = Book::where('trending','1')->get();
        $academics = Book::where('cat_id','6')->get();
        $fictionals = Book::where('cat_id','8')->get();
        $all = Book::all();
        return view('index',compact('books','academics','fictionals','all','categories'));
    }
    public function trending(){
        $categories = Category::all();
        $books = Book::where('trending','1')->get();
        return view('view-all',compact('books','categories'));
    }
    public function academics(){
        $categories = Category::all();
        $books = Book::where('cat_id','6')->get();
        return view('view-all',compact('books','categories'));
    }
    public function fictionals(){
        $categories = Category::all();
        $books = Book::where('cat_id','8')->get();
        return view('view-all',compact('books','categories'));
    }
    public function allBooks(){
        $categories = Category::all();
        $books = Book::all();
        return view('view-all',compact('books','categories'));
    }
    public function categoryWise($id){
        $categories = Category::all();
        $books = Book::where('cat_id',$id)->get();
        return view('view-all',compact('books','categories'));
    }
    public function single($id){
        $categories = Category::all();
        $book = Book::where('id',$id)->first();
        $trendings = Book::where('trending','1')->get();
        return view('single-product',compact('categories','book','trendings'));
    }
}
