<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'content', 'image', 'category', 'status'];

    protected $attributes = [
        'status' => 0
    ];

    public function getStatusAttribute($attributes){
        return [
            '0' => 'Inactif',
            '1' => 'Actif'
        ][$attributes];
    }
}
