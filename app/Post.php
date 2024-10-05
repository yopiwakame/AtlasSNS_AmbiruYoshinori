<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {

    use HasFactory;

    protected $fillable = ['user_id', 'post'];
}
