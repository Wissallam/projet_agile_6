
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
                    Clients</a></li>
                
  
               </nav>
              </ul>
            </nav>
          </div>
          </div>
        
  </div>
   


<div class="container-fluid">
       
  
 
  <div class="card">
    
    <div class="card-header">
     
      
      <a style=" border-radius:10px; background-color:darkgreen ;" class="btn btn-primary" type="button" href="{{route('clients.create')}}">Ajouter Un Client</a>

    </div>
        
            
              
              
          
    
    
    <div class="card-body">
      
      <div class="table-responsive">
        <table class="table mb-0 table-striped">
          <thead>
            <tr>
             <th>LOGO</th>
              <th>Nom de la société</th>
              <th>Email</th>
              <th>Numéro de Téléphone</th>
              <th>Modification</th>
              <th>Supression</th>
            </tr>
          </thead>
          <tbody>
           
            @foreach($clients as $client)
            <tr>
            
            
              <td><img class="avatar shadow-0 img-fluid rounded-circle" src="{{ asset('./uploads/' .$client->image)}}"></td>
              <td><h6><br>{{$client->name}}</h6></td>
              <td><h6><br>{{$client->email}}</h6></td> 
              <td><h6><br>{{$client->phone}}</h6></td>
              <form method="POST" action="{{route('clients.edit',['client'=>$client->id])}}">
                @csrf
                
              
                @if($client->delete=="Yes")
                <td><h6><br>Supprimé</h6></td>
                <td><h6><br>Supprimé</h6></td>
                @else
                <td><a href="{{route('clients.edit',['client'=>$client->id])}}" class="btn btn-primary" style="border-radius:10px; background-color:orange;"type="submit">Modifier</a></td>
                <td><a href="#" style="border-radius:10px; background-color:brown;"  class=" btn btn-danger deleteeee" data-id={{$client->id}}>Supprimer</a></td>
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