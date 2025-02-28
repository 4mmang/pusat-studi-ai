<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $guarded = [];

    public function penulis(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
