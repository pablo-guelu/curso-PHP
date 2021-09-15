<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Models\Turn;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $players = User::all();
        // return response()->json(['players' => $players, 'code' => 200]);

        return response()->json([
            'players' => User::all(),
            'code' => 200,
        ]);
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $player = User::create($request->all());

        return response()->json(['player' => $player, 'code' => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function play($id, Request $request) {
        $request -> validate([
            'dice1' => 'required|integer|between:1,6',
            'dice2' => 'required|integer|between:1,6',
        ]);

        $dice1 = $request->dice1;
        $dice2 = $request->dice2;
        $seven = ($dice1 + $dice2 == 7 ? true : false);

        $user = User::where('id', $id)->first();

        $play = Turn::create([
            'dice1' => $dice1,
            'dice2' => $dice2,
            'seven' => $seven,
            'user_id' => $user->id,
        ]);


        $user->update([
            'wins' => $play->seven ? $user->wins += 1 : $user->wins,
            'total_plays' => $user->total_plays += 1,
            'winning_percentage' => ($user->wins / $user->total_plays) * 100,
        ]);

        $user->save();  

        return response()->json([
            'play' => $play,
            'code' => 200,
        ]);
    }

    public function deletePlays ($id) {
        $plays = Turn::where('user_id', $id)->get();
        $plays->each->delete();

        return response()->json(['message'=>'All plays delted from player '. $id, 'code'=>200]);
    }



    public function updateName ($id, Request $request) {
        $user = User::where('id', $id)->first();

        $request->validate([
            'name' => 'required'
        ]);

        $user->update([
            'name' => $request->name,
        ]);

        return response()->json(['message'=>'Username updated', 'code'=>200]);
    }



    public function getPlays ($id) {

        $plays = Turn::where('user_id', $id)->get();

        return response()->json(['plays'=>$plays, 'code'=>200]);
    }



    public function playersRanking () {

        $players = User::get();

        $ranking = $players->map->only(['name', 'winning_percentage']);

        return response()->json([
            'ranking' => $ranking->sortByDesc('winning_percentage'),
            'code' => 200,
        ]);

    }

    public function firstPlace () {

        $players = User::get();

        $ranking = $players->map->only(['name', 'winning_percentage']);

        return response()->json([
            'Winner' => $ranking->sortByDesc('winning_percentage')->first(),
            'code' => 200,
        ]);

    }

    public function lastPlace () {

        $players = User::get();

        $ranking = $players->map->only(['name', 'winning_percentage']);

        return response()->json([
            'Loser' => $ranking->sortByDesc('winning_percentage')->last(),
            'code' => 200,
        ]);

    }

}
