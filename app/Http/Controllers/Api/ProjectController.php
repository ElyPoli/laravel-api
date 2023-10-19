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
        // Recupero una lista di progetti dal database, li suddivido in pagine e aggiungo i dati delle relazioni "type" e "technologies"
        $projects = Project::with(["type", "technologies"])->paginate(12);

        // Ritorno dei dati sotto forma di un file json
        return response()->json([
            "message" => "Projects list",
            "results" => $projects
        ]);
    }

    // Ritorna un file json con l'elenco di tutti i dati di uno specifico elemento
    public function show($slug)
    {
        $project = Project::where('slug', $slug)
            ->with(["type", "technologies"])
            ->first();

        // Se nessuno slug corrisponde alla ricerca restituisco 404
        if (!$project) {
            abort(404);
        }

        // Ritorno dei dati sotto forma di un file json
        return response()->json($project);
    }
}
