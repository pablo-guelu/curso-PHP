<?php

namespace App\Http\Controllers;
use App\Models\Equipo;

use Illuminate\Http\Request;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $equipos = Equipo::all();
            return view('equipos.index', ['equipos' => $equipos]);
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
            return view('equipos.create');
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
            'name' => 'required',
        ]);

        try {

            $equipo = Equipo::create([
                'nombre' => $request->input('name')
            ]);

            return redirect('equipos/create');
        
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
    public function show($id)
    {
        try {
            $equipo = Equipo::find($id);
            return view('equipos.show', ['equipo' => $equipo]);
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
    public function edit($id)
    {
        try {
            $partido = Equipo::find($id);
            return view('equipos.edit', ['equipo' => $partido]);

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
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        try {

            $equipo = Equipo::find($id)
            ->update([
                'nombre' => $request->input('name')
            ]);

            return redirect('equipos.edit');
        
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
    public function destroy($id)
    {
        try {
            $equipo = Equipo::find($id);
            $equipo->delete();

            return redirect('/equipos');

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }
}
