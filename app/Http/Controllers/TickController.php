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
class TickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets=Ticket::orderBy('debut', 'desc')->get();
        return view('ticks.index',compact('tickets'));

    }

   
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
        $ticket=Ticket::findOrFail($id);
        return view('ticks.edit',['ticket'=>$ticket]);
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
        $ticket=Ticket::findOrFail($id);
                 $ticket->statut=$request->input('statut');
                 $ticket->derniere_modification= Carbon::now()->toDateTimeString();
                 

                $ticket->update();
                return redirect('/ticks');
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
      
    return view('ticks.search',['tickets'=>$ticket]);

    }
}
