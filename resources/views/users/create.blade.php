
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

    <div class="modal-dialog" style="background-color:darkslateblue;color:darkslateblue;" >
      <div  class="modal-content" style="border-radius:60px;">
        <div class="modal-header" style="color:darkslateblue;">
          <h5 class="modal-title" style="margin-left:130px; " >Informations de Connexion</h5>
          
        </div>
        <div class="loginform">
          
          <form method="POST" action="{{route('users.store')}}" >
            @csrf
            <div class="mb-3">
              <label class="label-material" for="username">Nom d'utilisateur</label>
              <input style="border-radius:20px;" class="form-control" id="username" name="username" type="text" required>
             
            @if ($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
              </div>
              
                
                
                 
                  
                
             
            <div class="mb-3">
              <label class="label-material" for="password">Mot de passe</label>
              <input class="form-control" style="border-radius:20px;" id="password" name="password" type="password"   required>
            
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
      </div>
            <div class="mb-3">
              <label class="label-material" for="password-confirm">Confirmer le Mot de passe</label>
              <input class="form-control" style="border-radius:20px;" id="password-confirm"  type="password" name="password_confirmation"  required autocomplete="new-password">
            </div>
          
            <div class="modal-header" >
              <br>
            
              <button class="btn btn-primary" style="border-radius:12px;" type="submit" data-bs-dismiss="modal">Suivant</button>
              <a style="position : absolute ; left:30px;border-radius:12px;" class="btn btn-secondary" type="button" href="{{ route('reclameurs.index') }}">Retour</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
      
       

         

         
   

@endsection