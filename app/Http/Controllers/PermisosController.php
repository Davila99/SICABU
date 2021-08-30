<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Permisos;
use App\Models\User;
use Illuminate\Http\Request;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['permisos'] = Permisos::paginate(5);
        return view('permiso/index', $datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $estudiantes = Estudiante::all();
        return view('permiso/create',compact('estudiantes'),compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->except('_token');
        Permisos::insert($datos);
        return redirect('permiso/')->with('mensaje', 'Permiso agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permisos  $permisos
     * @return \Illuminate\Http\Response
     */
    public function show(Permisos $permisos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permisos  $permisos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Permisos::findOrFail($id);
        return view('permiso/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permisos  $permisos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token', '_method']);

        Permisos::where('id', '=', $id)->update($datos);

        $datos = Permisos::findOrFail($id);
        return view('permiso.edit', compact('datos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permisos  $permisos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permisos::destroy($id);
        return redirect('permiso/')->with('mensaje', 'Permiso eliminada con exito');
    }
}
