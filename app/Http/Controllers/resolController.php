<?php

namespace App\Http\Controllers;
use App\Models\Resolveur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class resolController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        $resolveur=Resolveur::findOrFail($id);
        return view('resolveurrs.edit',['resolveur'=>$resolveur]);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'username'=>'required',
             
            'email'=>'required|email',
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
                return redirect('/home/resolveurs.profile');
    }

   
    public function destroy($id)
    {
        //
    }
}
