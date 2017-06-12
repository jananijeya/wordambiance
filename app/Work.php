<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //fillable fields
    protected $fillable = ['title', 'author', 'category', 'content'];

    //custom timestamps name
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
