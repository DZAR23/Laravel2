<?php

namespace App\Http\Controllers;

use App\Models\Conductore;
use Illuminate\Http\Request;

class ConductoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conductore = Conductore::all();
        return view('Conductore.index', compact('conductore'));

        //alternativas a compact
        //return view('Conductore.index')->with('conductore', $conductore);
        //return view('Conductore.index', ['conductore' => $conductore]);
    }

    public function create(array $data)
    {

        return view('Conductore.create');
        //dd("estoy dentro de create");
         // Crear un nuevo conductor usando el método `create` del modelo
         Conductore::create([
            'name' => $data['name'],
            //'movil' => 'requist',
            //'categoria' => 'requist',
            //'email' => 'requist',
            //'telefono' => 'requist',
        ]);
    }

    public function crear(array $data){
        Conductore::create([
            'name' => $data['name'],
            //'movil' => 'requist',
            //'categoria' => 'requist',
            //'email' => 'requist',
            //'telefono' => 'requist',
        ]);
    }

    public function store(Request $request)
    { 
    
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'movil' => 'required|integer|min:1|max:6',
            'categoria' => 'required|integer|min:1',
            'email' => 'required|integer|min:1',
            'telefono' => 'required|integer|min:1',
        ]);

        $this->crear($request->all() );

        
        
        // Redireccionar a la vista de listado de conductores
        return redirect()->route('Conductore.index');
    }
    
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $conductore = Conductore::findOrFail($id);
        return view('Conductore.edit', compact('conductore'));
    }

    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'movil' => 'required|integer|min:1',
            'categoria' => 'required|integer|min:1',
            'email' => 'required|integer|min:1',
            'telefono' => 'required|integer|min:1',
        ]);

        // Buscar el conductor por su ID
        $conductore = Conductore::findOrFail($id);

        // Actualizar los datos del conductor
        $conductore->update($request->all());

        // Redireccionar a la vista de listado de conductor
        return redirect()->route('Conductore.index');
    }

    public function destroy(string $id)
    {
        $conductore = Conductore::findOrFail($id);

        $conductore->delete();

        return redirect()->route('Conductore.index');
    }
}
