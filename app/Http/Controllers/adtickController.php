<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\Client;
use App\Models\Reclameur;
use App\Models\Resolveur;
use App\Models\Project;
use App\Models\tickets_resolveurs;
use Carbon\Carbon;
class adtickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Respons
     */
    public function index()
    {
        $tickets=Ticket::orderBy('debut', 'desc')->get();
        return view('adticks.index',compact('tickets'));
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
        //
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
        //
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
    public function search(){
        $q=request()->input('q');
        
        
     if(($client=Client::where('name','like',"%$q%")->first())){
      $ticket=Ticket::where('client_id',$client->id)->paginate(6);}
      else
      if(($project=Project::where('name','like',"%$q%")->first())){
        $ticket=Ticket::where('project_id',$project->id)->paginate(6);}
        else
      {
        $ticket=Ticket::where('categorie','like',"%$q%")
        ->OrWhere('priorite','like',"%$q%")->OrWhere('statut','like',"%$q%")->OrWhere('situation','like',"%$q%")
         ->paginate(6);
      }
    return view('adticks.search',['tickets'=>$ticket]);

    }
  
}
