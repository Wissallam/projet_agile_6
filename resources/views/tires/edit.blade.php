<?php
use App\Models\Resolveur;
use App\Models\ticket;
?>

@extends('resolveurs.home')

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
                Préciser les résolveurs  </a></li>
              

             </nav>
            </ul>
          </nav>
        </div>
        </div>
      
</div>

    <!-- Page Header-->
   
 
    
    <!-- Breadcrumb-->
  
    <!-- Forms Section-->
  
    <div class="modal-dialog" style="background-color:darkslateblue;color:darkslateblue;" >
        <div  class="modal-content" style="border-radius:60px;">
          <div class="modal-header" style="color:darkslateblue;">
            <h5 class="modal-title" style="margin-left:130px; " >Resolveurs du tickets:</h5>
            
          </div>
          <div class="loginform">
              
                     
                 
            <form method="POST" action="{{route('tires.update',['tire'=>$ticket->id])}}" >
              @csrf
              @method('PUT')
                
                    @foreach($resolveurs as $resolveur)
                    <div class="form-check">
                    <input class="form-check-input" id="resolveurs[]"  type="checkbox" value="{{$resolveur->id}}" name="resolveurs[]">
                    <label class="form-check-label" for="resolveur[]">{{$resolveur->name}}</label>
                  </div>
                  @endforeach
                <br>
            
           
                <div class="modal-header">
                    <br>
                    <button class="btn btn-primary" style="border-radius:12px;" type="submit" data-bs-dismiss="modal">Enregister</button>
                    <a style="position : absolute ; left:30px;border-radius:12px;" class="btn btn-secondary" type="button" href="{{ route('ticketchefs.index') }}">Retour</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Horizontal Form-->
         
        </div>
      
    
    <!-- Page Footer-->
    
  @endsection 