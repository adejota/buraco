<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Opponent extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'id' => $this->id,
                'user_id' => $this->user_id,
                'name' => $this->name,
                'avatar' => $this->avatar,
                'wins' => $this->wins,
                'losses' => $this->losses,
            ],
            'links' => [
                'self' => $this->path(),
            ]
        ];
    }
}
