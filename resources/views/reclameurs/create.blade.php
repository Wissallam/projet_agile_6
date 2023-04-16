
<?php

use App\Models\Client;

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
      <h5 class="modal-title" style="margin-left:130px; " >Informations d'identificatin</h5>
      
    </div>
  
      
        <div class="loginform" >
       
         
          
     
                  
              <form method="POST"  action="{{route('reclameurs.store')}}" enctype="multipart/form-data">
                @csrf
          
                      <div class="mb-3" >
                        <label class="label-material" for="name">Nom complet:</label>
                        <input class="form-control" style="border-radius:20px;"id="name" name="name" type="string" aria-describedby="emailHelp" Required>
                       
                      </div>
                      @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                      <div class="mb-3" >
                        <label class="label-material" for="email">Email:</label>
                        <input class="form-control" style="border-radius:20px;" id="email" name="email" type="string" aria-describedby="emailHelp">
                      </div>  
                      @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif  
                      <div class="mb-3" >
                        <label class="label-material" for="phone">Numéro Téléphone:</label>
                        <input class="form-control" style="border-radius:20px;" id="phone" name="phone" type="integer" aria-describedby="emailHelp">
                      </div>
                    
                    
                    <div class="form-check" >
                      <input class="form-check-input" style="  position:center-align;"  name="is_chef_reclameur" value="true" id="is_chef_reclameur" type="radio" >
                      <label class="form-check-label" for="is_chef_reclameur">Priviligié</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input"name="is_chef_reclameur" value="false" id="is_chef_reclameur" type="radio">
                      <label class="form-check-label" for="is_chef_reclameur">Non priviligié</label>
                    </div>
                    @if ($errors->has('is_chef_reclameur'))
                    <span class="text-danger">{{ $errors->first('is_chef_reclameur') }}</span>
                @endif
                     <br>
                 
                  <div class="row">
                    <label class="label-material" for="client">Employer du Client:</label>
                    <div class="col-sm-9" style="  position:center-align;  width:500px;margin: auto;text-align:center;">
                      <select class="form-select mb-3" style="border-radius:20px;text-align:center;"name="client" id="client">
                        @foreach($clients as $client)
                    <option style="border-radius:20px;text-align:center;" >{{$client->name}}</option>
                       @endforeach
                      </select>
                    </div>
                </div>
              
                    <div class="row">
                      <label class="label-material" for="image">photo de profile:</label>
                      <div class="col-sm-9">
                        <input class="form-control" style="  position:center-align;border-radius:20px;  width:420px;margin: auto;text-align:center;" id="image" name="image" type="file">
                      </div>
                    </div>
                  
                    <br>
                      
                    <div class="modal-header" >
                    
                      <button class="btn btn-primary" style="border-radius:12px;" type="submit" data-bs-dismiss="modal">Enregistrer</button>
                    </div>
                   
                    </form>
                  </div>
               
         
         

         
        </div>

      </div>
    </div>


@endsection