<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    protected $fillable = [
        'agenda_item_id',
        'text',
        'requires_unanimous',
    ];

    protected $casts = [
        'requires_unanimous' => 'boolean',
    ];

    public function agendaItem()
    {
        return $this->belongsTo(AgendaItem::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
