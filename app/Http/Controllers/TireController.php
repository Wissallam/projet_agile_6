<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resolveur;
use App\Models\Ticket;
use Carbon\Carbon;
class TireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tickets.ferme');
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
        $resolveurs=Resolveur::all();
        return view('tires.edit',['ticket'=>$ticket],compact('resolveurs'));
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
        if(isset($_POST['resolveurs']) && !empty($_POST['resolveurs'])){
            $Col1_Array1 = $_POST['resolveurs'];
            $buffer1 = implode(',',$Col1_Array1);
        }
        $ticket = Ticket::find($id);
        $ticket->resolveurs = $buffer1;
        $ticket->statut="En cours de traitement";
        $ticket->derniere_modification= Carbon::now()->toDateTimeString();
        $ticket->save();
        return redirect('ticketchefs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
