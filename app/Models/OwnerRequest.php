<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OwnerRequest extends Model
{
    //
    protected $table = 'property_owner_requests';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'property_type',
        'property_description',
        'document',
        'status',
    ];
}
