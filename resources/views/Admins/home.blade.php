
<?php
use App\Models\Project;
use App\Models\Client;
use App\Models\Ticket;
use App\Models\Reclameur;
use App\Models\Resolveur;
?>
@extends('admins.dashboard')

@section('content')

<?php
 $client=Client::count(); 
 $resolveur=Resolveur::count();
 $ticket=Ticket::count(); 
 $project=Project::count();     ?>
<div class="content-inner w-100">
    <!-- Page Header-->
    <header class="bg-white shadow-sm px-4 py-3 z-index-20">
      <div class="container-fluid px-0">
        <h2 class="mb-0 p-1">Statistiques</h2>
      </div>
    </header>

<section class="pb-0">
  <div class="container-fluid" >
    <div class="card mb-0">
      <div class="card-body">
        <div class="row gx-5 bg-white">
          <!-- Item -->
          <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
            <div class="d-flex align-items-center">
              <div class="icon flex-shrink-0 bg-violet">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                  <use xlink:href="#user-1"> </use>
                </svg>
              </div>
              <div class="mx-3">
                <h6 class="h4 fw-light text-gray-600 mb-3">Nos<br>Clients</h6>
                <div class="progress" style="height: 4px">
                  <div class="progress-bar bg-violet" role="progressbar" style="width: 10%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="number"><strong class="text-lg">{{$client}}</strong></div>
            </div>
          </div>
          <!-- Item -->
          <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
            <div class="d-flex align-items-center">
              <div class="icon flex-shrink-0 bg-red">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                  <use xlink:href="#survey-1"> </use>
                </svg>
              </div>
              <div class="mx-3">
                <h6 class="h4 fw-light text-gray-600 mb-3">Nos<br>Projets</h6>
                <div class="progress" style="height: 4px">
                  <div class="progress-bar bg-red" role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="number"><strong class="text-lg">{{$project}}</strong></div>
            </div>
          </div>
          <!-- Item -->
          <div class="col-xl-3 col-sm-6 py-4">
            <div class="d-flex align-items-center">
              <div class="icon flex-shrink-0 bg-orange">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                  <use xlink:href="#list-details-1"> </use>
                </svg>
              </div>
              <div class="mx-3">
                <h6 class="h4 fw-light text-gray-600 mb-3">Nos<br>Tickets</h6>
                <div class="progress" style="height: 4px">
                  <div class="progress-bar bg-orange" role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="number"><strong class="text-lg">{{$ticket}}</strong></div>
            </div>
          </div>
          <!-- Item -->
          <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
            <div class="d-flex align-items-center">
              <div class="icon flex-shrink-0 bg-green">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                  <use xlink:href="#user-1"> </use>
                </svg>
              </div>
              <div class="mx-3">
                <h6 class="h4 fw-light text-gray-600 mb-3">Nos<br>Résolveurs</h6>
                <div class="progress" style="height: 4px">
                  <div class="progress-bar bg-green" role="progressbar" style="width: 20%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="number"><strong class="text-lg">{{$resolveur}}</strong></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- Charts Section-->
  <section class="charts">
    <div class="container-fluid">
      <div class="row gy-4 align-items-stretch" >
        <div class="col-lg-6">
          <div class="card mb-0">
            <div class="card-header d-flex align-items-center">
             
              <h3 class="h4 mb-0">Statut des Tickets</h3>
            </div>
            <div class="card-body">
             
                
                  <canvas id="pieChartExample"></canvas>
             
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card mb-0">
            <div class="card-header d-flex align-items-center">
           
              <h3 class="h4 mb-0">Tickets Acceptés VS Ticket Refusés</h3>
            </div>
            <div class="card-body">
             
              
                  <canvas id="doughnutChartExample"></canvas>
              
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card mb-0 h-100" >
            <div class="card-header d-flex align-items-center" >
             
              <h3 class="h4 mb-0">Nombre de ticket créer par client</h3>
            </div>
            <div class="card-body">
             
                  <canvas id="polarChartExample"></canvas>
             
            </div>
          </div>
        </div>
        <!-- Line Charts-->
      
        <!-- Pie Chart -->
     
        <div class="col-lg-6" >
          <div class="card mb-0 h-100">
            <div class="card-header d-flex align-items-center">
        
              <h3 class="h4 mb-0">Tickets Refusés/Résolus par clients</h3>
            </div>
            <div class="card-body">
              <canvas id="barChartExample"></canvas>
            </div>
          </div>
        </div>
     
   
     
       
  
      </div>
    </div>
  </section>
</div>
  @endsection
