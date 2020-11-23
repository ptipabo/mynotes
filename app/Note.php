<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['name', 'content', 'image', 'category', 'status'];

    public function getStatusAttribute($attributes){
        return [
            '0' => 'Inactif',
            '1' => 'Actif'
        ][$attributes];
    }
}
