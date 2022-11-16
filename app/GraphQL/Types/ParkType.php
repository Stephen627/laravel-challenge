<?php

namespace App\GraphQL\Types;

use App\Models\Park;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ParkType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Park',
        'description' => 'Collection of parks',
        'model' => Park::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of park',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of park',
            ],
        ];
    }
}
