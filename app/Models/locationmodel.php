<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class locationmodel extends Model
{
    protected $table = 'locations_form';
    protected $fillable = ['locations_name'];
}
