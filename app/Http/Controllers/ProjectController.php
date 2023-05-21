<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Resolveur;
use App\Models\Client;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::all();

        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resolveurs=Resolveur::all();
        $clients=Client::all();
        return view('projects.create',compact('resolveurs','clients'));
        ////
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



        ]
    );
                $client = Client::where('name',$request->input('client'))->first();
                $resolveur = Resolveur::where('name',$request->input('resolveur'))->first();
                $i=$client->id;
                $j=$resolveur->id;
              $project=new Project();
            $project->name=$request->input('name');


            $project->client_id=$i;
            $project->resolveur_id=$j;


            $project->save();
            return redirect('/projects');
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
    {  $resolveurs=Resolveur::all();
        $project=Project::findOrFail($id);
        return view('projects.edit',['project'=>$project],compact('resolveurs'));
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
            'name'=>'required',
        ]
        );
         $project=Project::findOrFail($id);


         $resolveur = Resolveur::where('name',$request->input('resolveur'))->first();
         $j=$resolveur->id;
                $project->name=$request->input('name');
                $project->resolveur_id=$j;

                $project->update();
                return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project= Project::findOrfail($id);

        Project::destroy($id);

        return redirect('/projects');
    }
    public function ssssearch(){
        $q=request()->input('q');

        $project=Project::where('name','like',"%$q%")

         ->paginate(6);

    return view('projects.ssssearch',['projects'=>$project]);

    }
    public function deleteee($id)

    {


        $project= Project::findOrfail($id);
        $project->delete="Yes";
        $project->save();
        return redirect('/projects');
    }
}
