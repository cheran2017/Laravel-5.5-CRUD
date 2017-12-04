<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index(){
    	$customers['customers'] = Customer::all();

    	return view('customer',$customers);
    }

    public function store(Request $request){

    	$customer = new Customer;
    	$customer->name = $request->name;
    	$customer->phone_number = $request->phone_number;
    	$customer->email = $request->email;
    	

    	if ($customer->save()) {
            $request->session()->flash('alert-success', 'Customer details create successfully!');
            return redirect()->back();
    		echo "Inserted Succesfully";
    	} else {
    		echo "Insert failed";

    	}

    }

    public function show($id){
    	$customer['customer'] = Customer::find($id);

    	return view('customer-edit',$customer);
    }

    public function update(Request $request){

    	$customer = Customer::find($request->id);

    	$customer->name 		= $request->name;
    	$customer->phone_number = $request->phone_number;
    	$customer->email        = $request->email;
    	

    	if ($customer->save()) {
            $request->session()->flash('alert-success', 'Customer details updated successfully!');
            return redirect()->back();
    		echo "Update Succesfully";
    	} else {
    		echo "Update failed";

    	}

    }

    public function delete(Request $request,$id){

    	$customer = Customer::find($id);


    	if ($customer->delete()) {
            $request->session()->flash('alert-danger', 'Customer details deleted successfully!');
            return redirect()->back();
    		echo "Deleted";
    	} else {
    		echo "delete failed";
    	}
    	// $customers = Customer::onlyTrashed()->get();

    	// return $customers;


    }

}
