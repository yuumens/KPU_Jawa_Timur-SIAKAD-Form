<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class positionmodel extends Model
{
    protected $table = 'positions_form';
    protected $fillable = ['position_name'];
}
