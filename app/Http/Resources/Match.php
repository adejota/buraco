<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Match extends JsonResource
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
                'opponent_id' => $this->opponent_id,
                'max_points' => $this->max_points,
                'time_limit' => $this->time_limit,
                'current_time' => $this->current_time,
                'current_round' => $this->current_round,
                'total_score' => $this->total_score,
                'opponent_total_score' => $this->opponent_total_score,
                'result' => $this->result,
                'last_updated' => $this->updated_at->diffForHumans(),
                    // diffForHumans é uma função do Carbon e resulta o timestamp assim: '1 second ago'
            ],
            'links' => [
                'self' => $this->path(),
            ]
        ];
    }
}
