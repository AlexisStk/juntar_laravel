<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Group;

class Post extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];
    
    public function user()
   {
       return $this->belongsTo(User::class);
   }

   public function group()
   {
       return $this->belongsTo(Group::class);
   }

}
