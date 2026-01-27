<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
   protected $fillable = [
        'title',
        'meeting_date',
        'location',
        'created_by',
    ];

    protected $casts = [
        'meeting_date' => 'datetime',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function agendaItems()
    {
        return $this->hasMany(AgendaItem::class);
    }
}
