<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'loaction',
    ];

    public function parks()
    {
        return $this->morphedByMany(Park::class, 'userables');
    }

    public function breeds()
    {
        return $this->morphedByMany(Breed::class, 'userables');
    }
}
