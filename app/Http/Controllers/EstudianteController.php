<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['estudiantes'] = Estudiante::query()
            ->with(['carrera'])
            ->orderBy('nombre', 'asc')
            ->paginate(3);

        return view('estudiante/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carrera::all();
        return view('estudiante/create',compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos =
            [
                'nombre' => 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'correo' => 'required|email',
                'telefono' => 'required|string|max:100',
                'foto' => 'required|max:10000|mimes:jpeg,png,jpg',

            ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'foto.required' => 'La foto es requerida'
        ];

        $this->validate($request, $campos, $mensaje);
        $datos = request()->except('_token');
        if ($request->hasFile('foto')) {
            $datos['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Estudiante::insert($datos);
        return redirect('estudiante/')->with('mensaje', 'Estudiante agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Estudiante::findOrFail($id);
        return view('estudiante/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos =
            [
                'nombre' => 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'correo' => 'required|email',
                'telefono' => 'required|string|max:100',

            ];

        $mensaje = [
            'required' => 'El :attribute es requerido',

        ];
        if ($request->hasFile('foto')) {
            $campos = ['foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje = ['foto.required' => 'La foto es requerida'];
        }
        $this->validate($request, $campos, $mensaje);

        //excluimos el token y la infromacion de method
        $datos = request()->except(['_token', '_method']);

        //condicionamos y comparamos que esi el id que estamos enviando
        if ($request->hasFile('foto')) {
            $estudiante = Estudiante::findOrFail($id);

            Storage::delete('public/' . $estudiante->foto);
            $datos['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        //es identico al que esta en los resgitros de la base de datos y guarda los nuevos cambios
        Estudiante::where('id', '=', $id)->update($datos);
        $datos = Estudiante::findOrFail($id);

        return view('estudiante.edit', compact('datos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        if (Storage::delete('public/' . $estudiante->foto)) {
            Estudiante::destroy($id);
        }

        //return redirect('estudiante');
        return redirect('estudiante/')->with('mensaje', 'Estudiante Eliminado con exito');
    }
}
