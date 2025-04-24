<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function viewCustomer(){
$customer=Customer::all();
return view('customers.view_customer');
    }
    public function createCustomer(){
        
    }
    public function editCustomer(){
        
    }
    public function updateCustomer(){
        
    }
    public function destoryCustomer(){

    }
}
