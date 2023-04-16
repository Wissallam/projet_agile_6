<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Client;
use App\Models\Resolveur;
use App\Models\Project;
use Carbon\Carbon;
class TicketchefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authentifier=Auth::user()->id;
     
        $resolveur =Resolveur::where('user_id',$authentifier)->first();
        $tickets=Ticket::where('chef',$resolveur->id)->orderBy('debut', 'desc')->get();
     
        
        return view('ticketchefs.index',compact('tickets'));
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
         
        $ticket=Ticket::findOrFail($id);
        return view('ticketchefs.edit',['ticket'=>$ticket]);
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
            'situation'=>'required',
        ]
        );
        $ticket=Ticket::findOrFail($id);
        $ticket->situation=$request->input('situation'); 
        $ticket->derniere_modification=Carbon::now()->toDateTimeString(); 
        $ticket->update();
        return redirect('/ticketchefs');
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
      
    return view('ticketchefs.search',['tickets'=>$ticket]);

    }
}
