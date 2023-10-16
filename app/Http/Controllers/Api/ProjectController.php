<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Ritorna un file json con l'elenco di tutti i dati all’interno della tabella del db
    public function index()
    {
        $projects = Project::all(); // prendo i dati dalla tabella del db
        return response()->json([ // ritorno un file json
            "message" => "Projects list",
            "results" => $projects
        ]); 
    }
}
