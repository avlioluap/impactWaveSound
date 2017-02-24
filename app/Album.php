<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * Get the tracks for the album.
     */
    public function tracks()
    {
        return $this->hasMany('App\Track');
    }
}
