<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(){
        $user=Auth::user();
        $payments=Payment::all();
        return view('panel/Payments/PaymentView',compact('user','payments'));
    }
}
