<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Client;
use App\Models\Reclameur;
use App\Models\Project;
use Carbon\Carbon;



class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authentifier=Auth::user()->id;
     
        $reclameur = Reclameur::where('user_id',$authentifier)->first();
        $client=Client::where('id',$reclameur->client_id)->first();
        $tickets=Ticket::where('client_id',$client->id)->orderBy('debut', 'desc')->get();
       
        
        return view('tickets.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {$authentifier=Auth::user()->id;
       $reclameur = Reclameur::where('user_id',$authentifier)->first();
       $client = Client::where('id',$reclameur->client_id)->first();

     $projects=Project::where('client_id',$client->id)->get();

  
   
       
        return view('tickets.create',compact('projects'));
      
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
            'titre'=>'required',      
            'description'=>'required',
        ]);
        $ticket=new Ticket();
        if($request->has('fil')){
            $file=$request->fil;
            $fil_name=time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'),$fil_name);
          }
          else $fil_name="NULL";
          $ticket->fil=$fil_name;
        $authentifier=Auth::user()->id;
       $reclameur = Reclameur::where('user_id',$authentifier)->first();
       $ticket->reclameur_id=$reclameur->id;
       $ticket->titre=$request->input('titre');
        $ticket->categorie=$request->input('categorie');
        $ticket->priorite=$request->input('priorite');
        $ticket->duree="Pas encore définie";
        $ticket->situation="Pas encore définie";
       
       
       $project = Project::where('name',$request->input('project'))->first();
     
      $ticket->project_id=$project->id;
      $ticket->client_id=$project->client_id;
        $ticket->debut= Carbon::now()->toDateTimeString();
        $ticket->chef=$project->resolveur_id;
        $ticket->statut="En attente";
      $ticket->description=$request->input('description');
        $ticket->save();
        return redirect('tickets');
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
    {$authentifier=Auth::user()->id;
        $reclameur = Reclameur::where('user_id',$authentifier)->first();
        $client = Client::where('id',$reclameur->client_id)->first();
 
      $projects=Project::where('client_id',$client->id)->get();
        $ticket=Ticket::findOrFail($id);
        return view('tickets.edit',['ticket'=>$ticket],compact('projects'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $ticket = Ticket::find($id);
        $ticket->titre=$request->input('titre');
        if($request->has('fil')){
            $file=$request->fil;
            $fil_name=time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'),$fil_name);
        }
        else $fil_name=$ticket->fil;
        $ticket->fil=$fil_name;
        $ticket->categorie=$request->input('categorie');
        $ticket->priorite=$request->input('priorite');
        $project = Project::where('name',$request->input('project'))->first();
        $ticket->project_id=$project->id;
        $ticket->client_id=$project->client_id;
         $ticket->chef=$project->resolveur_id;
         $ti=$ticket->description;
         if($request->input('description'))
         $ticket->description=$request->input('description');
         else  $ticket->description= $ti;
         $ticket->save();
         return redirect('tickets');
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
    public function search(){
        $q=request()->input('q');

        $ticket=Ticket::where('titre','like',"%$q%")->OrWhere('categorie','like',"%$q%")
        ->OrWhere('priorite','like',"%$q%")->OrWhere('statut','like',"%$q%")->OrWhere('situation','like',"%$q%")
         ->paginate(6);
      
    return view('tickets.search',['tickets'=>$ticket]);

    }
   
 
  
}
