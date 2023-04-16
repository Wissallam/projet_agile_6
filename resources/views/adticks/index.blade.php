
<?php
use App\Models\Resolveur;
use App\Models\Client;
use App\Models\Project;
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
                    Tickets</a></li>
                
  
               </nav>
              </ul>
            </nav>
          </div>
          </div>
        
  </div>
   


<div class="container-fluid">
       
  
 
  <div class="card">
    
    <div class="card-header">
     
                
          
      
      
          
    </div>
        
           
    
          
    
    
    <div class="card-body">
      
      <div class="table-responsive">
        <table class="table mb-0 table-striped">
          <thead>
            <tr style="color:rgb(167, 108, 222)">
             
              <th>Client</th>
              <th>Project</th>
              <th>Catégorie</th>
              <th>Priorité</th>
             
              <th>Créer à</th>
              <th>Admin de la résolution</th>
              <th>Situation</th>
              <th>Statut</th>
            </tr>
          </thead>
          <tbody>
           
            @foreach($tickets as $ticket)
        <?php
        
            $project = Project::where('id',$ticket->project_id)->first();
            
            $client = Client::where('id',$ticket->client_id)->first();
            $resolveur = Resolveur::where('id',$ticket->chef)->first();
        
         ?>
 
            <tr>
            
            
            
              <td><h6><br>{{$client->name}}</h6></td>
              <td><h6><br>{{$project->name}}</h6></td> 
              <td><h6><br>{{$ticket->categorie}}</h6></td>
              <td><h6><br>{{$ticket->priorite}}</h6></td>
             
              <td><h6><br>{{$ticket->debut}}</h6></td>
              <td><h6><br>{{$resolveur->name}}</h6></td>
              @if($ticket->situation=="Refusé")
              <td><h6 style=" border-radius:10px;width:110px; background-color:brown" class="btn btn-primary">{{$ticket->situation}}</h6></td>
              @else
              @if($ticket->situation=="Accepté")
              <td><h6 style=" border-radius:10px;width:110px;  background-color:darkcyan" class="btn btn-primary">{{$ticket->situation}}</h6></td>
              @else
              @if($ticket->situation=="Pas encore définie")
              <td><h6 style=" border-radius:10px;width:110px;  background-color:darkgrey;" class="btn btn-primary">En attente</h6></td>
              @endif
@endif
@endif





              @if($ticket->statut=="En attente")
              <td><h6 style=" border-radius:10px;width:110px;  background-color:darkgrey;" class="btn btn-primary">{{$ticket->statut}}</h6></td>
              @else
              @if($ticket->statut=="En cours de traitement")
              <td><h6 style=" border-radius:10px;width:110px;  background-color:orange" class="btn btn-primary">En cours</h6></td>
          
          @else
          @if($ticket->statut=="Résolu")
          <td><h6 style=" border-radius:10px;width:110px;  background-color:green" class="btn btn-primary">{{$ticket->statut}}</h6></td>
      @endif
          @endif
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