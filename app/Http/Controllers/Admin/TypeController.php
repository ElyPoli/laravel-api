<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypesUpsertRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    // Ritorna una view che mostra un elenco di tutti i dati all’interno della tabella del db
    public function index()
    {
        $types = Type::all();

        return view("admin.types.index", compact("types"));
    }

    // Ritorna una view che mostra i dettagli di uno specifico elemento
    public function show($id)
    {
        $type = Type::findOrFail($id);

        return view("admin.types.show", compact("type"));
    }

    // Ritorna una view che mostra un form dove poter inserire i dati di un nuovo elemento
    public function create()
    {
        return view("admin.types.create");
    }

    // Riceve i dati dal "create" e li salva all'interno della tabella nel db (creando il nuovo elemento)
    public function store(TypesUpsertRequest $request)
    {
        // Inseirsco la validazione dei dati
        $data = $request->validated();

        // Creo una nuova istanza e salvo i dati immessi nel form
        $type = new Type();
        $type->fill($data);
        $type->save();

        return redirect()->route("admin.types.index");
    }

    // Ritorna una view che mostra un form con i dati dell'elemento da modificare
    public function edit($id)
    {
        $type = Type::findOrFail($id);

        return view("admin.types.edit", compact("type"));
    }

    // Riceve i dati dall'"edit" e li salva all'interno della tabella nel db (modificando un elemento già esistente)
    public function update(TypesUpsertRequest $request, $id)
    {
        $type = Type::findOrFail($id);
        $data = $request->validated(); // inseirsco la validazione dei dati        
        $type->update($data); // aggiorno i dati dell'elemento

        return redirect()->route("admin.types.show", $type->id);
    }

    // Individua la risorsa indicata dall'id e invoca il metodo delete
    public function destroy($id)
    {
        $type = Type::findOrFail($id);

        $type->delete($id);

        return redirect()->route("admin.types.index");
    }
}
