<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\User;

class PartidosController extends Controller
{

    public function __construct() {

        $this->authorizeResource(Partido::class, 'partido');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $partidos = Partido::all();
            return view('partidos.index', ['partidos' => $partidos]);
        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('partidos.create');
        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required',
            'lugar' => 'required',
            'local' => 'required',
            'visita' => 'required'
        ]);

        try {

            $employee = Partido::create([
                'fecha' => $request->input('fecha'),
                'lugar' => $request->input('lugar'),
                'terminado' => $request->input('terminado'),
                'equipo_local' => $request->input('local'),
                'goles_local' => $request->input('goles-local'),
                'equipo_visita' => $request->input('visita'),
                'goles_visita' => $request->input('goles-visita'),
            ]);

            return redirect('partidos');
        
        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Partido $partido)
    {   
        try {

            // $partido = Partido::find($id);
            
            // $this->authorize('view', $partido);
            
            return view('partidos.show', ['partido' => $partido]);
        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Partido $partido)
    {
        try {
            // $partido = Partido::find($id);
            return view('partidos.edit', ['partido' => $partido, 'user' => $user]);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partido $partido)
    {
        $validated = $request->validate([
            'fecha' => 'required',
            'lugar' => 'required',
            'local' => 'required',
            'visita' => 'required'
        ]);

        try {

            $partido
            ->update([
                'fecha' => $request->input('fecha'),
                'lugar' => $request->input('lugar'),
                'terminado' => $request->input('terminado'),
                'equipo_local' => $request->input('local'),
                'goles_local' => $request->input('goles-local'),
                'equipo_visita' => $request->input('visita'),
                'goles_visita' => $request->input('goles-visita'),
            ]);

            return redirect('partidos');
        
        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partido $partido)
    {
        try {
            $partido->delete();

            return redirect('/partidos');

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }
}