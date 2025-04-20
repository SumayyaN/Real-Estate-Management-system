<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use App\Models\User;
// use Illuminate\Http\Request;

// class UserController extends Controller
// {
//     // List all users
//     public function index()
//     {
//         $users = User::all();
//         return view('admin.users.index', compact('users'));
//     }

//     // Show create user form
//     public function create()
//     {
//         return view('admin.users.create');
//     }

//     // Store a new user in the database
//     public function store(Request $request)
//     {
//         // Validate user input
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:users,email',
//             'password' => 'required|string|min:8|confirmed',
//         ]);

//         // Create new user
//         $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => bcrypt($request->password), // Encrypt password
//         ]);

//         // Redirect back to the user list with a success message
//         return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
//     }

//     // Show the edit user form
//     public function edit($id)
//     {
//         $user = User::findOrFail($id); // Find user by ID
//         return view('admin.users.edit', compact('user')); // Pass user to edit view
//     }

//     // Update user information
//     public function update(Request $request, $id)
//     {
//         // Validate input
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:users,email,' . $id, // Ignore the email validation if it's the same user
//         ]);

//         // Find the user
//         $user = User::findOrFail($id);

//         // Update user details
//         $user->name = $request->name;
//         $user->email = $request->email;

//         // If password is provided, update it
//         if ($request->filled('password')) {
//             $user->password = bcrypt($request->password); // Encrypt password
//         }

//         // Save the changes
//         $user->save();

//         // Redirect back to user list with success message
//         return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
//     }
// }


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // List all users
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Show create user form
    public function create()
    {
        return view('admin.users.create');
    }

    // Store a new user in the database
    public function store(Request $request)
    {
        // Validate user input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,owner,client', // Only allow valid roles
        ]);

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encrypt password
            'role' => $request->role, // Assign role here
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    // Show the edit user form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Update user information
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,owner,client',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }
}
