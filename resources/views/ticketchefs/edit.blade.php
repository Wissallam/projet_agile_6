
@extends('resolveurs.home')

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
                Réagir au ticket</a></li>
            

           </nav>
          </ul>
        </nav>
      </div>
      </div>
    
</div>

             
    
<div class="modal-dialog" style="background-color:darkslateblue;width:500px;" >
  <div  class="modal-content" style="border-radius:60px;">
    <div class="modal-header" style="color:darkslateblue;">
      <h5 class="modal-title" style="margin-left:130px; " >Acceptation/Refus du Ticket</h5>
      
    </div>
  
      
        <div class="loginform" >
               
                  
                <form method="POST" action="{{route('ticketchefs.update',['ticketchef'=>$ticket->id])}}" >
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" id="situation" value="Accepté" type="radio" name="situation">
                            <label class="form-check-label" for="situation"><h5 style="color:darkgreen;">Accepter</h5></label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input"  id="situation" type="radio" value="Refusé" name="situation" >
                            <label class="form-check-label" for="situation"><h5 style="color:darkred;">Refuser</h5></label>
                          </div>
                        </div>
                        <br>
                    <div class="modal-footer">
                      
                      <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Enregister</button>
                      <a style="position : absolute ; left:30px;" class="btn btn-secondary"  type="button" href="{{ route('ticketchefs.index') }}">Retour</a>
                    </div>
                  </form>
                  </div>
               
         
         

         
        </div>

      </div>
    </div>


@endsection