
<?php
use App\Models\User;


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
                    Résolveurs</a></li>
                
  
               </nav>
              </ul>
            </nav>
          </div>
          </div>
        
  </div>
   


<div class="container-fluid">
       
  
 
  <div class="card">
    
    <div class="card-header">
     
                
          
      
      <a style=" border-radius:10px; background-color:darkgreen;" class="btn btn-primary" type="button" href="{{route('users.createe')}}">Ajouter Un Résolveur</a>
          
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
              <th>spécialité</th>
              <th>Numéro de téléphone</th>
              
              <th>Modification</th>
              <th>Supression</th>
            </tr>
          </thead>
          <tbody>
           
            @foreach($resolveurs as $resolveur)
        <?php
        
            $user = User::where('id',$resolveur->user_id)->first();
            
            
        
         ?>
  
            <tr>
            
            
              <td><img class="avatar shadow-0 img-fluid rounded-circle" src="{{ asset('./uploads/' .$resolveur->image)}}"></td>
              <td><h6><br>{{$resolveur->name}}</h6></td>
              <td><h6><br>{{$user->username}}</h6></td> 
              <td><h6><br>{{$resolveur->email}}</h6></td>
              <td><h6><br>{{$resolveur->specialite}}</h6></td>
              <td><h6><br>{{$resolveur->phone}}</h6></td>
             
            
              @if($resolveur->delete=="Yes")
              <td><h6><br>Supprimé</h6></td>
              <td><h6><br>Supprimé</h6></td>
              @else   
              <td ><a class="btn btn-primary" style="border-radius:10px; background-color:orange;" class="btn btn-secondary" type="button" href="{{route('resolveurs.edit',[$resolveur->id])}}" >Modifier</a></td>
              <td><a href="#" style="border-radius:10px; background-color:brown;"  class=" btn btn-danger deletee" data-id={{$resolveur->id}}>Supprimer</a></td>
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