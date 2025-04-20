<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

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
        'property_subtype'
    ];
  
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }


    
    public function getFormattedPrice()
    {
        return '$' . number_format($this->price, 2);
    }

   
    public function getPriceLabel()
    {
        return $this->type === 'rent' ? 'per month' : 'total price';
    }

   
    public function getFormattedPropertyType()
    {
        return ucfirst($this->property_type);
    }

    
    public function getFormattedPropertySubtype()
    {
        return str_replace('_', ' ', ucfirst($this->property_subtype));
    }


    public function scopeFilter($query, array $filters)
{
    $query->when($filters['type'] ?? false, fn($query, $type) =>
        $query->where('type', $type)
    );

    $query->when($filters['city'] ?? false, fn($query, $city) =>
        $query->where('city', 'like', '%'.$city.'%')
    );

    $query->when($filters['property_type'] ?? false, fn($query, $propertyType) =>
        $query->where('property_type', $propertyType)
    );

    $query->when($filters['property_subtype'] ?? false, fn($query, $propertySubtype) =>
        $query->where('property_subtype', $propertySubtype)
    );
}

public function inquiries()
{
    return $this->hasMany(Inquiry::class);
}

public static function getSubtypeMap(): array
{
    return [
        'land' => ['residential_plot', 'commercial_plot'],
        'building' => ['apartment', 'office', 'house'],
    ];
}
}



