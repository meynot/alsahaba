<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', [
            'rows' => User::query()->paginate(10)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$roles= Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//$signUp = request()->validate([
		$validator = Validator::make($request->post(), [
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:7|confirmed|max:255',
		]);
		
		if ($validator->fails()) {
			return redirect()
					->route('users.create')
					->withErrors($validator)
					->withInput();
		}
		
		$user = User::create([
			'name'=> $request->post('name'),
			'email'=> $request->post('email'),
			'password'=> Hash::make($request->post('password')),
			'facebook'=> $request->post('facebook'),
			'twitter'=> $request->post('twitter'),
			'instagram'=> $request->post('instagram'),
			'is_active'=> $request->has('is_active') ? true : false,
		]);
		
		$user->save();
		$user->syncRoles($request->post('roles'));
		return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
		$roles= Role::all();
        return view('users.edit', compact('roles', 'user'));
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
		
		$user->name =  $request->post('name');
		$user->email =  $request->post('email');
		if( $request->post('password') > '' ) 
			$user->password =  Hash::make($request->post('password'));
		
		$user->facebook =  $request->post('facebook');
		$user->twitter =  $request->post('twitter');
		$user->instagram = $request->post('instagram');
		$user->is_active = $request->has('is_active') ? true : false ;
		
		$user->update();
		
		$user->syncRoles($request->post('roles'));
		
		return $this->index();
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
		return $this->index();
    }
	
    public function toDelete(User $user)
    {
        return view('users.delete', compact('user'));
    }

	
}
