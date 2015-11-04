<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{

    protected $table = 'periods';

    protected $dates = ['start', 'end'];

    protected $primaryKey = "id";

    public function images(){

        return $this->hasMany('App\Image');
    }

    public function scopeActive($query){

        $now = Carbon::now();

        return $query->where('start', '<', $now)->where('end', '>', $now)->first();


    }

    public function scopePast($query){

        $now = Carbon::now();

        return $query->where('end', '<', $now);
    }
}
