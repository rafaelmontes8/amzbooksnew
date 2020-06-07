<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{

    protected $table = 'user_books';

    protected $fillable = [
        'id', 'userId', 'bookId','rating',
    ];
}
