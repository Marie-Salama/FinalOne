<?php


namespace App\Http\Controllers\Auth;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;


class UserProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $photoUrl = $user->photo;
        $userImage = $photoUrl ? asset('storage/' . $photoUrl) : null;
        return view('auth.user.profile', compact('user', 'userImage'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('auth.user.edit', compact('user'));
    }

    // public function update(Request $request, $id)
    // {
    //     // First, check if the record exists in the database
    //     $user = User::find($id);

    //     // If the record doesn't exist, return an error response
    //     if (!$user) {
    //         return response()->json(['error' => 'User not found'], 404);
    //     }

    //     // Validate the request data
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         'status' => 'required|string|max:255',
    //         'phone' => 'required|string|max:255',
    //         'age' => 'required|integer|min:18|max:100',
    //         'gender' => 'required|in:Male,Female,Other',
    //         // Add validation rules for other fields as needed
    //     ]);

    //     // Update the user's information
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->status = $request->status;
    //     $user->phone = $request->phone;
    //     $user->age = $request->age;
    //     $user->gender = $request->gender;

    //     // If the password field is not empty, update the user's password
    //     if (!empty($request->password)) {
    //         $request->validate([
    //             'password' => 'required|string|min:8|confirmed',
    //         ]);

    //         $user->password = Hash::make($request->password);
    //     }

    //     // If a new photo has been uploaded, update the user's photo
    //     if ($request->hasFile('photo')) {
    //         $request->validate([
    //             'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         ]);

    //         $photo = $request->file('photo');
    //         $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
    //         $photoPath = $photo->storeAs('photos', $photoName, 'public');
    //         $user->photo = $photoPath;
    //     }

    //     // Save the updated user information
    //     $user->save();

    //     // Return a success response
    //     return response()->json(['message' => 'User updated successfully'], 200);
    // }


    // public function update(Request $request)
    // {
    //     // Get the authenticated user
    //     $user = User::find(Auth::id());
    
    //     // Validate the request data
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         'status' => 'required|string|max:255',
    //         'phone' => 'required|string|max:255',
    //         'age' => 'required|integer|min:18|max:100',
    //         'gender' => 'required|in:Male,Female,Other',
    //         'password' => 'nullable|string|min:8|confirmed',
    //         'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);
    
    //     // Update the user's information
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->status = $request->status;
    //     $user->phone = $request->phone;
    //     $user->age = $request->age;
    //     $user->gender = $request->gender;
    
    //     // If the password field is not empty, update the user's password
    //     if (!empty($request->password)) {
    //         $user->password = Hash::make($request->password);
    //     }
    
    //     // If a new photo has been uploaded, update the user's photo
    //     if ($request->hasFile('photo')) {
    //         $photo = $request->file('photo');
    //         $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
    //         $photoPath = $photo->storeAs('photos', $photoName, 'public');
    //         $user->photo = $photoPath;
    //     }
    
    //     // Save the updated user information
    //     $user->save();
    
    //     // Return a success response
    //     return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    // }
    

    public function update(Request $request, $id)
    {
        // Get the user
        $user = User::findOrFail($id);
    
        // Comment out the validation rules for testing
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        //     'status' => 'required|string|max:255',
        //     'phone' => 'required|string|max:255',
        //     'age' => 'required|integer|min:18|max:100',
        //     'gender' => 'required|in:Male,Female,Other',
        //     'password' => 'nullable|string|min:8|confirmed',
        //     'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
    
        // Update the user's information
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->phone = $request->phone;
        $user->age = $request->age;
        $user->gender = $request->gender;
       

    
        // If the password field is not empty, update the user's password
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
    
        // If a new photo has been uploaded, update the user's photo
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('photos', $photoName, 'public');
            $user->photo = $photoPath;
        }
    
        // Save the updated user information
        $user->save();
    
        // Return a success response
        // return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
        return response()->json(['success', 'Profile updated successfully.']);

    }

}
