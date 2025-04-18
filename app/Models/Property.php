<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'type',
        'status',
        'city',
        'address',
        'image',
        'price',
        'owner_id',
        'property_type',
        'property_subtype',
    ];

    /**
     * Get the owner of the property.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Get the formatted price.
     *
     * @return string
     */
    public function getFormattedPrice()
    {
        return '$' . number_format($this->price, 2);
    }

    /**
     * Get the price label based on type.
     *
     * @return string
     */
    public function getPriceLabel()
    {
        return $this->type === 'rent' ? 'per month' : 'total price';
    }

    /**
     * Get the formatted property type.
     *
     * @return string
     */
    public function getFormattedPropertyType()
    {
        return ucfirst($this->property_type);
    }

    /**
     * Get the formatted property subtype.
     *
     * @return string
     */
    public function getFormattedPropertySubtype()
    {
        return str_replace('_', ' ', ucfirst($this->property_subtype));
    }
}