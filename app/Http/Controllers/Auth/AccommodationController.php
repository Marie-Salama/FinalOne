<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use App\Models\Rental;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use App\Models\Owner;

class AccommodationController extends Controller
{

  public function create()
{
    // if (!Auth::guard('owner')->check()) {
    //     // Redirect the user to the login page if not authenticated
    //     return redirect()->route('login')->with('error', 'You must be logged in to upload accommodation.');
    // }



    if (!Auth::check()) {
        // Return a JSON response if not authenticated
        Log::error("'You must be logged in to upload accommodation.");
        return response()->json(['error' => 'You must be logged in as owner to upload accommodations.'], 403);
    }

    // if (!auth()->check()) {
    //     // Return a JSON response if not authenticated
    //     Log::error("'You must be logged in to upload accommodation.");
    //     return response()->json(['error' => 'You must be logged in to upload accommodations.'], 403);
    // }
    


    // if (!Auth::guard('owner')->check()) {
    //     // Return a JSON response if not authenticated
    //     Log::error("'You must be logged in to upload accommodation.");
    //     return response()->json(['error' => 'You must be logged in as owner to upload accommodation.'], 403);
    // }
    // if (!Auth::guard('owner')->check()) {
    //     // Return a JSON response if not authenticated
    //     Log::error("'You must be logged in to upload accommodation.");
    //     return response()->json(['error' => 'You must be logged in as owner to upload accommodation.'], 403);
    // }

    // else{

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'you are in accommodation form',
    //     ]);
    // }



    // $apiToken = $request->header('X-API-TOKEN');

    // if (!Gate::allows('api-owner', $apiToken)) {
    //     // Return a JSON response if not authenticated
    //     return response()->json(['error' => 'You must be logged in to upload accommodation.'], 401);
    // }
    
    
    return view('auth.uploadaccommodation');
}
// public function store(Request $request)
// {
//             $request->validate([
//             'description' => 'required',
//             'address' => 'required',
//             'location_link' => 'required',
//             'price' => 'required|integer',
//             'facilities' => 'required',
//             'shared_or_individual' => 'required|in:shared,individual',
//             'images' => 'required',
//             'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//             'availability' => 'nullable|date',
//         ]);

//     $imageName = time().'.'.$request->image->extension();
//     $request->image->move(public_path('images'), $imageName);

//     $accommodation = new Accommodation([
//                     'description' => $request->input('description'),
//                     'address' => $request->input('address'),
//                     'location_link' => $request->input('location_link'),
//                     'price' => $request->input('price'),
//                     'facilities' => $request->input('facilities'),
//                     'shared_or_individual' => $request->input('shared_or_individual'),
//                   // 'availability' => $request->input('availability'),
//         'image' => $imageName,
//         'owner_id' => Auth::guard('owner')->user()->id, // Set the owner_id attribute to the ID of the currently authenticated owner
//     ]);

//     $accommodation->save();

//     Session::flash('message', 'Accommodation uploaded successfully!');
//        return redirect()->route('upload.message');

// }

public function store(Request $request)

{

   if (!Auth::check()) {
    // Return a JSON response with 401 Unauthorized status
    return response()->json(['error' => 'Unauthorized. You must be logged in as an owner to upload accommodation.'], 401);
}
   
    $user = Auth::user();
    //dd($user);
    // Check if the authenticated user exists and has an 'id' property
    if ($user && $user->id) {
    $validator = Validator::make($request->all(), [
        'description' => 'required|string|max:255',
        'address' => 'required|string',
        'location_link' => 'required|url',
        'governorate' => 'required|string',
        'region' => 'required|string',
        'facilities' => 'required|string',
        'price' => 'required|numeric',
        'shared_or_individual' => 'required|string|in:shared,individual',
       'main_image'=>'required|image|mimes:jpeg,png,jpg,gif|max:20480',
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
        'no_of_tenants' => 'required|integer|min:1'

    ]);

    if ($validator->fails()) {
        // return redirect()->back()->withErrors($validator)->withInput();
        return response()->json(['error' => $validator->errors()], 422);
    }

    $mainImagePath = $request->file('main_image')->store('images', 'public');
$uploadedImages = [];

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('images', 'public');
            $uploadedImages[] = $path;
        }
    }

        $accommodationData = $validator->validated();
        $accommodationData['main_image'] = $mainImagePath;
        $accommodationData['images'] = $uploadedImages;
        $accommodationData['owner_id'] = Auth::user()->id;
        $accommodation = Accommodation::create($accommodationData);

        // Set the initial number of tenants available based on the accommodation type
        $noOfTenantsAvailable = $accommodation->shared_or_individual === 'shared' ? $accommodation->no_of_tenants : 1;
        
        // Update the accommodation with the initial number of tenants available
        $accommodation->no_of_tenants_available = $noOfTenantsAvailable;
        $accommodation->save();


    return response()->json([
        'success' => true,
        'message' => 'Accommodation uploaded successfully',
    ]);
}else {
    // Handle the case where the authenticated user or 'id' property is missing
    // return redirect()->route('login')->with('error', 'You must be logged in as an owner to upload accommodation.');
    return response()->json(['error' => 'You must be logged in to upload accommodation.'], 401);
}


}


// public function show($accommodation_id)
// {
//     $accommodation = Accommodation::findOrFail($accommodation_id);
//     $images = [];
//     foreach ($accommodation->images as $image) {
//         $images[] = asset('storage/' . $image); // Adjust the path accordingly
//     }
//     $availability = $accommodation->availability; // Add this line to get the availability
//     if (request()->expectsJson()) {
//         return response()->json([
//             'accommodation' => $accommodation,
//             'images' => $images,
//             'availability' => $availability,
//         ]);
//     }
//     return view('auth.accommodation-show', compact('accommodation', 'images', 'accommodation_id','availability'));
// }

public function show($accommodation_id)
{
    $accommodation = Accommodation::findOrFail($accommodation_id);
    $images = [];
    foreach ($accommodation->images as $image) {
        $images[] = asset('storage/' . $image); // Adjust the path accordingly
    }
    $availability = $accommodation->availability;

    // Return JSON response with specific accommodation data and image URLs
    return response()->json([
        'accommodation' => [
            'description' => $accommodation->description,
            'address' => $accommodation->address,
            'location_link' => $accommodation->location_link,
            'governorate' => $accommodation->governorate,
            'region' => $accommodation->region,
            'price' => $accommodation->price,
            'facilities' => $accommodation->facilities,
            'shared_or_individual' => $accommodation->shared_or_individual,
            'images' => $images,
            'availability' => $availability,
        ],
    ]);
}




// public function showAll()
// {
//     $accommodations = Accommodation::all();
//     $images = [];

//     foreach ($accommodations as $accommodation) {
//         // Retrieve images for each accommodation
//         $accommodationImages = [];
//         foreach ($accommodation->images as $image) {
//             $accommodationImages[] = asset('storage/' . $image); // Adjust the path accordingly
//         }
//         $images[$accommodation->id] = $accommodationImages;
//     }

//     return view('auth.all-accommodations', compact('accommodations', 'images'));
// }

public function showAll()
{
    // Retrieve all accommodations with only the id and main_image columns
    $accommodations = Accommodation::select('id', 'main_image')->get();
    
    return view('auth.all-accommodations', compact('accommodations'));
}


// public function showSome()
// {
//     $someAccommodations = Accommodation::inRandomOrder()->limit(6)->get();

//     $images = [];
//     foreach ($someAccommodations as $accommodation) {
//         // Retrieve images for each accommodation
//         $accommodationImages = [];
//         foreach ($accommodation->images as $image) {
//             $accommodationImages[] = asset('storage/' . $image); // Adjust the path accordingly
//         }
//         $images[$accommodation->id] = $accommodationImages;
//     }

//     return view('auth.some-accommodations', compact('someAccommodations', 'images'));
// }
public function showSome()
{
    // Retrieve 6 random accommodations
    $someAccommodations = Accommodation::inRandomOrder()->limit(6)->get();

    $images = [];
    foreach ($someAccommodations as $accommodation) {
        // Retrieve and decode images for each accommodation
        $accommodationImages = [];

        // Assuming images are stored as a JSON string in the database
        // Check if images attribute is not already an array
        $imageArray = is_string($accommodation->images) ? json_decode($accommodation->images, true) : $accommodation->images;

        // Check if $imageArray is an array
        if (is_array($imageArray)) {
            foreach ($imageArray as $image) {
                $accommodationImages[] = asset('storage/' . $image); // Adjust the path accordingly
            }
        }

        $images[$accommodation->id] = $accommodationImages;
    }

    return view('auth.some-accommodations', compact('someAccommodations', 'images'));
}



// app/Http/Controllers/AccommodationController.php

public function index()
{
    if (!Auth::check()) {
        // Return a JSON response if not authenticated
        return response()->json(['error' => 'Unauthenticated'], 401);
    }

    $accommodations = Accommodation::where('owner_id', Auth::id())
        // ->select('id', 'description', 'address', 'location_link', 'governorate', 'region', 'price', 'availability', 'facilities', 'shared_or_individual', 'owner_id', 'images')
        ->get();

    // Populate $images array for each accommodation
    // $images = [];
    // foreach ($accommodations as $accommodation) {
    //     $images[$accommodation->id] = isset($accommodation->images[0])
    // ? asset('storage/images/' . basename($accommodation->images[0]))
    // : asset('images/no-image.png');
    // }

    $images = [];
    foreach ($accommodations as $accommodation) {
        $accommodationImages = [];
        foreach ($accommodation->images as $image) {
            $accommodationImages[] = asset('storage/images/' . basename($image));
        }
        $images[$accommodation->id] = $accommodationImages;
        
    }


    // dd($images);
    return view('auth.index', compact('accommodations', 'images'));
}

public function edit($id)
{
    $accommodation = Accommodation::findOrFail($id);

    // Check if the user is authorized to edit this accommodation
    if ($accommodation->owner_id !== Auth::id()) {
        return response()->json(['error 403' => 'Unauthorized'], 401);

       // abort(403); // Unauthorized
    }

    return view('auth.edit', compact('accommodation'));
}

public function update(Request $request, $id)
{
    $accommodation = Accommodation::findOrFail($id);

    // Check if the user is authorized to update this accommodation
    if ($accommodation->owner_id !== Auth::id()) {
        return response()->json(['error 403' => 'Unauthorized'], 401);
    }

    // Validate the request data
    $request->validate([
        'description' => 'required|string|max:255',
        'address' => 'required|string',
        'location_link' => 'required|url',
        'governorate' => 'required|string',
        'region' => 'required|string',
        'facilities' => 'required|string',
        'price' => 'required|numeric',
        'shared_or_individual' => 'required|string|in:shared,individual',
        'availability' => 'nullable|string',
        'images.*' => 'string',
        // 'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',  // Ensure file uploads are validated
    ]);
    

    // Update the accommodation with the request data
    $accommodation->update($request->all());

    // return redirect()->route('accommodations.index')
    //                  ->with('success', 'Accommodation updated successfully');
    return response()->json(['success', 'Accommodation updated successfully'], 200);
}

public function destroy($id)
{
    $accommodation = Accommodation::findOrFail($id);

    // Check if the user is authorized to delete this accommodation
    if ($accommodation->owner_id !== Auth::id()) {
        return response()->json(['error 403' => 'Unauthorized'], 401);
    }

    // Delete the accommodation
    $accommodation->delete();

 return response()->json(['success', 'Accommodation deleted successfully'], 200);
}




public function showuploadMessage()
    {
        $message = Session::get('message');
        return view('auth.message', compact('message'));
    }
}



