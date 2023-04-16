
<?php
use App\Models\Resolveur;
use App\Models\Client;

?>
@extends('admins.dashboard')

@section('content')


    <!-- Page Header-->
    <header class="bg-white shadow-sm px-4 py-3 z-index-20">
      <div class="container-fluid px-0">
        <h2 class="mb-0 p-1">Tables</h2>
      </div>
    
    </header>
    <div id="div_top_hypers">
        <div class="bg-white" >
          <div class="container-fluid">
            <nav aria-label="breadcrumb">
              <ul id="ul_top_hypers" class="list-unstyled py-4">
             
                
                <li class="sidebar-item active"><a class="sidebar-link-p" > 
                    
                      <use xlink:href="#real-estate-1"> </use>
                    Projects</a></li>
                
  
               </nav>
              </ul>
            </nav>
          </div>
          </div>
        
  </div>
   


<div class="container-fluid">
       
  
 
  <div class="card">
    
    <div class="card-header">
     
                
          
      
      <a style=" border-radius:10px; background-color:darkgreen;" class="btn btn-primary" type="button" href="{{route('projects.create')}}">Ajouter Un Projet</a>
          
    </div>
        
           
    
          
    
    
    <div class="card-body">
      
      <div class="table-responsive">
        <table class="table mb-0 table-striped">
          <thead>
            <tr>
             
              <th>Nom du projet</th>
              <th>Chef du projet</th>
              <th>Client</th>
              <th>Modification</th>
              <th>Supression</th>
            </tr>
          </thead>
          <tbody>
           
            @foreach($projects as $project)
        <?php
        
            $resolveur = Resolveur::where('id',$project->resolveur_id)->first();
            
            $client = Client::where('id',$project->client_id)->first();
        
         ?>
  
            <tr>
            
            
              
              <td><h6 style="color:darkred;"><br>{{$project->name}}</h6></td>
              <td><h6><br>{{$resolveur->name}}</h6></td> 
              <td><h6><br>{{$client->name}}</h6></td>
              
              
              
              @if($project->delete=="Yes")
              <td><h6><br>Supprimé</h6></td>
              <td><h6><br>Supprimé</h6></td>
              @else
              <td ><a class="btn btn-primary" style="border-radius:10px; background-color:orange;"  <a class="btn btn-secondary" type="button" href="{{route('projects.edit',[$project->id])}}" >Modifier</a></td>
              <td><a href="#" style="border-radius:10px; background-color:brown;"  class=" btn btn-danger deleteee" data-id={{$project->id}}>Supprimer</a></td>
              @endif
            </tr>  
            
            @endforeach 
             
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
   

                    
             


  @endsection