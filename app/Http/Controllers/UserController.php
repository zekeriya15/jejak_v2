<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\TripImages;
use App\Models\Review;
use App\Models\ReviewImages;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Fetch trips the user has joined
        $trips = Trip::with('images') // Include trip images
            ->whereHas('bookings', function ($query) use ($user) {
                $query->where('user_id', $user->id); // Filter trips by user bookings
            })
            ->get();

        // Return the profile view with the trips data
        return view('user.profil_user', compact('user', 'trips'));
    }


    public function detail($trip_id)
    {
        // Fetch the trip with its images
        $trip = Trip::with('images')->findOrFail($trip_id);

        // Pass the trip data to the view
        return view('user.place_detail_user_ulasan', compact('trip'));
    }


    public function inputUlasan($tripId)
    {
        // Retrieve the trip data using the tripId
        $trip = Trip::findOrFail($tripId);

        // Return the view with the trip data
        return view('user.input_ulasan', compact('trip'));
    }


    public function submitUlasan(Request $request, $tripId)
    {

        // dd($request->method());
        // dd($request->file('fotos'));

        // Validate the incoming request
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string|max:255',
            'fotos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create the review record
        $review = Review::create([
            'user_id' => Auth::id(), // Assuming the user is logged in
            'trip_id' => $tripId,
            'rating' => $request->input('rating'),
            'ulasan' => $request->input('ulasan'),
        ]);

        // Handle image uploads if any
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $file) {
                $path = $file->store('review_images', 'public'); // Store images in the public disk

                // Create a new record in the review_images table
                ReviewImages::create([
                    'review_id' => $review->id,
                    'image_path' => $path,
                ]);
            }
        }

        // Redirect back with success message
        return redirect('/profil-user');
    }




    // =========================================================================================


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUsers(Request $request): View
    {
        // $data = User::latest()->paginate(5);

  
        // return view('super_admin.users',compact('data'))
        //     ->with('i', value: ($request->input('page', 1) - 1) * 5);


        $data = User::latest()->paginate(5);
  
        return view('super_admin.users',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

        // $data = User::all(); // Retrieve all users
        // return view('super_admin.users', compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $roles = Role::pluck('name','name')->all();

        return view('super_admin.users-create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate( [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.showUsers')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $user = User::find($id);

        return view('super_admin.users-show',compact(var_name: 'user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('super_admin.users-edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate( [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.showUsers')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('users.showUsers')
                        ->with('success','User deleted successfully');
    }

}
