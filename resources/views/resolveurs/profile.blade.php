<?php
use App\Models\Resolveur;
use App\Models\Project;
?>
@extends('resolveurs.home')

@section('content')
<?php
$authtifier=Auth::user()->id;
$resolveur = Resolveur::where('user_id',$authtifier)->first();
$project=Project::where('resolveur_id',$resolveur->id)->get();
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
            <div class="client-avatar mb-3"><img class="img-fluid rounded-circle shadow-0"src="{{ asset('./uploads/' .$resolveur->image)}}" alt="...">
              <div class="status bg-green"></div>
            </div>
            <h3 class="fw-normal">{{ $resolveur->name }}</h3>
            <p class="text-sm text-gray-500 mb-1">Résolveur</p>
           <br>
              <div class="input-group mb-3">
                <div class="btn btn-primary"style="width:170px;height:40px;" >Nom d'utilisateur</div>
                
                <div class="form-control"   aria-describedby="button-addon1">{{ Auth::user()->username }}
              </div> </div>
              <div class="input-group mb-3" >
                <div class="btn btn-primary" style="width:170px;height:40px;" >Email</div>
                <div class="form-control"   aria-describedby="button-addon1">{{ $resolveur->email }}
              </div> </div>
              <div class="input-group mb-3">
                <div class="btn btn-primary"style="width:170px;height:40px;" >Numéro GSM</div>
                <div class="form-control"   aria-describedby="button-addon1">{{ $resolveur->phone }}
              </div> </div>
              <div class="input-group mb-3">
                <div class="btn btn-primary" style="width:170px;height:40px;"  >Spécialité</div>
                <div class="form-control"   aria-describedby="button-addon1">{{$resolveur->specialite}}
              </div> </div>
              <div class="input-group mb-3">
                <div class="btn btn-primary" style="width:170px;"  >Admin du Projets</div>
                 <div class="form-control"   aria-describedby="button-addon1">  @foreach($project as $projects) +&nbsp;{{$projects->name}} <br>@endforeach 
              </div> </div>
           
            <div class="card-body text-center">
                <a class="btn btn-primary" type="button" href="{{route('resolveurrs.edit',[$resolveur->id])}}">Changer mes informations</a>
      
              </div>
          
            </div>
          </div>
        </div>

</div>

   
    
                    
             


  @endsection