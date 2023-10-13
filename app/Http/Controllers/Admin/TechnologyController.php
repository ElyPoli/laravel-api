<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TechnologyUpsertRequest;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    // Ritorna una view che mostra un elenco di tutti i dati all’interno della tabella del db
    public function index()
    {
        $technologies = Technology::all();

        return view("admin.technologies.index", compact("technologies"));
    }

    // Ritorna una view che mostra i dettagli di uno specifico elemento
    public function show($id)
    {
        $technology = Technology::findOrFail($id);

        return view("admin.technologies.show", compact("technology"));
    }

    // Ritorna una view che mostra un form dove poter inserire i dati di un nuovo elemento
    public function create()
    {
        return view("admin.technologies.create");
    }

    // Riceve i dati dal "create" e li salva all'interno della tabella nel db (creando il nuovo elemento)
    public function store(TechnologyUpsertRequest $request)
    {
        // Inseirsco la validazione dei dati
        $data = $request->validated();

        // Salvo l'icona all'interno del filesystem nella cartella technologies
        if(!empty($data["icon"])) {
            $data["icon"] = Storage::put("technologies", $data["icon"]);
        }

        // Creo una nuova istanza e salvo i dati immessi nel form
        $technology = new Technology();
        $technology->fill($data);
        $technology->save();

        return redirect()->route("admin.technologies.index");
    }

    // Ritorna una view che mostra un form con i dati dell'elemento da modificare
    public function edit($id)
    {
        $technology = Technology::findOrFail($id);

        return view("admin.technologies.edit", compact("technology"));
    }

    // Riceve i dati dall'"edit" e li salva all'interno della tabella nel db (modificando un elemento già esistente)
    public function update(TechnologyUpsertRequest $request, $id)
    {
        $technology = Technology::findOrFail($id);
        $data = $request->validated(); // inseirsco la validazione dei dati

        if (isset($data["icon"])) {
            // Elimino l'icona salvata precedentemente
            if ($technology->icon) {
                Storage::delete($technology->icon);
            }
            $data["icon"] = Storage::put("technologies", $data["icon"]); // salvo l'icona all'interno del filesystem nella cartella technologies
        }

        $technology->update($data); // aggiorno i dati dell'elemento

        return redirect()->route("admin.technologies.show", $technology->id);
    }

    // Individua la risorsa indicata dall'id e invoca il metodo delete
    public function destroy($id)
    {
        $technology = Technology::findOrFail($id);

        // Elimino l'icona salvata
        if ($technology->icon) {
            Storage::delete($technology->icon);
        }

        // Prima di eliminare la tecnologia elimino la sua relazione nella tabella
        $technology->projects()->detach();

        $technology->delete($id);

        return redirect()->route("admin.technologies.index");
    }
}
