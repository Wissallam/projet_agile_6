<?php
use App\Models\Reclameur;
use App\Models\Client;
?>
@extends('dashboard')

@section('content')
<?php
$authtifier=Auth::user()->id;
$reclameur = Reclameur::where('user_id',$authtifier)->first();
$client = Client::where('id',$reclameur->client_id)->first();
?>

    <!-- Page Header-->
    <header class="bg-white shadow-sm px-4 py-3 z-index-20">
      <div class="container-fluid px-0">
        <h2 class="mb-0 p-1">Profile</h2>
      </div>
    
    </header>
    <div class="modal-dialog" style="background-color:darkslateblue;color:darkslateblue;" >
      <div  class="modal-content" style="border-radius:60px;">
        <div class="modal-header" style="color:darkslateblue;">
          <h5 class="modal-title" style="margin-left:130px;text-align:center;">Mes informations personnelles</h5>
          
        </div>
       
          
          <div class="card-body text-center" >
            <div class="client-avatar mb-3"><img class="img-fluid rounded-circle shadow-0"src="{{ asset('./uploads/' .$reclameur->image)}}" alt="...">
              <div class="status bg-green"></div>
            </div>
            <h3 class="fw-normal">{{ $reclameur->name }}</h3>
            <p class="text-sm text-gray-500 mb-1">Utilisateur</p>
           <br>
              <div class="input-group mb-3">
                <div class="btn btn-primary"style="width:170px;height:40px;" >Nom d'utilisateur</div>
                
                <div class="form-control"   aria-describedby="button-addon1">{{ Auth::user()->username }}
              </div> </div>
              <div class="input-group mb-3" >
                <div class="btn btn-primary" style="width:170px;height:40px;" >Email</div>
                <div class="form-control"   aria-describedby="button-addon1">{{ $reclameur->email }}
              </div> </div>
              <div class="input-group mb-3">
                <div class="btn btn-primary"style="width:170px;height:40px;" >Numéro GSM</div>
                <div class="form-control"   aria-describedby="button-addon1">{{ $reclameur->phone }}
              </div> </div>
              <div class="input-group mb-3">
                <div class="btn btn-primary" style="width:170px;height:40px;"  >Société</div>
                <div class="form-control"   aria-describedby="button-addon1">{{$client->name}}
              </div> </div>
              @if ($reclameur->is_chef_reclameur=='true') 
              <div class="input-group mb-3">
                <div class="btn btn-primary" style="width:170px;height:40px;"  >Ma situation</div>
                <div class="form-control"   aria-describedby="button-addon1">Priviligié
              </div> </div>
              @else
              <div class="input-group mb-3">
                <div class="btn btn-primary" style="width:170px;height:40px;"  >Ma situation</div>
                <div class="form-control"   aria-describedby="button-addon1">Non priviligié
              </div> </div>
              @endif
            <div class="card-body text-center">
                <a class="btn btn-primary" type="button" href="{{route('reclameurrs.edit',[$reclameur->id])}}">Changer mes informations</a>
      
              </div>
          
            </div>
          </div>
        </div>

</div>

   
    
                    
             


  @endsection