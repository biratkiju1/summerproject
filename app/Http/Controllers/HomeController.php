<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;
class HomeController extends Controller
{
    public function index()
    {  
       return view('home.userpage');
    }
    public function redirect()
    {
       $Usertype=Auth::user()->Usertype;
        if($Usertype=="1")
        {
            return view('admin.admin');

        }
        else
        {
            return view('home.userpage'); 
        }
    }
    public function products(){
        return view('product.products');
    }
    public function blog(){
        return view('blog.blog');
    }
    public function contact(){
        return view('contact.contact');
    }
    /*sub nav*/
    public function orders(){
        return view('blog.orders');
    }
    public function chats(){
        return view('blog.chats');
    }
    /*catagorise*/
    public function lipstick(){
        return view('catagorise.lipstick');
    }
    public function bronzer(){
        return view('catagorise.bronzer');
    }
    public function concealer(){
        return view('catagorise.concealer');
    }
    public function Eyeliner(){
        return view('catagorise.Eyeliner');
    }
    public function Eyeshadow(){
        return view('catagorise.Eyeshadow');
    }
    public function foundation(){
        return view('catagorise.foundation');
    }
    public function moisturizer(){
        return view('catagorise.moisturizer');
    }
    public function primer(){
        return view('catagorise.primer');
    }

    public function product(){
        return view('product.product_detail');
    }

    public function cart(){
        $cartItems=DB::table('products')
        ->join('carts','carts.productId','products.id')
        ->select('products.name','products.price','products.quantity as pQuantity','products.image','carts.*')
        ->where('carts.customerId',Auth::id())
        ->get();
        return view('addtocart.cart',compact('cartItems'));
    }
    /*post method function */
   
    public function add_To_Cart(Request $request)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            $request->validate([
                'quantity' => 'required|integer|min:1',
                'id' => 'required|integer|exists:products,id', 
            ]);
            $item = new Cart();
            $item->quantity = $request->input('quantity');
            $item->productId = $request->input('id');
            $item->customerID = Auth::id(); 
            $item->save();
            return redirect()->back()->with('success', 'Item added to cart');
        } else {
            return redirect('login')->with('error', 'Please log in to add items to your cart');
        }
    }
    public function updateCarts(Request $request, $id)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            $request->validate([
                'quantity' => 'required|integer|min:1', 
            ]);
            $item = Cart::find($id);
            if (!$item) {
                return redirect()->back()->with('error', 'Cart item not found');
            }
            $item->quantity = $request->input('quantity');
            $item->save();
            return redirect()->back()->with('success', 'Cart item updated successfully');
        } else {
            return redirect('login')->with('error', 'Please log in to update your cart');
        }
    }
    
    
    
    //delete cart item
    public function deleteCartItem($id){
        $item = Cart::find($id);
    
        if ($item) {
            $item->delete();
            return redirect()->back()->with('success', 'Item deleted successfully.');
        }
    
        return redirect()->back()->with('error', 'Item not found.');
    }
    public function checkout(){
    if (Auth::check()) {
        // Insert order into the database
        $orderId = DB::table('orders')->insertGetId([
            'status' => 'Pending',
            'customerId' => Auth::id(), 
            'bill' => request()->input('bill'),
            'address' => request()->input('address'),
            'fullname' => request()->input('fullname'),
            'phone' => request()->input('phone'),
        ]);
        if ($orderId) {
            $cartItems = DB::table('carts')
                ->where('customerId', Auth::id()) 
                ->get();
            foreach ($cartItems as $item) { 
                $product = DB::table('products')->where('id', $item->productId)->first();
                DB::table('orderitems')->insert([
                    'productId' => $item->productId,
                    'quantity' => $item->quantity,
                    'price' => $product->price,
                    'orderId' => $orderId,
                ]);
                DB::table('carts')->where('id', $item->id)->delete();
                return redirect()->back()->with('success', 'Item placed successfully.');
            }
            return redirect()->back()->with('error', 'Item not found.');
        }
        }
    }
    /*admin*/
    public function adminproduct(){
        $product = products::all();
        return view('admin.product',compact('product'));
    }
    public function AddNewProduct(Request $data)
    {
    $product = new Products();
    $product->name = $data->input('name');
    $product->price = $data->input('price');
    $product->quantity = $data->input('quantity');
    $product->type = $data->input('type');
    $product->category = $data->input('category');
    $product->description = $data->input('description');
    if ($data->hasFile('file')) {
        $fileName = $data->file('file')->getClientOriginalName();
        $data->file('file')->move('home/images/', $fileName);
        $product->image = $fileName;
    } else {
        $product->image = '/home/images/default.jpg'; 
    }
    $product->save();
    return redirect()->back()->with('success', 'Congratulations! New product added successfully.');
}

}

