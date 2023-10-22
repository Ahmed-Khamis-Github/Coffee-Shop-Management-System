<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Room;
use Illuminate\Http\Request;
// use App\Http\Request\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('room')->paginate(5);
     
        return view('dashboard.users.index' , ["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $rooms=  Room::all() ;
        return view('dashboard.users.create',compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            
            $path =$img->store("imgs","users-upload");
            
    
        } 
        $data['image']=$path;
        // dd($data);

        User::create($data);
        return redirect()->route('users.index');

     
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $rooms =Room::all() ;

        return view('dashboard.users.edit' ,["user" => $user , "rooms"=>$rooms]);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 

        ]) ;
        $user = User::findOrFail($id);
 
        $user->update($request->all());

        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');        
    }
}
