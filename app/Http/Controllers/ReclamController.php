<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reclameur;
use App\Models\User;
use App\Models\Client;


class ReclamController extends Controller
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

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {
        
        
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $reclameur=Reclameur::findOrFail($id);
        return view('reclameurrs.edit',['reclameur'=>$reclameur]);
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
            'username'=>'required',
             
            'email'=>'required|email',
            'name'=>'required',
                'password'=>'confirmed',
           
  
        ]
        );
         $reclameur=Reclameur::findOrFail($id);
        $user=User::where('id',$reclameur->user_id)->first();
        if($request->input('password')){
            $pass=$request->password=Hash::make($request->input('password'));
        }
        else $pass=$user->password; 
                if($request->has('image')){
                $file=$request->image;
                $image_name=time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'),$image_name);
            }
            else $image_name=$reclameur->image;
                 $user->password=$pass;
                 $user->username=$request->input('username');
                $reclameur->name=$request->input('name');
                $reclameur->email=$request->input('email');
                $reclameur->phone=$request->input('phone');
                
                $reclameur->image=$image_name;
                $reclameur->update();
                $user->update();
                return redirect('/home/profile');
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
