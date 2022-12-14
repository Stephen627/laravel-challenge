<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\HasAssociation;

class UserController extends Controller
{
    use HasAssociation;

    public function associate(Request $request, User $user)
    {
        return $this->makeAssociation($request, $user);
    }
}
