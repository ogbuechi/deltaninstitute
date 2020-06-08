<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $guarded = [];

    public function post_primaries()
    {
        return $this->hasMany(PostPrimary::class);
    }

}
