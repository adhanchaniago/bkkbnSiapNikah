<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    public $timestamps = false;
    public function cities()
    {
        return $this->hasMany(City::class, 'province_id');
    }
}
