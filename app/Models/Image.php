<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = "images";

    // Relation One to many
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    // Relation One to many
    public function likes() {
        return $this->hasMany('App\Models\Like');
    }

    // Relation Many to One
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    } 
}
