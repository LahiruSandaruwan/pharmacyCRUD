<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MedicationController extends Controller
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
     * Display a listing of medications.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Retrieve all medications
        $medications = Medication::all();

        // Check if there are any medications
        if ($medications->isEmpty()) {
            return response()->json(['message' => 'No medications found.'], 404);
        }

        // Return the list of medications
        return response()->json($medications);
    }

    /**
     * Store a newly created medication in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Check if the user is authorized to create medications
        if (!Gate::allows('isOwner')) {
            return response()->json(['message' => 'Not authorized.'], 403);
        }

        // Validation rules for storing a new medication
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer',
        ]);

        // Create the new medication
        $medication = Medication::create($request->all());

        // Return the created medication
        return response()->json(['message' => 'Medication added successfully.', 'medication' => $medication]);
    }

    /**
     * Display the specified medication.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // Retrieve the medication by ID
        $medication = Medication::find($id);

        // Check if the medication exists
        if (!$medication) {
            return response()->json(['message' => 'Medication not found.'], 404);
        }

        // Return the medication details
        return response()->json($medication);
    }

    /**
     * Update the specified medication in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Medication $medication)
    {
        // Check if the user is authorized to perform the update
        if (!Gate::allows('isOwner') && !Gate::allows('canManage')) {
            return response()->json(['message' => 'Not authorized.'], 403);
        }

        // Validation rules for updating a medication
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer',
        ]);

        // Update the medication
        $medication->update($request->all());

        // Return success message
        return response()->json(['message' => 'Medication updated successfully.', 'medication' => $medication]);
    }

    /**
     * Remove the specified medication from storage.
     *
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Medication $medication)
    {
        // Check if the user is authorized to delete the medication
        if (!Gate::allows('isOwner') && !Gate::allows('canManage')) {
            return response()->json(['message' => 'Not authorized.'], 403);
        }

        // Check if the medication exists
        if (!$medication) {
            return response()->json(['message' => 'Medication not found.'], 404);
        }

        // Soft delete the medication
        $medication->delete();

        // Return success message
        return response()->json(['message' => 'Medication deleted successfully.']);
    }
}
