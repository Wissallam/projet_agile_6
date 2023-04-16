
<?php
use App\Models\Reclameur;
use App\Models\Client;
?>

<!DOCTYPE html>
<html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestion des incidents</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="{{url('css/choices.min.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{url('css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{url('image/favicon-16x16.png')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        		<!-- Site favicon -->
	



    <!-- Mobile Specific Metas -->


    <!-- Google Font -->
  
    <!-- CSS -->

  </head>
  <body>
    <div id="app">
    <div class="page">
      <!-- Main Navbar-->
      <header class="header z-index-50">
        <nav class="navbar py-3 px-0 shadow-sm text-white position-relative">
          <!-- Search Box-->
          <div class="search-box shadow-sm">
            <button class="dismiss d-flex align-items-center">
              <svg class="svg-icon svg-icon-heavy" >
                <use xlink:href="#close-1"> </use>
              </svg>
            </button>
            @if (Route::is('tickets.index'))
            <form action="{{route('tickets.search')}}">
              <input class="for-control shadow-0"  type="text" name="q"  placeholder="Qu'est ce que vous chercher...">
             
            </form>
          
          
        
           
            @else
            @if (Route::is('fermes.index'))
            <form action="{{route('fermes.search')}}">
              <input class="for-control shadow-0"  type="text" name="q"  placeholder="Qu'est ce que vous chercher...">
             
            </form>
            @else
            <form action="#" role="search">
              <input class="for-control shadow-0" type="text"name="q" style="backgroud-color:black;" placeholder="Qu'est ce que vous chercher...">
              
            </form>
         
           
            @endif
            @endif
          </div>
          <div class="container-fluid w-100">
            <div class="navbar-holder d-flex align-items-center justify-content-between w-100">
                
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Toggle Button--><a class="menu-btn active" id="toggle-btn" href="#"><span></span><span></span><span></span></a>
                <!-- Navbar Brand --><a class="navbar-brand d-none d-sm-inline-block" href="index.html">
     
                  <div class="brand-text d-none d-lg-inline-block"><span>Gestion des </span><strong>&nbspIncidents</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div></a>
                
              </div>
              <!-- Navbar Menu -->

              @guest
              @if (Route::has('login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
              @endif
        
          @else
            
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#find-1"> </use>
                    </svg></a></li>
                <!-- Notifications-->
                <li class="nav-item dropdown"> <a class="nav-link text-white" id="notifications" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#chart-1"> </use>
                    </svg><span class="badge bg-red badge-corner fw-normal">12</span></a>
                  <ul class="dropdown-menu dropdown-menu-end mt-3 shadow-sm" aria-labelledby="notifications">
                    <li><a class="dropdown-item py-3" href="#"> 
                        <div class="d-flex">
                          <div class="icon icon-sm bg-blue">
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                              <use xlink:href="#envelope-1"> </use>
                            </svg>
                          </div>
                          <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">You have 6 new messages </span><small class="small text-gray-600">4 minutes ago</small></div>
                        </div></a></li>
                    <li><a class="dropdown-item py-3" href="#"> 
                        <div class="d-flex">
                          <div class="icon icon-sm bg-green">
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                              <use xlink:href="#chats-1"> </use>
                            </svg>
                          </div>
                          <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2 WhatsApp messages</span><small class="small text-gray-600">4 minutes ago</small></div>
                        </div></a></li>
                    <li><a class="dropdown-item py-3" href="#"> 
                        <div class="d-flex">
                          <div class="icon icon-sm bg-orange">
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                              <use xlink:href="#checked-window-1"> </use>
                            </svg>
                          </div>
                          <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">Server Rebooted</span><small class="small text-gray-600">8 minutes ago</small></div>
                        </div></a></li>
                    <li><a class="dropdown-item py-3" href="#"> 
                        <div class="d-flex">
                          <div class="icon icon-sm bg-green">
                            <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                              <use xlink:href="#chats-1"> </use>
                            </svg>
                          </div>
                          <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-xs text-gray-600">New 2 WhatsApp messages</span><small class="small text-gray-600">10 minutes ago</small></div>
                        </div></a></li>
                    <li><a class="dropdown-item all-notifications text-center" href="#"> <strong class="text-xs text-gray-600">view all notifications                                            </strong></a></li>
                  </ul>
                </li>
                <!-- Messages                        -->
                <li class="nav-item dropdown"> <a class="nav-link text-white" id="messages" rel="nofollow" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#envelope-1"> </use>
                    </svg><span class="badge bg-orange badge-corner fw-normal">10</span></a>
                  <ul class="dropdown-menu dropdown-menu-end mt-3 shadow-sm" aria-labelledby="messages">
                    <li><a class="dropdown-item d-flex py-3" href="#"> <img class="img-fluid rounded-circle" src="{{url('image/avatar-1.jpg')}}" alt="..." width="45">
                        <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span><small class="small text-gray-600"> Sent You Message</small></div></a></li>
                    <li><a class="dropdown-item d-flex py-3" href="#"> <img class="img-fluid rounded-circle" src="{{url('image/avatar-2.jpg')}}" alt="..." width="45">
                        <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span><small class="small text-gray-600"> Sent You Message</small></div></a></li>
                    <li><a class="dropdown-item d-flex py-3" href="#"> <img class="img-fluid rounded-circle" src="{{url('image/avatar-3.jpg')}}" alt="..." width="45">
                        <div class="ms-3"><span class="h6 d-block fw-normal mb-1 text-sm text-gray-600">Jason Doe</span><small class="small text-gray-600"> Sent You Message</small></div></a></li>
                    <li><a class="dropdown-item text-center" href="#"> <strong class="text-xs text-gray-600">Read all messages   </strong></a></li>
                  </ul>
                </li>
                <!-- Languages dropdown    -->
              
                <!-- Logout    -->
              
                
                <li class="nav-item">
                    <div>
                        <a class="nav-link text-white"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();> <span class="d-none d-sm-inline"> {{ __('Logout') }}</span>
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#security-1"> </use>
                    </svg></a> 

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
             </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <?php
        $authtifier=Auth::user()->id;
      $reclameur = Reclameur::where('user_id',$authtifier)->first();
      $client=Client::where('id',$reclameur->client_id)->first();
   ?>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar z-index-40">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center py-4 px-3"><img class="avatar shadow-0 img-fluid rounded-circle" src="{{ asset('./uploads/' .$reclameur->image)}}"
            " alt="...">
            <div class="ms-3 title">
              <h5>{{$reclameur->name}}</h5>
              <p class="text-sm text-gray-500 fw-light mb-0 lh-1">{{$client->name}}</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Options</span>
          <ul class="list-unstyled py-4">
           
            
            @if(Route::is('home'))
            <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('home') }}"> 
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#quality-1"> </use>
              </svg>Profile </a></li>
                
@endif
           
                 
           
             
         

        
                @if(Route::is('reclameurrs.edit'))
                <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('home') }}"> 
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                    <use xlink:href="#quality-1"> </use>
                  </svg>Profile </a></li>
                    @endif   
                        
                    @if (Route::is('tickets.create')) 
                    <li class="sidebar-item "><a class="sidebar-link" href="{{ route('home') }}"> 
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                        <use xlink:href="#quality-1"> </use>
                      </svg>Profile </a></li>
                <li class="sidebar-item active "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                    <use xlink:href="#survey-1"> </use>
                  </svg>Tickets </a>
                  <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                    
                    @if (Route::is('tickets.create')) 
                    <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('tickets.create') }}">Créer un ticket  </a></li>
                    @else 
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('tickets.create') }}">Créer un Ticket</a></li> 
                    @endif  
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('tickets.index') }}">Tickets Ouverts </a></li> 
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('fermes.index') }}">Tickets fermés </a></li> 
                  </ul></li>
                  
                  @else
                  @if (Route::is('tickets.index')) 
                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('home') }}"> 
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                      <use xlink:href="#quality-1"> </use>
                    </svg>Profile </a></li>
              <li class="sidebar-item active "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                  <use xlink:href="#survey-1"> </use>
                </svg>Tickets </a>
                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                  
                  @if (Route::is('tickets.index')) 
                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('tickets.create') }}">Créer un Ticket</a></li>
                  @else 
                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('tickets.create') }}">Créer un Ticket</a></li> 
                  @endif  
                  <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('tickets.index') }}">Tickets Ouverts</a></li> 
                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('fermes.index') }}">Tickets fermés </a></li> 

                </ul></li>
                  @else
                  @if (Route::is('tickets.search')) 
                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('home') }}"> 
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                      <use xlink:href="#quality-1"> </use>
                    </svg>Profile </a></li>
              <li class="sidebar-item active "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                  <use xlink:href="#survey-1"> </use>
                </svg>Tickets </a>
                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                  
                  @if (Route::is('tickets.index')) 
                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('tickets.create') }}">Créer un Ticket</a></li>
                  @else 
                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('tickets.create') }}">Créer un Ticket</a></li> 
                  @endif  
                  <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('tickets.index') }}">Tickets Ouverts</a></li> 
                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('fermes.index') }}">Tickets fermés </a></li> 

                </ul></li>
                  @else
                  @if (Route::is('tickets.edit')) 
                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('home') }}"> 
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                      <use xlink:href="#quality-1"> </use>
                    </svg>Profile </a></li>
              <li class="sidebar-item active "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                  <use xlink:href="#survey-1"> </use>
                </svg>Tickets </a>
                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                  
                  @if (Route::is('tickets.edit')) 
                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('tickets.create') }}">Créer un Ticket</a></li>
                  @else 
                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('tickets.create') }}">Créer un Ticket</a></li> 
                  @endif  
                  <li class="sidebar-item active "><a class="sidebar-link" href="{{ route('tickets.index') }}">Tickets Ouverts</a></li> 
                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('fermes.index') }}">Tickets fermés </a></li> 

                </ul></li>
                  @else
                  @if (Route::is('fermes.search')) 
                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('home') }}"> 
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                      <use xlink:href="#quality-1"> </use>
                    </svg>Profile </a></li>
              <li class="sidebar-item active "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                  <use xlink:href="#survey-1"> </use>
                </svg>Tickets </a>
                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                  
                  @if (Route::is('fermes.search')) 
                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('tickets.create') }}">Créer un Ticket</a></li>
                  @else 
                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('tickets.create') }}">Créer un Ticket</a></li> 
                  @endif  
                  <li class="sidebar-item  "><a class="sidebar-link" href="{{ route('tickets.index') }}">Tickets Ouverts</a></li> 
                  <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('fermes.index') }}">Tickets fermés </a></li> 

                </ul></li>
                  @else
                  @if (Route::is('fermes.index')) 
                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('home') }}"> 
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                      <use xlink:href="#quality-1"> </use>
                    </svg>Profile </a></li>
              <li class="sidebar-item active "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                  <use xlink:href="#survey-1"> </use>
                </svg>Tickets </a>
                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                  
                  @if (Route::is('fermes.index')) 
                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('tickets.create') }}">Créer un Ticket</a></li>
                  @else 
                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('tickets.create') }}">Créer un Ticket</a></li> 
                  @endif  
                  <li class="sidebar-item  "><a class="sidebar-link" href="{{ route('tickets.index') }}">Tickets Ouverts</a></li> 
                  <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('fermes.index') }}">Tickets fermés </a></li> 
                </ul></li>
                  @else
                  
                  <li class="sidebar-item  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                      <use xlink:href="#survey-1"> </use>
                    </svg>Tickes </a>
                    <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                      @if (Route::is('tickets.create')) 
                      <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('tickets.create') }}">Créer un Ticket</a></li>
                      @else 
                      <li class="sidebar-item"><a class="sidebar-link" href="{{ route('tickets.create') }}">Créer un Ticket</a></li> 
                      @endif  
                      <li class="sidebar-item"><a class="sidebar-link" href="{{ route('tickets.index') }}"> Tickets Ouverts</a></li>
                      <li class="sidebar-item"><a class="sidebar-link" href="{{ route('fermes.index') }}">Tickets fermés </a></li> 
                    </ul></li>
                    @endif
                    @endif
                    @endif
                    @endif
                    @endif
                    @endif
                    
                  
                 
                    
        
           </nav>
          </ul>
        <div class="content-inner w-100">
          <!-- Page Header-->
              @yield('content')
          <!-- Dashboard Counts Section-->
         
        </div>
@endguest
    <!-- JavaScript files-->
    <script src="{{url('js/jsn/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('js/jsn/Chart.min.js')}}"></script>
    <script src="{{url('js/jsn/just-validate.min.js')}}"></script>
    <script src="{{url('js/jsn/choices.min.js')}}"></script>
    <script src="{{url('js/jsn/charts-home.js')}}"></script>
    <!-- Main File-->
    <script src="{{url('js/jsn/front.js')}}"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</div>
</div>
</div>
</body>
</html>