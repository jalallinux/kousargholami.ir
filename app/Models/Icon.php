<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $primaryKey = 'icon';

    protected $fillable = [
        'icon',
    ];
}
