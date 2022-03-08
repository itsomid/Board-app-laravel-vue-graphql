<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 * @property mixed $owner_id
 */
class Board extends Model
{
    use HasFactory;
    protected $fillable = ['title','color','owner_id'];
    /**
     * @var mixed
     */

    public function lists()
    {
        return $this->hasMany(CardList::class,'board_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');
    }
}
