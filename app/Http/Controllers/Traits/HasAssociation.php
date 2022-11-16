<?php

namespace App\Http\Controllers\Traits;

use App\Models\Park;
use App\Models\Breed;
use App\Models\User;
use Illuminate\Http\Request;

trait HasAssociation
{
    protected $classes = [
        'park' => Park::class,
        'breed' => Breed::class,
        'user' => User::class,
    ];

    protected function makeAssociation(Request $request, $model)
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
        $model->$function()->save($instance);
        return [
            'success' => true,
        ];
    }
}
