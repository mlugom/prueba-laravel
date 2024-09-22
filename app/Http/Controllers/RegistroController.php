<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
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
        return view("registros.form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Registro::create($request->all());

        return redirect('registros.index');
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
        return view("registros.form", ["registro" => $registro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registro $registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registro $registro)
    {
        $registro->delete();

        return redirect("registros.index");
    }

    public function getAll()
    {
        $registros = Registro::all();

        return response()->json($registros);
    }

}
