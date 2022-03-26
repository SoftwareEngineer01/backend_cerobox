<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\CustomerUpdateRequest;

class CustomerController extends Controller
{

    // Obtiene los clientes y lista los servicios asociados
    public function getCustomers() {
        $customers = Customer::with('services')->get();
        return response()->json($customers);
    }

    // Obtiene un cliente por id y lista los servicios asociados
    public function getCustomerById($id) {
        $customer = Customer::with('services')->find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json($customer);
    }

    // Crea un nuevo cliente
    public function addCustomer(CustomerRequest $request) {

        $customer = Customer::create($request->all());

        return response()->json([
            'success' => true,
            'customer' => $customer,
            'message' => 'Successfully created customer!'
        ], 201);

    }

    // Actualiza un cliente
    public function updateCustomer(CustomerUpdateRequest $request, $id) {

        $customer = Customer::find($id);

        $customer->update($request->all());

        return response()->json([
            'success' => true,
            'customer' => $customer,
            'message' => 'Successfully updated customer!'
        ], 200);

    }

    // Elimina un cliente
    public function deleteCustomer($id) {

        $customer = Customer::find($id);
        $customer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted customer!'
        ], 200);

    }

}
