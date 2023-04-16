<?php
use App\Models\Project;
use App\Models\Client;
use App\Models\Reclameur;
?>

@extends('dashboard')

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
                 Modification du Ticket</a></li>
              

             </nav>
            </ul>
          </nav>
        </div>
        </div>
      
</div>

    <!-- Page Header-->
   
 
    
    <!-- Breadcrumb-->
  
    <!-- Forms Section-->
  
      <div class="container-fluid">
       
         
          
            <div class="card" >
             
              <div class="card-body">
              
                     
                <form method="POST" action="{{route('tickets.update',['ticket'=>$ticket->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="input-group mb-3" >
                    <label class="btn btn-primary" style="margin-left:100px;border-radius-left:20px;width:170px;height:40px;"  for="titre">Titre du ticket</label>
                    <input  class="form-control" style="margin-right:100px;" id="titre" type="texte" name="titre" value="{{old('titre',$ticket->titre)}}" aria-describedby="emailHelp">
                   
                  </div>
                <br>
                <div class="input-group mb-3" >
                  <label class="btn btn-primary" style="margin-left:100px;border-radius-left:20px;width:170px;height:39px;" for="project">Projet en question</label>
                  <div class="col-sm-9">
                    <div style="margin-right:63px;" >
                    <select class="form-select mb-3" name="project" id="project">
                      @foreach($projects as $project)
                    <option  >{{$project->name}}</option>
                       @endforeach
                    </select>
                  </div>  </div>
              </div>
             
                  <div class="input-group mb-3" >
                    <label class="btn btn-primary" style="margin-left:100px;border-radius-left:20px;width:170px;height:39px;" for="categorie">Genre du ticket</label>
                    <div class="col-sm-9">
                      <div style="margin-right:63px;" >
                      <select class="form-select mb-3" name="categorie" id="categorie">
                        <option >Panne</option>
                        <option>Manque de sécurité</option>
                        <option>Développer une option</option>
                        <option>Autre</option>
                      </select>
                    </div>  </div>
                </div>
                <div class="input-group mb-3" >
                  <label class="btn btn-primary" style="margin-left:100px;border-radius-left:20px;width:170px;height:39px;" for="priorite">Priorité du ticket</label>
                  <div class="col-sm-9">
                    <div style="margin-right:63px;" >
                    <select class="form-select mb-3" name="priorite" id="priorite">
                      <option >Faible</option>
                      <option>Moyenne</option>
                      <option>Forte</option>
                      <option>Immédiate</option>
                    </select>
                  </div>  </div>
              </div>

               
              <div class="input-group mb-3" >
             
                  <label class="btn btn-primary" style="margin-left:100px;border-radius-left:20px;width:170px;height:61.5px;"  for="description">Description du ticket</label>
                  <textarea style="margin-right:98px;"class="form-control" id="description" name="description" type="texte"  aria-describedby="emailHelp"></textarea>
                 
                </div>
                 <br>
                <div class="input-group mb-3" >
                  <label class="btn btn-primary" style="margin-left:100px;border-radius-left:20px;width:170px;height:38px;" for="fil">Fichier</label>
                  <div  class="col-sm-9" >
                    <div style="margin-right:60px;">
                    <input class="form-control"  id="fil" name="fil" type="file">
                  </div>
                </div></div>
                 
              
                  
                 
            <div class="modal-header" style="margin-right:100px;" >
              <br>
            
              <button class="btn btn-primary" style="border-radius:12px;" type="submit" data-bs-dismiss="modal">Envoyer</button>

            </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Horizontal Form-->
         
        </div>
      
    
    <!-- Page Footer-->
    
  @endsection 