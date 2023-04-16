<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Reclameur;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
         return view('users.create');
       
    }
    public function createe()
    { 
         return view('users.createe');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate([
        'username'=>'required|min:8|max:20|unique:users',
        'password'=>'required|min:8|max:15|confirmed'
    ]
   
    );
        $user=new User();
        $user->username=$request->input('username');
        $user->password=Hash::make($request->input('password'));
        $user->role='1';
        $user->save();
        return redirect('/reclameurs/create');
    }
    public function storee(Request $request)
    {   $request->validate([
        'username'=>'required|min:8|max:20|unique:users',
        'password'=>'required|min:8|max:15|confirmed'
    ]
   
    );
        $user=new User();
        $user->username=$request->input('username');
        $user->password=Hash::make($request->input('password'));
        $user->role='3';
        $user->save();
        return redirect('/resolveurs/create');
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
    { //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
   
}
