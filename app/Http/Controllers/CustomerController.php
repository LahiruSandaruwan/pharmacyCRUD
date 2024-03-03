<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Apply authentication middleware to all methods in this controller
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of customers.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Retrieve all customers
        $customers = Customer::all();

        // Check if there are any customers
        if ($customers->isEmpty()) {
            return response()->json(['message' => 'No customers found.'], 404);
        }

        // Return the list of customers
        return response()->json($customers);
    }

    /**
     * Store a newly created customer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Check if the user is authorized to create customers
        if (!Gate::allows('isOwner')) {
            return response()->json(['message' => 'Not authorized.'], 403);
        }

        // Validation rules for storing a new customer
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'phone_number' => 'nullable',
            'gender' => 'nullable',
            'allergies' => 'nullable',
        ]);

        // Create the new customer
        $customer = Customer::create($request->all());

        // Return the created customer
        return response()->json($customer, 201);
    }

    /**
     * Display the specified customer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // Retrieve the customer by ID
        $customer = Customer::find($id);

        // Check if the customer exists
        if (!$customer) {
            return response()->json(['message' => 'Customer not found.'], 404);
        }

        // Return the customer details
        return response()->json($customer);
    }

    /**
     * Update the specified customer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Customer $customer)
    {
        // Check if the user is authorized to perform the update
        if (!Gate::allows('isOwner') && !Gate::allows('canManage')) {
            return response()->json(['message' => 'Not authorized.'], 403);
        }

        // Validation rules for updating a customer
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone_number' => 'nullable',
            'gender' => 'nullable',
            'allergies' => 'nullable',
        ]);

        // Update the customer
        $customer->update($request->all());

        // Return success message
        return response()->json(['message' => 'Customer updated successfully.', 'customer' => $customer]);
    }

    /**
     * Remove the specified customer from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Customer $customer)
    {
        // Check if the user is authorized to delete the customer
        if (!Gate::allows('isOwner') && !Gate::allows('canManage')) {
            return response()->json(['message' => 'Not authorized.'], 403);
        }

        // Check if the customer exists
        if (!$customer) {
            return response()->json(['message' => 'Customer not found.'], 404);
        }

        // Soft delete the customer
        $customer->delete();

        // Return success message
        return response()->json(['message' => 'Customer soft deleted successfully.']);
    }
}
