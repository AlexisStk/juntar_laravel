<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Group extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'date', 'place', 'limit', 'user_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function getAllGroups()
    {
        return $this->orderBy('date');
    }
}
