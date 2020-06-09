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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setCoursesAttribute($value)
    {
        $this->attributes['courses'] = json_encode($value);
    }

    public function getCoursesAttribute($value){
        return json_decode($value) ?: [];
    }

}
