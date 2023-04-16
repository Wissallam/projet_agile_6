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

             
    <div class="card-body" style=" margin-left:100px; margin-right:100px;">
    
      <div  class="modal-content" style="border-radius:10px;">
        <div class="modal-header" >
          <h5 class="modal-title" style="text-align:center;">Modification des informations d'identification</h5>
          
        </div>
        <div class="modal-body" >
          
            <div class="container-fluid" >
       
         
          
               
                  
                <form method="POST" action="{{route('users.update',['user'=>$user->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label class="form-label" for="username">Nom d'utilisateur du client</label>
                      <input class="form-control" id="username" name="username" value="{{old('username',$user->username)}}" type="text" aria-describedby="emailHelp">
                
                    
                    <div class="mb-3">
                      <label class="form-label" for="password">Mot de passe</label>
                      <input class="form-control" id="password"  type="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password-confirm">Confirmer le Mot de passe</label>
                        <input class="form-control" id="password-confirm"  type="password" name="password_confirmation" >
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