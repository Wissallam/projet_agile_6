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
                Clients</a></li>
            

           </nav>
          </ul>
        </nav>
      </div>
      </div>
    
</div>

             
  
      
        <div class="modal-dialog" style="background-color:darkslateblue;color:darkslateblue;" >
          <div  class="modal-content" style="border-radius:60px;">
            <div class="modal-header" style="color:darkslateblue;">
              <h5 class="modal-title" style="margin-left:130px; " >Informations du client</h5>
              
            </div>
            <div class="loginform">
                <form method="POST" action="{{route('clients.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label class="label-material" for="name">Nom du client</label>
                      <input class="form-control" style="border-radius:20px;" id="name" name="name" type="text" aria-describedby="emailHelp" required>
                      @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                    </div>
                    <div class="mb-3">
                      <label class="label-material" for="email">Email du client</label>
                      <input class="form-control" style="border-radius:20px;" id="email" name="email" type="email" required>
                      @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                    </div>
                    <div class="mb-3">
                      <label class="label-material" for="phone">Contact</label>
                      <input class="form-control" style="border-radius:20px;" id="phone"  type="phone" name="phone" required autocomplete="new-password">
                    </div>
                    <div class="row">
                        <label class="label-material" for="image">Logo</label>
                        <div class="col-sm-9">
                          <input class="form-control" style="  position:center-align;border-radius:20px;  width:420px;margin: auto;text-align:center;" id="image" name="image" type="file">
                        </div>
                      </div>
                      <br>
                    <div class="modal-header">
                      <br>
                      <button class="btn btn-primary" style="border-radius:12px;" type="submit" data-bs-dismiss="modal">Enregister</button>
                      <a style="position : absolute ; left:30px;border-radius:12px;" class="btn btn-secondary" type="button" href="{{ route('clients.index') }}">Retour</a>
                    </div>
                  </form>
                  </div>
               
         
         

         
        </div>

      </div>
    </div>


@endsection