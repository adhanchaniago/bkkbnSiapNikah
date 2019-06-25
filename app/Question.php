<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question','answer','correctAnswerRecommendation','wrongAnswerRecommendation','categoryId', 'gender'
    ];
    public function category(){
        return $this->belongsTo(Category::class,'categoryId');
    }
}
