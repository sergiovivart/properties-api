<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    // Para usar ULID en la API
    protected $fillable = [
        'ulid',
        'intern_reference',
        'title',
        'street',
        'number',
        'zip_code',
        'is_active',
        'is_sell',
        'is_rent',
        'sell_price',
        'rental_price',
        'built_m2',
        'office_id',
        'property_type_id',
        'user_id',
        'secondary_user_id',
        'neighborhood_id',
        'district_id',
        'municipality_id',
        'region_id',
        'location_id',
        'created_at',
        'updated_at',
    ];

    // Relaciones
    public function propertyType(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function secondaryUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'secondary_user_id');
    }

    public function neighborhood(): BelongsTo
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function municipality(): BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }
}
