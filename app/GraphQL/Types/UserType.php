<?php

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'Collection of users',
        'model' => User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of user',
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Email of user',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of user',
            ],
            'location' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Location of user',
            ],
        ];
    }
}
