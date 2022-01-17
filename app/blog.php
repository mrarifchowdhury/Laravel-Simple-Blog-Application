<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $fillable = ['title', 'blogpost', 'created_by'];
    Protected $primaryKey = 'id';
}
