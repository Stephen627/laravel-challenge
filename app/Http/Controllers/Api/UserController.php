<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Park;
use App\Models\Breed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $classes = [
        'park' => Park::class,
        'breed' => Breed::class,
    ];

    public function associate(Request $request, User $user)
    {
        if (!isset($this->classes[$request->get('type')])) {
            return [
                'success' => false,
            ];
        }

        $class = $this->classes[$request->get('type')];
        $instance = $class::find($request->get('id'));

        if (!$instance) {
            return [
                'success' => false,
            ];
        }

        $function = $request->get('type') . 's';
        $user->$function()->save($instance);
        return [
            'success' => true,
        ];
    }
}
