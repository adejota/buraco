<?php

namespace App\Http\Controllers;

use App\Models\Opponent;
use App\Http\Resources\Opponent as OpponentResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OpponentsController extends Controller
{
    // a relação entre user()->opponents precisa ser feita no User model
    public function index()
    {
        $this->authorize('viewAny', Opponent::class);

        return OpponentResource::collection(request()->user()->opponents);
    }

    public function store()
    {
        $this->authorize('create', Opponent::class);
        
        $opponent = Opponent::where('user_id', request()->user()->id)
            ->where('name', request()->name)
            ->first();

        if ( $opponent != null ) {
            return new OpponentResource($opponent);

        } else {
            $opponent = request()->user()->opponents()->create($this->validateData());
        
            return (new OpponentResource($opponent))
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
        }
    }

    public function show(Opponent $opponent)
    {
        $this->authorize('view', $opponent);
        
        return new OpponentResource($opponent);
    }

    public function update(Opponent $opponent)
    {
        $this->authorize('update', $opponent);

        $opponent->update($this->validateData());

        return (new OpponentResource($opponent))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(Opponent $opponent)
    {
        $this->authorize('delete', $opponent);

        $opponent->delete();

        return response([], Response::HTTP_NO_CONTENT);
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'avatar' => 'nullable',
            'wins' => 'nullable',
            'losses' => 'nullable',
        ]);
    }
}
