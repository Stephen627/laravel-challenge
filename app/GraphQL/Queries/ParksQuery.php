<?php

namespace App\GraphQL\Queries;

use App\Models\Park;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ParksQuery extends Query
{
    protected $attributes = [
        'name' => 'parks',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Park'));
    }

    public function resolve($root, $args)
    {
        return Park::all();
    }
}
