<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    /**
     * Get the album that won the track
     */
    public function album()
    {
        return $this->belongsTo('App\Album');
    }
}
