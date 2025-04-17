<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'location',
        'status',
        // Add other fields here as needed
    ];

    /**
     * Get the owner of the property.
     *
     * This method defines a relationship where each Property belongs to one User (owner).
     * The foreign key is assumed to be 'owner_id' in the properties table.
     * Adjust if your foreign key is different.
     */
    public function owner()
    {
        // The property belongs to a user (owner) and the 'owner_id' is the foreign key
        return $this->belongsTo(User::class, 'owner_id'); // Assuming 'owner_id' is the column linking to the 'users' table
    }
}
