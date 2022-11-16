<?php

namespace App\GraphQL\Queries;

use App\Models\Breed;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class BreedsQuery extends Query
{
    protected $attributes = [
        'name' => 'breeds',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Breed'));
    }

    public function resolve($root, $args)
    {
        return Breed::all();
    }
}
