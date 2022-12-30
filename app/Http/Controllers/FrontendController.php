<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::all();
        $books = Book::where('trending','1')->get();
        $academics = Book::where('cat_id','6')->get();
        $fictionals = Book::where('cat_id','8')->get();
        $all = Book::all();
        try{
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            return view('index',compact('books','academics','fictionals','all','categories','cart'));
        }catch(Exception $e){
            return view('index',compact('books','academics','fictionals','all','categories'));
        }
    }
    public function trending(){
        $categories = Category::all();
        $books = Book::where('trending','1')->get();
        try{
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            return view('view-all',compact('books','categories','cart'));
        }catch(Exception $e){
            return view('view-all',compact('books','categories'));
        }
    }
    public function academics(){
        $categories = Category::all();
        $books = Book::where('cat_id','6')->get();
        try{
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            return view('view-all',compact('books','categories','cart'));
        }catch(Exception $e){
            return view('view-all',compact('books','categories'));
        }
    }
    public function fictionals(){
        $categories = Category::all();
        $books = Book::where('cat_id','8')->get();
        try{
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            return view('view-all',compact('books','categories','cart'));
        }catch(Exception $e){
            return view('view-all',compact('books','categories'));
        }
    }
    public function allBooks(){
        $categories = Category::all();
        $books = Book::all();
        try{
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            return view('view-all',compact('books','categories','cart'));
        }catch(Exception $e){
            return view('view-all',compact('books','categories'));
        }
    }
    public function categoryWise($id){
        $categories = Category::all();
        $books = Book::where('cat_id',$id)->get();
        try{
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            return view('view-all',compact('books','categories','cart'));
        }catch(Exception $e){
            return view('view-all',compact('books','categories'));
        }
    }
    public function single($id){
        $categories = Category::all();
        $book = Book::where('id',$id)->first();
        $trendings = Book::where('trending','1')->get();
        try{
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            return view('single-product',compact('categories','book','trendings','cart'));
        }catch(Exception $e){
            return view('single-product',compact('categories','book','trendings'));
        }
    }

}