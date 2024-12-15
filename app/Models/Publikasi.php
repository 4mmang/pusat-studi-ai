<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    protected $table = 'publikasi';
    protected $guarded = [];

    public function authors(){
        return $this->hasMany(AuthorPublikasi::class);
    }
}
