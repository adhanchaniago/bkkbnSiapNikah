<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * GET the questions for each category
     * 
     */
    public function questions(){
        return $this->hasMany(Question::class,'categoryId');
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($category) { // before delete() method call this
             $category->questions()->delete();
             // do the rest of the cleanup...
        });
    }
}
