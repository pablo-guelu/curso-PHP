<?php

namespace App\Http\Controllers;

use App\Models\Paint;
use App\Models\Store;
use Illuminate\Http\Request;

class PaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $paints = Store::where('id', $id)
        ->first()
        ->paints;

        return $paints;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'entry' => 'required',
        ]);

        $paint = new Paint;
        $paint->title = $request->title;
        $paint->author = $request->author;
        $paint->entry = $request->entry;
        $paint->store_id = $id;

        $paint->save();

        return $paint;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Http\Response
     */
    public function show(Paint $paint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Http\Response
     */
    public function edit(Paint $paint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paint $paint)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'entry' => 'required',
        ]);

        $paint->title = $request->title;
        $paint->author = $request->author;
        $paint->entry = $request->entry;
        $paint->store_id = $id;

        $paint->save();

        return $paint;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $paint)
    {
        $store = Store::find($id);
        $paintToDelete = Paint::find($paint);
        $paintToDelete->delete();

        return 'Paint ' . $paint . ' deleted from ' . 'store ' . $store->name;
    }

    // this method deletes all paints
    public function destryAll() {
        Paints::all()->delete();
    }


}
