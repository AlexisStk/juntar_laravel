<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\User;

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
        return $this->belongsToMany(User::class);
    }

    public function pendingRequest()
    {

        return $this->hasMany(RequestGroup::class)->where('deleted_at',null);

    }

}
