<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardList extends Model
{
    use HasFactory;

    public function board()
    {
        $this->belongsTo(Board::class,'board_id');
    }

    public function cards()
    {
        $this->hasMany(Card::class,'list_id');
    }
}
