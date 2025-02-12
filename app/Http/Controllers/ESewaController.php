<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

require '../vendor/autoload.php';
use RemoteMerge\Esewa\Client;
use RemoteMerge\Esewa\Config;



class ESewaController extends Controller
{
public function esewaPay(Request $request)
{
    $pid = uniqid(); // Generate unique product ID
    $bill = $request->bill;

    // Insert order into the database
    if (Auth::check()) {
        // Insert order into the database
        $orderId = DB::table('orders')->insertGetId([
            'status' => 'Panding',
            'customerId' => Auth::id(), 
            'bill' => request()->input('bill'),
            'address' => request()->input('address'),
            'fullname' => request()->input('fullname'),
            'phone' => request()->input('phone'),
            'created_at' => \Carbon\Carbon::now(),
        ]);
        $successUrl = url('/success');
        $failureUrl = url('/failure');
    
        // Config for development
      // Initialize eSewa client for development.
      $esewa = new Client([
        'merchant_code' => 'EPAYTEST',
        'success_url' => $successUrl,
        'failure_url' => $failureUrl,
       ]);
       $esewa->payment('P101W201', $bill, 0, 0, 80);  
    }
}

public function paymentSuccess(){
    echo 'payment successs';
}
public function paymentFailure(){
    echo 'payment failed';
}
}
 




