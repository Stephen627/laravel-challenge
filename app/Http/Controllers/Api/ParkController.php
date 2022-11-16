<?php

namespace App\Http\Controllers\Api;

use App\Models\Park;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\HasAssociation;

class ParkController extends Controller
{
    use HasAssociation;

    public function associate(Request $request, Park $park)
    {
        return $this->makeAssociation($request, $park, 'breed');
    }
}
