<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatchScore extends JsonResource
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
                'match_id' => $this->match_id,
                'round' => $this->round,
                'time' => $this->time,
                'round_total_score' => $this->round_total_score,
                'negative_score' => $this->negative_score,
                'additional_score' => $this->additional_score,
                'cards_score' => $this->cards_score,
                'opponent_score' => $this->opponent_score,
                'pot' => $this->pot,
                'got' => $this->got,
            ],
            'links' => [
                'self' => $this->path(),
            ]
        ];
    }
}
