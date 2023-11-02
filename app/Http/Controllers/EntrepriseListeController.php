<?php

namespace App\Http\Controllers;
use App\Models\Entreprise;
use App\Http\Requests\EntrepriseRequest; 

use Illuminate\Http\Request;

class EntrepriseListeController extends Controller
{
    //
    public function index(){
        $entreprises =  Entreprise::orderBy('nom', 'asc')->get();
        return view('entreprises.liste-entreprise',compact('entreprises'));
    }
}
