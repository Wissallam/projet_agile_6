<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Reclameur;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$clients=Client::all();
        
        return view('clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            
        ]
    );
        if($request->has('image')){
            $file=$request->image;
            $image_name=time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'),$image_name);
          }
          else{
          $image_name='home.png';}
          $client=new Client();
          $client->name=$request->input('name');
          
          $client->email=$request->input('email');
         
          $client->image=$image_name;
          $client->phone=$request->input('phone');
          
 
          $client->save();
          return redirect('/clients');
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
        $client=Client::findOrFail($id);
        return view('clients.edit',['client'=>$client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{    $request->validate([
    'name'=>'required',
    'email'=>'required|email',
    
]);
    $client=Client::findOrFail($id);
        if($request->has('image')){
        $file=$request->image;
        $image_name=time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'),$image_name);
    }
    else $image_name=$client->image;

        $client->name=$request->input('name');
        $client->email=$request->input('email');
        $client->phone=$request->input('phone');
        $client->image=$image_name;
        $client->update();
        return redirect('/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        while( $reclameurs=Reclameur::where('client_id',$id)->first()){
        $j=$reclameurs->id;
        $user = User::where('id',$reclameurs->user_id)->first();
        $d=$user->id;
        Reclameur::destroy($j);
        User::destroy($d);
      
    }
    while( $projects=Project::where('client_id',$id)->first()){
        $h=$projects->id;
        Project::destroy($h);
        
    }
    Client::destroy($id);
    return redirect('/clients');
}
public function search(){
    $q=request()->input('q');

    $client=Client::where('name','like',"%$q%")
    
     ->paginate(6);
  
return view('clients.search',['clients'=>$client]);

}
public function deleteeee($id)
  
{   
    $client= Client::findOrfail($id);
    $client->delete="Yes";
    $client->save();
    return redirect('/clients');
}

}