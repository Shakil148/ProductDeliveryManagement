<?php

namespace SGFL\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use SGFL\User;
use Image;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    { 
        return view('admin.page');
    }
    public function user()
    { 
        return view('viewer.page');
    }
    public function index()
    { 
        $user = User::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contact' => ['required', 'string', 'max:11',],
            'role' => 'required | in:admin,moderator,tsm,accounts,viewer',
        ]);


       /* $request->hasFile('image');
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);

        Image::make($image)->resize(800, 400)->save($location);

        $image->image = $filename; */

//


       $user = new User();
       $user->name = $request->input('name');
       $user ->address = $request->input('address');
       $user ->contact = $request->input('contact');
       $user ->email = $request->input('email');
       $user ->password = $request->input('password');
       $user ->designation = $request->input('designation');
       $user ->role = $request->input('role');
       if ($request->hasfile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/') . $filename;
        Image::make($image)->save($location);
        $user->image = $filename;
      }
//
       $user ->save();

       return redirect('/user')->with('success', 'User Created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit', compact('user')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'email'=>'required',
            'designation'=>'required',
        ]);
        $user = User::find($id);
        $user->name =  $request->get('name');
        $user->address = $request->get('address');
        $user->contact = $request->get('contact');
        $user->email = $request->get('email');
        $user->designation = $request->get('designation');
        $user->role = $request->get('role');

        if ($request->hasfile('image')) {
            Storage::delete($user->image);
    
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/') . $filename;
    
            Image::make($image)->save($location);
    
            $user->image = $filename;
          }

        $user->save();


        return redirect('/user')->with('success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/user')->with('failed', 'User deleted!');
    }
}
