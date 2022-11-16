<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->morphToMany(User::class, 'userables');
    }

    public function parks()
    {
        return $this->morphToMany(Park::class, 'parkables');
    }
}
