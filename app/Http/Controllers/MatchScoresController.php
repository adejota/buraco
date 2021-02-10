<?php

namespace App\Http\Controllers;

use App\Models\MatchScore;
use App\Http\Resources\MatchScore as MatchScoreResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MatchScoresController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', MatchScore::class);

        return MatchScoreResource::collection(request()->user()->matchscores);
    }

	public function store()
    {
        $this->authorize('create', MatchScore::class);

        $matchscore = request()->user()->matchscores()->create($this->validateData());
        
        return (new MatchScoreResource($matchscore))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MatchScore $matchscore)
    {
        $this->authorize('view', $matchscore);
		// essa parte é a implementação da policy view

        return new MatchScoreResource($matchscore);
    }

    public function update(MatchScore $matchscore)
    {
        $this->authorize('update', $matchscore);

        $matchscore->update($this->validateData());

        return (new MatchScoreResource($matchscore))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(MatchScore $matchscore)
    {
        $this->authorize('delete', $matchscore);

        $matchscore->delete();

        return response([], Response::HTTP_NO_CONTENT);
    }

    public function matchIdIndex($match_id)
    {
        $this->authorize('viewAny', MatchScore::class);

        $matchscores = MatchScore::where('match_id', $match_id)->orderBy('id','DESC')->get();

        return MatchScoreResource::collection($matchscores);
    }

    private function validateData()
    {
        return request()->validate([
            'user_id' => 'required',
            'match_id' => 'required',
            'round' => 'required',
            'time' => 'required',
            'round_total_score' => 'required',
            'negative_score' => 'nullable',
            'additional_score' => 'required',
            'cards_score' => 'required',
            'opponent_score' => 'required',
            'pot' => 'nullable',
            'got' => 'nullable',
        ]);
    }
}
