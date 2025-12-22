<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = ['property_id', 'status', 'is_closed'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
