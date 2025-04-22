<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyOwnerRequest extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'document'];

}
