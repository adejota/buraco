<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    public function update(User $user)
    {
        $this->authorize('update', $user);

        $user->update($this->validateData());

        return [ 'message' => 'User avatar_id updated' ];
    }

    private function validateData()
    {
        return request()->validate([
            'avatar_id' => 'required',
        ]);
    }
}
