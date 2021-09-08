<?php

namespace App\Http\Controllers;

use App\Models\Paint;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaintController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(Paint::class, 'paint');
    }

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
        $paint->image = $request->image;
        $paint->price = $request->price;
        $paint->store_id = $id;

        $paint->save();

        // $paint = Paint::create($request->all());

        return response()->json($paint);
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

        return response()->json($paint);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Paint $paint)
    {
        $paint->delete();

        return 'Paint ' . $paint->name . ' deleted';
    }

    // this method deletes all paints
    public function destroyAll($id) {

        $this->authorize('deleteAll', Paint::class);
        Paint::where('store_id', $id)->delete();
    }

}
