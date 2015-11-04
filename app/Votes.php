<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    protected $table = 'votes';

    protected $fillable = ['image_id'];

    protected $primaryKey = "id";

    public function image(){

        return $this->belongsTo('App\Image', 'image_id', 'id');
    }
}
