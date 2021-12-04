<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Models
use App\Models\User;

// Resource
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;



class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserCollection(User::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
            'department' => $request->department,

            'avatar' => $request->avatar,
            'website' => $request->website,
            'rating' => $request->rating,
            'phone' => $request->phone,

            'username' => $request->username,
            'city' => $request->city,
            'country' => $request->country,
            'company' => $request->company,

            'position' => $request->position,
            'isadmin' => $request->isadmin,
        ]);

        // $user = New User;
        
        // $user->varchartype = $request->varchartype;
        // $user->inttype = $request->inttype;
        // $user->yeartype = $request->yeartype;
        // $user->datetype = $request->datetype;
        // $user->datetimetype = $request->datetimetype;
        
        // $user->save();

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // check if currently authenticated user is the owner of the book
        // if ($request->user()->id !== $book->user_id) {
        //     return response()->json(['error' => 'You can only edit your own books.'], 403);
        // }

        // dd($user);

        $user->update($request->only([
            'name',
            'email',
            'password',
            'department',
 
            'avatar',
            'website',
            'rating',
            'phone',

            'username',
            'city',
            'country',
            'company',

            'position',
            'isadmin'
            ]));

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }

    public function list()
    {
        return new UserCollection(User::all());
    }

    public function count()
    {
        return response()->json(['total' => User::count()], 200);
        // return User::count();
    }


    ##### Testing API #####
    public function removelatest()
    {   
        $user = User::orderBy('id', 'desc')->first();

        if ($user->id == 1){
            $user->id = 'none';
        }
        elseif ($user->id == 2){
            $user->id = 'none';
        }
        else {
            $user->delete();
        }

        return response()->json(['deleted_record_id'=>$user->id], 200);
    }

    public function resetautoincrement()
    {   
        $user = User::orderBy('id', 'desc')->first();
        $next_id = $user->id + 1;
        // dd($next_id);
        DB::statement("ALTER TABLE `users` AUTO_INCREMENT = ".$next_id.";");
        
        return response()->json(['AUTO_INCREMENT'=>$next_id], 200);
    }
    

}
