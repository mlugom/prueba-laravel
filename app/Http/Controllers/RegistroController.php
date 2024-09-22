<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    const VALIDATION_RULES = [
        'nombre' => 'required',
        'descripcion' => 'required',
    ];

    const VALIDATION_MESSAGES = [
        'required' => 'Este campo es requerido',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = Registro::all();
        foreach ($registros as $registro) {
            $registro->display_created_at = date("Y-m-d", strtotime($registro->created_at));
            $registro->display_updated_at = date("Y-m-d", strtotime($registro->updated_at));
        }

        $context = [
            'registros' => $registros,
        ];

        return view("registros.index", $context);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("registros.form", ["action" => route('registros.store')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(self::VALIDATION_RULES, self::VALIDATION_MESSAGES);
        Registro::create($validated);

        return redirect(route('registros.index'))->with('message', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registro $registro)
    {
        return view("registros.form", [
            "registro" => $registro,
            "action" => route('registros.update', $registro),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registro $registro)
    {
        $validated = $request->validate(self::VALIDATION_RULES, self::VALIDATION_MESSAGES);

        $registro->update($validated);

        return redirect(route('registros.index'))->with('message', 'Registro editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registro $registro)
    {
        $registro->delete();

        return response()->json(["message" => "Registro eliminado correctamente"]);
    }

    public function getAll()
    {
        $registros = Registro::all();
        foreach ($registros as $registro) {
            $registro->display_created_at = date("Y-m-d", strtotime($registro->created_at));
            $registro->display_updated_at = date("Y-m-d", strtotime($registro->updated_at));
        }

        return response()->json(["data" => $registros->toArray()]);
    }
}
