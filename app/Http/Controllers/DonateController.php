<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function donate()
    {
        return view('user.donate');
    }
    public function insert(Request $request){
        $donate = new Donation();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('assets/uploads/donations',$fileName);
            $donate->image = $fileName;
        }
        $donate->category_name = $request->input('category_name');
        $donate->book_name = $request->input('book_name');
        $donate->author_name = $request->input('author_name');
        $donate->author_name = $request->input('author_name');
        $donate->description = $request->input('description');
        $donate->pickup = $request->input('pickup');
        $donate->dropdate = $request->input('dropdate');
        $donate->save();
        return redirect('/home')->with('status', 'Thanks for donating us!!');
    }
}
