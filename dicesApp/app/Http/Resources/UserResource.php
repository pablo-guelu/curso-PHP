<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $plays = $this->turns;

        $wins = 0;

        foreach ($plays as $play) {
            if($play->seven) {
                $wins += 1;
            }
        };

        if (count($plays)) {
            $winRatio = ($wins / count($plays)) * 100;
        } else {
            $winRatio = 0;
        }
         

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'total_plays' => count($plays),
            'wins' => $wins,
            'winning_percentage' =>  $winRatio,
            'plays' => $this->turns,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
