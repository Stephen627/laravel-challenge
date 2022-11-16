<?php

namespace App\GraphQL\Types;

use App\Models\Breed;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class BreedType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Breed',
        'description' => 'Collection of breeds',
        'model' => Breed::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of breed',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of breed',
            ],
        ];
    }
}
