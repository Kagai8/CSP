<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function CreateUser()
    {
        return view('mcsp.users.create_user');
    }

    public function StoreUser(Request $request)
    {
         $request->validate([
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email'), // Ensure the email is unique in the 'users' table
                ],
                'role_id' => 'required|numeric|in:1,2,3,4', // Validate the role_id
                'password' => 'required|string|min:8', // Add any password validation rules you need
            ]);
        
            $user_id = User::insertGetId([

                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'password' => Hash::make($request->password), // Encrypt the password
                'gender' => $request->gender,
                'created_by' => auth()->user()->name,
                

                'created_at' => Carbon::now(),   

                ]);

        $notification = array(
            'message' => 'New User Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.create')->with($notification);

        
    }
}
