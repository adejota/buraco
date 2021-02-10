<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Http\Resources\Match as MatchResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MatchesController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Match::class);

        return MatchResource::collection(request()->user()->matches);
    }
    
    public function store()
    {
        $this->authorize('create', Match::class);

        $match = request()->user()->matches()->create($this->validateData());

        return (new MatchResource($match))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Match $match)
    {
        $this->authorize('view', $match);

        return new MatchResource($match);
    }

    public function update(Match $match)
    {
        $this->authorize('update', $match);
        
        $match->update($this->validateData());

        return (new MatchResource($match))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(Match $match)
    {
        $this->authorize('delete', $match);
        
        $match->delete();

        return response([], Response::HTTP_NO_CONTENT);
    }

    private function validateData()
    {
        return request()->validate([
            'opponent_id' => 'required',
            'max_points' => 'required',
            'time_limit' => 'nullable',
            'current_time' => 'nullable',
            'current_round' => 'nullable',
            'total_score' => 'nullable',
            'opponent_total_score' => 'nullable',
            'result' => 'nullable',
        ]);
    }
}