<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Szavazat extends Model
{
    protected $table = 'szavazat';
    public function resztvevo(){
        return $this->belongsTo(Resztvevo::class);
    }

    public function napirendi_pont(){
        return $this->belongsTo(Napirendi_pont::class);
    }
}
