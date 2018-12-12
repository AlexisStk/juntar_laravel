<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User;
use App\GroupUser;

class Group extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'date', 'place', 'limit', 'user_id'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function pendingRequest()
    {
        // return $this->hasMany(RequestGroup::class)->where('deleted_at',null);
        // Si sigo usando querybuilder arruino todo.
        return $this->hasMany(RequestGroup::class);
    }

    public function friendships()
    {
        return $this->hasMany(GroupUser::class);
    }

}
