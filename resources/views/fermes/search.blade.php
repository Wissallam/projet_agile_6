<?php
use App\Models\Project;
use App\Models\Client;
use App\Models\Ticket;
use App\Models\Reclameur;
use App\Models\Resolveur;
?>

@extends('dashboard')

@section('content')

<div class="content-inner w-100">
    <!-- Page Header-->
    <header class="bg-white shadow-sm px-4 py-3 z-index-20">
        <div class="container-fluid px-0">
          <h2 class="mb-0 p-1">Tickets</h2>
          
        </div>
      </header>
      <!-- Breadcrumb-->
      <div id="div_top_hypers">
      <div class="bg-white" >
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ul id="ul_top_hypers" class="list-unstyled py-4">
           
              
              <li class="sidebar-item active"><a class="sidebar-link-p" > 
                  
                    <use xlink:href="#real-estate-1"> </use>
                 Tickets Fermés</a></li>
              

             </nav>
            </ul>
          </nav>
        </div>
        </div>
      
</div>

    <!-- Page Header-->
   
 
    
    <!-- Breadcrumb-->
  
    <!-- Forms Section-->
  
   

        
           
    
          
   
      
        @foreach($tickets as $ticket)
        <?php 
    
           $reclameur=Reclameur::where('id',$ticket->reclameur_id)->first();
           $project=Project::where('id',$ticket->project_id)->first();
           $authentifier=Auth::user()->id;
            $reclameurs = Reclameur::where('user_id',$authentifier)->first();
            $resolveur=Resolveur::where('id',$project->resolveur_id)->first();
            $resol=explode(',',$ticket->resolveurs);
        ?>
        @if(($reclameurs->client_id)==$reclameur->client_id)
        @if(($ticket->situation=="Refusé")||($ticket->statut=="Résolu"))
         <div class="container-fluid">
          <div class="card" style="border-radius:20px;">
            
           
            <div class="card-body" >
    <div class="table-responsive" >
    <h6 style="text-align:center;">Responçable de la réclamation:&nbsp;<span style="color:brown;">{{$resolveur->name}}</span></h6>
      <table class="table mb-0 table-striped">
       
        
          <thead>
            <tr style="color:rgb(129, 82, 171);">
             
              <th>Titre</th>
              <th>Projet en question</th>
              <th>Catégorie</th>
              <th>Priorité</th>
              <th>Date de création</th>
            
            </tr>
          </thead>
          <tbody>
           
    
  
            <tr>
            
            
          
              <td><h6><br>{{$ticket->titre}}</h6></td>
              <td><h6><br>{{$project->name}}</h6></td> 
              <td><h6><br>{{$ticket->categorie}}</h6></td>
              <td><h6><br>{{$ticket->priorite}}</h6></td>
              <td><h6><br>{{$ticket->debut}}</h6></td>
             
             
              
            </tr>  
            
            
             
          </tbody>
       
       
        
          <thead>
            <tr style="color:rgb(129, 82, 171);">
             
              <th>Créer par</th>
              <th>Statut</th>
              <th >Situation</th>
              <th>Contact de l'admin de la résolution</th>
              <th>Dernière modification</th>
            </tr>
          </thead>
          <tbody>
          
    
  
            <tr>
            
            
          
              @if($reclameur->id==$reclameurs->id)
              <td><h6><br>Moi même</h6></td>
              @else
              <td><h6><br>{{$reclameur->name}}</h6></td>
@endif
@if($ticket->statut=="En cours de traitement")
<td><h6 style="color:darkorange;"><br>{{$ticket->statut}}</h6></td>
@else @if($ticket->statut=="En attente")
<td><h6 style="color:rgb(11, 109, 169)"><br>{{$ticket->statut}}</h6></td>
@else 
<td><h6 style="color:rgb(5, 160, 26)""><br>{{$ticket->statut}}</h6></td>
@endif
@endif 
              @if($ticket->situation=="Accepté")
              <td><h6 style="color:rgb(5, 160, 26)"><br>{{$ticket->situation}}</h6></td>
              @else @if($ticket->situation=="Refusé")
              <td><h6 style="color:darkred;"><br>{{$ticket->situation}}</h6></td>
              @else<td><h6 style="color:rgb(150, 142, 142)"><br>{{$ticket->situation}}</h6></td>
              @endif
              @endif
              
             
            {{--  @if($ticket->duree=="Pas encore définie")
              <td><h6 style="color:rgb(150, 142, 142)"><br>{{$ticket->duree}}</h6></td>
             @else <td><h6><br>{{$ticket->duree}}</h6></td>
             @endif--}}
             <td><h6><br>{{$resolveur->phone}}</h6></td>
              @if(($ticket->derniere_modification)==NULL)
              <td><h6 style="color:rgb(150, 142, 142)"><br>Pas encore modifié</h6></td>
              @else
              <td><h6 ><br>{{$ticket->derniere_modification}}</h6></td>
             
              @endif
            </tr>  
            
            
             
          </tbody>
        </table>
        <br>
        <h4 style="color:rgb(129, 82, 171);">Description du ticket:</h4> <span>{{$ticket->description}}</span>
        <br>
        @if($ticket->resolveurs)
        <h6 style="text-align:center;top:30px;">Résolveurs du ticket:&nbsp;
      
            @foreach($resol as $rr) <?php $resolv=Resolveur::where('id',$rr)->first();?><span style="color:brown;text-align:center;">+{{$resolv->name}}/{{$resolv->phone}}&nbsp;&nbsp;</span>@endforeach</h6>

 @else
 <h6 style="text-align:center;top:30px;">Résolveurs du ticket:&nbsp;&nbsp;<span style="color:brown;text-align:center;">Pas encore définis</span></h6>
 @endif
 @if($ticket->fil!="NULL")
 <a style=" border-radius:10px; background-color:rgb(92, 157, 162);" class="btn btn-primary" type="button" href="{{url('/download',$ticket->fil)}}" >Télécharger le fichier d'explication</a>
@endif
      </div>
    </div>
  </div>
</div>
 @endif
 @endif
@endforeach 
              
             


  @endsection