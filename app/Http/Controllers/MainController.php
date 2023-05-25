<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use LiqPay;

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
        

        //telegram
        // https://api.telegram.org/bot  token  /sendMessage?text=Hello
        $data = [
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'text' => "$name \r\n $email \r\n $message"
        ];
        
        $ch = curl_init('https://api.telegram.org/bot' . env('TELEGRAM_BOT') . '/sendMessage?' . http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);

        // send email
        Mail::to('kudriashova.ag@gmail.com')->send(new ContactEmail($name, $email, $message));
        // return redirect('/contacts');
        return back()->with('success', 'Thank you!');
    }


    public function category(Category $category)
    {
        $products = Product::where('category_id', $category->id)->paginate(24);
        return view('category', compact('category', 'products'));
    }

    public function product(Product $product)
    {
        return view('product', compact('product'));
    }


    public function checkout()
    {
        $public_key = env('LIQPAY_PUBLIC');
        $private_key = env('LIQPAY_PRIVATE');

        $order_id = time();

        $liqpay = new LiqPay($public_key, $private_key);
        $html = $liqpay->cnb_form(array(
                'action'         => 'pay',
                'amount'         => '1',
                'currency'       => 'UAH',
                'description'    => 'description text',
                'order_id'       => $order_id,
                'version'        => '3',
                'result_url'     => 'http://example-app/api/pay?order_id=' . $order_id
        ));

        return view('checkout', compact('html'));

    }

    public function pay(Request $request)
    {

        $private_key = env('LIQPAY_PRIVATE');
        $public_key = env('LIQPAY_PUBLIC');

        $sign = base64_encode(sha1(
            $private_key .
            $request->data .
                $private_key,
            1
        ));

        if($sign === $request->signature){

            $liqpay = new LiqPay($public_key, $private_key);
            $res = $liqpay->api("request", array(
                'action'        => 'status',
                'version'       => '3',
                'order_id'      => $request->order_id
            ));
            dd($res->status );
        }
        else{
            dd('Error');
        }
    }





}
