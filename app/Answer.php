<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'age', 'gender', 'location', 'longitude', 'latitude', 'answer', 'score'
    ];

    /**
     * Using atribute casting 
     * https://laravel.com/docs/5.8/eloquent-mutators#attribute-casting
     * 
     * @var array
     */
    protected $casts = [
        'answer' => 'array'
    ];
}
