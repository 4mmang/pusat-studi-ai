<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengabdian extends Model
{
    protected $table = 'pengabdian';
    protected $guarded = [];

    public function authors()
    {
        return $this->hasMany(AuthorPengabdian::class);
    }

    public function luaran()
    {
        return $this->hasMany(LuaranPengabdian::class);
    }
}
