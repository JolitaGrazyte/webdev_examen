<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Votes extends Model
{
    protected $table = 'votes';

    protected $fillable = ['image_id'];

    protected $primaryKey = "id";

    public function image(){

        return $this->belongsTo('App\Image', 'image_id', 'id');
    }

    public static function winners($p){

        $winners = Votes::whereHas('image', function($q) use($p){

            $q->where('created_at', '>', $p['start'])->where('created_at', '<=', $p['end']);

        })
            ->with('image.author')->select('image_id', DB::raw('COUNT(image_id) as count'))
            ->groupBy('image_id')
            ->orderBy('count', 'desc')
            ->take(3)->get();

        return $winners;

    }
}
