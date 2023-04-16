<?php
use App\Models\User;
?>

@extends('admins.dashboard')

@section('content')

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

             
    
<div class="modal-dialog" style="background-color:darkslateblue;width:500px;" >
  <div  class="modal-content" style="border-radius:60px;">
    <div class="modal-header" style="color:darkslateblue;">
      <h5 class="modal-title" style="margin-left:130px; " >Modifications des Informations </h5>
      
    </div>
  
      
        <div class="loginform" >
       <?php
                $user = User::where('id',$reclameur->user_id)->first();
        ?>  
               
                  
                <form method="POST" action="{{route('reclameurs.update',['reclameur'=>$reclameur->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label class="label-material" for="username">Nom d'utilisateur du client</label>
                      <input class="form-control" style="border-radius:20px;" id="username" name="username" value="{{old('username',$user->username)}}" type="text" aria-describedby="emailHelp">
                      @if ($errors->has('username'))
                      <span class="text-danger">{{ $errors->first('username') }}</span>
                  @endif
                    </div>
                    <div class="mb-3">
                        <label class="label-material" for="name">Nom Complet</label>
                        <input class="form-control"style="border-radius:20px;" id="name" name="name" value="{{old('name',$reclameur->name)}}" type="text" aria-describedby="emailHelp">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                      </div>
                    <div class="mb-3">
                        <label class="label-material" for="email">Email</label>
                        <input class="form-control" style="border-radius:20px;" id="email" name="email" value="{{old('email',$reclameur->email)}}" type="text" aria-describedby="emailHelp">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    </div>

                        @if ($reclameur->is_chef_reclameur=='true')
                        <div class="form-check" >
                          <input class="form-check-input" style="  position:center-align;"  name="is_chef_reclameur" value="true" id="is_chef_reclameur" type="radio" checked>
                          <label class="form-check-label" for="is_chef_reclameur">Priviligié</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input"name="is_chef_reclameur" value="false" id="is_chef_reclameur" type="radio">
                          <label class="form-check-label" for="is_chef_reclameur">Non priviligié</label>
                          @if ($errors->has('is_chef_reclameur'))
                        <span class="text-danger">{{ $errors->first('is_chef_reclameur') }}</span>
                    @endif
                        </div>
 
                      @else
                        <div class="form-check" >
                          <input class="form-check-input" style="  position:center-align;"  name="is_chef_reclameur" value="true" id="is_chef_reclameur" type="radio" >
                          <label class="form-check-label" for="is_chef_reclameur">Priviligié</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input"name="is_chef_reclameur" value="false" id="is_chef_reclameur" type="radio" checked>
                          <label class="form-check-label" for="is_chef_reclameur">Non priviligié</label>
                        
                        @if ($errors->has('is_chef_reclameur'))
                        <span class="text-danger">{{ $errors->first('is_chef_reclameur') }}</span>
                    @endif
                  </div>
                      @endif
                      <br>
                      <div class="mb-3">
                        <label class="label-material" for="phone">Numéro de Téléphone</label>
                        <input class="form-control"style="border-radius:20px;" id="phone" name="phone" value="{{old('phone',$reclameur->phone)}}" type="integer" aria-describedby="emailHelp">
          
                      </div>
                     
               
                    
                      <div class="row">
                        <label class="label-material" for="image">photo de profile:</label>
                        <div class="col-sm-9">
                          <input class="form-control" style="  position:center-align;border-radius:20px;  width:420px;margin: auto;text-align:center;" id="image" name="image" type="file">
                        </div>
                      </div>
                      <br>
                      <div class="mb-3">
                        <label class="label-material" for="password">Mot de passe</label>
                        <input class="form-control" style="border-radius:20px;" id="password" name="password" type="password"  >
                      </div>
                      @if ($errors->has('password'))
                      <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
                      <div class="mb-3">
                        <label class="label-material" for="password-confirm">Confirmer le Mot de passe</label>
                        <input class="form-control" style="border-radius:20px;" id="password-confirm"  type="password" name="password_confirmation" >
                      </div>
                    
                  
                    <div class="modal-footer">
                      <br>
                      <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Enregister</button>
                      <a style="position : absolute ; left:30px;" class="btn btn-secondary"  type="button" href="{{ route('clients.index') }}">Retour</a>
                    </div>
                  </form>
                  </div>
               
         
         

         
        </div>

      </div>
    </div>


@endsection