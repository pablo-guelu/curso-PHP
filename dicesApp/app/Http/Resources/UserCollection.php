<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $players = $this->collection;

        $ranking = array();

        foreach ($players as $player) {
            array_push($ranking, [$player->name => $player->winning_percentage]);
        }

        return [
            'players' => $this->collection,
            'ranking' => $ranking,
        ];
    }
}
