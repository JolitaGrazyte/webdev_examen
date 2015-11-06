<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string filename
 */
class Image extends Model
{

    protected $table = 'images';

    protected $primaryKey = "id";

    public function votes(){

        return $this->hasMany('App\Votes', 'image_id', 'id');
    }

    public function author(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function scopeActive($query, $p){

        return $query->where('created_at', '>=', $p->start)->where('created_at', '<=', $p->end);

    }
    public function scopePastperiod($query, $p){

        return $query->where('created_at', '>', $p->end);

    }


}
