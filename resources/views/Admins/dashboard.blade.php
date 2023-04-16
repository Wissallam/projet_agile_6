<?php
use App\Models\Project;
use App\Models\Client;
use App\Models\Ticket;
use App\Models\Reclameur;
use App\Models\Resolveur;
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
    <link rel="stylesheet" href={{url('css/choices.min.css')}}>
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{url('css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{url('image/favicon-16x16.png')}}">
       <!-- Google fonts - Poppins -->
  
   
    <!-- Choices CSS-->
    
    <!-- theme stylesheet-->
   
 
    
         
      
          <!-- Global site tag (gtag.js) - Google Analytics -->
        
          



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
            @if (Route::is('reclameurs.index'))
            <form action="{{route('reclameurs.ssearch')}}">
              <input class="for-control shadow-0"  type="text" name="q"  placeholder="Qu'est ce que vous chercher...">
             
            </form>
            @else
            @if (Route::is('clients.index'))
            <form action="{{route('clients.search')}}">
              <input class="for-control shadow-0"  type="text" name="q"  placeholder="Qu'est ce que vous chercher...">
             
            </form>
            @else
            @if (Route::is('resolveurs.index'))
            <form action="{{route('resolveurs.sssearch')}}">
              <input class="for-control shadow-0"  type="text" name="q"  placeholder="Qu'est ce que vous chercher...">
             
            </form>
            @else
            @if (Route::is('projects.index'))
            <form action="{{route('projects.ssssearch')}}">
              <input class="for-control shadow-0"  type="text" name="q"  placeholder="Qu'est ce que vous chercher...">
             
            </form>
            @else
            @if (Route::is('adticks.index'))
            <form action="{{route('adticks.search')}}">
              <input class="for-control shadow-0"  type="text" name="q"  placeholder="Qu'est ce que vous chercher...">
             
            </form>
            @else
            <form action="#" role="search">
              <input class="for-control shadow-0" type="text"name="q" style="backgroud-color:black;" placeholder="Qu'est ce que vous chercher...">
              
            </form>
            @endif
            @endif
            @endif
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
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar z-index-40">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center py-4 px-3"><img class="avatar shadow-0 img-fluid rounded-circle" src="{{url('image/R.png')}}"
            " alt="...">
            <div class="ms-3 title">
              <h5>ADMINISTRATEUR </h5>
              <p class="text-sm text-gray-500 fw-light mb-0 lh-1"></p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Options</span>
          <ul class="list-unstyled py-4">
         @if (Route::is('home'))
            <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('home') }}"> 
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#sales-up-1"> </use>
              </svg>Statistique </a>
                @else
                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('home') }}"> 
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                    <use xlink:href="#sales-up-1"> </use>
                  </svg>Statistique </a></li>
            @endif   
              
             
                  
                        @if (Route::is('reclameurs.index')) 
                        <li class="sidebar-item active "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                            <use xlink:href="#real-estate-1"> </use>
                          </svg>Tables </a>
                          <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                            @if (Route::is('reclameurs.index'))
                            <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li>
                            @else 
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                            @endif  
                            <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                            <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                            <li class="sidebar-item "><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                          </ul></li>
                          
                          @else
                          @if (Route::is('users.create'))
                          <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                              <use xlink:href="#real-estate-1"> </use>
                            </svg>Tables </a>
                            <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                             
                              
                              <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                             
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                            </ul></li>
                      
                          @else
                          @if (Route::is('reclameurs.create'))
                          <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                              <use xlink:href="#real-estate-1"> </use>
                            </svg>Tables </a>
                            <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                             
                              
                              <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                             
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                            </ul></li>
                          @else
                          @if (Route::is('projects.index')) 
                        <li class="sidebar-item active "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                            <use xlink:href="#real-estate-1"> </use>
                          </svg>Tables </a>
                          <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                  
                           
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                             
                            <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                            <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                            <li class="sidebar-item "><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                            @if (Route::is('projects.index'))
                            <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 
                            @else 
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                            @endif 
                          </ul></li>
                          
                          @else
                
                          @if (Route::is('projects.create'))
                          <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                              <use xlink:href="#real-estate-1"> </use>
                            </svg>Tables </a>
                            <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                             
                              
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                             
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                              <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 
                            </ul></li>
                          @else
                          @if (Route::is('resolveurs.index')) 
                          <li class="sidebar-item active "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                              <use xlink:href="#real-estate-1"> </use>
                            </svg>Tables </a>
                            <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                               
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li>
                              @if (Route::is('resolveurs.index'))
                              <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                              @else 
                              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li> 
                              @endif
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                            </ul></li>
                            
                            @else
                            @if (Route::is('users.createe'))
                            <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#real-estate-1"> </use>
                              </svg>Tables </a>
                              <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                               
                                
                                <li class="sidebar-item "><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                               
                                <li class="sidebar-item active "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                                <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                                <li class="sidebar-item "><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                              </ul></li>
                        
                            @else
                            @if (Route::is('resolveurs.create'))
                            <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#real-estate-1"> </use>
                              </svg>Tables </a>
                              <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                               
                                
                                <li class="sidebar-item "><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                               
                                <li class="sidebar-item active "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                                <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                                <li class="sidebar-item "><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                              </ul></li>
                          @else
                          @if (Route::is('adticks.search'))
                          <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                              <use xlink:href="#real-estate-1"> </use>
                            </svg>Tables </a>
                            <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                             
                              
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                             
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                              <li class="sidebar-item active "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                            </ul></li>
                        @else
                          @if (Route::is('clients.index'))
                          <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                              <use xlink:href="#real-estate-1"> </use>
                            </svg>Tables </a>
                            <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                             
                              
                              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                             
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                              <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                            </ul></li>
                            @else
                            @if (Route::is('clients.create'))
                            <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#real-estate-1"> </use>
                              </svg>Tables </a>
                              <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                               
                                
                                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                               
                                <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                                <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                                <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                              </ul></li>
                          @else
                          
                            @if (Route::is('clients.edit'))
                            <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#real-estate-1"> </use>
                              </svg>Tables </a>
                              <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                               
                                
                                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                               
                                <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                                <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                                <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                              </ul></li>
                          @else
                          @if (Route::is('reclameurs.ssearch'))
                          <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                              <use xlink:href="#real-estate-1"> </use>
                            </svg>Tables </a>
                            <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                             
                              
                              <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                             
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                            </ul></li>
                            @else
                            @if (Route::is('resolveurs.sssearch'))
                            <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#real-estate-1"> </use>
                              </svg>Tables </a>
                              <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                               
                                
                                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                               
                                <li class="sidebar-item active "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                                <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                              </ul></li>
                              @else
                            @if (Route::is('clients.search'))
                            <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#portfolio-grid-1"> </use>
                              </svg>Tables </a>
                              <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                                <li class="sidebar-item "><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                               
                                 <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                                 <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                                <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                              </ul></li>
                              @else
                              @if (Route::is('adticks.index'))
                            <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                <use xlink:href="#portfolio-grid-1"> </use>
                              </svg>Tables </a>
                              <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                                <li class="sidebar-item "><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                               
                                 <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                                 <li class="sidebar-item active "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                                <li class="sidebar-item "><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                                <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                              </ul></li>
                              @else
                              @if (Route::is('resolveurs.edit'))
                              <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                  <use xlink:href="#portfolio-grid-1"> </use>
                                </svg>Tables </a>
                                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                                  <li class="sidebar-item  "><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                                  <li class="sidebar-item active "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                                </ul></li>
                              @else
                              @if (Route::is('reclameurs.edit'))
                              <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                  <use xlink:href="#portfolio-grid-1"> </use>
                                </svg>Tables </a>
                                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                                  <li class="sidebar-item active "><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                                 
                                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                                </ul></li>
                              @else
                              @if (Route::is('projects.edit'))
                              <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                                <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                  <use xlink:href="#portfolio-grid-1"> </use>
                                </svg>Tables </a>
                                <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                                  <li class="sidebar-item  "><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                                 
                                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                                  <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                                  <li class="sidebar-item"><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                                  <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                                </ul></li>
                                @else
                                @if (Route::is('projects.ssssearch'))
                                <li class="sidebar-item active  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                                  <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                                    <use xlink:href="#real-estate-1"> </use>
                                  </svg>Tables </a>
                                  <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                                    <li class="sidebar-item  "><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                                   
                                    <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                                    <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                                    <li class="sidebar-item active"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 
  
                                  </ul></li>
                                  @else
                          <li class="sidebar-item  "><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
                            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                              <use xlink:href="#portfolio-grid-1"> </use>
                            </svg>Tables </a>
                            <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                              
                             
                             
                              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('reclameurs.index') }}">Utilisateurs</a></li> 
                            
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('resolveurs.index') }}">Résolveurs</a></li>
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('adticks.index') }}">Tickets</a></li> 
                              <li class="sidebar-item "><a class="sidebar-link" href="{{ route('clients.index') }}">Clients</a></li> 
                              <li class="sidebar-item"><a class="sidebar-link" href="{{ route('projects.index') }}">Projects</a></li> 

                            </ul></li>
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
                            @endif
           
           </nav>
        <div class="content-inner w-100" >
          <!-- Page Header-->
              @yield('content')
          <!-- Dashboard Counts Section-->
         
        </div>
        <?php $tick=Ticket::where('situation',"Refusé")->count();
        $ticks=Ticket::where('situation',"Accepté")->count();
        $att=Ticket::where('statut',"En attente")->where('situation',"Pas encore définie")->count();     
        $cour=Ticket::where('statut',"En cours de traitement")->count(); 
        $res=Ticket::where('statut',"Résolu")->count(); 
        $clients=Client::all();
        ?>
   
       
       
@endguest
    <!-- JavaScript files-->
    <script src="{{url('js/jsn/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('js/jsn/Chart.min.js')}}"></script>
    <script src="{{url('js/jsn/just-validate.min.js')}}"></script>
    <script src="{{url('js/jsn/choices.min.js')}}"></script>
    <script src="{{url('js/jsn/charts-home.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <script>
       $('.delete').click(function(){
        var idd=$(this).attr('data-id');
        swal({
  title: "Êtes vous sûrs de votre supression?",
  
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location="/delete/"+idd+""
    swal("Supression effectué avec succès", {
      icon: "success",
    });
  } else {
    swal("Aucune supression n'a été effectué");
  }
});
       });
       $('.deleteeee').click(function(){
       var iddd=$(this).attr('data-id');
       swal({
 title: "Êtes vous sûrs de votre supression?",
 
 icon: "warning",
 buttons: true,
 dangerMode: true,
})
.then((willDelete) => {
 if (willDelete) {
   window.location="/deleteeee/"+iddd+""
   swal("Supression effectué avec succès", {
     icon: "success",
   });
 } else {
   swal("Aucune supression n'a été effectué");
 }
});
      });
      $('.deletee').click(function(){
       var iddd=$(this).attr('data-id');
       swal({
 title: "Êtes vous sûrs de votre supression?",
 
 icon: "warning",
 buttons: true,
 dangerMode: true,
})
.then((willDelete) => {
 if (willDelete) {
   window.location="/deletee/"+iddd+""
   swal("Supression effectué avec succès", {
     icon: "success",
   });
 } else {
   swal("Aucune supression n'a été effectué");
 }
});
      });
      $('.deleteee').click(function(){
       var iddd=$(this).attr('data-id');
       swal({
 title: "Êtes vous sûrs de votre supression?",
 
 icon: "warning",
 buttons: true,
 dangerMode: true,
})
.then((willDelete) => {
 if (willDelete) {
   window.location="/deleteee/"+iddd+""
   swal("Supression effectué avec succès", {
     icon: "success",
   });
 } else {
   swal("Aucune supression n'a été effectué");
 }
});
      });

    </script>
 
    <script >

      "use strict";
      
      document.addEventListener("DOMContentLoaded", function () {
          // ------------------------------------------------------- //
          // Charts Gradients
          // ------------------------------------------------------ //
          var canvas = document.querySelector("canvas");
      
          var ctx1 = canvas.getContext("2d");
          var gradient1 = ctx1.createLinearGradient(150, 0, 150, 300);
          gradient1.addColorStop(0, "rgba(133, 180, 242, 0.91)");
          gradient1.addColorStop(1, "rgba(255, 119, 119, 0.94)");
      
          var gradient2 = ctx1.createLinearGradient(146.0, 0.0, 154.0, 300.0);
          gradient2.addColorStop(0, "rgba(104, 179, 112, 0.85)");
          gradient2.addColorStop(1, "rgba(76, 162, 205, 0.85)");
      
          // ------------------------------------------------------- //
          // Line Chart
          // ------------------------------------------------------ //
         
      
          // ------------------------------------------------------- //
          // Doughnut Chart
          // ------------------------------------------------------ //
          
      
          var DOUGHNUTCHARTEXMPLE = document.getElementById("doughnutChartExample");
          var pieChartExample = new Chart(DOUGHNUTCHARTEXMPLE, {
              type: "doughnut",
              options: {
                  cutoutPercentage: 70,
              },
              data: {
                  labels: ["Tickets acceptés","Ticket refusés" ],
                  datasets: [
                      {
                          data: [{{$ticks}},{{$tick}} ],
                          borderWidth: 2,
                          backgroundColor: ["#49cd8b","#ff7676" ],
                          hoverBackgroundColor: ["#49cd8b","#ff7676" ],
                      },
                  ],
              },
          });
      
          var pieChartExample = {
              responsive: true,
          };
      

          // ------------------------------------------------------- //
          // Pie Chart
          // ------------------------------------------------------ //
          var PIECHARTEXMPLE = document.getElementById("pieChartExample");
          var pieChartExample = new Chart(PIECHARTEXMPLE, {
              type: "pie",
              data: {
                  labels: ["Tickets en attente", "Tickets en cours de taitement", "Tickets Résolu"],
                  datasets: [
                      {
                          data: [{{$att}}, {{$cour}},{{$res}}],
                          borderWidth: 2,
                          backgroundColor: ["darkgrey", "#FFC14D", "#49cd8b"],
                          hoverBackgroundColor: ["darkgrey", "#FFC14D", "#49cd8b"],
                      },
                  ],
              },
          });
      
          var pieChartExample = {
              responsive: true,
          };
      
          // ------------------------------------------------------- //
          // Bar Chart
          // ------------------------------------------------------ //
          

          var BARCHARTEXMPLE = document.getElementById("barChartExample");
          var barChartExample = new Chart(BARCHARTEXMPLE, {
            
              type: "bar",
              options: {
                  scales: {
                      xAxes: [
                          {
                              display: true,
                              gridLines: {
                                  color: "#eee",
                              },
                          },
                      ],
                      yAxes: [
                          {
                              display: true,
                              gridLines: {
                                  color: "#eee",
                              },
                          },
                      ],
                  },
              },
              
   
              data: {
                  labels: [  @foreach($clients as $client) "{{$client->name}}", @endforeach],
                  datasets: [
                      {
                          label: "Tickets résolus",
                          backgroundColor: [gradient1, gradient1, gradient1, gradient1, gradient1, gradient1, gradient1],
                          hoverBackgroundColor: [gradient1, gradient1, gradient1, gradient1, gradient1, gradient1, gradient1],
                          borderColor: [gradient1, gradient1, gradient1, gradient1, gradient1, gradient1, gradient1],
                          borderWidth: 1,

 
         
                          data: [ @foreach($clients as $client)
        <?php
         $tl=Ticket::where('client_id',$client->id)->where('statut',"Résolu")->count();?> {{$tl}}, @endforeach],
                      },
                      {
                          label: "Ticket refusés",
                          backgroundColor: [gradient2, gradient2, gradient2, gradient2, gradient2, gradient2, gradient2],
                          hoverBackgroundColor: [gradient2, gradient2, gradient2, gradient2, gradient2, gradient2, gradient2],
                          borderColor: [gradient2, gradient2, gradient2, gradient2, gradient2, gradient2, gradient2],
                          borderWidth: 1,
                          data: [ @foreach($clients as $client) <?php  $tf=Ticket::where('client_id',$client->id)->where('situation',"Refusé")->count();?> {{$tf}}, @endforeach],
                      },
                  ],
              },
          
             
          });
     
          // ------------------------------------------------------- //
          // Polar Chart
          // ------------------------------------------------------ //
          var POLARCHARTEXMPLE = document.getElementById("polarChartExample");
          var polarChartExample = new Chart(POLARCHARTEXMPLE, {
              type: "polarArea",
              options: {
                  elements: {
                      arc: {
                          borderWidth: 2,
                          borderColor: "#ffffff",
                      },
                  },
              },
              data: {
                  datasets: [
                      {
                          data: [@foreach($clients as $client)<?php $f=Ticket::where('client_id',$client->id)->count(); ?> "{{$f}}", @endforeach],
                          backgroundColor: [@foreach($clients as $client) "#8282ee", @endforeach],
                          label: "My dataset", // for legend
                      },
                  ],
                  labels: [@foreach($clients as $client) "{{$client->name}}", @endforeach],
              },
          });
      
          var polarChartExample = {
              responsive: true,
          };
      
          // ------------------------------------------------------- //
          // Radar Chart
          // ------------------------------------------------------ //
          var RADARCHARTEXMPLE = document.getElementById("radarChartExample");
          var radarChartExample = new Chart(RADARCHARTEXMPLE, {
              type: "radar",
              data: {
                  labels: ["A", "B", "C", "D", "E", "C"],
                  datasets: [
                      {
                          label: "First dataset",
                          backgroundColor: "rgba(84, 230, 157, 0.4)",
                          borderWidth: 2,
                          borderColor: "rgba(75, 204, 140, 1)",
                          pointBackgroundColor: "rgba(75, 204, 140, 1)",
                          pointBorderColor: "#fff",
                          pointHoverBackgroundColor: "#fff",
                          pointHoverBorderColor: "rgba(75, 204, 140, 1)",
                          data: [65, 59, 90, 81, 56, 55],
                      },
                      {
                          label: "Second dataset",
                          backgroundColor: "rgba(255, 119, 119, 0.4)",
                          borderWidth: 2,
                          borderColor: "rgba(255, 119, 119, 1)",
                          pointBackgroundColor: "rgba(255, 119, 119, 1)",
                          pointBorderColor: "#fff",
                          pointHoverBackgroundColor: "#fff",
                          pointHoverBorderColor: "rgba(255, 119, 119, 1)",
                          data: [50, 60, 80, 45, 96, 70],
                      },
                  ],
              },
          });
          var radarChartExample = {
              responsive: true,
          };
      });
      </script>
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

</body>
</html>