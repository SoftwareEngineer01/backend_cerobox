<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Validator;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{

    public function getCustomers() {
        $customers = Customer::with('services')->get();
        return response()->json($customers);
    }


    public function getCustomerById($id) {
        $customer = Customer::with('services')->find($id);
        return response()->json($customer);
    }


    public function addCustomer(CustomerRequest $request) {

        $customer = Customer::create($request->all());

        return response()->json([
            'success' => true,
            'customer' => $customer,
            'message' => 'Successfully created customer!'
        ], 201);

    }



}
