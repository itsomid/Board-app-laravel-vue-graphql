<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    public function lists()
    {
        $this->hasMany(CardList::class,'board_id');
    }

    public function owner()
    {
        $this->belongsTo(User::class,'owner_id');
    }
}
