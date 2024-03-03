<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
     * Display a listing of users.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Retrieve all users
        $users = User::all();

        // Check if there are any users
        if ($users->isEmpty()) {
            return response()->json(['message' => 'No users found.'], 404);
        }

        // Return the list of users
        return response()->json($users);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Check if the user is authorized to create users
        if (!Gate::allows('isOwner')) {
            return response()->json(['message' => 'Not authorized.'], 403);
        }

        // Validation rules for storing a new user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:owner,manager,cashier',
        ]);

        // Create the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Return the created user
        return response()->json(['message' => 'User created successfully.', 'user' => $user], 201);
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // Retrieve the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Ensure the authenticated user has permission to view specific user details
        if (!Gate::allows('isOwner') && auth()->user()->id !== $user->id) {
            return response()->json(['message' => 'Not authorized.'], 403);
        }

        // Return the user details
        return response()->json($user);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $user)
    {
        // Check if the user is authorized to update the user
        if (!Gate::allows('isOwner') && !Gate::allows('canManage')) {
            return response()->json(['message' => 'Not authorized.'], 403);
        }

        // Validation rules for updating a user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'sometimes|nullable|min:8',
            'role' => 'required|in:owner,manager,cashier',
        ]);

        // Prepare data for update
        $data = $request->only(['name', 'email', 'username', 'role']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Update the user
        $user->update($data);

        // Return the updated user
        return response()->json(['message' => 'User updated successfully.', 'user' => $user]);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        // Check if the user is authorized to delete the user
        if (!Gate::allows('isOwner')) {
            return response()->json(['message' => 'Not authorized.'], 403);
        }

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Delete the user
        $user->delete();

        // Return success message
        return response()->json(['message' => 'User deleted successfully.']);
    }
}
