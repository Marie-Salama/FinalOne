<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
        public function store(Request $request)
{
    $userData = $request->only(['name', 'email', 'password', 'status', 'gender', 'age', 'city', 'where_to_go', 'phone', 'photo' ,'phonenumber']);

      //  dd($userData);

      if ($request->hasFile('photo')) {
        // Retrieve the uploaded image
        $image = $request->file('photo');

        // Generate a unique name for the image
        $imageName = time() . '_' . $image->getClientOriginalName();

        // Move the image to the storage directory
        $image->storeAs('public/images', $imageName);

        // Add the image path to the user data
        $userData['photo'] = 'images/' . $imageName;
    }
    
        $userType = $request->input('user_type');

        $email = $request->input('email');
        $adminDomains = ['example.com', 'adminexample.com']; // Add your admin email domains here
        $domain = explode('@', $email)[1];
    
        if (in_array($domain, $adminDomains)) {
            // If the user's email domain matches an admin domain, create an admin record
            Admin::create($userData);
    
            // Session::flash('message', 'Registration successful! You are now an admin.');
            // session(['user_type' => 'admin']);}
            return 'Success you are admin!';}

        elseif ($userType === 'owner') {
            $owner = Owner::create($userData);
              //Auth::login($owner);

             
            // $apiToken = Str::random(80); // Generate a random token
            // $owner->api_token = hash('sha256', $apiToken); // Hash the token before storing
            // $owner->save();
            // Auth::guard('owner')->login($owner ,true);

            // Session::flash('message', 'Registration successful! You are now an owner.');
            // session(['user_type' => 'owner']);

            

            Auth::guard('owner')->setUser($owner);

            Auth::guard('owner')->login($owner);

            event(new Registered($owner));

            // $token = $owner->createToken($owner->name.'-AuthToken')->plainTextToken;
        
            // return response()->json([
            //     'success' => true,
            //     'message' => 'Success you are owner!',
            //     'user' => $owner,
            //     'token'=>$token,
            //     'userType' => 'owner' 
            // ]);


            return 'Success you are owner!';
        } else {
            $user =  User::create($userData);
            Auth::login($user);

            event(new Registered($user));

    
            // Session::flash('message', 'Registration successful! You are now a user.');
            // session(['user_type' => 'user']);
            return 'Success you are user!';
        }
    
        //return redirect()->route('register.message');
    }
    

    // public function showRegistrationMessage()
    // {
    //     $message = Session::get('message');
    //     return view('auth.message', compact('message'));
    // }
}

// public function store(Request $request)
// {
//     // Determine the validation rules based on user type
//     $userType = $request->input('user_type');

//     // Common validation rules for both user and owner
//     $commonRules = [
//         'name' => 'required|string|max:255',
//         'email' => 'required|string|email|max:255',
//         'password' => ['required', Password::defaults()],
//         'phone' => 'required|string',
//         'photo' => 'nullable|image',
//     ];

//     // Specific validation rules for users
//     $userRules = [
//         'status' => 'required|string',
//         'gender' => 'required|string',
//         'age' => 'required|integer',
//         'city' => 'required|string',
//         'where_to_go' => 'required|string',
//     ];

//     // Apply validation rules based on user type
//     if ($userType === 'owner') {
//         $rules = $commonRules; // Only common rules for owner
//     } else {
//         $rules = array_merge($commonRules, $userRules); // Common + user-specific rules
//     }

//     // Validate the request data
//     $validatedData = $request->validate($rules);

//     // Hash the password
//     $validatedData['password'] = Hash::make($validatedData['password']);

//     if ($request->hasFile('photo')) {
//         // Retrieve the uploaded image
//         $image = $request->file('photo');

//         // Generate a unique name for the image
//         $imageName = time() . '_' . $image->getClientOriginalName();

//         // Move the image to the storage directory
//         $image->storeAs('public/images', $imageName);

//         // Add the image path to the user data
//         $validatedData['photo'] = 'images/' . $imageName;
//     }

//     $email = $request->input('email');
//     $adminDomains = ['example.com', 'adminexample.com']; // Add your admin email domains here
//     $domain = explode('@', $email)[1];

//     DB::beginTransaction();
//     try {
//         if (in_array($domain, $adminDomains)) {
//             // If the user's email domain matches an admin domain, create an admin record
//             Admin::create($validatedData);
//             DB::commit();
//             return response()->json(['message' => 'Success you are admin!'], 200);
//         } elseif ($userType === 'owner') {
//             $owner = Owner::create($validatedData);
//             Auth::guard('owner')->setUser($owner);
//             Auth::guard('owner')->login($owner);
//             event(new Registered($owner));
//             DB::commit();
//             return response()->json(['message' => 'Success you are owner!'], 200);
//         } else {
//             $user = User::create($validatedData);
//             Auth::login($user);
//             event(new Registered($user));
//             DB::commit();
//             return response()->json(['message' => 'Success you are user!'], 200);
//         }
//     } catch (\Exception $e) {
//         DB::rollBack();
//         return response()->json(['message' => $e->getMessage()], 500);
//     }
// }
// }