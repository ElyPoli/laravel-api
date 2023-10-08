<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\AddProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    // Funzione che genera uno slug univoco
    private function createSlug($title)
    {
        $counter = 0;
        do {
            $slug = Str::slug($title); // creo uno slug

            // Se il contatore è maggiore di 0 lo concateno allo slug
            if ($counter > 0) {
                $slug = $slug . "-" . $counter;
            }

            $slugAlreadyExists = Project::where("slug", $slug)->first(); // verifico se esiste un elemento con lo stesso slug
            $counter++;
        } while ($slugAlreadyExists);

        return $slug;
    }

    // Ritorna una view che mostra un elenco di tutti i dati all’interno della tabella del db
    public function index()
    {
        $projects = Project::all();

        return view("admin.projects.index", compact("projects"));
    }

    // Ritorna una view che mostra i dettagli di uno specifico elemento
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();

        return view("admin.projects.show", compact("project"));
    }

    // Ritorna una view che mostra un form dove poter inserire i dati di un nuovo elemento
    public function create()
    {
        return view("admin.projects.create");
    }

    // Riceve i dati dal "create" e li salva all'interno della tabella nel db (creando il nuovo elemento)
    public function store(AddProjectsRequest $request)
    {
        // Inseirsco la validazione dei dati
        $data = $request->validated();

        $data["tools_used"] = explode(",", $data["tools_used"]);
        
        // Richiamo la funzione per generare uno slug univoco
        $data["slug"] = $this->createSlug($data["title"]);

        // Creo una nuova istanza e salvo i dati immessi nel form
        $project = new Project();
        $project->fill($data);
        $project->save();

        return redirect()->route("admin.projects.index");
    }

    // Ritorna una view che mostra un form con i dati dell'elemento da modificare
    public function edit($slug)
    {
        $project = Project::where('slug', $slug)->first();

        return view("admin.projects.edit", compact("project"));
    }

    // Riceve i dati dall'"edit" e li salva all'interno della tabella nel db (modificando un elemento già esistente)
    public function update(UpdateProjectsRequest $request, $slug)
    {
        $project = Project::where('slug', $slug)->first();

        // Inseirsco la validazione dei dati
        $data = $request->validated();

        $data["tools_used"] = explode(",", $data["tools_used"]);

        // Se l'utente ha modificato il titolo, aggiorno lo slug
        if ($data["title"] !== $project->title) {
            $data["slug"] = Str::slug($data["title"]);
        }

        // Aggiorno i dati dell'elemento
        $project->update($data);

        return redirect()->route("admin.projects.show", $project->slug);
    }

    // Individua la risorsa indicata dall'id e invoca il metodo delete
    public function destroy($slug)
    {
        $project = Project::where('slug', $slug)->first();

        $project->delete($slug);

        return redirect()->route("admin.projects.index");
    }
}
