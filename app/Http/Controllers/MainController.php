<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $title = 'Home Page';
        return view('home', compact('title'));
    }

    public function contacts()
    {
        $title = '<em>Contacts</em>';
        $hotels = [
            ['name'=>'dfgdfg', 'star'=>4],
            ['name' => 'ghfgh', 'star' => 3]
        ];
        return view('contacts', compact('title'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $name = $request->name;
        $email = $request->email;
        $message = $request->message;

        // send email

        // return redirect('/contacts');
        return back()->with('success', 'Thank you!');
    }


    public function category(Category $category)
    {
        $products = Product::where('category_id', $category->id)->paginate(24);
        return view('category', compact('category', 'products'));
    }
}
