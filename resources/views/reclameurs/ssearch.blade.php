
<?php
use App\Models\User;
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
                    Utilisateurs</a></li>
                
  
               </nav>
              </ul>
            </nav>
          </div>
          </div>
        
  </div>
   


<div class="container-fluid">
       
  
 
  <div class="card">
    
    <div class="card-header">
     
                
          
      
      <a style=" border-radius:10px; background-color:darkgreen;" class="btn btn-primary" type="button" href="{{route('users.create')}}">Ajouter Un Utilisateur</a>
          
    </div>
        
           
    
          
    
    
    <div class="card-body">
      
      <div class="table-responsive">
        <table class="table mb-0 table-striped">
          <thead>
            <tr>
             
              <th>image</th>
              <th>Nom complet</th>
              <th>Nom d'utilisateur</th>
              <th>Email</th>
              <th>Numéro de téléphone</th>
              <th>Priviligié</th>
              <th>Client</th>
              <th>Modification</th>
              <th>Supression</th>
            </tr>
          </thead>
          <tbody>
           
            @foreach($reclameurs as $reclameur)
        <?php
        
            $user = User::where('id',$reclameur->user_id)->first();
            
            $client = Client::where('id',$reclameur->client_id)->first();
        
         ?>
  
            <tr>
            
            
              <td><img class="avatar shadow-0 img-fluid rounded-circle" src="{{ asset('./uploads/' .$reclameur->image)}}"></td>
              <td><h6><br>{{$reclameur->name}}</h6></td>
              <td><h6><br>{{$user->username}}</h6></td> 
              <td><h6><br>{{$reclameur->email}}</h6></td>
              <td><h6><br>{{$reclameur->phone}}</h6></td>
             @if ($reclameur->is_chef_reclameur=='true') <td><h6><br>Oui</h6></td>
             @else <td><h6><br>Non</h6></td>
             @endif
              <td><h6><br>{{$client->name}}</h6></td>
            
   @if($reclameur->delete=="Yes")
   <td><h6><br>Supprimé</h6></td>
   <td><h6><br>Supprimé</h6></td>
   @else  <td ><a class="btn btn-primary" style="border-radius:10px; background-color:orange;"  <a class="btn btn-secondary" type="button" href="{{route('reclameurs.edit',[$reclameur->id])}}" >Modifier</a></td>
                <td><a href="#" style="border-radius:10px; background-color:brown;"  class=" btn btn-danger delete" data-id={{$reclameur->id}}>Supprimer</a></td>
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