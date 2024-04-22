<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
	public function thanhtoan(){
	    if(Auth::check()){
    		$user = Auth::user();
    		$cartItems = Cart::content();
		return view('user.thanhtoan',compact('user', 'cartItems'));
	    }else{
		Session::put('url.intended', route('thanhtoan'));
		return view('user.dangnhap');
	    }
	}
	public function thanhtoanPost(Request $request)
    	{
            $request->validate([
    		'fullname' => 'required',
		'email' => 'required|email',
		'phone' => 'required|numeric',
		'address' => 'required',
		'notes' => 'nullable',
		'method' => ''
    	]);
	    $data['username'] = Auth::user()->username;
	    $data['fullname'] = $request->fullname;
	    $data['time'] = Carbon::now();	
	    $data['total'] = str_replace(',','',Cart::total());
	    $data['amount'] = Cart::count();
	    $data['phone'] = $request->phone;
	    $data['address'] = $request->address;
	    $data['note'] = $request->notes;
	    $data['method']= $request->method;
	    //$data['completed_by'] = $request->completed_by;
	    $order = new Order();
	    $orderDetail = $order->saveOrder($data);
            if(!$orderDetail){
		return redirect()->route('thanhtoan')->withInput()->withErrors(['error'=>'Payment failed']);
	    }else{
		/*foreach (Cart::content() as $item) {
           	   $order->orderDetails()->create([
            		'product_id' => $item->id,
            		'quantity' => $item->qty,
            		'price' => $item->price
        	   ]);
    		}
    		Cart::destroy();*/
		return redirect()->intended(route('trangchu'));
	    }
         }
}