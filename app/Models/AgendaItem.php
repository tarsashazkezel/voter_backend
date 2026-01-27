<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgendaItem extends Model
{
     protected $fillable = [
        'meeting_id',
        'title',
        'description',
    ];
    
    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }

    public function resolutions()
    {
        return $this->hasMany(Resolution::class);
    }
}
