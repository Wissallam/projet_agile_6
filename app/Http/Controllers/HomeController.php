<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Stroage;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $role=Auth::user()->role;
      
       if(($role=='1')){
        return view('home');
       }
        if($role=='2'){
            return view('Admins.home');
        }
        else  if($role=='3'){
        return view('resolveurs.profile');
           
        }
        
    }
    public function profile()
    {
        return view('profile');
    }
    public function profilee()
    {
        return view('resolveurs.profile');
    }
    public function tickets()
    {
        return view('tickets.ticket');
    }
  
    public function profilesadmin()
    {
        return view('Admin.profiles');
    }
    public function ferme()
    {
        return view('tickets.ferme');
    }
    public function fermee()
    {
        return view('ticketchefs.ferme');
    }
    public function fermeee()
    {
        return view('ticketchefs.ferm');
    }
    public function download($file){
          
        return response()->download(public_path('./uploads/' .$file));
  
      }
 
}
