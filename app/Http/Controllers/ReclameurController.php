<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclameur;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class ReclameurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$reclameurs=Reclameur::all();
       
        return view('reclameurs.index',compact('reclameurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $clients=Client::all();
        return view('reclameurs.create',compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
          public function store(Request $request)

        {  
            $request->validate([
            'name'=>'required',
           
            'email'=>'required|email',
            'is_chef_reclameur'=>'required',
            
        ]
    );
            
            if($request->has('image')){
                $file=$request->image;
                $image_name=time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'),$image_name);
              }
              else{
                $image_name='R.png';}
                $client = Client::where('name',$request->input('client'))->first();
                $i=$client->id;
              $reclameur=new Reclameur();
            $reclameur->name=$request->input('name');
            $reclameur->user_id=(User::orderBy('created_at', 'desc')->first()->id);
            $reclameur->email=$request->input('email');
            $reclameur->client_id=$i;
            $reclameur->image=$image_name;
            $reclameur->phone=$request->input('phone');
            $reclameur->is_chef_reclameur=$request->input('is_chef_reclameur');
   
            $reclameur->save();
            return redirect('/reclameurs');
        }
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //this function shows the ids
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
        return view('reclameurs.edit',['reclameur'=>$reclameur]);
        //retourner la view concernant la modification des reclameurs
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
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
            'is_chef_reclameur'=>'required',
            'name'=>'required',
                'password'=>'confirmed',
           
                //validators pour checker les requirements 
  
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
                $reclameur->is_chef_reclameur=$request->input('is_chef_reclameur');
                $reclameur->image=$image_name;
                $reclameur->update();
                $user->update();
                return redirect('/reclameurs');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
  
    {   
        
        
        $reclameur= Reclameur::findOrfail($id);
        $user = User::where('id',$reclameur->user_id)->first();
        $j=$user->id;
        Reclameur::destroy($id);
        User::destroy($j);
        return redirect('/reclameurs');
    }
    public function ssearch(){
        $q=request()->input('q');

        $reclameur=Reclameur::where('name','like',"%$q%")
        
         ->paginate(6);
      
    return view('reclameurs.ssearch',['reclameurs'=>$reclameur]);

    }
    public function delete($id)
  
    {  
        $reclameur= Reclameur::findOrfail($id);
        $reclameur->delete="Yes";
        $user=User::where('id',$reclameur->user_id)->first();
        $user->delete="Yes";
        $user->password="hiiii";
        $user->save();
        $reclameur->save();
        return redirect('/reclameurs');
    }
}
