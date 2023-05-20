<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resolveur;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class ResolveurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$resolveurs=Resolveur::all();
       
        return view('resolveurs.index',compact('resolveurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resolveurs.create');
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([
            'name'=>'required',
            'specialite'=>'required',
            'email'=>'required|email',
           
            
        ]
    );
            
            if($request->has('image')){
                $file=$request->image;
                $image_name=time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'),$image_name);
              }
              else{
                $image_name='R.png';}
              
              $resolveur=new Resolveur();
            $resolveur->name=$request->input('name');
            $resolveur->specialite=$request->input('specialite');
            $resolveur->user_id=(User::orderBy('created_at', 'desc')->first()->id);
            $resolveur->email=$request->input('email');
            $resolveur->image=$image_name;
            $resolveur->phone=$request->input('phone');
            
   
            $resolveur->save();
            return redirect('/resolveurs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //just testing the remote connection
        //show the ids
        //$resolveur=Resolveur::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resolveur=Resolveur::findOrFail($id);
        return view('resolveurs.edit',['resolveur'=>$resolveur]);
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
            'specialite'=>'required',
            'name'=>'required',
                'password'=>'confirmed',
           
  
        ]
        );
         $resolveur=Resolveur::findOrFail($id);
        $user=User::where('id',$resolveur->user_id)->first();
        if($request->input('password')){
            $pass=$request->password=Hash::make($request->input('password'));
        }
        else $pass=$user->password; 
                if($request->has('image')){
                $file=$request->image;
                $image_name=time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'),$image_name);
            }
            else $image_name=$resolveur->image;
                 $user->password=$pass;
                 $user->username=$request->input('username');
                 $resolveur->name=$request->input('name');
                 $resolveur->email=$request->input('email');
                 $resolveur->phone=$request->input('phone');
                
                 $resolveur->specialite=$request->input('specialite');
                $resolveur->image=$image_name;
                $resolveur->update();
                $user->update();
                return redirect('/resolveurs');
    }
    

    public function destroy($id)
    {
        $resolveur= Resolveur::findOrfail($id);
        $user = User::where('id',$resolveur->user_id)->first();
        $j=$user->id;
        Resolveur::destroy($id);
        User::destroy($j);
        return redirect('/resolveurs');
    }
    public function sssearch(){
        $q=request()->input('q');

        $resolveur=Resolveur::where('name','like',"%$q%")
        
         ->paginate(6);
      
    return view('resolveurs.sssearch',['resolveurs'=>$resolveur]);

    }
    public function deletee($id)
  
    {   
        $resolveur= Resolveur::findOrfail($id);
        $resolveur->delete="Yes";
        $user=User::where('id',$resolveur->user_id)->first();
        $user->delete="Yes";
        $user->password="hiiii";
        $user->save();
        $resolveur->save();
        return redirect('/resolveurs');
    }
}
