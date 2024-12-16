<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    protected $table = 'penelitian';
    protected $guarded = [];

    public function authors()
    {
        return $this->hasMany(AuthorPenelitian::class);
    }
}
